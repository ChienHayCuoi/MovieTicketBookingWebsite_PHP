<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Phim</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Sửa Phim</h1>
        <form action="adminWeb.php?action=updatePhim&id=<?= $phim['MaPhim'] ?>" method="POST">
            <div class="form-group">
                <label for="TenPhim">Tên Phim:</label>
                <input type="text" class="form-control" id="TenPhim" name="TenPhim" value="<?= $phim['TenPhim'] ?>">
            </div>
            <div class="form-group">
                <label for="TheLoai">Thể Loại:</label>
                <input type="text" class="form-control" id="TheLoai" name="TheLoai" value="<?= $phim['TheLoai'] ?>">
            </div>
            <div class="form-group">
                <label for="ThoiLuong">Thời Lượng:</label>
                <input type="text" class="form-control" id="ThoiLuong" name="ThoiLuong"
                    value="<?= $phim['ThoiLuong'] ?>">
            </div>
            <div class="form-group">
                <label for="KhoiChieu">Khởi Chiếu:</label>
                <input type="time" class="form-control" id="KhoiChieu" name="KhoiChieu"
                    value="<?= $phim['KhoiChieu'] ?>">
            </div>
            <div class="form-group">
                <label for="Anh">Ảnh:</label>
                <input type="text" class="form-control" id="Anh" name="Anh" value="<?= $phim['Anh'] ?>">
            </div>
            <div class="form-group">
                <label for="MoTa">Mô Tả:</label>
                <textarea class="form-control" id="MoTa" name="MoTa" rows="5"><?= $phim['MoTa'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
        <a href="adminWeb.php?action=listPhim" class="btn btn-secondary mt-3">Trở về danh sách</a>
    </div>

    <!-- Bootstrap JS and dependencies (if needed) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>