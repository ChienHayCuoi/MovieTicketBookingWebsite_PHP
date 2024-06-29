<!DOCTYPE html>
<html>

<head>
    <title>Chọn chỗ ngồi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <h1 class="card-title">Chỗ ngồi</h1>
                <p><strong>Phòng:</strong> <?php echo $_SESSION['roomSeats']['TenPhong']; ?></p>
                <p><strong>Số lượng ghế:</strong> <?php echo $_SESSION['roomSeats']['SoLuongGhe']; ?></p>

                <form action="index.php?action=showPaymentMethodSelection" method="POST">
                    <input type="hidden" name="MaTK" value="<?php echo $_GET['MaTK']; ?>">
                    <input type="hidden" name="action" value="confirmBooking">
                    <input type="hidden" name="maRap" value="<?php echo $_GET['maRap']; ?>">
                    <input type="hidden" name="maSuatChieu" value="<?php echo $_GET['maSuatChieu']; ?>">
                    <input type="hidden" name="maPhim" value="<?php echo $_GET['maPhim'];?>">
                    <div class="form-group">
                        <label for="viTri">Chọn chỗ:</label>
                        <select class="form-control" name="viTri" id="viTri" required>
                            <?php 
                            $bookedSeats = $_SESSION['bookedSeats']; // Mảng chứa các ghế đã được đặt
                            for ($i = 1; $i <= $_SESSION['roomSeats']['SoLuongGhe']; $i++): 
                                if (!in_array($i, $bookedSeats)): // Loại bỏ ghế đã được đặt
                            ?>
                            <option value="<?php echo $i; ?>">Ghế <?php echo $i; ?></option>
                            <?php 
                                endif;
                            endfor; 
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Next</button>
                </form>

                <p class="mt-3"><a href="index.php" class="btn btn-secondary">Quay lại trang chủ</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>