<?
// we connect to localhost and socket e.g. /tmp/mysql.sock

// variant 2: with localhost
$link = mysql_connect('mysql-jssullivdb.js-sullivan.comcastbiz.net', 'jssullivuser123', 'dsjflU*Sk32');
if (!$link) {
	echo "faild";
    //die('Could not connect: ' . mysql_error());
}else{
	echo "1231231";
		echo 'Connected successfully';
}


mysql_close($link);

?>

