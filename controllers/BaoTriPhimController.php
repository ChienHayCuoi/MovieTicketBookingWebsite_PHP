<?php
require_once 'models/PhimModel.php';
    function listPhim(){
        $phims = getAllPhims();
        $_SESSION['phims'] = $phims;
        require __DIR__ . '/../views/BaoTriPhim/listPhim.php';
        
    }
    function themPhim(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'TenPhim' => $_POST['TenPhim'],
                'TheLoai' => $_POST['TheLoai'],
                'ThoiLuong' => $_POST['ThoiLuong'],
                'KhoiChieu' => $_POST['KhoiChieu'],
                'Anh' => $_POST['Anh'],
                'MoTa' => $_POST['MoTa']
            ];
            addPhim($data);
            header('Location: adminWeb?action=listPhim');
            exit;
        }
        require __DIR__ . '/../views/BaoTriPhim/addPhim.php';
        
    }
    function suaPhim(){
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'TenPhim' => $_POST['TenPhim'],
                'TheLoai' => $_POST['TheLoai'],
                'ThoiLuong' => $_POST['ThoiLuong'],
                'KhoiChieu' => $_POST['KhoiChieu'],
                'Anh' => $_POST['Anh'],
                'MoTa' => $_POST['MoTa']
            ];
            updatePhim($id, $data);
            header('Location: adminWeb.php?action=listPhim');
            exit;

        }
        $phim = getPhimById($id);
        require __DIR__ . '/../views/BaoTriPhim/editPhim.php';
    }
    function xoaPhim(){
        $id = $_GET['id'];
        deletePhim($id);
        header('Location: adminWeb.php?action=listPhim');
    }
?>