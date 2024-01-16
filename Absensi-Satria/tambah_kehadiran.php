<?php
require_once 'core/init.php';
require_once 'view/header.php'; 
?>


<h2 align="center">Bagian Hukum Setda Kota Yogyakarta<br> Tambah Data Kehadiran Karyawan</h2>
<?php
$error='';

if(isset($_POST['submit'])){
  $id_karyawan   = $_POST['id_karyawan'];
  $tanggal       = $_POST['tanggal'];
  $jamdatang     = $_POST['jam_datang'];
  $jampulang     = $_POST['jam_pulang'];

  if(!empty(trim($id_karyawan)) && !empty(trim($tanggal)) && !empty(trim($jamdatang)) && !empty(trim($jampulang))){

    if(tambah_data_kehadiran($id_karyawan, $tanggal, $jamdatang, $jampulang)){
      header('Location: kehadiran.php');
    } else {
      $error = 'Ada masalah saat menambah data';
    }
  }else{
     $error='Ada data yang masih kosong, wajib di isi semua';
  }
}
 ?>
<div class="container">
<form action="" method="POST">
  <div class="form-group">
    <label for="nama">Nama</label>
    
      <select id="nama" name="id_karyawan" class="form-control" >
				<option value="">--- Pilih Karyawan ---</option>
					<?php
					$karyawan = tampilkan_karyawan();
					while($pilih = mysqli_fetch_assoc($karyawan)){
					echo '<option value='.$pilih['id_karyawan'].'>'.$pilih['nama'].'</option>';

					}
					?>
				</select>
    
  </div>

  <div class="form-group">
    <label for="tanggal">Tanggal</label> 
     <input type="date" name="tanggal" id="tanggal" value="" placeholder="yyyy-mm-dd" class="form-control" > 
  </div>

  <div class="form-group">
    <label for="jam_datang">Jam Datang</label> 
     <input type="time" name="jam_datang" id="jam_datang" placeholder="HH:ii (Format 24 Jam)"
      class="form-control" >
  </div>

  <div class="form-group">
    <label for="jam_pulang">Jam Pulang</label> 
     <input type="time" name="jam_pulang" id="jam_pulang" placeholder="HH:ii (Format24 Jam)" class="form-control" >
  </div>

  <div>
    <input type="submit" class="btn btn-info active" name="submit" value="Tambah">
  </div>
</table>
<div class="error">
  <?= $error; ?>
</div>
</form>
</div>
<script>
               
</body>
<?php require_once 'view/footer.php'; ?>
