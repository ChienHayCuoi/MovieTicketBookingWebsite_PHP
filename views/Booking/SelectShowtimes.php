<!DOCTYPE html>
<html>

<head>
    <title>Showtimes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <?php if (isset($_SESSION['showtimes']) && !empty($_SESSION['showtimes'])): ?>
                <h1 class="card-title text-center mb-4">Lịch chiếu của
                    <?php echo $_SESSION['showtimes'][0]['TenRap']; ?></h1>
                <p><strong>Tên rạp:</strong> <?php echo $_SESSION['showtimes'][0]['TenRap']; ?></p>
                <p><strong>Địa chỉ:</strong> <?php echo $_SESSION['showtimes'][0]['DiaChi']; ?></p>

                <h2 class="mt-4">Danh sách lịch chiếu</h2>
                <ul class="list-group">
                    <?php foreach ($_SESSION['showtimes'] as $showtime): ?>
                    <li class="list-group-item">
                        <p><strong>Tên Phim:</strong> <?php echo $showtime['TenPhim']; ?></p>
                        <p><strong>Ngày Chiếu:</strong> <?php echo $showtime['NgayChieu']; ?></p>
                        <p><strong>Thời gian bắt đầu:</strong> <?php echo $showtime['ThoiGianBatDau']; ?></p>
                        <p><strong>Phòng:</strong> <?php echo $showtime['TenPhong']; ?></p>
                        <!-- Add link or form to proceed to seat selection for each showtime -->
                        <form action="index.php?action=showSeats" method="GET" class="mt-2">
                            <input type="hidden" name="MaTK" value="<?php echo $_GET['MaTK']; ?>">
                            <input type="hidden" name="maRap" value="<?php echo $_GET['maRap'];?>">
                            <input type="hidden" name="maPhim" value="<?php echo $_GET['maPhim'];?>">
                            <input type="hidden" name="action" value="showSeats">
                            <input type="hidden" name="maSuatChieu" value="<?php echo $showtime['MaSuatChieu']; ?>">
                            <button type="submit" class="btn btn-primary">Chọn chỗ</button>
                        </form>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?>
                <h1 class="card-title text-center mb-4">Không có lịch chiếu</h1>
                <?php endif; ?>
                <p class="mt-4"><a href="index.php" class="btn btn-secondary">Quay lại trang chủ</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>