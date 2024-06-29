<?php
session_start();
if (isset($_GET['doLogin'])) {
    $_SESSION['doLogin'] = 1;
    $_SESSION['MaTK'] = $_GET['MaTK'];
} else {
    $_SESSION['doLogin'] = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <!-- Custom CSS -->
    <style>
    /* Body */
    body {
        background-color: #f8f9fa;
        /* Màu nền */
        font-family: Arial, sans-serif;
        color: #343a40;
        /* Màu chữ chính */
    }

    /* Wrapper */
    .wrapper {
        background-color: #343a40;
        /* Màu nền */
        color: white;
        /* Màu chữ */
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .wrapper a {
        color: #007bff;
        /* Màu chữ khi hover */
        text-decoration: none;
    }

    .wrapper a:hover {
        color: #0056b3;
        /* Màu khi hover */
    }

    /* Menu */
    #menu {
        background-color: #343a40;
        /* Màu nền */
        padding: 10px 0;
        display: flex;
        justify-content: center;
    }

    #menu nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    #menu nav ul li {
        margin-right: 10px;
    }

    #menu nav ul li a {
        color: white;
        /* Màu chữ */
        text-decoration: none;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    #menu nav ul li a:hover {
        background-color: #0056b3;
        /* Màu nền khi hover */
        border-radius: 5px;
    }

    /* Content */
    .container {
        background-color: #ffffff;
        /* Màu nền */
        color: #343a40;
        /* Màu chữ */
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .mt-4 {
        margin-top: 20px;
    }

    /* Footer */
    footer {
        background-color: #343a40;
        /* Màu nền */
        color: white;
        /* Màu chữ */
        text-align: center;
        position: fixed;
        padding: 10px 0;
        width: 100%;
        bottom: 0;
    }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="container text-center">
            <p style="font-size: 35px;">
                <a href="#" style="text-decoration: none; color: black;">Quản lý website đặt vé xem phim</a>
            </p>
        </div>
    </div>

    <div id="menu">
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminWeb.php?action=listTK">Bảo trì tài khoản</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminWeb.php?action=listRap">Bảo trì rạp phim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminWeb.php?action=listPhim">Bảo trì phim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="adminWeb.php?action=home">Bảo trì vé phim</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="mt-4">
        <?php
        require_once 'controllers/BaoTriRapController.php';
        require_once __DIR__ . '/controllers/ManageTicketConTroller.php';
        require_once __DIR__ . '/models/ManageTicketModel.php';
        require_once __DIR__ . '/models/PhimModel.php';
        require_once __DIR__ . '/controllers/BaoTriPhimController.php';
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        $controller = new BaoTriRapController();

        switch ($action) {
            case 'home':
                homeManage();
                break;

            case 'addTicket':
                addTicket();
                break;
            case 'updateTicket':
                updateTicket();
                break;
            case 'deleteTicket':
                deleteTicket();                
                break;
            case 'searchTicket':
                searchTicket();
                break; 
            case 'index':
                break;
            case 'listRap':
                $controller->index();
                break;
            case 'create':
                $controller->create();
                break;
            case 'store':
                $controller->store();
                break;
            case 'edit':
                if ($id !== null) {
                    $controller->edit($id);
                } else {
                    echo "Không tìm thấy thông tin rạp phim để sửa";
                }
                break;
            case 'update':
                if ($id !== null) {
                    $controller->update($id);
                } else {
                    echo "Không tìm thấy thông tin rạp phim để cập nhật";
                }
                break;
            case 'delete':
                if ($id !== null) {
                    $controller->delete($id);
                } else {
                    echo "Không tìm thấy thông tin rạp phim để xóa";
                }
                break;
            case 'listTK':
                require_once 'config.php';
                require_once 'models/TaiKhoanModel.php';
                // Khởi tạo đối tượng TaiKhoanModel với kết nối đã được thiết lập từ file config.php
                $TaiKhoanModel = new TaiKhoanModel($connect); 

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['sortID'])) {
                        if ($_POST['sortID'] == "tangdan") {
                            $result = $TaiKhoanModel->sortID($TaiKhoanModel, true);
                        } else {
                            $result = $TaiKhoanModel->sortID($TaiKhoanModel, false);
                        }
                    } else {
                        $result = $TaiKhoanModel->getListTK();
                    }

                    // Tìm kiếm theo tên và email
                    if (isset($_POST['findName']) && !empty($_POST['findName'])) {
                        $name = $_POST['findName'];
                        $result = array_filter($result, function ($item) use ($name) {
                            return stripos($item['TenTK'], $name) !== false;
                        });
                    }

                    if (isset($_POST['findEmail']) && !empty($_POST['findEmail'])) {
                        $email = $_POST['findEmail'];
                        $result = array_filter($result, function ($item) use ($email) {
                            return stripos($item['Email'], $email) !== false;
                        });
                    }
                } else {
                    $result = $TaiKhoanModel->getListTK();
                }
                            require_once __DIR__ .'/views/BaoTriTaiKhoan/listTK.php';  
                        
                break;
            case 'suaTK':
                require_once 'config.php';
                require_once 'models/TaiKhoanModel.php';
                // Khởi tạo đối tượng TaiKhoanModel với kết nối đã được thiết lập từ file config.php
                $TaiKhoanModel = new TaiKhoanModel($connect);
                $id=$_GET['id'];
                $taikhoan=$TaiKhoanModel->getTK($id);
                require_once __DIR__ .'/views/BaoTriTaiKhoan/suaTK.php';  
                
                break;
            case 'themTK':
                require_once __DIR__ .'/views/BaoTriTaiKhoan/themTK.php';  
                break;   
            case 'listPhim':
                listPhim();
                break;
            case 'addPhim':
                themPhim();
                break;
            case 'updatePhim':
                suaPhim();
                break;
            case 'deletePhim':
                xoaPhim();
                break;
            default:
                echo "Không tìm thấy hành động yêu cầu";
                break;
            
        }
        ?>

    </div>

    <footer>
        &copy; 2024 - Trang chủ admin website đặt vé xem phim
        <a href="./index.php">Quay về trang người dùng </a>
    </footer>

    <!-- Bootstrap JS và các file script khác -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn