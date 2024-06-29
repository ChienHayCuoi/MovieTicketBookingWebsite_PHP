<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách rạp phim</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Danh sách rạp phim</h1>
        <a href="adminWeb.php?action=create" class="btn btn-primary mb-4">Thêm rạp phim</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Mã rạp</th>
                    <th scope="col">Tên rạp</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($raps as $rap): ?>
                <tr>
                    <td><?php echo $rap->getId(); ?></td>
                    <td><?php echo $rap->getTenRap(); ?></td>
                    <td><?php echo $rap->getDiaChi(); ?></td>
                    <td><img src="images/<?php echo $rap->getAnh(); ?>" alt="Ảnh rạp phim" class="img-thumbnail"
                            style="max-width: 100px;"></td>
                    <td><?php echo $rap->getSoDienThoai(); ?></td>
                    <td>
                        <a href="adminWeb.php?action=edit&id=<?php echo $rap->getId(); ?>"
                            class="btn btn-warning btn-sm">Sửa</a>
                        <a href="adminWeb.php?action=delete&id=<?php echo $rap->getId(); ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS và các file script khác -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>