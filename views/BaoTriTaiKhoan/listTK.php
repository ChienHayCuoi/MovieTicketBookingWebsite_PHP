<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Danh sách tài khoản</h1>
        <form action="" method="post">
            <div class="row mb-3">
                <div class="col-md-3">
                    <select name="sortID" id="sortID" class="form-control">
                        <option value="tangdan">ID Tăng dần</option>
                        <option value="giamdan">ID Giảm dần</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" id="findName" name="findName" class="form-control"
                        placeholder="Nhập tên tài khoản tìm">
                </div>
                <div class="col-md-3">
                    <input type="text" id="findEmail" name="findEmail" class="form-control"
                        placeholder="Nhập email muốn tìm">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Mã TK</th>
                    <th scope="col">Tên TK</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">SĐT</th>
                    <th scope="col">Email</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $taikhoan): ?>
                <tr>
                    <td><?php echo $taikhoan['MaTK']; ?></td>
                    <td><?php echo $taikhoan['TenTK']; ?></td>
                    <td><?php echo $taikhoan['MatKhau']; ?></td>
                    <td><?php echo $taikhoan['TenNguoiDung']; ?></td>
                    <td><?php echo $taikhoan['NgaySinh']; ?></td>
                    <td><?php echo $taikhoan['DiaChi']; ?></td>
                    <td><?php echo $taikhoan['SDT']; ?></td>
                    <td><?php echo $taikhoan['Email']; ?></td>
                    <td>
                        <a href="adminWeb.php?action=suaTK&id=<?php echo $taikhoan['MaTK']; ?>"
                            class="btn btn-info btn-sm">Sửa</a>
                        <button onclick="confirmDelete(<?php echo $taikhoan['MaTK']; ?>)"
                            class="btn btn-danger btn-sm">Xóa</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="btn btn-success"><a href="adminWeb.php?action=themTK" style="color: white;">Thêm</a></button>
    </div>

    <!-- Bootstrap JS và các file script khác -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa?")) {
            // Nếu người dùng xác nhận, chuyển hướng đến URL xóa
            window.location.href = "controllers/BaoTriTaiKhoanController.php?query=xoa&id=" + id;
        } else {
            // Người dùng đã huỷ bỏ xóa
            // Không cần làm gì
        }
    }
    </script>
</body>

</html>