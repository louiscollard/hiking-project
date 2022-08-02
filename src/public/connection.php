
<?php
$db_host="188.166.24.55"; //localhost server 
$db_user="laravel";	//database username
$db_password="5E3tYVTm6OJcxbHh"; //database password
$db_name="jepsen6-laravel";	//database name

try
{
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
	$e->getMessage();
}

?>
