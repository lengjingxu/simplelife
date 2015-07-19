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
?>



<form action="admin_post.php" method="post" target="post">
Post: <input type="text" name="zpost" />
IMG: <input type="text" name="zimg" />
<input type="submit" />
</form>

<?php 
//查找和删除
	$sql='SELECT post_id,post,img,date FROM posts';
	$posts=$cx->query($sql);
	$posts->setFetchMode(PDO::FETCH_ASSOC);
	while($article=$posts->fetch()){
	echo "<p>".$article['img']."<br>";
	echo "".$article['post']."<br>";
	echo "".$article['date']."<br>";
	echo "<a href=admin_delet.php?id=".$article['post_id']." target='post'>删除</a></p>";
	}

$cx=null;	

?>

</body>
</html>


