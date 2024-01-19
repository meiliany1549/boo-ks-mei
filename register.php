<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: burlywood;
        }
    </style>
</head>

<body>
    <br><br><br><br><br><br>
    <center>
        <h6>Registrasi Akun Anda</h6>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="exampleInputUsername1" aria-describedby="emailHelp" style="width: 800px;">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Usename</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername1" style="width: 800px;">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputUsername1" style="width: 800px;">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="exampleInputUsername1" style="width: 800px;">
                <div id="emailHelp" class="form-text">Kami tidak akan memberikan email anda pada siapapun</div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary mb-4">Daftar</button>
        </form>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
<?php
    include 'koneksi.php';
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $query = mysqli_query($koneksi, "INSERT INTO pembeli(nama, username, password, email) values ('$nama','$username','$password', '$email')");
        if ($query>0) {
            header("location: login.php");
        }
    }
    ?>