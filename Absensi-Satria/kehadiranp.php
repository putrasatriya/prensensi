<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>



<h2 align="center">Bagian Hukum Setda Kota Yogyakarta<br> Data Kehadiran</h2>
<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = mysqli_query($koneksi,"SELECT * FROM kehadiran join karyawan on kehadiran.id_karyawan=karyawan.id_karyawan where kehadiran.id_karyawan = $id");   
    $result=mysqli_query($koneksi,"SELECT COUNT(id_karyawan) AS total FROM kehadiran where id_karyawan=$id");   
  }else{
    $data = mysqli_query($koneksi,"SELECT * FROM kehadiran join karyawan on kehadiran.id_karyawan=karyawan.id_karyawan");   
  }

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
    <th>Keterangan</th>
  </tr>
</thead>
<?php
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
<!--   <td>
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
  </td> -->
  <td>
    <?php
    $offtime = date("06:00");
    $ontime = date("07:10");
    $jamdatangp = $d['jam_datang']; 
      if($jamdatangp < $ontime && $jamdatangp > $offtime){
        echo "<p style='color:blue'> Tepat Waktu </p>";
      }else {
        echo "<p style='color:red'> Terlambat ! </p>";
      }
      ?>
  </td>
  </tr>
  </tbody>
</div>
</div>
  <?php } ?>
</table>
<br>
<center>
  Jumlah Kehadiran : 
<?php $data=mysqli_fetch_assoc($result);
echo $data['total']  ?>
  
</center>
<br>
</div>
</div>
<div align="center">
<a href="tambah_kehadiran.php"><button type="button" class="btn btn-info active">Tambah Data</button></a>
<!-- <a href="excel.php"><button type="button" class="btn btn-info active">Cetak Excel</button></a>
</div> -->
</body>
<?php require_once 'view/footer.php'; ?>
