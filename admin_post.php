
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

  
    $path="uploadfiles/";        


if(!file_exists($path))  
{  
    mkdir("$path", 0700);  
}  
$tp = array("image/gif","image/jpeg","image/png");  
if(!in_array($_FILES["filename"]["type"],$tp))  
{  
    echo "格式不对";  
    exit;  
}
if($_FILES["filename"]["name"])  
{  
        $file1=$_FILES["filename"]["name"];  
        $file2 = $path.time().$file1;  
        $flag=1;  
} 
if($flag) $result=move_uploaded_file($_FILES["filename"]["tmp_name"],$file2);  





	$post=$_POST['zpost'];
	$img=$file2;
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

