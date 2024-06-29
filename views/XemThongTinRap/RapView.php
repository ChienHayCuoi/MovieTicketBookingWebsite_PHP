<?php
class RapView {
    public function hienThiDanhSachRap($raps, $selectedRap = null) {
        echo "<h1>Danh Sách Rạp</h1>";
        echo "<div style='display: flex; flex-wrap: wrap; gap: 10px;'>";
        foreach ($raps as $rap) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; border-radius: 5px;'>";
            echo "<a href='?action=chiTietRap&id=" . $rap->getId() . "'>";
            echo "<img src='images/" . $rap->getAnh() . "' alt='" . $rap->getTenRap() . "' style='width: 100px; height: 100px;'>";
            echo "<p>" . $rap->getTenRap() . "</p>";
            echo "</a>";
            echo "</div>";
        }
        echo "</div>";

        if ($selectedRap) {
            $this->hienThiThongTinRap($selectedRap);
        }
    }

    public function hienThiThongTinRap($rap) {
        echo "<h2>Thông Tin Rạp</h2>";
        echo "<img src='images/" . $rap->getAnh() . "' alt='" . $rap->getTenRap() . "' style='width: 85%; height: 400px;margin-left: 100px'>";
        echo "<p>Rạp: " . $rap->getTenRap() . "</p>";
        echo "<p>Địa chỉ: " . $rap->getDiaChi() . "</p>";
        echo "<p>Số điện thoại: " . $rap->getSoDienThoai() . "</p>";
    }
}
?>