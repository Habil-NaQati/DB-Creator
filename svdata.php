<?php
session_start();
$dbnm=$_SESSION['sdb'];
$tbnm=$_SESSION['stbl'];
$cnt=$_SESSION['cnt'];
$con=mysqli_connect("127.0.0.1","root","",$dbnm);

	if(!$con)
	{

		die(mysqli_connect_error());
}

//$qry=mysqli_query($con,"select * from login;");
$qry="insert into $tbnm values(";

for($i=0;$i<$cnt;$i++)
		{

		$val=$_REQUEST['t'.$i];
			if(($i+1)==$cnt)
				$qry=$qry."'".$val."');";
			else
				$qry=$qry."'".$val."',";


		}
echo("<br>$qry");
$qryx=mysqli_query($con,$qry);
Header("refresh:3;url=vwdata.php");

?>
