<html>
<body>
<iframe  name="post" frameborder="0"></iframe>

<?php include 'sql.php';
try{
	$cx=new PDO("mysql:host=$sql;dbname=life",$username,$psw);	
	$cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	}
catch(PDOException $e)
{
	echo $e->getMessage();
}
$cx=null;	
?>

<form action="admin_login.php" method="post" target="post">
User: <input type="text" name="zuser" />
PSW: <input type="password" name="zpsw" />
<input type="submit" />
</form>


</body>
</html>


