<?php 
session_start();
require 'koneksi.php';
require 'belum_login.php';

if (!isset($_SESSION['log'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Produk</title>

    <!-- Bootstrap 4 -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<link href="css/styles.css" rel="stylesheet" />
<!-- css text center -->
<style>
    th {
        vertical-align: middle !important;
        text-align: center !important;
        height: 50px;
    }
</style>


<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand pl-3" href="index.html">Start Bootstrap</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 mr-4" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">MASTER DATA</div>
                        <a class="nav-link" href="produk.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                            Produk
                        </a>
                        <a class="nav-link" href="lokasi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                            Lokasi Gudang
                        </a>
                        <a class="nav-link" href="supplier.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                            Supplier
                        </a>
                        <a class="nav-link" href="pelanggan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Pelanggan
                        </a>
                        <div class="sb-sidenav-menu-heading">TRANSAKSI</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                            Stok Saat Ini
                        </a>
                        <a class="nav-link" href="masuk.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-down"></i></div>
                            Stok Masuk
                        </a>
                        <a class="nav-link" href="keluar.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-up"></i></div>
                            Stok Keluar
                        </a>
                        <a class="nav-link" href="logout.php">LOGOUT</a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    
                    <?php
                        if (isset($_SESSION['email'])) {
                            echo $_SESSION['email'];
                        }
                    ?>

                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Produk</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Produk
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-bordered text-center align-middle">
                                <thead>
                                        <tr>
                                            <th class="text-center align-middle">ID Produk</th>
                                            <th>Kode Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Satuan</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok Minimal</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Tanggal Diperbarui</th>
                                        </tr>
                                </thead>

                                <tbody>

                                <?php
                                    $no = 1;
                                    $ambildata = mysqli_query($koneksi, "select * from produk");
                                    while($data = mysqli_fetch_array($ambildata)){
                                        $kode_produk = $data['kode_produk'];
                                        $nama_produk = $data['nama_produk'];
                                        $deskripsi = $data['deskripsi'];
                                        $satuan = $data['satuan'];
                                        $harga_beli = $data['harga_beli'];
                                        $harga_jual = $data['harga_jual'];
                                        $stok_minimal = $data['stok_minimal'];
                                        $tanggal_dibuat = $data['tanggal_dibuat'];
                                        $tanggal_diperbarui = $data['tanggal_diperbarui'];
                                        
                                        ?>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$kode_produk;?></td>
                                        <td><?=$nama_produk;?></td>
                                        <td><?=$deskripsi;?></td>
                                        <td><?=$satuan;?></td>
                                        <td><?=$harga_beli;?></td>
                                        <td><?=$harga_jual;?></td>
                                        <td><?=$stok_minimal;?></td>
                                        <td><?=$tanggal_dibuat;?></td>
                                        <td><?=$tanggal_diperbarui;?></td>
                                        
                                    </tr>
                                    
                                <?php


                                    };
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">&copy; Stock Control 2025</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <form action="function.php" method="post">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Tambah Produk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
            <label for="kode_produk">Kode Produk</label>
            <input type="text" id="kode_produk" name="kode_produk" class="form-control mb-2" required>

            <label for="nama_produk">Nama Produk</label>
            <input type="text" id="nama_produk" name="nama_produk" class="form-control mb-2">

            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control mb-2" rows="3"></textarea>

            <label for="satuan">Satuan</label>
            <input type="text" id="satuan" name="satuan" class="form-control mb-2">

            <label for="harga_beli">Harga Beli</label>
            <input type="number" id="harga_beli" name="harga_beli" class="form-control mb-2">

            <label for="harga_jual">Harga Jual</label>
            <input type="number" id="harga_jual" name="harga_jual" class="form-control mb-2">

            <label for="stok_minimal">Stok Minimal</label>
            <input type="number" id="stok_minimal" name="stok_minimal" class="form-control mb-2">

            <label for="tanggal_dibuat">Tanggal Dibuat</label>
            <input type="datetime-local" id="tanggal_dibuat" name="tanggal_dibuat" class="form-control mb-2">

            <label for="tanggal_diperbarui">Tanggal Diperbarui</label>
            <input type="datetime-local" id="tanggal_diperbarui" name="tanggal_diperbarui" class="form-control mb-2">

            <button type="submit" name="inputbarang" class="btn btn-primary">Submit</button>
            </div>


          </form>

        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
    <script src="js/datatables-simple-demo.js"></script>
   

</body>
</html>
