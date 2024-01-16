<?php
require_once 'core/init.php';
require_once 'view/header.php'; ?>

<h2 align="center">Bagian Hukum Setda Kota Yogyakarta<br> Tambah Data Karyawan</h2>
<?php
$error='';

if(isset($_POST['submit'])){
  $nama          = $_POST['nama'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $jabatan       = $_POST['jabatan'];
  $nohp          = $_POST['nohp'];
  $alamat        = $_POST['alamat'];

  if(!empty(trim($nama)) && !empty(trim($jenis_kelamin)) && !empty(trim($jabatan)) && !empty(trim($nohp)) && !empty(trim($alamat))){

    if(tambah_data_karyawan($nama, $jenis_kelamin, $jabatan, $nohp, $alamat)){
      header('Location: dashboard.php');
    } else {
      $error = 'Ada masalah saat menambah data';
    }
  }else{
      $error='Ada data yang masih kosong, wajib di isi semua';
  }
}
 ?>

<div class="container">
<form action="" method="POST" autocomplete="off">
  
    <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" id="nama">
    </div>

  <div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
      <option value="pria">Pria</option>
      <option value="wanita">Wanita</option>
    </select>
  </div>
 
  <div class="form-group">
    <td><label for="jabatan">Jabatan</label> </td>
    <td> <input type="text" class="form-control" name="jabatan" id="jabatan"></td>
  </div>

  <div class="form-group">
    <td><label for="nohp">No Hp</label> </td>
    <td> <input type="text" class="form-control" name="nohp" id="nohp"></td>
  </div>

  <div class="form-group">
    <td><label for="alamat">Alamat</label> </td>
    <td> <input type="text" class="form-control" name="alamat" id="alamat"></td>
  </div>

  <div>
    <input type="submit" class="btn btn-info active" name="submit" value="Tambah">
  </div>
</table>
<div class="error">
  <?= $error; ?>
      </div>
</div>
</form>

</body>
<?php require_once 'view/footer.php'; ?>
