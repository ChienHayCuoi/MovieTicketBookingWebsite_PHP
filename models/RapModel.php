<?php
class RapModel {
    private $id;
    private $tenRap;
    private $diaChi;
    private $anh;
    private $soDienThoai;

    public function __construct($id, $tenRap, $diaChi, $anh,$soDienThoai) {
        $this->id = $id;
        $this->tenRap = $tenRap;
        $this->diaChi = $diaChi;
        $this->anh = $anh;
        $this->soDienThoai = $soDienThoai;
    }

    public function getId() {
        return $this->id;
    }

    public function getTenRap() {
        return $this->tenRap;
    }

    public function getDiaChi() {
        return $this->diaChi;
    }

    public function getAnh() {
        return $this->anh;
    }

    public function getSoDienThoai() {
        return $this->soDienThoai;
    }

    public function getThongTinRap() {
        return "Rạp: $this->tenRap, Địa chỉ: $this->diaChi, Số điện thoại: $this->soDienThoai";
    }

    public static function getDanhSachRap() {
        $raps = [];
        $conn = new mysqli('localhost', 'root', '', 'db_xemphim');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM rap";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $raps[] = new RapModel($row['MaRap'], $row['TenRap'], $row['DiaChi'], $row['Anh'], $row['Sdt']);
            }
        }

        $conn->close();
        return $raps;
    }
    
    public static function getRapById($id) {
        $conn = new mysqli('localhost', 'root', '', 'db_xemphim');
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT MaRap,TenRap, DiaChi, Sdt, Anh FROM rap WHERE MaRap = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $rap = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $rap = new RapModel($row['MaRap'], $row['TenRap'], $row['DiaChi'], $row['Anh'], $row['Sdt']);
        }

        $stmt->close();
        $conn->close();
        return $rap;
    }
}
?>