<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Design Lite</title>

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
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body>
  <?php include 'sql.php';
				try{
					$cx=new PDO("mysql:host=$sql;dbname=life",$username,$psw);	
					$cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql='SELECT post_id,post,img,date,auther_id FROM posts';
					$posts=$cx->query($sql);
					$posts->setFetchMode(PDO::FETCH_ASSOC);

					}
				catch(PDOException $e)
				{
					echo $e->getMessage();
				}
				?>
    <div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <div class="demo-back">
          <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" href="index.html">
            <i class="material-icons">arrow_back</i>
          </a>
        </div>
        <div class="demo-blog__posts mdl-grid">
            <div class="mdl-card__media mdl-color-text--grey-50">
              <h3>title</h3>
            </div>
			
              
				
				<?php 
				SESSION_START();
				if(isset($_SESSION['uid']))
				{ echo "
				<div class=\"mdl-card mdl-cell mdl-cell--12-col\">
					<iframe  name=\"post\" frameborder=\"0\"></iframe>
			   
					<form action=\"admin_post.php\" method=\"post\" target=\"post\">
						<div class=\"mdl-textfield mdl-js-textfield\">
						
						<textarea class=\"mdl-textfield__input\" type=\"text\" name=\"zpost\"  rows= \"3\" id=\"posttext\" ></textarea>
						<label class=\"mdl-textfield__label\" for=\"posttext\">Text lines...</label>
						
						<br>IMG: <input type=\"url\" name=\"zimg\" />
						<input type=\"submit\" />
						
						</div>
					</form>
				 </div>
				 ";
				
				while($article=$posts->fetch()){
					echo "<div class='mdl-card mdl-cell mdl-cell--12-col'>
							<div class='mdl-card__media mdl-color-text--grey-50' style='background-image: url(\'".$article['img']."\');'>
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
								<a href=admin_delet.php?id=".$article['post_id']." target='post'><button class=\"mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored\">
								  <i class=\"material-icons\">remove</i>
								</button>
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
				}	  
	
	
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


