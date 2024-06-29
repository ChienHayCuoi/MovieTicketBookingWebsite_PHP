<?php
require_once 'models/RapModel.php';

class BaoTriRapController {
    public function index() {
        $raps = RapModel::getDanhSachRap();
        require 'views/BaoTriRap/list.php';
    }

    public function create() {
        require 'views/BaoTriRap/add.php';
    }

    public function store() {
        $conn = new mysqli('localhost', 'root', '', 'db_xemphim');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO rap (TenRap, DiaChi, Anh, Sdt) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['tenRap'], $_POST['diaChi'], $_POST['anh'], $_POST['soDienThoai']);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header('Location: adminWeb.php?action=listRap');
    }

    public function edit($id) {
        $rap = RapModel::getRapById($id);
        require 'views/BaoTriRap/edit.php';
    }

    public function update($id) {
        $conn = new mysqli('localhost', 'root', '', 'db_xemphim');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("UPDATE rap SET TenRap = ?, DiaChi = ?, Anh = ?, Sdt = ? WHERE MaRap = ?");
        $stmt->bind_param("ssssi", $_POST['tenRap'], $_POST['diaChi'], $_POST['anh'], $_POST['soDienThoai'], $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header('Location: adminWeb.php?action=listRap');
    }

    public function delete($id) {
        $conn = new mysqli('localhost', 'root', '', 'db_xemphim');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("DELETE VP
        FROM VEPHIM VP
        JOIN SUATCHIEU SC ON VP.MaSuatChieu = SC.MaSuatChieu
        JOIN PHONG P ON SC.MaPhong = P.MaPhong
        WHERE P.MaRap = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $stmt = $conn->prepare("DELETE SC
        FROM SUATCHIEU SC
        JOIN PHONG P ON SC.MaPhong = P.MaPhong
        WHERE P.MaRap = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $stmt = $conn->prepare("DELETE FROM phong WHERE MaRap = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $stmt = $conn->prepare("DELETE FROM rap WHERE MaRap = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header('Location: adminWeb.php?action=listRap');
    }
}
?>