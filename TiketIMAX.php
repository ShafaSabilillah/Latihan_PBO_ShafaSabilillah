<?php
// Menghubungkan ke abstract class induk
require_once 'tiket.php';

class TiketIMAX extends Tiket {
    // Properti tambahan spesifik untuk studio IMAX
    private $kacamata3dId;
    private $efekGerakFitur;

    // Constructor Subclass
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        // Memanggil constructor dari class induk (Tiket)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Mengimplementasikan metode abstrak hitungTotalHarga (Setelan Awal)
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    // Mengimplementasikan metode abstrak tampilkanInfoFasilitas
    public function tampilkanInfoFasilitas() {
        return "Kacamata 3D ID: " . $this->kacamata3dId . " | Efek: " . $this->efekGerakFitur;
    }
}
?>