<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết phim</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* CSS cho trang chi tiết phim */
    .movie-details {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .movie-details img {
        max-width: 100%;
        height: auto;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .btn-back {
        margin-top: 20px;
    }
    </style>
</head>

<body style="background-color: rgb(253, 252, 240);">
    <div class="container" style="max-width: 400px;">
        <div class="movie-details">
            <?php
            // Lấy ID phim từ URL
            if (isset($_GET['id'])) {
                $movieId = $_GET['id'];

                // Lấy thông tin phim từ cơ sở dữ liệu
                $phim = getPhimById($movieId);

                if ($phim) {
                    echo "<h2>{$phim['TenPhim']}</h2>";
                    echo "<img src='images/{$phim['Anh']}' alt='{$phim['TenPhim']}' class='mb-3'>";
                    echo "<p><strong>Thời lượng:</strong> {$phim['ThoiLuong']}</p>";
                    echo "<p><strong>Thể loại:</strong> {$phim['TheLoai']}</p>";
                    echo "<p><strong>Khởi chiếu:</strong> {$phim['KhoiChieu']}</p>";
                    echo "<p><strong>Mô tả:</strong><br> {$phim['MoTa']}</p>";
                } else {
                    echo "<p>Không tìm thấy thông tin phim.</p>";
                }
            } else {
                echo "<p>Không có ID phim được cung cấp.</p>";
            }
            ?>
            <a href="javascript:history.back()" class="btn btn-primary btn-back">Quay lại</a>
            <a class="btn btn-primary btn-back" id="datve" style="margin-left: 170px; background-color: red;">Đặt vé</a>
            <img src="" alt="">
        </div>
    </div>
</body>
<?php echo $_GET['id'];?>
<script>
document.getElementById('datve').addEventListener('click', function(event) {
    <?php if ($_SESSION['doLogin'] == 1) { ?>
    window.location.href =
        "?action=showCinemas&maPhim=<?php echo $_GET['id'] ?>&MaTK=<?php echo $_SESSION['MaTK']; ?>";
    <?php } else { ?>
    alert('Bạn phải đăng nhập để đặt vé.');
    event.preventDefault();
    <?php } ?>
});
</script>

</html>

<!-- Bootstrap JS và các thư viện khác -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>