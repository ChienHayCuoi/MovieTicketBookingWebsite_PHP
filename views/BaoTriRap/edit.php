<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa rạp phim</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Sửa rạp phim</h1>
        <form action="adminWeb.php?action=update&id=<?php echo $rap->getId(); ?>" method="post">
            <div class="form-group">
                <label for="tenRap">Tên rạp:</label>
                <input type="text" id="tenRap" name="tenRap" value="<?php echo $rap->getTenRap(); ?>"
                    class="form-control" required>
            </div>
            <div class="form-group">
                <label for="diaChi">Địa chỉ:</label>
                <input type="text" id="diaChi" name="diaChi" value="<?php echo $rap->getDiaChi(); ?>"
                    class="form-control" required>
            </div>
            <div class="form-group">
                <label for="anh">Ảnh:</label>
                <input type="text" id="anh" name="anh" value="<?php echo $rap->getAnh(); ?>" class="form-control"
                    required>
            </div>
            <div class="form-group">
                <label for="soDienThoai">Số điện thoại:</label>
                <input type="text" id="soDienThoai" name="soDienThoai" value="<?php echo $rap->getSoDienThoai(); ?>"
                    class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
        </form>
        <a href="adminWeb.php?action=index" class="btn btn-secondary btn-block mt-3">Quay lại</a>
    </div>

    <!-- Bootstrap JS và các file script khác -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>