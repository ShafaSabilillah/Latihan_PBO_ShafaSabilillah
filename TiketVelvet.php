<?php
// Menghubungkan ke abstract class induk
require_once 'tiket.php';

class TiketVelvet extends Tiket {
    // Properti tambahan spesifik untuk studio Velvet
    private $bantalSelimutPack;
    private $layananButler;

    // Constructor Subclass
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        // Memanggil constructor dari class induk (Tiket)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Mengimplementasikan metode abstrak hitungTotalHarga (Setelan Awal)
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    // Mengimplementasikan metode abstrak tampilkanInfoFasilitas
    public function tampilkanInfoFasilitas() {
        return "Fasilitas: " . $this->bantalSelimutPack . " | Layanan: " . $this->layananButler;
    }
}
?>