<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Chọn phim</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Chọn phim</h1>
                <form action="index.php?action=showCinemas" method="GET">
                    <input type="hidden" name="action" value="showCinemas">
                    <input type="hidden" name="MaTK" value="<?php echo $_GET['MaTK']; ?>">
                    <div class="movies-list">
                        <?php if (isset($_SESSION['phims'])): ?>
                        <?php foreach ($_SESSION['phims'] as $phim): ?>
                        <div class="movie-item form-check">
                            <input class="form-check-input" type="radio" name="maPhim"
                                id="phim-<?php echo $phim['MaPhim']; ?>" value="<?php echo $phim['MaPhim']; ?>"
                                required>
                            <label class="form-check-label" for="phim-<?php echo $phim['MaPhim']; ?>">
                                <?php echo htmlspecialchars($phim['TenPhim'] . ' - ' . $phim['TheLoai']); ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p>Không có phim nào</p>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4">Next</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>