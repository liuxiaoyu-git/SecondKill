<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$username = trim($_POST['username']);
$code = trim($_POST['code']);
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$time=100000000*microtime();
$sql = "insert into secondkill values('".$username."-".$code."',".$time.")";
echo $sql;
if ($connection->query($sql) !== TRUE) {  
	echo "发生数据库操作错误或用户".$username."已经存在";
} else {
	echo "抽奖用户注册成功。";
	echo "<br/>用户名：".$username;
	echo "<br/>手机后4位：".$code;
}
mysqli_close($connection);
?>
