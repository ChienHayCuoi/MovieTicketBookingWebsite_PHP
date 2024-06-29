<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm rạp phim</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Thêm rạp phim</h1>
        <form action="adminWeb.php?action=store" method="post">
            <div class="form-group">
                <label for="tenRap">Tên rạp:</label>
                <input type="text" id="tenRap" name="tenRap" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="diaChi">Địa chỉ:</label>
                <input type="text" id="diaChi" name="diaChi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="anh">Ảnh:</label>
                <input type="text" id="anh" name="anh" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="soDienThoai">Số điện thoại:</label>
                <input type="text" id="soDienThoai" name="soDienThoai" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Thêm</button>
        </form>
        <a href="adminWeb.php?action=index" class="btn btn-secondary btn-block mt-3">Quay lại</a>
    </div>

    <!-- Bootstrap JS và các file script khác -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>