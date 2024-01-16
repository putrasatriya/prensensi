<?php
require_once 'core/init.php'; 
date_default_timezone_set("Asia/Jakarta");
$time = date("Y-m-d");
$timein = date("H:i");
$timeout = date("15:00");
?>

<link rel="stylesheet" href="view/style.css">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

      <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
      <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </script>

<h2 align="center">Bagian Hukum Setda Kota Yogyakarta<br> Presensi Kehadiran Karyawan</h2>
<?php
$error='';

  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }

if(isset($_POST['submit'])){
  $id_karyawan   = $_POST['id_karyawan'];
  $tanggal       = $_POST['tanggal'];
  $jamdatang     = $_POST['jam_datang'];
  $jampulang     = $_POST['jam_pulang'];

  if(!empty(trim($id_karyawan)) && !empty(trim($tanggal)) && !empty(trim($jamdatang)) && !empty(trim($jampulang))){

    if(tambah_data_kehadiran($id_karyawan, $tanggal, $jamdatang, $jampulang)){
    echo "<script> 
            alert('Absensi Berhasil');
            document.location.href = 'absen.php';
        </script>
    ";
    //header('Location: index.php');
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
  <div class="form-group"><!DOCTYPE html>
  <html>
  <head>
    <title></title>
  </head>
  <body>
  
  </body>
  </html>
    <label for="nama">Nama</label>
    
          <select id="nama" name="id_karyawan" class="form-control" >
          <?php
          $query = "SELECT * FROM karyawan where nama like '%".$_SESSION['username']."%'";
          $data = mysqli_query($koneksi, $query) or die('gagal menampilkan data');
          while($pilih = mysqli_fetch_assoc($data)){
          echo '<option selected value='.$pilih['id_karyawan'].'>'.$pilih['nama'].'</option>';
          }
          ?>
        </select>
    
  </div>

  <div class="form-group">
    <label for="tanggal">Tanggal</label> 
     <input type="date" name="tanggal" id="tanggal" value="<?php echo $time ?>" placeholder="yyyy-mm-dd" class="form-control" readonly> 
  </div>

  <div class="form-group">
    <label for="jam_datang">Jam Datang</label> 
     <input type="text" name="jam_datang" id="jam_datang"  
     value="<?php echo $timein ?>"class="form-control" readonly >
  </div>

  <div class="form-group">
    <label for="jam_pulang">Jam Pulang</label> 
     <input type="text" name="jam_pulang" id="jam_pulang" value="<?php echo $timeout ?>" class="form-control" readonly>
  </div>

  <div>
    <input type="submit" class="btn btn-info active" name="submit" value="Tambah">
    <a href="index.php" class="btn btn-warning">Logout</a> <br/><br/>
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
