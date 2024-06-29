<?php
require __DIR__ . '/../models/RapModel.php';
require __DIR__ . '/../views/XemThongTinRap/RapView.php';

class RapController {
    private $view;

    public function __construct($view) {
        $this->view = $view;
    }

    public function danhSachRap($id = null) {
        $rap = RapModel::getDanhSachRap();
        $selectedRap = null;

        if ($id) {
            $selectedRap = RapModel::getRapById($id);
        }

        $this->view->hienThiDanhSachRap($rap, $selectedRap);
    }
    public function chiTietRap($id) {
        // Lấy thông tin chi tiết của rạp từ model
        $rap = RapModel::getRapById($id);

        // Hiển thị thông tin chi tiết của rạp
        $this->view->hienThiThongTinRap($rap);
    }
}
?>