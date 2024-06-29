<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Phim</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Danh Sách Phim</h1>
        <a href="adminWeb.php?action=addPhim" class="btn btn-primary mb-3">Thêm Phim</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Mã Phim</th>
                    <th scope="col">Tên Phim</th>
                    <th scope="col">Thể Loại</th>
                    <th scope="col">Thời Lượng</th>
                    <th scope="col">Khởi Chiếu</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Mô Tả</th>
                    <th scope="col">Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['phims'] as $phim): ?>
                <tr>
                    <td><?= $phim['MaPhim'] ?></td>
                    <td><?= $phim['TenPhim'] ?></td>
                    <td><?= $phim['TheLoai'] ?></td>
                    <td><?= $phim['ThoiLuong'] ?></td>
                    <td><?= $phim['KhoiChieu'] ?></td>
                    <td><img src="images/<?= $phim['Anh'] ?>" alt="<?= $phim['TenPhim'] ?>" class="img-fluid"
                            style="max-width: 100px;"></td>
                    <td><?= $phim['MoTa'] ?></td>
                    <td>
                        <a href="adminWeb.php?action=updatePhim&id=<?= $phim['MaPhim'] ?>"
                            class="btn btn-warning btn-sm">Sửa</a>
                        <a href="adminWeb.php?action=deletePhim&id=<?= $phim['MaPhim'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa phim này?')">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies (if needed) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>