<?php
require_once __DIR__ . '/../config/connect.php';
$conn = getDatabaseConnection();

function getAllVePhim() {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM VEPHIM";
    $result = mysqli_query($conn, $sql);
    $vephimList = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $vephimList[] = $row;
        }
    }
    return $vephimList;
}

function getVePhimById($maVe) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM VEPHIM WHERE MaVe = $maVe";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

function addVePhim($maSuatChieu, $maTK, $giaVe, $pttt, $viTri) {
    $conn = getDatabaseConnection();
    $sql = "INSERT INTO VEPHIM (MaSuatChieu, MaTK, GiaVe, PTTT, ViTri) 
            VALUES ('$maSuatChieu', '$maTK', '$giaVe', '$pttt', '$viTri')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function updateVePhim($maVe, $maSuatChieu, $maTK, $giaVe, $pttt, $viTri) {
    $conn = getDatabaseConnection();
    $sql = "UPDATE VEPHIM 
            SET MaSuatChieu = '$maSuatChieu', MaTK = '$maTK', GiaVe = '$giaVe', PTTT = '$pttt', ViTri = '$viTri'
            WHERE MaVe = $maVe";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function deleteVePhim($maVe) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM VEPHIM WHERE MaVe = $maVe";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function searchVePhim($keyword) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM VEPHIM WHERE MaVe LIKE '%$keyword%' OR MaSuatChieu LIKE '%$keyword%'";
    $result = mysqli_query($conn, $sql);
    $vephimList = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $vephimList[] = $row;
        }
    }
    return $vephimList;
}
?>