<?php
require_once __DIR__ . '/../config/connect.php';
// Kết nối tới cơ sở dữ liệu

// Lấy danh sách phim
function getAllPhims() {
    $conn = getDatabaseConnection();
    $query = "SELECT * FROM PHIM";
    $result = $conn->query($query);
    $phims = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $phims[] = $row;
        }
    }
    $conn->close();
    return $phims;
}

// Lấy thông tin phim theo ID
function getPhimById($id) {
    $conn = getDatabaseConnection();
    $query = "SELECT * FROM PHIM WHERE MaPhim = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $phim = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $phim;
}

// Thêm phim mới
function addPhim($data) {
    $conn = getDatabaseConnection();
    $query = "INSERT INTO PHIM (TenPhim, TheLoai, ThoiLuong, KhoiChieu, Anh, MoTa) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssss', $data['TenPhim'], $data['TheLoai'], $data['ThoiLuong'], $data['KhoiChieu'], $data['Anh'], $data['MoTa']);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Cập nhật thông tin phim
function updatePhim($id, $data) {
    $conn = getDatabaseConnection();
    $query = "UPDATE PHIM SET TenPhim = ?, TheLoai = ?, ThoiLuong = ?, KhoiChieu = ?, Anh = ?, MoTa = ? WHERE MaPhim = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssssi', $data['TenPhim'], $data['TheLoai'], $data['ThoiLuong'], $data['KhoiChieu'], $data['Anh'], $data['MoTa'], $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Xóa phim
function deletePhim($id) {
    $conn = getDatabaseConnection();
    // Xóa các suất chiếu có MaPhim = $id từ bảng suatchieu
    $stmt = $conn->prepare("DELETE VP
    FROM VEPHIM VP
    JOIN SUATCHIEU SC ON VP.MaSuatChieu = SC.MaSuatChieu WHERE SC.MaPhim = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $stmt = $conn->prepare("DELETE FROM SUATCHIEU WHERE MaPhim = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $stmt = $conn->prepare("DELETE FROM PHIM WHERE MaPhim = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();


}
?>