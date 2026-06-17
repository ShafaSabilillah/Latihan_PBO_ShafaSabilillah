<?php

class Database {
    // Properti untuk menyimpan kredensial database
    private $host = "localhost";
    private $username = "root";     // Sesuaikan dengan username MySQL Anda
    private $password = "";         // Sesuaikan dengan password MySQL Anda
    private $db_name = "DB_LATIHAN_PBO_TI1C_ShafaSabilillah";
    
    // Properti terlindungi untuk menyimpan objek koneksi
    protected $connection;

    // Magic Method Constructor: Otomatis berjalan saat objek diinstansiasi
    public function __construct() {
        // Melakukan koneksi menggunakan MySQLi secara OOP
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Memeriksa apakah koneksi berhasil atau gagal
        if ($this->connection->connect_error) {
            die("Koneksi ke database gagal: " . $this->connection->connect_error);
        }
    }

    // Metode untuk mengambil objek koneksi (akan berguna bagi class anak/pembantu)
    public function getConnection() {
        return $this->connection;
    }

    // Magic Method Destructor: Otomatis menutup koneksi saat program selesai berjalan
    public function __destruct() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}

// =========================================================================
// PENGUJIAN KONEKSI (Opsional - Bisa dihapus jika file ini akan di-include)
// =========================================================================
// $db = new Database();
// if ($db->getConnection()) {
//     echo "Koneksi ke database 'DB_LATIHAN_PBO_TI1C_ShafaSabilillah' berhasil terbentuk menggunakan OOP!";
// }
?>