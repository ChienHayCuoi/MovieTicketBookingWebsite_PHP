<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách vé phim</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách vé phim</h1>

        <!-- Form tìm kiếm vé phim -->
        <form class="form-inline mb-3" action="adminWeb.php?action=searchTicket" method="post">
            <input class="form-control mr-2" type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </form>


        <!-- Bảng hiển thị danh sách vé phim -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Mã vé</th>
                    <th>Mã suất chiếu</th>
                    <th>Mã tài khoản</th>
                    <th>Giá vé</th>
                    <th>Phương thức thanh toán</th>
                    <th>Vị trí</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['vephims'] as $vephim): ?>
                <tr>
                    <td><?php echo $vephim['MaVe']; ?></td>
                    <td><?php echo $vephim['MaSuatChieu']; ?></td>
                    <td><?php echo $vephim['MaTK']; ?></td>
                    <td><?php echo $vephim['GiaVe']; ?></td>
                    <td><?php echo $vephim['PTTT']; ?></td>
                    <td><?php echo $vephim['ViTri']; ?></td>
                    <td>
                        <!-- Link để chỉnh sửa vé phim -->
                        <a href="adminWeb.php?action=updateTicket&maVe=<?php echo $vephim['MaVe']; ?>"
                            class="btn btn-warning btn-sm">Sửa</a>
                        <!-- Link để xóa vé phim -->
                        <a href="adminWeb.php?action=deleteTicket&maVe=<?php echo $vephim['MaVe']; ?>"
                            class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>