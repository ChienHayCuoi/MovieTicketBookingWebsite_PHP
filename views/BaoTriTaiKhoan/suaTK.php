<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tài khoản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <form action="controllers/BaoTriTaiKhoanController.php?query=sua&id=<?php echo $id; ?>" method="post">
        <div class="container">
            <h2 class="mt-4 mb-4">Sửa thông tin tài khoản</h2>
            <div class="form-group row">
                <label for="TenTK" class="col-sm-3 col-form-label">Tên tài khoản:</label>
                <div class="col-sm-9">
                    <input type="text" id="TenTK" name="TenTK" value="<?php echo $taikhoan['TenTK']; ?>" readonly
                        class="form-control-plaintext">
                </div>
            </div>
            <div class="form-group row">
                <label for="MatKhau" class="col-sm-3 col-form-label">Mật khẩu:</label>
                <div class="col-sm-9">
                    <input type="password" id="MatKhau" name="MatKhau" value="<?php echo $taikhoan['MatKhau']; ?>"
                        class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="TenNguoiDung" class="col-sm-3 col-form-label">Tên Người dùng:</label>
                <div class="col-sm-9">
                    <input type="text" id="TenNguoiDung" name="TenNguoiDung"
                        value="<?php echo $taikhoan['TenNguoiDung']; ?>" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="NgaySinh" class="col-sm-3 col-form-label">Ngày sinh:</label>
                <div class="col-sm-9">
                    <input type="date" id="NgaySinh" name="NgaySinh" value="<?php echo $taikhoan['NgaySinh']; ?>"
                        class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="DiaChi" class="col-sm-3 col-form-label">Địa chỉ:</label>
                <div class="col-sm-9">
                    <input type="text" id="DiaChi" name="DiaChi" value="<?php echo $taikhoan['DiaChi']; ?>"
                        class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="SDT" class="col-sm-3 col-form-label">Số điện thoại:</label>
                <div class="col-sm-9">
                    <input type="text" id="SDT" name="SDT" value="<?php echo $taikhoan['SDT']; ?>" readonly
                        class="form-control-plaintext">
                </div>
            </div>
            <div class="form-group row">
                <label for="Email" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-9">
                    <input type="email" id="Email" name="Email" value="<?php echo $taikhoan['Email']; ?>" readonly
                        class="form-control-plaintext">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>
    <a href="adminWeb.php" class="btn btn-secondary">Quay lại</a>
</body>

</html>