<?php
require_once 'models/BookingModel.php';
function homeManage(){
    $_SESSION['vephims'] = getAllVePhim();
    require __DIR__ . '/../views/ManageTicket/HomeManage.php';

    }
function addTicket(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $maSuatChieu = $_POST['maSuatChieu'];
        $maTK = $_POST['maTK'];
        $giaVe = $_POST['giaVe'];
        $pttt = $_POST['pttt'];
        $viTri = $_POST['viTri'];

        addVePhim($maSuatChieu, $maTK, $giaVe, $pttt, $viTri);
        header('Location: adminWeb.php?action=home');
        exit;
        
    }
    require __DIR__ . '/../views/ManageTicket/AddTicket.php';

}
function updateTicket(){
    $maVe = $_GET['maVe'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $maSuatChieu = $_POST['maSuatChieu'];
        $maTK = $_POST['maTK'];
        $giaVe = $_POST['giaVe'];
        $pttt = $_POST['pttt'];
        $viTri = $_POST['viTri'];

        updateVePhim($maVe, $maSuatChieu, $maTK, $giaVe, $pttt, $viTri);
        header('Location: adminWeb.php?action=home');
            exit;
        }

    $vephim = getVePhimById($maVe);
    require __DIR__ . '/../views/ManageTicket/UpdateTicket.php';

}
function deleteTicket(){
    $maVe = $_GET['maVe'];
    deleteVePhim($maVe);
    header('Location: adminWeb.php?action=home');
    exit;
    
}
function searchTicket(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $keyword = $_POST['keyword'];
        $_SESSION['vephims'] = searchVePhim($keyword);
    } else {
        $_SESSION['vephims'] = getAllVePhim();
    }
    require __DIR__ . '/../views/ManageTicket/HomeManage.php';
    
}
?>