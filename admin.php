<!doctype html>
<?php SESSION_START();


 ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

 

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/styles.css">

  </head>
  <body>
 <?php if(@$_GET['login'] == "out"){
    unset($_SESSION['uid']);
    echo '
	<div id="popup1" class="overlay" style="  visibility: visible;
  opacity: 1;">
		<div class="mdl-card mdl-shadow--2dp life-card-square popup">
		  <div class="mdl-card__title mdl-card--expand">
			<h2 class="mdl-card__title-text">LogOut</h2>
		  </div>
		  <div class="mdl-card__supporting-text">
			<div class="content"><p>注销登录成功</p></div>
		  </div>
		<div class="mdl-card__actions mdl-card--border">
			<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple" href="admin.php">
			登录
			<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span>
			</span>
			</a>
		</div>		
	</div>';
    exit;
}
?>
  <?php include 'sql.php';
				try{
					$cx=new PDO("mysql:host=$sql;dbname=life",$username,$psw);	
					$cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql='SELECT post_id,post,img,date,auther_id FROM posts ORDER BY 1 DESC';
					$posts=$cx->query($sql);
					$posts->setFetchMode(PDO::FETCH_ASSOC);

					}
				catch(PDOException $e)
				{
					echo $e->getMessage();
				}
				?>

			
              
				
<?php 
			
if(isset($_SESSION['uid']))
	{ 
	
	echo "
	 <div class=\"life-blog life-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded\">
      <main class=\"mdl-layout__content\">
        <div class=\"life-back\">
          <a class=\"mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon\" href=\"index.php\">
            <i class=\"material-icons\">arrow_back</i>
          </a>
        </div>
        <div class=\"life-blog__posts mdl-grid\">
            <div class=\"mdl-color-text--grey-600 mdl-card__supporting-text\">
              <iframe  name=\"post\" frameborder=\"0\"></iframe>

            </div>
				<div class=\"mdl-card mdl-cell mdl-cell--12-col article-add\">
					
			   
					<form action=\"admin_post.php?submit=1\" method=\"post\" target=\"post\" enctype=\"multipart/form-data\">
						<div class=\"mdl-textfield mdl-js-textfield\">
						
						<textarea class=\"mdl-textfield__input\" type=\"text\" name=\"zpost\"  rows= \"3\" id=\"posttext\" ></textarea>
						<label class=\"mdl-textfield__label\" for=\"posttext\">Text lines...</label>
						</div>
						<input name=\"filename\" type=\"file\">  
						<br>
						<br>
			
						<input type=\"submit\" class=\"mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect\" data-upgraded=\",MaterialButton,MaterialRipple\"/> 
						
						
					</form>
			  <a href=\"admin.php?login=out \"> <button class=\"mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent\" data-upgraded=\"MaterialButton,MaterialRipple\" id=\"delete\"><i class=\"material-icons mdl-color-text--white\">remove</i><span class=\"mdl-button__ripple-container\"><span class=\"mdl-ripple is-animating\" style=\"width: 160.362463396299px; height: 160.362463396299px; -webkit-transform: translate(-50%, -50%) translate(26px, 25px); transform: translate(-50%, -50%) translate(26px, 25px);\">退出</span></button></a>
					
			 </div>
				
				 ";
				 
				 
				 
				
				while($article=$posts->fetch()){
					echo "<div class='mdl-card mdl-cell mdl-cell--12-col'>
							<div class='mdl-card__media mdl-color-text--grey-50' style='background-image: url(".$article['img'].");'>
							  <h3></h3>
							</div>";
					echo "<div class=\"mdl-color-text--grey-600 mdl-card__supporting-text\">"
							 .$article['post']."
							</div>";
					echo "<div class=\"mdl-card__supporting-text meta mdl-color-text--grey-600\">
							  <div class=\"minilogo\"></div>
							  <div >
								<strong>".$article['auther_id']."</strong>
								<span>".$article['date']."</span>
								<a href=admin_delet.php?id=".$article['post_id']." target='post'>
								<button class=\"mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent\" data-upgraded=\"MaterialButton,MaterialRipple\" id=\"delete\"><i class=\"material-icons mdl-color-text--white\">remove</i><span class=\"mdl-button__ripple-container\"><span class=\"mdl-ripple is-animating\" style=\"width: 160.362463396299px; height: 160.362463396299px; -webkit-transform: translate(-50%, -50%) translate(26px, 25px); transform: translate(-50%, -50%) translate(26px, 25px);\"></span></button>
								</a>
								
								
							  </div>
							</div>
						  </div>";
				}
				}
					else 
				{	echo "</div>";
					echo "<div style='z-index=999'>";
					include 'login.php';
					echo "</div>";
				}	;  
	

	?>
	
				

				
            
             
             
                 
          </div>
      </main>
    </div>
 

    <script src="./js/material.min.js"></script>
</body>
  <script>
    Array.prototype.forEach.call(document.querySelectorAll('.mdl-card__media'), function(el) {
      var link = el.querySelector('a');
      if(!link) {
        return;
      }
      var target = link.getAttribute('href');
      if(!target) {
        return;
      }
      el.addEventListener('click', function() {
        location.href = target;
      });
    });
  </script>
</html>


