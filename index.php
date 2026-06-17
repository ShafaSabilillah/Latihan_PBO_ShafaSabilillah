<?php
// 1. Sertakan file database dan semua subclass komponen PBO
require_once 'database.php';
require_once 'TiketReguler.php';
require_once 'TiketIMAX.php';
require_once 'TiketVelvet.php';

// 2. Inisialisasi Database dan ambil data tiket
$db = new Database();
$conn = $db->getConnection();

$query = "SELECT * FROM tabel_tiket";
$result = $conn->query($query);

// 3. Siapkan array penampung untuk mengelompokkan objek berdasarkan studio
$kelompok_tiket = [
    'reguler' => [],
    'imax'    => [],
    'velvet'  => []
];

// 4. Proses Penarikan Data Dinamis & Polimorfisme Instansiasi Objek
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jenis = strtolower($row['jenis_studio']);
        
        // Membentuk data menjadi objek spesifik sesuai jenis studio di database
        if ($jenis == 'reguler') {
            $kelompok_tiket['reguler'][] = new TiketReguler(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                $row['tipe_audio'], $row['lokasi_baris']
            );
        } elseif ($jenis == 'imax') {
            $kelompok_tiket['imax'][] = new TiketIMAX(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                $row['kacamata_3d_id'], $row['efek_gerak_fitur']
            );
        } elseif ($jenis == 'velvet') {
            $kelompok_tiket['velvet'][] = new TiketVelvet(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                $row['bantal_selimut_pack'], $row['layanan_butler']
            );
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan Tiket Bioskop - PBO TI1C</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        h1 { text-align: center; color: #222; }
        h2 { background-color: #333; color: #fff; padding: 10px; margin-top: 40px; border-radius: 4px; text-transform: uppercase; font-size: 18px; }
        .studio-reguler { border-left: 5px solid #2196F3; }
        .studio-imax { border-left: 5px solid #FF9800; }
        .studio-velvet { border-left: 5px solid #9C27B0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; color: #555; }
        tr:hover { background-color: #f1f1f1; }
        .harga { font-weight: bold; color: #2e7d32; }
    </style>
</head>
<body>

    <h1>Daftar Pesanan Tiket Bioskop Dinamis (PBO)</h1>
    <p style="text-align: center; color: #666;">Menampilkan pemetaan relasi data ke objek menggunakan metode polimorfik.</p>

    <?php 
    // Looping untuk memisahkan dan menampilkan kelompok data secara terpisah
    foreach ($kelompok_tiket as $nama_studio => $daftar_tiket): 
    ?>
        <h2 class="studio-<?php echo $nama_studio; ?>">Studio <?php echo ucfirst($nama_studio); ?></h2>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Film</th>
                    <th>Jadwal Tayang</th>
                    <th>Jumlah Kursi</th>
                    <th>Harga Dasar</th>
                    <th>Spesifikasi Fasilitas Unik (Atribut Anak)</th>
                    <th>Total Bayar (Polimorfik)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($daftar_tiket)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; color: #999;">Belum ada data pesanan untuk studio ini.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($daftar_tiket as $tiket): ?>
                        <tr>
                            <td>
                                <?php 
                                $refId = new ReflectionProperty('Tiket', 'id_tiket');
                                $refId->setAccessible(true);
                                echo $refId->getValue($tiket);
                                ?>
                            </td>
                            <td>
                                <strong>
                                <?php 
                                $refFilm = new ReflectionProperty('Tiket', 'nama_film');
                                $refFilm->setAccessible(true);
                                echo $refFilm->getValue($tiket);
                                ?>
                                </strong>
                            </td>
                            <td>
                                <?php 
                                $refJadwal = new ReflectionProperty('Tiket', 'jadwal_tayang');
                                $refJadwal->setAccessible(true);
                                echo $refJadwal->getValue($tiket);
                                ?>
                            </td>
                            <td>
                                <?php 
                                $refKursi = new ReflectionProperty('Tiket', 'jumlah_kursi');
                                $refKursi->setAccessible(true);
                                echo $refKursi->getValue($tiket);
                                ?>
                            </td>
                            <td>
                                Rp <?php 
                                $refHarga = new ReflectionProperty('Tiket', 'hargaDasarTiket');
                                $refHarga->setAccessible(true);
                                echo number_format($refHarga->getValue($tiket), 0, ',', '.');
                                ?>
                            </td>
                            <td>
                                <span><?php echo $tiket->tampilkanInfoFasilitas(); ?></span>
                            </td>
                            <td class="harga">
                                Rp <?php echo number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endforeach; ?>

</body>
</html>