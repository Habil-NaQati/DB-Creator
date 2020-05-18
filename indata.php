<html>

<form name=frm method=post action=svdata.php>
<?php
session_start();
$dbnm=$_SESSION['sdb'];
$tbnm=$_SESSION['stbl'];
if($dbnm=='mysql')
{
	echo("You can only view this system database <b>$dbnm</b>");
	header("refresh:4;url=vwdata.php");
	die();

}
$con=mysqli_connect("127.0.0.1","root","",$dbnm);


	if(!$con)
	{

		die(mysqli_connect_error());

	}


$qry=mysqli_query($con,"describe $tbnm;");


$cnt=mysqli_num_rows($qry);
$_SESSION['cnt']=$cnt;
echo("<br>");
$val=0;
	while($row=mysqli_fetch_array($qry))
		{
			
			$nm=$row[0];
			echo("$nm<input type=text name=t$val>");
			$val++;

		}

?>
<br>
<input type=submit value=Insert>


</html>
