<?php
include "connection.php";
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST['username']);
$pass     = anti_injection(md5($_POST['password']));

if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "<link href=css/style.css rel=stylesheet type=text/css>";
  echo "<div class='error msg'>Injeksi Gagal</div>";
}
else{
	$login=mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$pass' AND blokir='N'");
	$ketemu=mysql_num_rows($login);
	$r=mysql_fetch_array($login);

if ($ketemu > 0){
  session_start();
  header('location:../admin/admin.php?module=beranda');
}
else{
   echo "<link href=css/style.css rel=stylesheet type=text/css>";
  echo "<div class='error msg'>Login Gagal, Username atau Password salah, atau account anda sedang di blokir. ";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center></div>";
}
}
?>