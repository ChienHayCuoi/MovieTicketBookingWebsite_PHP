<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tài khoản</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
    // Hàm kiểm tra thay đổi và yêu cầu nhập mật khẩu cũ
    function checkChanges() {
        // Lấy giá trị hiện tại của các trường input
        var currentTenTK = document.getElementById("TenTK").value;
        var currentMatKhau = document.getElementById("MatKhau").value;
        var currentTenNguoiDung = document.getElementById("TenNguoiDung").value;
        var currentNgaySinh = document.getElementById("NgaySinh").value;
        var currentDiaChi = document.getElementById("DiaChi").value;
        var currentSDT = document.getElementById("SDT").value;
        var currentEmail = document.getElementById("Email").value;

        // Nếu có bất kỳ thay đổi nào
        // Nếu có bất kỳ thay đổi nào
        if (currentTenTK !== "<?php echo $taikhoan['TenTK']; ?>" ||
            currentMatKhau !== "<?php echo $taikhoan['MatKhau']; ?>" ||
            currentTenNguoiDung !== "<?php echo $taikhoan['TenNguoiDung']; ?>" ||
            currentNgaySinh !== "<?php echo $taikhoan['NgaySinh']; ?>" ||
            currentDiaChi !== "<?php echo $taikhoan['DiaChi']; ?>" ||
            currentSDT !== "<?php echo $taikhoan['SDT']; ?>" ||
            currentEmail !== "<?php echo $taikhoan['Email']; ?>") {

            // Hiển thị yêu cầu nhập mật khẩu cũ
            var oldPassword = prompt("Nhập mật khẩu cũ để tiếp tục lưu thay đổi:");

            // Kiểm tra xem người dùng đã nhập mật khẩu cũ hay chưa
            if (oldPassword === null || oldPassword === "") {
                // Nếu không nhập mật khẩu cũ, không lưu thay đổi
                alert("Bạn cần nhập mật khẩu cũ để lưu thay đổi.");
                return false; // Ngăn không cho form submit
            } else {
                // Nếu đã nhập mật khẩu cũ, cho phép form submit
                return true;
            }
        }

        // Nếu không có thay đổi, cho phép form submit
        return true;
    }
    </script>
</head>

<body style="background-color: rgb(253, 252, 240);">



    <div class="container mt-4">
        <form action="controllers/XemThongTinTKController.php?id=<?php echo $id; ?>" method="post"
            onsubmit="return checkChanges();">
            <h2 class="mb-4">Xem thông tin tài khoản</h2>
            <div class="form-group row">
                <label for="TenTK" class="col-sm-3 col-form-label">Tên tài khoản:</label>
                <div class="col-sm-9">
                    <input type="text" id="TenTK" name="TenTK" value="<?php echo $taikhoan['TenTK']; ?>" readonly
                        class="form-control readonly-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="MatKhau" class="col-sm-3 col-form-label">Mật khẩu mới:</label>
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
                        class="form-control readonly-input">
                </div>
            </div>
            <div class="form-group row">
                <label for="Email" class="col-sm-3 col-form-label">Email:</label>
                <div class="col-sm-9">
                    <input type="email" id="Email" name="Email" value="<?php echo $taikhoan['Email']; ?>" readonly
                        class="form-control readonly-input">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>