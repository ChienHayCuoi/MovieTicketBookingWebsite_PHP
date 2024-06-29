<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Thông tin vé xem phim</title>
</head>

<body>
    <div class="container">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <h1 class="card-title">Thông tin vé phim</h1>
                <?php if (isset($_SESSION['showtimes']) && !empty($_SESSION['showtimes'])): ?>
                <?php foreach ($_SESSION['showtimes'] as $showtime): ?>
                <?php if ($showtime['MaSuatChieu'] == $_POST['maSuatChieu']): ?>
                <div class="movie-info">
                    <p><strong>Phim:</strong> <?php echo $showtime['TenPhim']; ?></p>
                    <p><strong>Ngày chiếu:</strong> <?php echo $showtime['NgayChieu']; ?></p>
                    <p><strong>Thời gian bắt đầu:</strong> <?php echo $showtime['ThoiGianBatDau']; ?></p>
                    <p><strong>Phòng:</strong> <?php echo $showtime['TenPhong']; ?></p>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                <div class="ticket-info">
                    <p><strong>Vị trí: </strong> <?php echo $_POST['viTri'] ?></p>
                    <p><strong>Phương thức thanh toán: </strong> <?php echo $_POST['paymentMethod'] ?></p>
                </div>
                <?php else: ?>
                <p>Loi.</p>
                <?php endif; ?>
                <form action="index.php?action=confirmTicket" method="post">
                    <input type="hidden" name="MaTK" value="<?php echo $_POST['MaTK']; ?>">
                    <input type="hidden" name="maRap" value="<?php echo $_POST['maRap']; ?>">
                    <input type="hidden" name="maSuatChieu" value="<?php echo $_POST['maSuatChieu']; ?>">
                    <input type="hidden" name="viTri" value="<?php echo $_POST['viTri']; ?>">
                    <input type="hidden" name="paymentMethod" value="<?php echo $_POST['paymentMethod']; ?>">
                    <button type="submit" class="btn btn-primary btn-block">Đặt vé</button>
                </form>
                <p class="back mt-3"><a href="index.php" class="btn btn-secondary">Quay lại trang chủ</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>