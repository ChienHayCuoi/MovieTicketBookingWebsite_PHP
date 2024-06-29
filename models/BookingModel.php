<?php
require_once __DIR__ . '/../config/connect.php';
function getDanhSachPhim() {
    // Kết nối tới cơ sở dữ liệu
    $conn = getDatabaseConnection();

    // Câu lệnh SQL để lấy danh sách phim
    $sql = "SELECT MaPhim, TenPhim, TheLoai, ThoiLuong, KhoiChieu, Anh, MoTa FROM PHIM";
    
    // Thực thi câu lệnh SQL
    $result = $conn->query($sql);

    // Kiểm tra và lấy kết quả
    if ($result->num_rows > 0) {
        $danhSachPhim = [];
        while ($row = $result->fetch_assoc()) {
            $danhSachPhim[] = $row;
        }
    } else {
        $danhSachPhim = null; // Không có phim nào trong cơ sở dữ liệu
    }

    // Đóng kết nối
    $conn->close();

    return $danhSachPhim;
}
function getRaps($maPhim) {
    $conn = getDatabaseConnection();
    $sql = "
        SELECT RAP.MaRap, RAP.TenRap, RAP.DiaChi
        FROM RAP
        JOIN PHONG ON RAP.MaRap = PHONG.MaRap
        JOIN SUATCHIEU ON PHONG.MaPhong = SUATCHIEU.MaPhong
        WHERE SUATCHIEU.MaPhim = ?
    ";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $maPhim);
    $stmt->execute();

    // Fetch the results
    $result = $stmt->get_result();

    // Check if there are results and fetch data
    if ($result->num_rows > 0) {
        $raps = [];
        while ($row = $result->fetch_assoc()) {
            $raps[] = $row;
        }
    } else {
        $raps = null; 
    }

    $stmt->close();
    $conn->close();

    return $raps;
}
    function getShowtimesByMaRapAndMaPhim($maRap,$maPhim) {
        $conn = getDatabaseConnection();
    
        $sql = "SELECT sc.MaSuatChieu, p.TenPhim, sc.NgayChieu, sc.ThoiGianBatDau, ph.TenPhong, r.TenRap, r.DiaChi
        FROM SUATCHIEU sc
        INNER JOIN PHIM p ON sc.MaPhim = p.MaPhim
        INNER JOIN PHONG ph ON sc.MaPhong = ph.MaPhong
        INNER JOIN RAP r ON ph.MaRap = r.MaRap
        WHERE r.MaRap = ? AND sc.MaPhim = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $maRap, $maPhim);   
        $stmt->execute();
        $stmt->bind_result($maSuatChieu, $tenPhim, $ngayChieu, $thoiGianBatDau, $tenPhong, $tenRap, $diaChi);
    
        $showtimes = array();
    
        while ($stmt->fetch()) {
            $showtimes[] = array(
                'MaSuatChieu' => $maSuatChieu,
                'TenPhim' => $tenPhim,
                'NgayChieu' => $ngayChieu,
                'ThoiGianBatDau' => $thoiGianBatDau,
                'TenPhong' => $tenPhong,
                'TenRap' => $tenRap,
                'DiaChi' => $diaChi
            );
        }
    
        $stmt->close();
        return $showtimes;
    }

function getRoomSeats($maSuatChieu) {
    $conn = getDatabaseConnection();
    $sql = "SELECT p.MaPhong, p.TenPhong, p.SoLuongGhe
            FROM PHONG p
            INNER JOIN SUATCHIEU sc ON p.MaPhong = sc.MaPhong
            WHERE sc.MaSuatChieu = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $maSuatChieu);
    $stmt->execute();
    $stmt->bind_result($maPhong, $tenPhong, $soLuongGhe);
    $stmt->fetch();
    $stmt->close();
    return array(
        'MaPhong' => $maPhong,
        'TenPhong' => $tenPhong,
        'SoLuongGhe' => $soLuongGhe
    );
}

    function getSeatsByShowtime($maSuatChieu) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare('SELECT * FROM VEPHIM WHERE MaSuatChieu = ?');
    $stmt->execute([$maSuatChieu]);
    return $stmt;
}
function saveBooking($bookingData) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare('INSERT INTO VEPHIM (MaSuatChieu, MaTK, GiaVe, PTTT, ViTri) VALUES (?, ?, ?, ?, ?)');
    return $stmt->execute([
        $bookingData['maSuatChieu'],
        $bookingData['maTK'],
        $bookingData['giaVe'],
        $bookingData['pttt'],
        $bookingData['viTri']
    ]);

}
function getTicketPrice($maSuatChieu) {
    $conn = getDatabaseConnection();
    
    try {
        $stmt = $conn->prepare('SELECT GiaVe FROM SUATCHIEU WHERE MaSuatChieu = ?');
        $stmt->bind_param('i', $maSuatChieu);
        $stmt->execute();
        $stmt->bind_result($giaVe);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
        
        return $giaVe;
    } catch(Exception $e) {
        echo "Lỗi khi thực hiện truy vấn: " . $e->getMessage();
        return null; 
    }
}
function getSeat($maSuatChieu){
    $conn =getDatabaseConnection();
    $sql = "SELECT ViTri FROM VEPHIM WHERE MaSuatChieu = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $maSuatChieu);
    $stmt->execute();
    $result = $stmt->get_result();

    $bookedSeats = [];
    while ($row = $result->fetch_assoc()) {
        $bookedSeats[] = $row['ViTri'];
    }
    $stmt->close();
    $conn->close();

    return $bookedSeats;
}
?>