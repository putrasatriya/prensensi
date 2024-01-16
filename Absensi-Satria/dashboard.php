<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>



<h2 align="center">Bagian Hukum Setda Kota Yogyakarta<br> Data Karyawan</h2>
<?php
$karyawan = tampilkan_karyawan();
?>
<div class="container">
<div class="table-responsive">
<table class="table">
    <thead>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Jabatan</th>
    <th>No Hp</th>
    <th>Alamat</th>
    <th>Action</th>
  </tr>
</thead>

<?php
  $no=1;
while($row=mysqli_fetch_assoc($karyawan)) { ?>
  <tbody>
  <tr>
  <td><?= $no; ?></td>
  <td><?= $row['nama']; ?></td>
  <td><?= $row['jenis_kelamin']; ?></td>
  <td><?= $row['jabatan']; ?></td>
  <td><?= $row['nohp']; ?></td>
  <td><?= $row['alamat']; ?></td>
  <td><a href="edit_karyawan.php?id=<?= $row['id_karyawan']; ?>">Edit</a> | <a href="hapus_karyawan.php?id=<?= $row['id_karyawan']; ?>">Hapus</a> | <a href="kehadiranp.php?id=<?= $row['id_karyawan']; ?>">Kehadiran</a></td>
  </tr>
  <?php
    $no++;
    }
	?>

</tbody>
</table>
</div>
</div>
<div align="center">
<a href="tambah_karyawan.php"><button type="button" class="btn btn-info active">Tambah Data</button></a>
</div>
</body>
<?php require_once 'view/footer.php'; ?>
