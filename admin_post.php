
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
SESSION_START();
if(isset($_SESSION['uid']))
{
	$post=$_POST['zpost'];
	$img=$_POST['zimg'];
	$sql="INSERT INTO posts(post,img,date,auther_id) VALUE ('$post','$img',NOW(),'".$_SESSION['uid']."')";
	$cx ->exec($sql);
	echo "提交成功";

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
	$cx=null;	
}	
	else 
	echo" 没有权限";

?>

