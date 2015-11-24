<style type="text/css">
  .title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 0px;
  text-align: center;
}
.stat {
  font-size: 14px;
    padding-bottom: 20px;
    
    text-align: center;
}
.sub-title {
  font-size: 18px;
  font-weight: bold;
  text-align: center;
  margin-top: 50px;
}
.sub-stat {
  text-align: center;
  margin-bottom: 40px;
  font-size: 14px;
  font-weight: 100;
}
td {
  padding-bottom: 10px;
}

</style>
<?php
date_default_timezone_set('Asia/Jakarta');

//Array Hari
$array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
$hari = $array_hari[date("N")];
//Format Tanggal
$tanggal = date ("j");
//Array Bulan
$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bulan = $array_bulan[date("n")];
//Format Tahun
$tahun = date("Y");

echo '
<div class="title">SEMINAR KAMPUS</div>
          <div class="stat">Jl. Kemana Saja Hatiku Senang - Bandung</div>
          <hr size="2">
          <div class="sub-title">LAPORAN DATA MAHASISWA</div>
          <div class="sub-stat">TAHUN 2015/2016</div>
          <br>
          Tanggal Dicetak : '.$hari . ", ".$tanggal." ".$bulan." ".$tahun.'
          <br>
          Pukul : '.date("h:i:sa").'
          <br>
          Oleh : Zamzam Nurzaman S.Kom, M.T
          
            <br>
'
?>
<br>
<br>
<table border="1">
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Jurusan</th>
          <th>Telp/HP</th>
          <th>E-Mail</th>
        </tr>
      </thead>
      <tbody border="1">
<?php
	include "../../main/connection.php";
	$tampil_mahasiswa = mysql_query("SELECT * FROM mahasiswa ORDER BY nim");        
    $no=1;
    while ($tampil=mysql_fetch_array($tampil_mahasiswa)){
       echo "<tr><td>$no</td>
             <td class='tab-col'>$tampil[nim]</td>
             <td>$tampil[nama]</td>
             <td>$tampil[jurusan]</td>
             <td>$tampil[telepon]</td>
             <td>$tampil[email]</td>
            </tr>
             ";
        $no++;
    }
  echo "
        </tbody>
        </table>
        </div>";
?>