<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Chọn rạp</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">Chọn rạp</h1>
                <form action="index.php?action=showShowtimes" method="GET">
                    <input type="hidden" name="action" value="showShowtimes">
                    <input type="hidden" name="maPhim" value="<?php echo $_GET['maPhim']; ?>">
                    <input type="hidden" name="MaTK" value="<?php echo $_GET['MaTK']; ?>">
                    <div class="cinemas-list">
                        <?php if (isset($_SESSION['raps'])): ?>
                        <?php foreach ($_SESSION['raps'] as $rap): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="maRap"
                                id="rap-<?php echo $rap['MaRap']; ?>" value="<?php echo $rap['MaRap']; ?>" required>
                            <label class="form-check-label" for="rap-<?php echo $rap['MaRap']; ?>">
                                <?php echo htmlspecialchars($rap['TenRap'] . ' - ' . $rap['DiaChi']); ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p>Phim không có rạp nào chiếu</p>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Next</button>
                </form>
                <p class="mt-4"><a href="index.php" class="btn btn-secondary">Quay lại trang chủ</a></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>