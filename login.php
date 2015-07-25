
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
$cx=null;	
?>



<div class="mdl-card mdl-shadow--2dp life-card-square">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">Login</h2>
  </div>
  <div class="mdl-card__supporting-text">
    <form action="admin_login.php" method="post" target="post">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="text" name="zuser" id="zuser"/>
		<label class="mdl-textfield__label" for="zuser">用户名...</label>
	</div>
	  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		<input class="mdl-textfield__input" type="password" name="zpsw" id="zpsw"/>
		<label class="mdl-textfield__label" for="zpsw">密码...</label>
	  </div>
	<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" />
</form>
  </div>
  
</div>


