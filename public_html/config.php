<?php
  $db = new PDO('mysql:host=localhost;dbname=thinh1009_vipfb','thinh1009_vipfb','Thinh071106');
?>
<?php
$host = "localhost";
$username = "thinh1009_vipfb";
$password = "Thinh071106";	
$dbname = "thinh1009_vipfb";
$connection = mysql_connect($host,$username,$password);
if (!$connection)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");
$hometom = "LIKEFB.PRO";
$title = "HỆ THỐNG VIP LIKE | VIP COMMENT | VIP SHARE | BOT CẢM XÚC - VIPFBNOW.COM";
$logo = "VIPFBNOW.COM";
$logo2 = "VIPFBNOW.COM";
$phienban = "VIP LIKE 2017";
$adminfb = "https://www.facebook.com/doduythinh18";
$adminname = "Đỗ Duy Thịnh";
$idfb = "100006670751625";
$home = 'http://vipfbnow.com';
$avtmacdinh = "https://i.imgur.com/3xMwdBO.png";

$kmess = $set_user['kmess'] > 4 && $set_user['kmess'] < 10 ? $set_user['kmess'] : 10;
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);




?>