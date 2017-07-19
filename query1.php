<html>
<body>
<?php
$link = mysql_connect('ecsmysql', 'cs332a4', 'eesaeyei');
if(!$link){
	die('Could not connect ' . mysql_error());
}
echo 'Connected successfully<p>';

mysql_select_db("cs332a4",$link);
$query = "SELECT C.CTITLE, S.Classroom, S.MeetDays, S.BegTime, S.EndTime
			FROM Teaches T, Section S, Course C
			WHERE T.SSN = ".$_POST["SSN"] 
			." AND C.CNum = T.CNum 
			AND S.CNum = T.CNum
			AND S.SNum = T.SNum";
$result = mysql_query($query,$link);

if (empty($result)){
	echo 'Empty variable';
}

for($i=0; $i<mysql_numrows($result); $i++)
{
	echo "Course Title: ", mysql_result($result, $i, "CTITLE")."<br>";
	echo "Classroom: ", mysql_result($result, $i, "Classroom")."<br>";
	echo "MeetDays: ", mysql_result($result, $i, "Meetdays")."<br>";
	echo "BegTime: ", mysql_result($result, $i, "BegTime"). "<br>";
	echo "EndTime: ", mysql_result($result, $i, "EndTime"). "<br>";
	echo "<br>";
}


mysql_close($link);
?>

</body>
</html>
