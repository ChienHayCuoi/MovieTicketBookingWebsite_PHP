<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten_tk = trim($_POST["ten_tk"]);
    $mat_khau = trim($_POST["mat_khau"]);
    $xac_thuc_mat_khau = trim($_POST["xac_thuc_mat_khau"]);
    $dia_chi = trim($_POST["dia_chi"]);
    $ngay_sinh = trim($_POST["ngay_sinh"]);
    $email = trim($_POST["email"]);
    $sdt = trim($_POST["sdt"]);
    $ten_nd = trim($_POST["ten_nd"]);

    // Kiểm tra dữ liệu đầu vào
    if (!preg_match("/^[a-zA-Z0-9]+$/", $ten_tk)) {
        echo "<script>alert('Tên tài khoản không hợp lệ.');</script>";
    } elseif ($mat_khau !== $xac_thuc_mat_khau) {
        echo "<script>alert('Mật khẩu xác nhận không khớp.');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Email không hợp lệ.');</script>";
    } elseif (!preg_match("/^[0-9]{10,15}$/", $sdt)) {
        echo "<script>alert('Số điện thoại không hợp lệ.');</script>";
    } else {
        // Kiểm tra tên tài khoản, email và số điện thoại có tồn tại hay không
        $stmt = $conn->prepare("SELECT MaTK FROM taikhoan WHERE TenTK = ? OR Email = ? OR SDT = ?");
        $stmt->bind_param("sss", $ten_tk, $email, $sdt);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "<script>alert('Tên tài khoản, email hoặc số điện thoại đã tồn tại.');</script>";
        } else {
            // Tạo mã tài khoản (MaTK) ngẫu nhiên

            // Thêm người dùng vào cơ sở dữ liệu
            $stmt = $conn->prepare("INSERT INTO taikhoan ( TenTK, MatKhau, DiaChi, NgaySinh, Email, SDT, TenNguoiDung) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $ten_tk, $mat_khau, $dia_chi, $ngay_sinh, $email, $sdt, $ten_nd);
            if ($stmt->execute()) {
                // Hiển thị thông báo và chuyển hướng đến trang đăng nhập
                echo "<script>alert('Đăng ký thành công. Bạn sẽ được chuyển hướng đến trang đăng nhập.'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Lỗi: " . $stmt->error . "');</script>";
            }
            $stmt->close();
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!-- Form đăng ký -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .container fieldset {
            border: none;
        }
        .container legend {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }
        .container label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .container input[type="text"],
        .container input[type="password"],
        .container input[type="email"],
        .container input[type="date"],
        .container input[type="ten_nd"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .container input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: #fff;
            font-size: 1em;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="">
            <fieldset>
                <legend>Đăng ký</legend>
                <label for="ten_tk">Tên tài khoản:</label>
                <input type="text" id="ten_tk" name="ten_tk" required><br>
                
                <label for="mat_khau">Mật khẩu:</label>
                <input type="password" id="mat_khau" name="mat_khau" required><br>
                
                <label for="xac_thuc_mat_khau">Xác thực mật khẩu:</label>
                <input type="password" id="xac_thuc_mat_khau" name="xac_thuc_mat_khau" required><br>
                
                <label for="dia_chi">Địa chỉ:</label>
                <input type="text" id="dia_chi" name="dia_chi"><br>
                
                <label for="ngay_sinh">Ngày sinh:</label>
                <input type="date" id="ngay_sinh" name="ngay_sinh"><br>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Cần điền"><br>
                
                <label for="sdt">Số điện thoại:</label>
                <input type="text" id="sdt" name="sdt" ><br>

                <label for="ten_nd">Tên người dùng</label>
                <input type="text" id="ten_nd" name="ten_nd" placeholder="Chưa cần điền"><br>
                
                <input type="submit" value="Đăng ký">
            </fieldset>
        </form>
        <p>Bạn đã có tài khoản?</p>
        <a href="./login.php">Đăng nhập</a>
    </div>
</body>
</html>
