<?php
session_start();
include "koneksi.php";
$id_buku = $_GET["id_buku"];
$query = "SELECT * FROM buku where id_buku='$id_buku'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_array($result)
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    body {
      background-color: burlywood;
    }
  </style>
</head>

<body>
  <center>
    <br><br><br><br>
    <h1>CHEK OUT</h1>
    <form action="chekout.php?id_buku=<?php $id_buku ?>" method="POST">
      <label for="nama">Nama Lengkap:</label>
      <input type="text" id="nama" name="nama" required><br><br>

      <label for="alamat">Alamat:</label>
      <textarea id="alamat" name="alamat" required></textarea><br><br>

      <label for="buku">Buku:</label>
      <input type id="buku" name="buku" value="<?php echo $data['jdl_buku']; ?>" required><br><br>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required><br><br>

      <label for="nomor_hp">Nomor HP:</label>
      <input type="tel" id="nomor_hp" name="nomor_hp" required><br><br>

      <label for="metode_pembayaran">Metode Pembayaran:</label>
      <select id="metode_pembayaran" name="metode_pembayaran" required>
        <option value="kartu_kredit">Transfer Bank</option>
        <option value="kartu_kredit">DANA</option>
        <option value="kartu_kredit">OVO</option>
        <option value="kartu_kredit">COD</option>
      </select><br><br>

      <label for="total_pembayaran">Total Pembayaran: </label>
      <input type="text" id="total_pembayaran" name="total" value="<?php echo $data["harga"]; ?>" required><br><br>

      <input type="submit" class="btn btn-warning" name="submit">Buat Pesanan</input>
      <?php
      if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $buku = $_POST['buku'];
        $email = $_POST['email'];
        $nomor_hp = $_POST['nomor_hp'];
        $total = $_POST['total'];

        $sql1 = "insert into transaksi(total_harga) VALUES ($total)";
        $q1  = mysqli_query($koneksi, $sql1);
        $lastId = mysqli_insert_id($koneksi);


        if ($q1) {
          $_SESSION['id_buku'] = $lastId;
          echo "<script>window.location='nota.php?id=$lastid'</script>";
        }
      }
      ?>
  </center>
  </form>
</body>

</html>