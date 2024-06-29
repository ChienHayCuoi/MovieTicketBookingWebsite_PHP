<?php
    require __DIR__ . '/../models/PhimModel.php';
    function layThongTinPhim(){
        $phims= getAllPhims();
        $_SESSION['phims'] = $phims;
        require __DIR__ . '/../views/XemThongTinPhim/xemListPhim.php';

    }
    function xemChiTietPhim(){
        require __DIR__ . '/../views/XemThongTinPhim/chiTietPhim.php';

    }

?>