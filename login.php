<?php
    include 'koneksi.php';

    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($koneksi, "SELECT * FROM pembeli where nama='$nama' and username='$username' and password='$password'");
        if(mysqli_num_rows($query)){
            header("location: novel.php");
        }else{
            header("Location: login.php");
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <h6>LOGIN</h6>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" aria-describedby="emailHelp" style="width: 800px;">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" style="width: 800px;">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" style="width: 800px;">
            </div>

            <button type="submit" name="submit" class="btn btn-primary mb-4">LOGIN</button>
        </form>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   
</body>

</html>