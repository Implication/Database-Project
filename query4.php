<html>
<body>
<?php
$link = mysql_connect('ecsmysql', 'cs332a4', 'eesaeyei');
if(!$link){
	die('Could not connect ' . mysql_error());
}
echo 'Connected successfully<p>';

mysql_select_db("cs332a4",$link);
$query = "SELECT CNum, Grade FROM
			EnrollmentRecords
			WHERE CWID = ".$_POST["CWID"];
$result = mysql_query($query,$link);

if (empty($result)){
	echo 'Empty variable';
}

for($i=0; $i<mysql_numrows($result); $i++)
{
	echo "Course: ", mysql_result($result, $i, "CNum")."<br>";
	echo "Grade: ", mysql_result($result, $i, "Grade")."<br>";
	echo "<br>";
}


mysql_close($link);
?>

</body>
</html>
