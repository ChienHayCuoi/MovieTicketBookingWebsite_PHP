<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm vé phim</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Thêm vé phim mới</h1>

        <!-- Form để thêm vé phim -->
        <form action="adminWeb.php?action=addTicket" method="post">
            <div class="form-group">
                <label for="maSuatChieu">Mã suất chiếu:</label>
                <input type="text" class="form-control" id="maSuatChieu" name="maSuatChieu" required>
            </div>
            <div class="form-group">
                <label for="maTK">Mã tài khoản:</label>
                <input type="text" class="form-control" id="maTK" name="maTK" required>
            </div>
            <div class="form-group">
                <label for="giaVe">Giá vé:</label>
                <input type="text" class="form-control" id="giaVe" name="giaVe" required>
            </div>
            <div class="form-group">
                <label for="pttt">Phương thức thanh toán:</label>
                <input type="text" class="form-control" id="pttt" name="pttt">
            </div>
            <div class="form-group">
                <label for="viTri">Vị trí:</label>
                <input type="text" class="form-control" id="viTri" name="viTri">
            </div>
            <button type="submit" class="btn btn-primary">Thêm vé phim</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>