<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>



<h2 align="center">Bagian Hukum Setda Kota Yogyakarta<br> Data Kehadiran</h2>
<?php
$karyawan = tampilkan_kehadiran();
?>
<div class="container">
<div class="table-responsive">
<table class="table">
  <thead>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Hari, Tanggal</th>
    <th>Jam Datang</th>
    <th>Jam Pulang</th>
    <th>Jam Kerja</th>
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
  <td>
    <?php
    $tanggal = $row['tanggal'];
    echo tanggal_indo ($tanggal, true);
?>
  </td>
  <td>
  <?php
  $jamdatang = $row['jam_datang'];
  echo date("H:i", strtotime($jamdatang));
  ?></td>
  <td>
    <?php
    $jampulang = $row['jam_pulang'];
    echo date("H:i", strtotime($jampulang));
    ?>
  </td>
  <td>
  <?php
        $mulai=$jamdatang; //jam dalam format STRING
        $selesai=$jampulang; //jam dalam format DATE real itme

        $mulai_time=(is_string($mulai)?strtotime($mulai):$mulai);// memaksa mebentuk format time untuk string
        $selesai_time=(is_string($selesai)?strtotime($selesai):$selesai);

        $detik=$selesai_time-$mulai_time; //hitung selisih dalam detik
        $jam=floor($detik/3600); // menghitung banyak jam
        $sisadetik=$detik%3600; //sisa detik
        $menit=floor($sisadetik/60);//menghitung banyak menit.
        echo $jam.":".$menit;
    ?>
  </td>
  <td><a href="edit_kehadiran.php?id=<?= $row['id_kehadiran']; ?>">Edit</a> | <a href="hapus_kehadiran.php?id=<?= $row['id_kehadiran']; ?>">Hapus</a></td>
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
<a href="tambah_kehadiran.php"><button type="button" class="btn btn-info active">Tambah Data</button></a>
<a href="excel.php"><button type="button" class="btn btn-info active">Cetak Excel</button></a>
</div>
</body>
<?php require_once 'view/footer.php'; ?>
