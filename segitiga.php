<?php
// menyiapkan data array untuk data segitiga
$data_segitiga = [];

// cek data di segitiga.txt  yang ada di dalam dereotori
if (file_exists('./data/segitiga.txt')) {
    // jika ada maka baca file tersebut
    $segitiga = file('./data/segitiga.txt');
    // melakukan konversi dari format data serialize menjadi array
    $data_segitiga = unserialize($segitiga[0]);
}

// FIA isset cek nilai dari form, issets cek apakah ada nilai dari form
// jika di temukan alas melalui metode post maka akan di proses
if (isset($_POST['alas'])) {
    // mengambil nilai dari form
    $alas = $_POST['alas'];
    $tinggi = $_POST['tinggi'];
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $luas = $alas * $tinggi / 2;
    // menambahkan data ke dalam array
    $data_segitiga[] = [
        'alas' => $alas,
        'tinggi' => $tinggi,
        'luas' => $luas,
        'date' => $date,
        'time' => $time
    ];
    // menyimpan data array ke dalam file
    file_put_contents('./data/segitiga.txt', serialize($data_segitiga));
}
// menghapus data
if (isset($_GET['hapus'])) {
    // mengambil nilai dari form
    $id = $_GET['hapus'];
    // menghapus data
    unset($data_segitiga[$id]);
    // menyimpan data array ke dalam file
    file_put_contents('./data/segitiga.txt', serialize($data_segitiga));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JWP Widia Dwi Utari</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="assets/vendors/bootstrap-4.6/css/bootstrap.min.css">
    <!-- CSS Dashboard -->
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <!-- CSS Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Navbar Menu -->
    <header class="container-fluid">
        <div class="row bg-orange">
            <div class="col-md-12">
                <nav class="navbar navbar-info bg-orange">
                    <a href="#" class="navbar-brand text-light">Junior Web Programming</a> 
                </nav>
            </div>
        </div>
    </header>
    <!-- Baris Akhir Navbar Menu -->

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Menu -->
            <div class="col-md-2 border bg-dark">
                <a class="navbar-brand ml-md-3 pt-3 mb-3 text-dark" href="index.php"><i class="fas fa-home"></i> </a>
                
                <ul class="navbar-nav">
                <li class="nav-item active mb-md-4 ml-md-4">
                        <a class="nav-link  text-light" href="index.php"><i class="fas fa-home"></i> Halaman Utama</a>
                    </li>
                    <li class="nav-item active mb-md-4 ml-md-4">
                        <a class="nav-link text-light" href="segitiga.php"><i class="fas fa-eject"></i> Segitiga</a>
                    </li>
                    <li class="nav-item active mb-md-4 ml-md-4">
                        <a class="nav-link text-light" href="persegi.php"><i class="fas fa-square"></i> Persegi</a>
                    </li>
                    <li class="nav-item active mb-md-4 ml-md-4">
                        <a class="nav-link text-light" href="lingkaran.php"><i class="fas fa-circle"></i> Lingkaran</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-secondary" href="index.php?p=transaksi_peminjaman"><i class="fas fa"></i> </a>
                    </li>

                    <li class="nav-item active mb-md-1 ml-md-1">
                        <a class="nav-link text-secondary" href="index.php?p=transaksi_peminjaman"><i class="fas fa"></i> </a>
                    </li>
                    <li class="nav-item active mb-md-1 ml-md-1">
                        <a class="nav-link text-secondary" href="index.php?p=transaksi_peminjaman"><i class="fas fa"></i> </a>
                    </li>
                    <li class="nav-item active mb-md-1 ml-md-1">
                        <a class="nav-link text-secondary" href="index.php?p=transaksi_peminjaman"><i class="fas fa"></i> </a>
                    </li>
                    
                    <li class="nav-item active mb-md-1 ml-md-1">
                        <a class="nav-link text-secondary" href="i#"><i class="fas fa"></i> </a>
                    </li>

                    <li class="nav-item active mb-md-5 ml-md-5">
                        <a class="nav-link text-secondary" href="index.php?p=transaksi_peminjaman"><i class="fas fa"></i> </a>
                    </li>
                </ul>

            </div>
            <!--Baris Akhir Sidebar Menu -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 border border-info">
                <h3 class=" mt-lg-1 pt-lg-3 pr-5 text-center">Menghitung Luas Segitiga</h3>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Mari Menghitung Luas Segitiga</h4>
                            </div>
                            <div class="card-body">
                                <form action="segitiga.php" method="POST">
                                    <div class="form-group">
                                        <label for="alas">Masukkan Nilai Alas</label>
                                        <input type="number" name="alas" id="alas" class="form-control" placeholder="Masukkan Nilai Alas" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tinggi">Masukkan Nilai Tinggi</label>
                                        <input type="number" name="tinggi" id="tinggi" class="form-control" placeholder="Masukkan Nilai Tinggi" required>
                                    </div>
                                    <button type="submit" name="simpan" class="btn btn-primary btn-sm">Hitung</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card-box bg-secondary">
                            <div class="inner">
                                <?php
                                if (isset($_POST['alas']) && isset($_POST['tinggi'])) {
                                    $alas = $_POST['alas'];
                                    $tinggi = $_POST['tinggi'];
                                    $luas = $alas * $tinggi / 2;
                                    echo "<h3><center>$luas</center></h3>";
                                }
                                ?>
                                <p> Hasil Perhitungan Luas Segitiga </p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-eject"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <!-- Footer -->
    <footer class="container-fluid">
        <div class="row shadow bg-dark text-light">
            <div class="col-md-12">
                <div class="col-12 p-3">Junior Web Programming &copy 2022</div>
            </div>
        </div>
    </footer>
    <!-- Baris Akhir Footer  -->

    <!-- Javascript JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Javascript Bootstrap -->
    <script src="assets/vendors/bootstrap-4.6/js/bootstrap.min.js"></script>

</body>

</html>