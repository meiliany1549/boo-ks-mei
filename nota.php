<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflre.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link href="script src= https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
  </script>
</head>

<body>

  <?php
  session_start();
  $koneksi = mysqli_connect("localhost", "root", "", "toko_buku");
   $id = $_GET['id'];
   $transaksi = "SELECT * FROM detail
   inner join transaksi on detail.id_transaksi = transaksi.id_transaksi
   where detail.id_transaksi='$id'"; 
   $query = mysqli_query($koneksi, $transaksi);
   $data = mysqli_fetch_array($query);
  var_dump($id); 
  ?>
  <div style="clear: both"></div>
  <h3 class="title2">Nota pembelian</h3>
  <div class="Table-responsive">
    <table class="table table-bordered">
      No. Invoice : INV-<?=$id?> <br>
      tanggal_pembelian: <?=$data['tgl_transaksi']?>
    </table>
  </div>
  <main class="container border p-md-6 p-2">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nama barang</th>
          <th scope="col">Qty</th>

        </tr>
  </main>
  

  <?php
  $produk = "SELECT * FROM detail
inner join buku on detail.id_buku = buku.id_buku
where detail.id_transaksi='$id'";
  $query2 = mysqli_query($koneksi, $produk);
  while ($row = mysqli_fetch_array($query2)) { ?>
    <tr>
      <td><?= $row["jdl_buku"] ?></td>
      <td><?= $row["qty"] ?></td>
    </tr>
  <?php } ?>
  <tr>
    <td>Grand Total</td>
    <td align="right">
      <P>Rp <?php echo number_format($data['total_harga'], 2);?></P>
    </td>
  </tr>
  </table>
  <script>
    window.print();
  </script>
</body>

</html>