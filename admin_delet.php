
<?php include 'sql.php';
try{
	$cx=new PDO("mysql:host=$sql;dbname=$db",$username,$psw);	
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
	$deleteid=$_GET['id'];
	$sql="DELETE FROM posts WHERE post_id=".$deleteid;
	$nb=$cx ->exec($sql);
	echo '
<div id="popup1" class="overlay" style="visibility: visible;
  opacity: 1;">
		
</div>';
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

}else 
	echo" 没有权限";	

?>

