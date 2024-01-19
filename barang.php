<?php
include 'koneksi.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == "edit") {
        $result = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$_GET[id_buku]'");
        while ($data = mysqli_fetch_array($result)) {
            $id = $data['id_buku'];
            $kd = $data['kd_buku'];
            $harga = $data['harga'];
            $penulis = $data['penulis'];
            $jns = $data['jns_buku'];
            $jdl = $data['jdl_buku'];
            $stok = $data['stok'];
            $penerbit = $data['penerbit'];
            $foto = $data['foto'];
        }
    } elseif ($_GET['aksi'] == "hapus") {
        $hapus = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$_GET[id_buku]'");
        if ($hapus) {
            header("Location: barang.php");
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
                <td>id buku:</td>
                <td><input type="text" name="id_buku" value="<?= @$id ?>"></td>
            </tr>
            <tr>
                <td>kode buku:</td>
                <td><input type="text" name="kd_buku" value="<?= @$kd ?>"></td>
            </tr>
            <tr>
                <td>harga:</td>
                <td><input type="text" name="harga" value="<?= @$harga ?>"></td>
            </tr>
            <tr>
                <td>penulis:</td>
                <td><input type="text" name="penulis" value="<?= @$penulis ?>"></td>
            </tr>
            <tr>
                <td>jenis buku:</td>
                <td><input type="text" name="jns_buku" value="<?= @$jns ?>"></td>
            </tr>
            <tr>
                <td>judul buku:</td>
                <td><input type="text" name="jdl_buku" value="<?= @$jdl ?>"></td>
            </tr>
            <tr>
                <td>stok:</td>
                <td><input type="text" name="stok" value="<?= @$stok ?>"></td>
            </tr>
            <tr>
                <td>penerbit:</td>
                <td><input type="text" name="penerbit" value="<?= @$penerbit ?>"></td>
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

    <h1>Data Buku</h1>
    <table border=1>
        <thead>
            <td>No.</th>
            <td>Id Buku</td>
            <td>Kode Buku</td>
            <td>Harga</td>
            <td>Penulis</td>
            <td>Jenis Buku</td>
            <td>Judul Buku</td>
            <td>Stok</td>
            <td>Penerbit</td>
            <td>Foto</td>
        </thead>

        <tbody>

            <?php
            include 'koneksi.php';
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM buku ");
            while ($data = mysqli_fetch_array($query)) {
                $id_pembeli = $data['id_buku'];
                echo "<tr>";
                echo "<td>" . $no;
                $no++ . "</td>";
                echo "<td>" . $data['id_buku'] . "</td>";
                echo "<td>" . $data['kd_buku'] . "</td>";
                echo "<td>" . $data['harga'] . "</td>";
                echo "<td>" . $data['penulis'] . "</td>";
                echo "<td>" . $data['jns_buku'] . "</td>";
                echo "<td>" . $data['jdl_buku'] . "</td>";
                echo "<td>" . $data['stok'] . "</td>";
                echo "<td>" . $data['penerbit'] . "</td>";
                echo "<td><img src= 'img/" . $data['foto'] . "' style='max-width:100px'></td>";

            ?>

                <td><a href="barang.php?aksi=edit&id_buku=<?= $data['id_buku'] ?>">Edit</a>
                    <a href="barang.php?aksi=hapus&id_buku=<?= $data['id_buku'] ?>">Hapus</a>
                </td>

            <?php
            } ?>
        </tbody>
    </table>
    <?php
    include 'koneksi.php';
    if (isset($_POST['submit'])) {
        if (isset($_GET['aksi'])) {
            $id = $_GET['id_buku'];
            $kd = $_POST['kd_buku'];
            $harga = $_POST['harga'];
            $penulis = $_POST['penulis'];
            $jns = $_POST['jns_buku'];
            $jdl = $_POST['jdl_buku'];
            $stok = $_POST['stok'];
            $penerbit = $_POST['penerbit'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            $foto = $_FILES['foto']['name'];
            move_uploaded_file($file_tmp, 'img/' . $foto);
            $edit = mysqli_query($koneksi, "UPDATE buku set id_buku='$id',kd_buku='$kd',harga='$harga', penulis='$penulis', jns_buku='$jns',jdl_buku='$jdl', stok='$stok',penerbit='$penerbit', foto='$foto' where id_buku='$id'");
            if ($edit > 0) {
                echo '<script>document.location.href="barang.php"</script>';
            }
        } else {
            $id = $_GET['id_buku'];
            $kd = $_POST['kd_buku'];
            $harga = $_POST['harga'];
            $penulis = $_POST['penulis'];
            $jns = $_POST['jns_buku'];
            $jdl = $_POST['jdl_buku'];
            $stok = $_POST['stok'];
            $penerbit = $_POST['penerbit'];
            $file_tmp = $_FILES['foto']['tmp_name'];
            $foto = $_FILES['foto']['name'];
            move_uploaded_file($file_tmp, 'img/' . $foto);

            $result = mysqli_query($koneksi, "INSERT INTO buku (id_buku,kd_buku,harga,penulis,jns_buku,jdl_buku,stok,penerbit,foto) VALUES ('$id','$kd','$harga','$penulis','$jns','$jdl','$stok','$penerbit','$foto')");
            if ($result > 0) {
                echo '<script>document.location.href="barang.php"</script>';
            }
        }
    }
    ?>
</body>

</html>