<html>
<body>
<?php
$link = mysql_connect('ecsmysql', 'cs332a4', 'eesaeyei');
if(!$link){
	die('Could not connect ' . mysql_error());
}
echo 'Connected successfully<p>';

mysql_select_db("cs332a4",$link);
$query = "SELECT Grade, COUNT(GRADE)
		  FROM EnrollmentRecords WHERE CNum = '" . $_POST["CNUM"] 
		  . "' AND SNum = " . $_POST[SNUM]
		  . " GROUP BY (GRADE)";
		  
$result = mysql_query($query,$link);

if (empty($result)){
	echo 'Empty variable';
}

for($i=0; $i<mysql_numrows($result); $i++)
{
	echo "Grade: ", mysql_result($result, $i, "GRADE")."<br>";
	echo "Count: ", mysql_result($result, $i, "COUNT(GRADE)")."<br>";
	echo "<br>";
}


mysql_close($link);
?>

</body>
</html>
