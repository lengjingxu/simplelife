<?php  
/* if($_FILES['file']['error'] > 0){  
   echo '!problem:';  
   switch($_FILES['file']['error'])  
   {  
     case 1: echo '文件大小超过服务器限制';  
             break;  
     case 2: echo '文件太大！';  
             break;  
     case 3: echo '文件只加载了一部分！';  
             break;  
     case 4: echo '文件加载失败！';  
             break;  
   }  

   exit;  
}  
if($_FILES['file']['size'] > 1000000){  
   echo '文件过大！';  
   exit;  
}  
if($_FILES['file']['type']!='image/jpeg' && $_FILES['file']['type']!='image/gif'){  
   echo '文件不是JPG或者GIF图片！';  
   exit;  
}   */
$today = date("YmdHis");  
$filetype = $_FILES['file']['type'];  
if($filetype == 'image/jpeg'){  
  $type = '.jpg';  
}  
if($filetype == 'image/gif'){  
  $type = '.gif';  
}  
$upfile = 'upfile/' . $today . $type;  
if(is_uploaded_file($_FILES['file']['tmp_name']))  
{  
   if(!move_uploaded_file($_FILES['file']['tmp_name'], $upfile))  
   {  
     echo '移动文件失败！';  
     exit;  
    }  
}  
else  
{  
   echo 'problem!';  
   exit;  
}  
echo '<h1>success!</h1><br>';   
echo '文件大小：' . $_FILES['file']['size'] . '字节' . '<Br>';  
echo '文件路径：' . $upfile;  
echo '<hr with="100%" />' . '<p>';  
$dirr = 'upfile/';  
$dir = opendir($dirr);  
echo $dirr . '--Listing:<ul>';  
while($file = readdir($dir)){  
  echo "<li>$file</li>";  
}  
echo '</ul>';  
closedir($dir);  
?> 