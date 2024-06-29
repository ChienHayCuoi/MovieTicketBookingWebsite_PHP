<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phim</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Thêm Phim</h1>
        <form action="adminWeb.php?action=addPhim" method="POST">
            <div class="form-group">
                <label for="TenPhim">Tên Phim:</label>
                <input type="text" class="form-control" id="TenPhim" name="TenPhim">
            </div>
            <div class="form-group">
                <label for="TheLoai">Thể Loại:</label>
                <input type="text" class="form-control" id="TheLoai" name="TheLoai">
            </div>
            <div class="form-group">
                <label for="ThoiLuong">Thời Lượng:</label>
                <input type="text" class="form-control" id="ThoiLuong" name="ThoiLuong">
            </div>
            <div class="form-group">
                <label for="KhoiChieu">Khởi Chiếu:</label>
                <input type="time" class="form-control" id="KhoiChieu" name="KhoiChieu">
            </div>
            <div class="form-group">
                <label for="Anh">Ảnh:</label>
                <input type="text" class="form-control" id="Anh" name="Anh">
            </div>
            <div class="form-group">
                <label for="MoTa">Mô Tả:</label>
                <textarea class="form-control" id="MoTa" name="MoTa" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        <a href="PhimListView.php" class="btn btn-secondary mt-3">Trở về danh sách</a>
    </div>

    <!-- Bootstrap JS and dependencies (if needed) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>