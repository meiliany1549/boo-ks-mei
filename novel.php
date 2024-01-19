<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="footer.css">
</head>

<body>
  <h1>BOOK SELF!</h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Book Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Login <script src="https://unpkg.com/feather-icons"></script>

              <body>
                <i data-feather="log-in"></i>
                <script>
                  feather.replace();
                </script>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="tambah_pengguna.php">Profil <script src="https://unpkg.com/feather-icons"></script>

              <body>
                <!-- example icon -->
                <i data-feather="user"></i>

                <script>
                  feather.replace();
                </script>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Home <script src="https://unpkg.com/feather-icons"></script>

              <body>
                <!-- example icon -->
                <i data-feather="home"></i>

                <script>
                  feather.replace();
                </script>
            </a>
          </li>
          <a class="nav-link active" aria-current="page" href="keranjang.php">Shop <script src="https://unpkg.com/feather-icons"></script>

            <body>
              <!-- example icon -->
              <i data-feather="shopping-cart"></i><br>

              <script>
                feather.replace();
              </script>
          </a><br>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
      </div>
    </div>
  </nav>
  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="hujan2.jpg" class="d-block w-100" alt="50">
        <div class="carousel-caption d-none d-md-block">
          <h5>HUJAN🌧</h5>
          <p>OPEN PREORDER</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="review-novel-dilan-dia-adalah-dilanku-tahun-1990-1991-auliarahmahtnaz-cover.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>DILAN🛵</h5>
          <p>OPEN PREORDER</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="p_headline_7-rekomendasi-novel-motivasi-dan-inspir-e8fe50.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>NEGERI 5 MENAR🗼</h5>
          <p>OPEN PREORDER</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
  </div>
  </div>

  <br>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    include "koneksi.php";
    $query = "SELECT * FROM buku";
    $result = mysqli_query($koneksi, $query);
    while ($data = mysqli_fetch_array($result)) { ?>
      <div class="card h-100" style="max-width: 500px;">
        <img src="<?= $data['foto'] ?>">
        <div class="col">
          <h3><?= $data["jdl_buku"]; ?></h3>                                  
          <p><?= $data["deskripsi"]; ?></p>
          <h3>Rp.<?php echo $data["harga"]; ?></h3>
        </div>
        <div class="row mx-3 my-3">
          <div class="col-5">
            <a href="chekout.php?id_buku=<?= $data['id_buku'] ?>">
              <button type="button" class="px-4 btn btn-warning">BUY NOW🛍</button>
            </a>
          </div>
          <div class="col-6">
            <a class="nav-link active" aria-current="page" href="keranjang.php"><i data-feather="shopping-cart"></i></a>

            <body>
          
              <form action="keranjang.php?id=<?= $data['id_buku'] ?>" method="post">
                <input type="hidden" name="hidden_name" value="<?= $data['jdl_buku']; ?>">
                <input type="hidden" name="hidden_price" value="<?= $data['harga']; ?>">
                <input type="number" name="stok" value="1">
                <input type="submit" name="add" value="keranjang" class="btn btn-sm btn-secondary">
              </form>
          </div>
        </div>
      </div>
      

    <?php } ?>
   <!-- Site footer -->
   <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Selfbook.com <i>TENTANG TOKO BUKU KAMI, </i>Di Toko buku ini menyediakan buku yang sangat lengkap,berbagai genre,dan banyak buku untuk semua umur.Disini produk buku unggulan kami adalah fiksi remaja,romance remaja, AYOK CHEK OUT SEKARANG!!!.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/category/android/">BOOKS</a></li>
              <li><a href="http://scanfcode.com/category/templates/">READS</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>CONTACT</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/about/">About Us</a></li>
              <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
              <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <center>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2017 All Rights Reserved by 
         <a href="#">Scanfcode</a>.
            </p>
          </div>
          </center>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>
</body>



</html>