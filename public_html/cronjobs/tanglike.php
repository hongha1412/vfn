<?php
/**
 ** Class name: FbAuto
 ** Author: Jurou_Tran
 ** Date:04/07/2017
 ** Tested: OK 04/07/2017 21:00:00
 */
include '../config.php';
class FbAuto
{
	protected $_url, $_type, $_post_data, $_webpage;
	public function execCurl()
	{
		$data_string = json_encode($this->_post_data);
		$ch          = curl_init($this->_url . $this->_type);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string)
		));
		$this->_webpage = curl_exec($ch);
		curl_close($ch);
	}
	public function setURL($url = false)
	{
		$this->_url = $url;
	}
	public function setType($type = false)
	{
		$this->_type = $type;
	}
	public function setPostData($data = false)
	{
		$this->_post_data = $data;
	}
	public function getResponse()
	{
		$return = $this->_webpage;
		$return = json_decode($return);
		return $return;
	}
}

$token = array();
$result = mysql_query("SELECT * FROM token ORDER BY RAND() LIMIT 0,50");
if ($result) {
	while ($row = mysql_fetch_array($result)) {
		$token[] = $row['token'];
	}
}
$like = array(0, 150, 300, 500, 700, 1000, 1500, 2000);
$res  = mysql_query("SELECT * FROM VIP ORDER BY RAND() LIMIT 0,100");
while ($post = mysql_fetch_array($res)) {
	
	$get = get_post($post['idfb'], $token[array_rand($token)]);
	if ($get != 0) {
		$slLike  = $get['data'][0]['likes']['count'];
		$id_post = $get['data'][0]['id'];
	} else {
		continue;
	}
	if ($slLike <= $like[$post['goi']]) {
		$post_data = array(
			'time_delay' => 100, // thời gian cách nhau giữa 2 lần auto (millisecond)
			'id' => $id_post, // Đối với Auto Reaction định dạng ID phải là ID USER_ID POST
			'access_token' => $token // Mảng lưu số token auto.
		);
		$Jurou = new FbAuto;
		$Jurou->setURL('http://autolike-starthien.rhcloud.com/'); //Có dấu "/" ở cuối
		$Jurou->setType('Auto@Like');
		/*
		setType('AutoLike') -> Auto Like
		setType('AutoReact') -> Auto Cảm Xúc
		setType('AutoShare') -> Auto Chia Sẽ
		setType('AutoSub') -> Auto Theo Dõi
		setType('AutoAddFriend') -> Auto Kết Bạn
		*/
		$Jurou->setPostData($post_data);
		$Jurou->execCurl();
		$response = $Jurou->getResponse();
		var_dump($response);
		delay(1);
	}
}
function get_post($userID, $token)
{
	$get_post = file_get_contents('https://graph.facebook.com/' . $userID . '/feed?limit=1&access_token=' . $token);
	$get_post = json_decode($get_post, true);
	if ($get_post['data'][0]['id']) {
		return $get_post;
	} else {
		return 0;
	}
}
?>