<?php
session_start();
$_SESSION['doLogin'] = isset($_SESSION['doLogin']) ? $_SESSION['doLogin'] : 0;
$_SESSION['MaTK'] = isset($_SESSION['MaTK']) ? $_SESSION['MaTK'] : null;
// Kiểm tra nếu người dùng đã đăng nhập thành công
if (isset($_GET['doLogin'])) {
    // Lưu trạng thái đăng nhập và mã tài khoản vào Session
    $_SESSION['doLogin'] = 1;
    $_SESSION['MaTK'] = $_GET['MaTK'];
} 
if (isset($_GET['doLogout'])) {
    session_destroy(); // Xóa hết các session
    $_SESSION['doLogin'] = 0;
    header('Location: index.php'); // Chuyển hướng về trang chủ hoặc trang đăng nhập
    exit;
}
// Nếu đã đăng nhập và Session tồn tại, kiểm tra và gán lại các biến Session nếu cần
if ($_SESSION['doLogin'] == 1 && isset($_SESSION['MaTK'])) {
    // Gán lại các giá trị từ Session để đảm bảo trạng thái đăng nhập
    $_SESSION['doLogin'] = 1;
    $_SESSION['MaTK'] = $_SESSION['MaTK'];
} else {
    // Nếu không có session, đặt trạng thái đăng nhập về 0
    $_SESSION['doLogin'] = 0;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="header_nav.css">
    <title>Trang chủ</title>
</head>

<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="h3">Website đặt vé xem phim</p>
            <div id="dk_dk">
                <?php
                if ($_SESSION['doLogin'] == 1) {
                    echo '<a style="margin-right: 10px;"  href="?action=xemTK&id=' . $_SESSION['MaTK'] . '" class="btn btn-info">Xem thông tin</a>';
                    echo '<a href="index.php?doLogout" class="btn btn-info">Đăng xuất</a>';

                } else {
                    echo '<a href="./views/login.php" class="btn btn-primary mr-2 btn-s">Đăng nhập</a>';
                    echo '<a href="./views/register.php" class="btn btn-success">Đăng kí</a>';
                }
                ?>
            </div>
        </div>
    </div>

    <div id="menu" class="bg-light py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="?action=xemListPhim">Phim</a></li>
                        <li class="nav-item"><a class="nav-link" href="?action=listRap">Rạp phim</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Ưu đãi</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="datve-link">Đặt vé</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm phim, rạp"
                            aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>

    <div class="container mt-4">
        <?php
        require_once __DIR__ . '/controllers/RapController.php';
        require_once __DIR__ . '/views/XemThongTinRap/RapView.php';
        require_once __DIR__ . '/controllers/BookingController.php';
        require_once __DIR__ . '/models/BookingModel.php';
        require_once __DIR__ . '/controllers/XemThongTinPhimConTroller.php';
        require_once __DIR__ . '/models/PhimModel.php';
                
        // Xử lý yêu cầu từ người dùng
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        $view = new RapView();
        $controller = new RapController($view);

        switch ($action) {
            case 'selectMovies':
                selectMovies();
                break;

            case 'showCinemas':
                showCinemas();
                break;
            case 'showShowtimes':
                showShowtimes();
                break;
            case 'showSeats':
                showSeats();
                break;
            case 'showPaymentMethodSelection':
                showPaymentMethodSelection();
                break;
            case 'bookingTicket':
                bookingTicket();
                break;
            case 'confirmTicket':
                confirmTicket();
                break;
            case 'listRap':
                $controller->danhSachRap($id);
                break;
            case 'xemTK':
                require_once 'config.php';
                require_once 'models/TaiKhoanModel.php';
                $TaiKhoanModel = new TaiKhoanModel($connect);
                $id = $_GET['id'];
                $taikhoan = $TaiKhoanModel->getTK($id);
                require_once __DIR__ .'/views/XemThongTin/XemTK.php';   
                break;
            case 'chiTietRap':
                if ($id !== null) {
                    $controller->chiTietRap($id);
                } else {
                    echo "Không tìm thấy thông tin rạp phim";
                }
                break;
            case 'xemListPhim':
                layThongTinPhim();
                break;
            case 'xemChiTietPhim':
                xemChiTietPhim();
                break;

            default:
                break;
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.getElementById('datve-link').addEventListener('click', function(event) {
        <?php if ($_SESSION['doLogin'] == 1) { ?>
        window.location.href = "?action=selectMovies&MaTK=<?php echo $_SESSION['MaTK']; ?>";
        <?php } else { ?>
        alert('Bạn phải đăng nhập để đặt vé.');
        event.preventDefault();
        <?php } ?>
    });
    </script>
</body>

</html>