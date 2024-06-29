<?php
// Hiển thị thông tin phim trên giao diện sử dụng Bootstrap
echo '<div class="container">';
echo '<div class="row">';

foreach ($_SESSION['phims'] as $phim) {
    echo '<div class="col-md-4 mb-4">';
    echo '<div class="card h-100">';
    echo '<img style= "width: 100%; height: 300px; object-fit: contain; " src="images/' . $phim['Anh'] . '" class="card-img-top" alt="' . $phim['TenPhim'] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $phim['TenPhim'] . '</h5>';
    echo '<p class="card-text"><strong>Thời lượng:</strong> ' . $phim['ThoiLuong'] . '</p>';
    echo '<a href="index.php?action=xemChiTietPhim&id=' . $phim['MaPhim'] . '" class="btn btn-primary">Chi tiết</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

echo '</div>';
echo '</div>';

?>
<!-- Bootstrap JS và các thư viện khác -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>