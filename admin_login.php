
<?php include 'sql.php';
try{
	$cx=new PDO("mysql:host=$sql;dbname=life",$username,$psw);	
	$cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}
catch(PDOException $e)
{
	echo $e->getMessage();
}?>

<?php
$user=$_POST['zuser'];
$psw=$_POST['zpsw'];
$verif="SELECT user_name FROM user WHERE user_name='$user' AND user_psw='$psw'";
$login=$cx->rowCount($verif);

if (!empty($login)) {
	session_start();
	$_SESSION["login"]="$user";
	echo "登陆成功";

} else {
	die("用户名或密码错误");
}
	$cx=null;	

?>