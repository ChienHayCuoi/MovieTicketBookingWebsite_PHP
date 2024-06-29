<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa vé phim</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Sửa vé phim</h1>

        <!-- Form để sửa vé phim -->
        <form action="adminWeb.php?action=updateTicket&maVe=<?php echo $vephim['MaVe']; ?>" method="post">
            <div class="form-group">
                <label for="maSuatChieu">Mã suất chiếu:</label>
                <input type="text" class="form-control" id="maSuatChieu" name="maSuatChieu"
                    value="<?php echo $vephim['MaSuatChieu']; ?>" required>
            </div>
            <div class="form-group">
                <label for="maTK">Mã tài khoản:</label>
                <input type="text" class="form-control" id="maTK" name="maTK" value="<?php echo $vephim['MaTK']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="giaVe">Giá vé:</label>
                <input type="text" class="form-control" id="giaVe" name="giaVe" value="<?php echo $vephim['GiaVe']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="pttt">Phương thức thanh toán:</label>
                <input type="text" class="form-control" id="pttt" name="pttt" value="<?php echo $vephim['PTTT']; ?>">
            </div>
            <div class="form-group">
                <label for="viTri">Vị trí:</label>
                <input type="text" class="form-control" id="viTri" name="viTri" value="<?php echo $vephim['ViTri']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>