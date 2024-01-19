<?php
    include 'koneksi.php';
    session_start();
    if(isset($_POST['submit'])) {
        $nama_penjual = $_POST['nama_penjual'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $query = mysqli_query($koneksi, "SELECT * FROM penjual where nama_penjual='$nama_penjual' and username='$username' and password='$password' and email='$email'");
        if($username!="" && $password!=""){
            if($data = mysqli_fetch_array($query)){
                $_SESSION['username']=$data['username'];
                $_SESSION['password']=$data['password'];
            }
        }
        if(mysqli_num_rows($query)>0){
            header("location: tambah_pengguna.php");
        }else{
            header("Location: loginadmn.php");
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
      background-color: grey;
    }
  </style>
</head>

<body>
    <br><br><br><br><br><br>
    <center>
        <h6>LOGIN ADMIN</h6>
        <form action="loginadmn.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Nama</label>
                <input type="text" name="nama_penjual" class="form-control" id="exampleInputUsername1" aria-describedby="emailHelp" style="width: 800px;">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername1" style="width: 800px;">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">email</label>
                <input type="text" name="email" class="form-control" id="exampleInputUsername1" style="width: 800px;">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputUsername1" style="width: 800px;">
            </div>

            <button type="submit" name="submit" class="btn btn-primary mb-4">LOGIN</button>
        </form>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   
</body>

</html>