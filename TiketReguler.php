<?php
// Menghubungkan ke abstract class induk
require_once 'tiket.php';

class TiketReguler extends Tiket {
    // Properti tambahan spesifik untuk studio Reguler
    private $tipeAudio;
    private $lokasiBaris;

    // Constructor Subclass
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        // Memanggil constructor dari class induk (Tiket)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Mengimplementasikan metode abstrak hitungTotalHarga (Setelan Awal)
    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->hargaDasarTiket; 
    }

    // Mengimplementasikan metode abstrak tampilkanInfoFasilitas
    public function tampilkanInfoFasilitas() {
        return "Audio: " . $this->tipeAudio . " | Kursi: " . $this->lokasiBaris;
    }
}
?>