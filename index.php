<html>
<form name=frm method=post action=vwtbl.php>
<center>
<?php
$con=mysqli_connect("127.0.0.1","root","","test");
if(!$con)
{

 die(mysqli_connect_error($con));
}
$qry=mysqli_query($con,"show databases;");

echo("<h4>Choose Your choice</h4> <table border=1>");
echo("<th>Existing Databases</th>");
while($re=mysqli_fetch_array($qry))
{

	$db=$re[0];
	echo("<tr><td><input type=radio name=rdodb value=$db>$db </td></tr>");




}

echo("</table> <br><b>OR</b>");
echo("<br><h4><input type=radio name=rdodb value=new>Create New Database</h4><br>");



?>


New Database Name<input type=text name=txtdb><br>
<br>
<input type=submit value=Proceed><br>



</center>
</form>




</html>


