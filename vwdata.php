<html>
<center>



<form name=frm method=post action=indata.php>
<?php
session_start();
$dbnm=$_SESSION['sdb'];
$fsize=$_SESSION['fsize'];
$ntbl=$_SESSION['ntbl'];
$tbnm=$_SESSION['stbl'];
$flag=$_SESSION['flag'];


$con=mysqli_connect("127.0.0.1","root","",$dbnm);


	if(!$con)
	{

		die(mysqli_connect_error());

	}


	if($flag!=1)
	{
$qry=mysqli_query($con,"describe $tbnm;");


$cnt=mysqli_num_rows($qry);
echo("<table border=1><tr>");
	while($row=mysqli_fetch_array($qry))
		{
			
			$nm=$row[0];
			echo("<th>$nm</th>");



		}
echo("</tr>");


$qry2=mysqli_query($con,"select * from $tbnm;");
	while($row2=mysqli_fetch_array($qry2))
                {

                        echo("<tr>");
			for($i=0;$i<$cnt;$i++)
			{
				$nm=$row2[$i];
                       		echo("<td>$nm</td>");
			}
			echo("</tr>");


                }




echo("</table>");
echo("<br><input type=submit value=Insert><br><a href=index.php>Home</a>");
	}
	else
	{ 
		$qrytbl="create table $ntbl(";
		for($i=1;$i<=$fsize;$i++)
		{
			$text=$_REQUEST['t'.$i];
			$datatype=$_REQUEST['datatype'.$i];
			$size=$_REQUEST['size'.$i];
			if($i==$fsize)
			{

				$qrytbl=$qrytbl.$text." ".$datatype." (".$size."));";
			}
			else
			{
		       
				$qrytbl=$qrytbl.$text." ".$datatype." (".$size.") , ";
			}

		
		
		
		}
		$qrynt=mysqli_query($con,$qrytbl);
		echo("element added<br>$qrytbl");

		header("refresh:3;url=index.php");
	
	
	
	
	}

?>
<br>

</center>
</html>
