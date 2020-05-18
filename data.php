<?php
$fil=fopen("/var/www/html/file/.txt","r");
if(feof $fil)
{
	echo("empity file");

}

while (! feof($fil))
{

	$qry=fgets($fil);
	echo("<br>$qry");




}

fclose($fil);









?>
