<?php include 'sql.php';
try{
	$cx=new PDO("mysql:host=$sql;dbname=life",$username,$psw);	
	
	$cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql='SELECT post_id,post,img,date FROM posts';
	$posts=$cx->query($sql);
	$posts->setFetchMode(PDO::FETCH_ASSOC);
	while($article=$posts->fetch()){
	echo "<p>".$article['img']."<br>";
	echo "".$article['post']."<br>";
	echo "".$article['date']."<br>";
	echo "".$article['post_id']."</p>";
	
	}
	}
catch(PDOException $e)
{
	echo $e->getMessage();
}
$cx=null;	

?>

