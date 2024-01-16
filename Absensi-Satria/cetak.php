<!DOCTYPE html>
<html>
<head>
     <title>CETAK DATA KEHADIRAN </title>
</head>
<body>

     <center>

          <h2>DATA LAPORAN KEHADIRAN</h2>
          <h4>BAGIAN HUKUM SETDA KOTA YOGYAKARTA</h4>

     </center>

     <?php 
     require_once 'core/init.php'; 
     $karyawan = cetak_kehadiran();
     ?>
<div>
     <table border=1px align="center">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Hari, Tanggal</th>
    <th>Jam Datang</th>
    <th>Jam Pulang</th>
    <th>Jam Kerja</th>
  </tr>
          <?php
  $no=1;
while($row=mysqli_fetch_assoc($karyawan)) { ?>
  <tr>
  <td><?= $no; ?></td>
  <td><?= $row['nama']; ?></td>
  <td>
    <?php
    $tanggal = $row['tanggal'];
    echo tanggal_indo ($tanggal, true);
?>
  </td>
  <td align="center">
  <?php
  $jamdatang = $row['jam_datang'];
  echo date("H:i", strtotime($jamdatang));
  ?></td>
  <td align="center">
    <?php
    $jampulang = $row['jam_pulang'];
    echo date("H:i", strtotime($jampulang));
    ?>
  </td>
  <td align="center">
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
  <?php
    $no++;
    }
     ?>
     </table>
</div>
     <script>
          window.print();
     </script>
     
     <?php
     //header("Content-type: application/vnd-ms-excel");
      //header("Content-Disposition: attachment; filename=Data Pegawai.xls");
     ?>

</body>
</html>