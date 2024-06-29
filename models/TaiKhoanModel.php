<?php
class TaiKhoanModel {
    private $conn;

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Function to get a TaiKhoan by ID
    public function getTK($id) {
        $sql = "SELECT * FROM taikhoan WHERE MaTK = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    function sortID($model, $bien) {
        $result = $model->getListTK();
        $ids = array_column($result, 'MaTK');

        if ($bien == true) {
            array_multisort($ids, SORT_ASC, $result);
        } else {
            array_multisort($ids, SORT_DESC, $result);
        }

        return $result;
    }

    // Function to get all TaiKhoans
    public function getListTK() {
        $sql = "SELECT * FROM taikhoan";
        $result = $this->conn->query($sql);
        if ($result === false) {
            die('Query failed: ' . $this->conn->error);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Function to update a TaiKhoan
    public function updateTK($id, $taikhoan, $email, $matkhau, $ngaysinh, $diachi, $sodienthoai, $ten) {
        $sql = "UPDATE taikhoan SET `TenTK`=?, `Email`=?, `MatKhau`=?, `NgaySinh`=?, `DiaChi`=?, `SDT`=?, `TenNguoiDung`=? WHERE `MaTK`=?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param("sssssssi", $taikhoan, $email, $matkhau, $ngaysinh, $diachi, $sodienthoai, $ten, $id);
        return $stmt->execute();
    }

    // Function to add a new TaiKhoan
    public function addTK($taikhoan, $email, $matkhau, $ngaysinh, $diachi, $sodienthoai, $ten) {
        $sql = "INSERT INTO `taikhoan`(`TenTK`, `Email`, `MatKhau`, `NgaySinh`, `DiaChi`, `SDT`, `TenNguoiDung`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param("sssssss", $taikhoan, $email, $matkhau, $ngaysinh, $diachi, $sodienthoai, $ten);
        return $stmt->execute();
    }
    public function deleteVePhim($id) {
        $sql = "DELETE FROM `vephim` WHERE `MaTK`=?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    // Function to delete a TaiKhoan by ID
    public function deleteTK($id) {
        $sql = "DELETE FROM `taikhoan` WHERE `MaTK`=?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>