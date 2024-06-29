<?php
include '../config.php';

function find($conn,$ten_tk){
    $stmt = $conn->prepare("SELECT MaTK FROM taikhoan WHERE TenTK = ?");
    $stmt->bind_param("s", $ten_tk);
    $stmt->execute();
    $ma_tk='';
    $stmt->bind_result($ma_tk);
    $stmt->fetch();
    return $ma_tk;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten_tk = trim($_POST["ten_tk"]);
    $mat_khau = trim($_POST["mat_khau"]);

    // Kiểm tra dữ liệu đầu vào
    if (!preg_match("/^[a-zA-Z0-9]+$/", $ten_tk)) {
        echo "<script>alert('Tên tài khoản không hợp lệ.');</script>";
    } else {
        // Kiểm tra tài khoản và mật khẩu trong cơ sở dữ liệu
        $stmt = $conn->prepare("SELECT MatKhau FROM taikhoan WHERE TenTK = ?");
        if ($stmt) {
            $stmt->bind_param("s", $ten_tk);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($stored_password);
                $stmt->fetch();

                if ($mat_khau === $stored_password) {
                    echo "<script>alert('Đăng nhập thành công.'); window.location.href = '../index.php?MaTK=".find($conn,$ten_tk)."&doLogin=1';</script>";
                } else {
                    echo "<script>alert('Mật khẩu không chính xác.');</script>";
                }
            } else {
                echo "<script>alert('Tên tài khoản không tồn tại.');</script>";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Lỗi khi chuẩn bị truy vấn: " . $conn->error . "');</script>";
        }
    }
}

$conn->close();
?>

<!-- Form đăng nhập -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
    .container input[type="password"] {
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
        background-color: #007bff;
        color: #fff;
        font-size: 1em;
        cursor: pointer;
    }

    .container input[type="submit"]:hover {
        background-color: #0056b3;
    }

    a {
        text-decoration: none;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container">
        <form method="post" action="">
            <fieldset>
                <legend>Đăng nhập</legend>
                <label for="ten_tk">Tên tài khoản:</label>
                <input type="text" id="ten_tk" name="ten_tk" required><br>

                <label for="mat_khau">Mật khẩu:</label>
                <input type="password" id="mat_khau" name="mat_khau" required><br>

                <input type="submit" value="Đăng nhập">

            </fieldset>
        </form>
        <div>
            <a href="../adminWeb.php">Trang Admin</a>
        </div>
        <a href="../index.php">Trang chủ</a>
        <p>Bạn chưa có tài khoản?</p>
        <a href="./register.php">Đăng ký</a>
    </div>
</body>

</html>