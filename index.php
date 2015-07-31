<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leng‘s Simplelife</title>

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
	$cx=new PDO("mysql:host=$sql;dbname=$db",$username,$psw);	
	
	$cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql='SELECT post_id,post,img,date,auther_id FROM posts ORDER BY 1 DESC';
	$posts=$cx->query($sql);
	$posts->setFetchMode(PDO::FETCH_ASSOC);

	}
catch(PDOException $e)
{
	echo $e->getMessage();
}
$cx=null;	

?>
    <div class="life-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <div class="life-blog__posts mdl-grid">

          <div class="mdl-card something-else mdl-cell mdl-cell--8-col mdl-cell--12-col-desktop">
            
            <div class="mdl-card__media mdl-color--white mdl-color-text--grey-600">
              <img src="images/logo.png">
              Leng
            </div>
            <div class="mdl-card__supporting-text meta meta--fill mdl-color-text--grey-600">
              <div>
                <strong>Paris</strong>
              </div>
			 <!-- <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="menubtn">
                <button class="mdl-menu__item mdl-js-ripple-effect"><a href="http://leng.ninja/">About</a></button>
                <button class="mdl-menu__item mdl-js-ripple-effect">Message</button>
                <button class="mdl-menu__item mdl-js-ripple-effect">Favorite</button>
                <button class="mdl-menu__item mdl-js-ripple-effect">Search</button>
              </ul> 
              <button id="menubtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons">more_vert</i>
              </button>
			  -->
            </div>
          </div>
		  
		  	<?php while($article=$posts->fetch()){
				$date=$article['date'];
				$weekarray=array("日","一","二","三","四","五","六"); 

				
	echo "<div class='mdl-card mdl-cell mdl-cell--12-col'>
            <div class='mdl-card__media mdl-color-text--grey-50' style='background-image: url(".$article['img'].");'>
			  <h3>".str_replace(str_split('0123456789'), str_split('零一二三四五六七八九',3), trim(str_replace('1十','十',implode('十', str_split(date('n',strtotime($date))))),'0').'月'.trim(str_replace('1十','十',implode('十', str_split(date('d',strtotime($date))))),'0')).'日' ."</h3>
			</div>";
	echo "<div class=\"mdl-color-text--grey-600 mdl-card__supporting-text\">"
             .$article['post']."
            </div>";
	echo "<div class=\"mdl-card__supporting-text meta mdl-color-text--grey-600\">
              <div>
                <strong>".$article['auther_id']."</strong>
                <span>".$article['date']."</span>
              </div>
            </div>
          </div>";
	
	}
	?>
          



         
        </div>
        <footer class="mdl-mini-footer">
          <div class="mdl-mini-footer--left-section">
            <button class="mdl-mini-footer--social-btn social-btn social-btn__twitter"></button>
            <button class="mdl-mini-footer--social-btn social-btn social-btn__blogger"></button>
            <button class="mdl-mini-footer--social-btn social-btn social-btn__gplus"></button>
          </div>
          <div class="mdl-mini-footer--right-section">
            <button class="mdl-mini-footer--social-btn social-btn__share"><i class="material-icons">share</i></button>
          </div>
        </footer>
      </main>
      <div class="mdl-layout__obfuscator"></div>
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
