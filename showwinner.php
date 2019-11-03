<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER"); #openshift
$dbname = getenv("DATABASE_NAME"); #sampledb
$dbpwd = getenv("DATABASE_PASSWORD"); #password
$connection = mysqli_connect($dbhost.":".$dbport, $dbuser, $dbpwd, $dbname) or die("Error " . mysqli_error($connection));
$sql = "select (@rowno:= @rowno+1) AS rowno,username from secondkill , (SELECT @rowno:=0) as rowno order by time";
$rs = $connection->query($sql);
echo "<table><tr><td>排名</td><td>抽奖人</td></tr>";
while($row = mysqli_fetch_assoc($rs))
	echo "<tr><td>".$row['rowno']."</td><td>".$row['username']."</td></tr>";
echo "</table>";                 
mysqli_close($connection);
?>
