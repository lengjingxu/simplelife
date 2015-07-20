
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
$sql="SELECT user_name FROM user WHERE user_name='$user' AND user_psw='$psw'";
$verif= $cx-> query($sql);
$login= $verif->rowCount();

if (!empty($login)) {
	session_start();
	$_SESSION["uid"]="$user";
	echo "登陆成功";
	echo "<script language=\"javascript\">
var i=1;
function ref(){
var date=new Date();
var se=date.getSeconds();
if(se%3==\"0\"){i++;}
if(i==\"2\"){window.parent.location.reload();}
setTimeout(\"ref()\",1000);
}
ref();
</script>";
	

} else {
	die("用户名或密码错误");
}
	$cx=null;	

?>