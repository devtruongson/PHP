<?php
class Database {
    private $host = "localhost";      
    private $username = "root";        
    private $password = "Nson091120@";            
    private $dbname = "qlthuoc"; 
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Kết nối thất bại: " . $this->conn->connect_error);
        }
    }
}

class TableModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn;
    }

    public function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS Thuoc (
            Ma INT AUTO_INCREMENT PRIMARY KEY,
            Ten VARCHAR(100) NOT NULL,
            DonVi VARCHAR(50) NOT NULL,
            GiaBan FLOAT(7, 2) NOT NULL,
            HanSD DATE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($this->db && $this->db->query($sql) === TRUE) {
            echo "Tạo bảng thành công.";
        } else {
            echo "Lỗi tạo bảng: " . ($this->db ? $this->db->error : "Kết nối không tồn tại.");
        }
    }
}

// Sử dụng chạy file lần đầu thì nhả comment ra để tạo bảng 
// $tableModel = new TableModel();
// $tableModel->createTable();


// lấy ra connection
$db = new Database();
$conn = $db->conn; 



