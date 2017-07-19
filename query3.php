<html>
<body>
<?php
$link = mysql_connect('ecsmysql', 'cs332a4', 'eesaeyei');
if(!$link){
	die('Could not connect ' . mysql_error());
}
echo 'Connected successfully<p>';

mysql_select_db("cs332a4",$link);
$query = "SELECT  S.SNum, S.Classroom, S.MeetDays, S.BegTime, S.EndTime, COUNT(*) 
FROM Section S, EnrollmentRecords E Where S.CNum = '" . $_POST[CNum] 
. "' AND E.CNum = S.CNum AND E.SNum = S.SNum 
GROUP BY (E.SNum)";
		  
$result = mysql_query($query,$link);

if (empty($result)){
	echo 'Empty variable';
}

for($i=0; $i<mysql_numrows($result); $i++)
{
	echo "Section Number: ", mysql_result($result, $i, "S.SNum")."<br>";
	echo "Classroom: ", mysql_result($result, $i, "S.Classroom")."<br>";
	echo "Meeting Days: ", mysql_result($result, $i, "S.MeetDays")."<br>";
	echo "Beginning Time: ", mysql_result($result, $i, "S.BegTime")."<br>";
	echo "End Time: ", mysql_result($result, $i, "S.EndTime")."<br>";
	echo "Number of Students: ", mysql_result($result, $i, "COUNT(*)")."<br>";
	echo "<br>";
}


mysql_close($link);
?>

</body>
</html>
