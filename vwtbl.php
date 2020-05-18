<html>
<center>
<form method=post action=vwstur.php>
<?php
$db=$_REQUEST['rdodb'];
session_start();
 $_SESSION['sdb']=$db;

echo("");

if($db=='new')
{
	$con=mysqli_connect("127.0.0.1","root","","test");
	if(!$con)
	{
		die(mysqli_connect_error($con));
	
	}
	$new=$_POST['txtdb'];
	$qry=mysqli_query($con,"show databases;");
	while($a=mysqli_fetch_array($qry))
	{
		$b=$a[0];
		if($b==$new)
		{
			echo("Database $new  already exists,	please choose different name");
			header("refresh:4;url=index.php");
			die();

		
		}
	
	}
	$qry1=mysqli_query($con,"create database $new ;");
	echo("Database $new created successfully by user root");
	header("refresh:4;url=index.php");

echo("");
}
else
{
	
	$con1=mysqli_connect("127.0.0.1","root","","$db");
	if(!$con1)
	{
		die(mysqli_error($con1));
	
	}
	$qry2=mysqli_query($con1,"show tables ;");
	echo("<h3>You are in  Database $db</h3><h4>Choose</h4> <table border=1>");
	echo("<th>Existing Tables</th>");
	while($tar=mysqli_fetch_array($qry2))
	{
		$a=$tar[0];
		echo("<tr><td><input type=radio name=rdotbl value=$a> $a</td></tr>");
	
	}
	echo("</table><br><b>OR</b>");
	echo("<h4><input type=radio name=rdotbl value=new>Create New Table</h4>");
	echo("New Table Name <input type=text name=txtbl><br>Columns<select name=colsize>");
	for($i=1;$i<30;$i++)
	{
		echo("<option>$i</option>");
	}

	echo("</select><br><br><input type=submit value=Proceed>");


}









?>




</center>
</form>

</html>
