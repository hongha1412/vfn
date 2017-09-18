<?php
set_time_limit(0);
include '../config.php';
$cmt = array(0, 10, 15, 20, 25, 30, 35, 40, 45);  // thêm nữa thì thêm số lượng cmt vào đây trước với ở file index nữa
$q = mysql_query("SELECT * FROM `vipcmt` ORDER BY RAND() LIMIT 0,1");
while($r = mysql_fetch_assoc($q)){
$idfb = $r['idfb'];
$tongcmt = $r['socmt'];
$limit = $cmt[$r['goi']];
$noidung = explode("\n",$r['noidung']);
$tt = mysql_query("SELECT `token` FROM `tokencmt` ORDER BY RAND() LIMIT 0,$tongcmt");
while($t = mysql_fetch_assoc($tt)){
$msg = $noidung[array_rand($noidung)];
$feed = json_decode(file_get_contents('https://graph.facebook.com/'.$idfb.'/feed?fields=id,comments&limit=1&access_token='.$t['token']),true);
$count = $feed['data'][0]['comments']['count'];
if($count < $limit){
echo file_get_contents('https://graph.facebook.com/'.$feed['data'][0]['id'].'/comments?method=post&message='.urlencode($msg).'&access_token='.$t['token']);
}
}
}
$infos = mysql_fetch_array(mysql_query("SELECT * FROM `vipcmt`"));
if (time() > $infos['time']) {
mysql_query("DELETE FROM `vipcmt` WHERE `time` = `". $infos['time']."` < ".time()."");
}
function auto($url){
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$ch = curl_exec($curl);
curl_close($curl);
return $ch;
}