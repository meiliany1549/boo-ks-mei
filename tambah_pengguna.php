<?php
include 'koneksi.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == "edit") {
        $result = mysqli_query($koneksi, "SELECT * FROM pembeli WHERE id_pembeli='$_GET[id_pembeli]'");
        while ($data = mysqli_fetch_array($result)) {
            $nama = $data['nama'];
            $username = $data['username'];
            $password = $data['password'];
            $foto = $data['foto'];
        }
    } elseif ($_GET['aksi'] == "hapus") {
        $hapus = mysqli_query($koneksi, "DELETE FROM pembeli WHERE id_pembeli='$_GET[id_pembeli]'");
        if ($hapus) {
            header("Location: tambah_pengguna.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
    body {
      background-color: grey;
    }
  </style>
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <table width="25%" border=0>
            <h2>Input & Edit data</h2>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama" value="<?= @$nama ?>"></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?= @$username ?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="password" value="<?= @$password ?>"></td>
            </tr>
            <tr>
                <td>Foto:</td>
                <td><input type="file" name="foto" value="<?= @$foto ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="tambah"></td>
            </tr>
        </table>

    </form>

    <h1>Data Pengguna</h1>
    <table border=1>
        <thead>
            <td>No.</th>
            <td>Nama Pengguna</td>
            <td>Username</td>
            <td>Password</td>
            <td>Foto</td>
            <td>Aksi</td>
        </thead>

        <tbody>

            <?php
            include 'koneksi.php';
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM pembeli ");
            while ($data = mysqli_fetch_array($query)) {
                $id_pembeli = $data['id_pembeli'];
                echo "<tr>";
                echo "<td>" . $no;
                $no++ . "</td>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['username'] . "</td>";
                echo "<td>" . $data['password'] . "</td>";
                echo "<td><img src= 'img/" . $data['foto'] . "' style='max-width:100px'></td>";

            ?>

                <td><a href="tambah_pengguna.php?aksi=edit&id_pembeli=<?= $data['id_pembeli'] ?>">Edit</a>
                    <a href="tambah_pengguna.php?aksi=hapus&id_pembeli=<?= $data['id_pembeli'] ?>">Hapus</a>
                </td>

            <?php
            } ?>
        </tbody>
    </table>
    <?php
    include 'koneksi.php';
    if (isset($_POST['submit'])) {
        if (isset($_GET['aksi'])) {
            $id_pembeli = $_GET['id_pembeli'];
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            $foto = $_FILES['foto']['name'];
            move_uploaded_file($file_tmp, 'img/' . $foto);
            $edit = mysqli_query($koneksi, "UPDATE pembeli set nama='$nama',username='$username',password='$password', foto='$foto' where id_pembeli='$id_pembeli'");
            if ($edit > 0) {
                header("Location:tambah_pengguna.php");
            }
        } else {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $foto = $_FILES['foto']['name'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            move_uploaded_file($file_tmp, 'img/' . $foto);

            $result = mysqli_query($koneksi, "INSERT INTO pembeli (nama,username,password,foto) VALUES ('$nama','$username','$password','$foto')");
            if ($result > 0) {
                header("Location:tambah_pengguna.php");
            }
        }
    }
    ?>
</body>

</html>