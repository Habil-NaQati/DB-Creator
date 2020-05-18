<html>
<center>
<form name=frm method=post action=vwdata.php>

<?php
$tbl=$_REQUEST['rdotbl'];
$ntbl=$_REQUEST['txtbl'];
$size=$_REQUEST['colsize'];
session_start();
$_SESSION['stbl']=$tbl;
$_SESSION['fsize']=$size;
$_SESSION['ntbl']=$ntbl;
$db=$_SESSION['sdb'];



$con1=mysqli_connect("127.0.0.1","root","",$db);
if(!$con1)
{
  die(mysqli_connect_error());


}
echo ("ok $db-----$tbl-----");

if ($tbl=='new')
{
	if($db=='mysql')
{
	echo ("You can not modify the system database <b>$db</b>");
	header("refresh:4;url=index.php");
	die();

}
	$chqry=mysqli_query($con1,"show tables;");
	while($tary=mysqli_fetch_array($chqry))
	{
		$tm=$tary[0];
		
     		if($tm==$ntbl)
		{
         
 			echo("Table $ntbl Already exists in Database $db !! Please Try again with different name ");
			Header("refresh:5;url=index.php");
			die();

		}
	
	}
	$flag=1;
	$_SESSION['flag']=$flag;

for($i=1;$i<=$size;$i++)
		{	
			echo("<br>Feild $i Name  <input type=text name=t$i>Datatype <select name=datatype$i><option>varchar</option> <option>int</option><option>decimal</option></select>Size<select name=size$i>");
      for($j=1;$j<=30;$j++){
     echo("<option>$j</option>");
		  }
			echo("</select>");
			

		}

echo("<br><input type=submit value=Proceed>");


}

else
{
$flag=0;
$_SESSION['flag']=$flag;
$qry=mysqli_query($con1,"desc $tbl;");
$cnt=mysqli_num_fields($qry);
echo ("<table border=1>");
while($list=mysqli_fetch_array($qry))
{
       echo("<tr>");
       for($i=0;$i<$cnt;$i++)
{
        $name=$list[$i];
        echo("<td>$name</td>");
}
echo("</tr>");

}
 echo (" </table>");

echo("<br><input type=submit value=Display>");
}

?>




</form>
</center>
</html>
