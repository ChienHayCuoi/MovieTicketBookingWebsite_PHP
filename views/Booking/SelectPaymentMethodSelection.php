<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Chọn Phương thức thanh toán</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <h1 class="card-title">Phương thức thanh toán</h1>

                <form action="index.php?action=bookingTicket" method="POST">
                    <input type="hidden" name="MaTK" value="<?php echo $_POST['MaTK']; ?>">
                    <input type="hidden" name="action" value="processPayment">
                    <input type="hidden" name="maRap" value="<?php echo $_POST['maRap']; ?>">
                    <input type="hidden" name="maSuatChieu" value="<?php echo $_POST['maSuatChieu'];?>">
                    <input type="hidden" name="viTri" value="<?php echo $_POST['viTri'];?>">
                    <input type="hidden" name="maPhim" value="<?php echo $_POST['maPhim'];?>">

                    <div class="form-group">
                        <label for="paymentMethod">Chọn phương thức thanh toán:</label>
                        <select class="form-control" name="paymentMethod" id="paymentMethod" required>
                            <option value="Ví MoMo">Ví MoMo</option>
                            <option value="Tài khoản ngân hàng">Tài khoản ngân hàng</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block  mt-3">Xác nhận thanh toán</button>
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