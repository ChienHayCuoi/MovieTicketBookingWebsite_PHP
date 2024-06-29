<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tài khoản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <form action="controllers/BaoTriTaiKhoanController.php?query=them" method="post">
            <h2 class="mb-4">Thêm tài khoản</h2>
            <div class="form-group row">
                <label for="TenTK" class="col-sm-3 col-form-label">Tên tài khoản:</label>
                <div class="col-sm-9">
                    <input type="text" id="TenTK" name="TenTK" placeholder="Điền tên tài khoản" class="form-control"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label for="MatKhau" class="col-sm-3 col-form-label">Mật khẩu:</label>
                <div class="col-sm-9">
                    <input type="password" id="MatKhau" name="MatKhau" placeholder="Mật khẩu" class="form-control"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label for="TenNguoiDung" class="col-sm-3 col-form-label">Tên Người dùng:</label>
                <div class="col-sm-9">
                    <input type="text" id="TenNguoiDung" name="TenNguoiDung" placeholder="Tên" class="form-control"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label for="NgaySinh" class="col-sm-3 col-form-label">Ngày sinh:</label>
                <div class="col-sm-9">
                    <input type="date" id="NgaySinh" name="NgaySinh" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="DiaChi" class="col-sm-3 col-form-label">Địa chỉ:</label>
                <div class="col-sm-9">
                    <input type="text" id="DiaChi" name="DiaChi" placeholder="Địa chỉ" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="SDT" class="col-sm-3 col-form-label">Số điện thoại:</label>
                <div class="col-sm-9">
                    <input type="text" id="SDT" name="SDT" placeholder="Số điện thoại" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="Email" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-9">
                    <input type="email" id="Email" name="Email" placeholder="Email" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <a href="./listTK.php" class="btn btn-secondary ml-2">Quay lại</a>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>