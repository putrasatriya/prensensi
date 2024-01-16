<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>

<h2 align="center">Bagian Hukum Setda Kota Yogyakarta<br> Data Kehadiran</h2>
 
<div class="container">
<form action="nyoba.php" method="get">
  <label>Data Bulan Ke :</label>
  <input type="text" class="form" name="cari">
  <input type="submit" class="btn btn-warning btn-sm" value="Cari">
</form>
 <div>
<?php 
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  echo "<b>Bulan : ".$cari."</b>";
}
?>
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
  </tr>
  </thead>
  <?php 
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysqli_query($koneksi,"SELECT * FROM kehadiran join karyawan on kehadiran.id_karyawan=karyawan.id_karyawan where month(tanggal) like '%".$cari."%'");       
  }else{
    $data = mysqli_query($koneksi,"SELECT * FROM kehadiran join karyawan on kehadiran.id_karyawan=karyawan.id_karyawan");   
  }

  $no = 1;
  while($d = mysqli_fetch_array($data)){
  ?>
  <tbody>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['nama']; ?></td>
      <td>
    <?php
    $tanggal = $d['tanggal'];
    echo tanggal_indo ($tanggal, true);
?>
  </td>
  <td>
  <?php
  $jamdatang = $d['jam_datang'];
  echo date("H:i", strtotime($jamdatang));
  ?></td>
  <td>
    <?php
    $jampulang = $d['jam_pulang'];
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
  </tr>
  </tbody>
</div>
</div>
  <?php } ?>
</table>
</div>
</div>