
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

<style>
  .life-card-square.mdl-card {
    width: 320px;
    height: 320px;
	margin: auto;
  }
  .life-card-square > .mdl-card__title {
    color: #fff;
    background: bottom right 15% no-repeat #46B6AC;
  }
</style>

<div class="mdl-card mdl-shadow--2dp life-card-square">
  <div class="mdl-card__title mdl-card--expand">
    <h2 class="mdl-card__title-text">Update</h2>
  </div>
  <div class="mdl-card__supporting-text">
    <form action="admin_login.php" method="post" target="post">
User: <input type="text" name="zuser" /><br>
PSW: <input type="password" name="zpsw" /><br>
<input type="submit" />
</form>
  </div>
  
</div>


