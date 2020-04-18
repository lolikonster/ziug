<?php include("header.php"); ?>
<?php
if(isset($_POST["register"])){
if(!empty($_POST['u_name']) && !empty($_POST['u_nicename']) && !empty($_POST['u_email']) && !empty($_POST['u_pass'])) {
 $connect=mysqli_connect('localhost', 'root', '', 'site');
 $name=mysqli_real_escape_string($connect,$_POST['u_name']);
 $nicename=mysqli_real_escape_string($connect,$_POST['u_nicename']);
 $email=mysqli_real_escape_string($connect,$_POST['u_email']);
 $pass=mysqli_real_escape_string($connect,$_POST['u_pass']);
 $query=mysqli_query($connect,"SELECT * FROM `useri` WHERE nicename='{$nicename}'");
 $numr=mysqli_num_rows($query);
 if($numr==0)
 {
 $sql_q="INSERT INTO `useri`
 (name,nicename,email,pass)
 VALUES('{$name}','{$nicename}', '${email}', '{$pass}')";
 $res=mysqli_query($connect,$sql_q);
 if($res){
  echo '<script type="text/javascript">
window.location = "enter.php"
</script>';
 }
 else {
 echo "Не удалось добавить информацию";
 }
 }
else {
  echo "Этот ник занятый. Попробуйте другой!";
 }
}else {
  //$info = "Все поля обязательны для заполнения!";
  echo "Все поля обязательны для заполнения!";
}
}
?>
<body>
<div>
<div>
 <h1>Зарегистрируйтесь</h1>
<form action="reg.php" method="post" name="registerform">
<p><label>Ваше имя:<br>
<input name="u_name"="20" type="text" value=""></label></p>
 <p><label>Желаемый ник:<br>
 <input name="u_nicename" size="30" type="text"></label></p>
<p><label>Ваш email:<br>
<input name="u_email" size="30" type="email"></label></p>
<p><label>Пароль:<br>
<input name="u_pass" size="30" type="password"></label></p>
<p><input name="register" type="submit" value="Register"></p>
<p><a href="log.php">Уже зарегистрированы?</a></p>
 </form>
</div>
</div>
</body>
</html>