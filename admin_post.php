
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

  
    $path="uploadfiles/";        //上传路径  

//echo $_FILES["filename"]["type"];  


if(!file_exists($path))  
{  
    //检查是否有该文件夹，如果没有就创建，并给予最高权限  
    mkdir("$path", 0700);  
}//END IF  
//允许上传的文件格式  
$tp = array("image/gif","image/jpeg","image/png");  
//检查上传文件是否在允许上传的类型  
if(!in_array($_FILES["filename"]["type"],$tp))  
{  
    echo "格式不对";  
    exit;  
}//END IF  
if($_FILES["filename"]["name"])  
{  
        $file1=$_FILES["filename"]["name"];  
        $file2 = $path.time().$file1;  
        $flag=1;  
}//END IF  
if($flag) $result=move_uploaded_file($_FILES["filename"]["tmp_name"],$file2);  
//特别注意这里传递给move_uploaded_file的第一个参数为上传到服务器上的临时文件  
//END IF  




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

