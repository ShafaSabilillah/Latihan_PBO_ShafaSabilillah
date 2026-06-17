<?php
// Pastikan file database terhubung jika file ini dipisah
// require_once 'database.php';

// Membuat abstract class bernama Tiket sesuai panduan image_bbd048.png
abstract class Tiket {
    
    // Properti/Atribut Terenkapsulasi (protected)
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket; // Menggunakan camelCase sesuai instruksi gambar

    // Constructor untuk memetakan nilai properti dari kolom tabel database
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    // =========================================================================
    // METODE ABSTRAK (Tanpa Isi/Body) - Wajib diimplementasikan oleh class anak
    // =========================================================================
    
    // Metode untuk menghitung total harga tiket berdasarkan jenis studio
    abstract public function hitungTotalHarga();

    // Metode untuk menampilkan informasi fasilitas spesifik masing-masing studio
    abstract public function tampilkanInfoFasilitas();
}