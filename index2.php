<?php
//Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

//ambil data dari tabel mahasiswa / query data mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

//cek query dari database true / false
if (!$result) {
  echo mysqli_error($conn);
}

// jika true ambil data (fetch) mahasiswa dari object result
//mengunakan 4 cara berbeda 
//mysqli_fetch_row() //mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan array associative
// mysqli_fetch_array() // mengembalikan keduanya // kekurangan data ditampilkan double numerik dan associative
// mysqli_fetch_object() 

// $mhs = mysqli_fetch_row($result);
// var_dump($mhs[3]);

// $mhs = mysqli_fetch_assoc($result);
// var_dump($mhs["nama"]);

// $mhs = mysqli_fetch_array($result);
// var_dump($mhs['1'] or ['NRP']);

// $mhs = mysqli_fetch_object($result);
// var_dump($mhs->email);

//menampilkan semua data yang ada didatabase array associative
// while ($mhs = mysqli_fetch_assoc($result)) {
//   var_dump($mhs);
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No.</th>
      <th>Aksi</th>
      <th>Gambar</th>
      <th>NRP</th>
      <th>Nama</th>
      <th>Jurusan</th>
    </tr>

    <?php $i = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a href="">ubah</a> |
          <a href="">hapus</a>
        </td>
        <td>
          <img src="img/<?= $row["gambar"] ?> " width="50" height="50">
        </td>
        <td><?= $row["nrp"] ?> </td>
        <td><?= $row["nama"] ?> </td>
        <td><?= $row["jurusan"] ?> </td>
      </tr>
      <?php $i++; ?>
    <?php endwhile; ?>
  </table>


</body>

</html>