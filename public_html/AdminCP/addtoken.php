<?php
//để nguyên file ni mà chạy luôn
error_reporting(0);
$config_db = array(


	'db_host' => 'localhost',
	'db_user' => 'k2496thin_vip',
	'db_name' => 'k2496thin_vip',
	'db_pass' => 'Thinh123456'

);
$conn = mysqli_connect($config_db['db_host'], $config_db['db_user'], $config_db['db_pass'], $config_db['db_name']);
mysqli_set_charset($conn,"utf8");
if ($_POST['arr_access'] && $_POST['arr_id']) {
	$arrToken = $_POST['arr_access'];
	$arrID = $_POST['arr_id'];
	$sql = array();
	for ($i=0; $i < count($arrToken); $i++) {
		$sql[] = '('.($arrID[$i]).', "'.mysql_real_escape_string($arrToken[$i]).'")';
	}
	$insert = mysqli_query($conn, 'INSERT INTO token (idfb, token) VALUES '.implode(',', $sql));
	if ($insert) {
		echo 'Thêm Thành Công!';
	} else {
		echo 'Lỗi!';
	}
}
if ($_GET['getToken']) {
	$token = array();
	$result = mysqli_query($conn, "SELECT idfb FROM token");
	if ($result) {
		while ($row = mysqli_fetch_assoc($result)) {
			$token[] = $row['idfb'];
		}
		die(json_encode($token));
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Token</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel panel-primary" style="margin-top: 50px;">
				<div class="panel-heading">
					<h3 class="panel-title">Add Token Max Speed</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="textarea" class="control-label">Access Token</label>
						<textarea id="access_token" class="form-control" rows="10" required="required" placeholder="Mỗi Token Một Dòng"></textarea>
						<div id="show_access_token_live" style="display: none;">
							<label for="textarea" class="control-label">Access Token Live</label>
							<textarea id="access_token_live" class="form-control" rows="10" required="required"></textarea>
						</div>
					</div>
					<div class="form-group">
						<span class="label label-primary">Tổng: <b id="total">0</b></span>
						<span class="label label-success">Live: <b id="live">0</b></span>
						<span class="label label-danger">Die: <b id="die">0</b></span>
					</div>
					<button type="button" id="btn" class="btn btn-primary" onclick="checkLive()">Check Live</button>
					<button type="button" id="btn2" class="btn btn-success" style="display: none;" onclick="getTokenToServer()">Thực Thi</button>
					<button type="button" id="btn3" class="btn btn-success" style="display: none;" onclick="showTokenLive()">Hiển Thị Token Live</button>

				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var FBID1 = new Array();
		var TOKEN1 = new Array();
		var FBID2 = new Array();
		var TOKEN2 = new Array();
		var FBID3 = new Array();
		var TOKEN3 = new Array();
		function checkLive(){
			TOKEN1 = [];
			FBID1 = [];
			var access_token = $("#access_token").val();
			if (!access_token) {
				alert("Vui Lòng Nhập Vào Access Token");
				return;
			}
			$("#btn").html('Vui Lòng Đợi...');
			access_token = access_token.split("\n");
	        var long = access_token.length;
	        var tong = 0,
	            live = 0,
	            die  = 0;
	        $("#live").text(0);
	        $("#die").text(0);
	        $("#total").text(0);
	        for(var i = 0; i < long; i++){
	            ! function(i){
	                $.ajax({
	                    url: 'https://graph.facebook.com/me',
	                    type: 'GET',
	                    dataType: 'JSON',
	                    data: {
	                        access_token: access_token[i],
	                    }
	                }).success((data) => {
	                    live++;
	                    $("#live").text(live);
	                    TOKEN1.push(access_token[i]);
	                    FBID1.push(data.id);
	                }).error((data) => {
	                    die++;
	                    $("#die").text(die)
	                }).always((data) => {
	                    tong++;
	                    $("#total").text(tong);
	                    if (tong === long) {
	                        $("#btn2").fadeIn('slow');
	                        $("#btn3").fadeIn('slow');
	                        $("#btn").html('Check Live');
	                    }
	                })
	            }(i)
	        }
		}
		function showTokenLive(){
			$("#show_access_token_live").fadeIn('slow')
			$.each(TOKEN1, (i, item) => {
				$("#access_token_live").fadeIn('slow').append(item+"\n");
			})
		}
		function addAccess(){
            $("#btn2").html('Đang Add Token Vào CSDL');
	        $.ajax({
	            url:'addtoken.php',
	            type: 'POST',
	            dataType: 'text',
	            data: {
	                arr_access: TOKEN3,
	                arr_id:  FBID3
	            },
	            success: (data) => {
	                $("#btn2").html('Hoàn Tất!');
	                alert(data);
	            }
	        })
	    }
	    function getTokenToServer(){
	    	$("#btn2").html('Đang Lấy Dữ Liệu Từ Server...');
	    	$.ajax({
	    		url: 'addtoken.php',
	    		type: 'GET',
	    		dataType: 'JSON',
	    		data: {
	    			getToken: 1,
	    		},
	    		success: (data) => {
	    			FBID2 = data;
	    			setTimeout(function(){
	    				locTrung()
	    			}, 1000)
	    		}
	    	})
	    }
	    function locTrung(){
	    	$("#btn2").html('Đang Lọc Trùng...');
	    	$.each(FBID1, (i, item) => {
	    		if(!in_array(item, FBID2)){
	    			FBID3.push(item);
	    			TOKEN3.push(TOKEN1[i]);
	    		}
	    	})
	    	setTimeout(function(){
		    	addAccess();
		    },3000)
	    }
	    function in_array(needle, haystack){
		    return haystack.indexOf(needle) !== -1;
		}
	</script>
</body>
</html>