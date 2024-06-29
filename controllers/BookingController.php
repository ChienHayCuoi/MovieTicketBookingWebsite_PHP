<?php

require __DIR__ . '/../models/BookingModel.php';
function selectMovies(){
    $_SESSION['phims'] = getDanhSachPhim();
    require __DIR__ . '/../views/Booking/selectMovie.php';
}
function showCinemas() {
    $maPhim = $_GET['maPhim'];
    $_SESSION['raps'] = getRaps($maPhim); 
    require __DIR__ . '/../views/Booking/SelectCinema.php';
}

function showShowtimes() {
    $maPhim = $_GET['maPhim'];
    $maRap = $_GET['maRap'];
    $_SESSION['showtimes'] = getShowtimesByMaRapAndMaPhim($maRap,$maPhim); 
    require __DIR__ . '/../views/Booking/SelectShowtimes.php';
}
function showSeats() {
    $maSuatChieu = isset($_GET['maSuatChieu']) ? $_GET['maSuatChieu'] : null;
    $roomSeats = getRoomSeats($maSuatChieu);
    $_SESSION['bookedSeats'] = getSeat($maSuatChieu);
    $_SESSION['roomSeats'] = $roomSeats;
    
    require __DIR__ . '/../views/Booking/SelectSeats.php';
}

function showPaymentMethodSelection() {
    $maSuatChieu = $_POST['maSuatChieu'];
    $viTri = $_POST['viTri']; 
    $_SESSION['maSuatChieu'] = $maSuatChieu;
    $_SESSION['viTri'] = $viTri;
    require __DIR__ .  '/../views/Booking/SelectPaymentMethodSelection.php';
}
function bookingTicket(){
    $maPhim = $_POST['maPhim'];
    $maRap =$_POST['maRap'];
    $_SESSION['showtimes'] = getShowtimesByMaRapAndMaPhim($maRap, $maPhim);
    require __DIR__ .  '/../views/Booking/BookingTicket.php';
}

function confirmTicket() {

        $bookingData = [
            'maSuatChieu' => intval($_POST['maSuatChieu']),
            'maTK' => $_POST['MaTK'],
            'giaVe' => getTicketPrice($_POST['maSuatChieu']),
            'pttt' => $_POST['paymentMethod'],
            'viTri' => intval($_POST['viTri'])
        ];

        if (saveBooking($bookingData)) {
        require __DIR__ .  '/../views/Booking/ConfirmTicket.php';
            
        } else {
            echo "Them du lieu that bai";
        }

}

?>