<?
include('lib.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo title();?> | Login or Register</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<? echo meta();?>
</head>
<body>
<div class="header">
  <div class="header_line">
    <div class="menu"> <? echo logo();?>
      <ul  class="navigation">
    
        <li ><? echo login();?></li>
      </ul>
      <? echo social(); ?> </div>
  </div>
  <div class="header_line_bot">
    <div class="meme_up"> <? echo meme_me(); ?> </div>
  </div>
</div>
<div class="page">
  <div class="reklama_left"><? reklama01();?></div>
  <div class="page_right">
    <div class="vypis_mem"> <span class="bgBlue"></span> <span class="bgGrey"></span>
      <div class="login">
        <?
	  $email = (isset($_POST['email'])?$_POST['email']:'');
	$password = (isset($_POST['password'])?$_POST['password']:'');
	$log = (isset($_POST['log'])?$_POST['log']:'');
	
	$p = md5($password);
	if($log=='true')
	{
	$pripojew = mysql_query("SELECT * FROM users WHERE (email='$email') AND (password='$p')");
		$radkyu = mysql_num_rows($pripojew);
		if($radkyu == 0)
			{
				echo'<div style="margin:100px 0px 0px 50px;">Wrong password or username. <a href="login.php"><b><u>Try again</u></b></a><br>
Forgot your password?. <a href="forgot_pass.php"><b><u>Click here</u></b></a></div>
				';
			}
		else
			{
				$pripoj = mysql_query("SELECT * FROM users WHERE (email='$email') AND (password='$p')");
			while($row = mysql_fetch_object($pripoj))
				{	
					$userid = $row->id;
					mysql_query("DELETE FROM autorizace WHERE userid = '$userid'");
					$SN = "autorizace";
					session_name("$SN");
					$sid = session_id();
					$time = date("U");
					mysql_query("INSERT INTO autorizace VALUES ('','$sid','$userid','$time')");
					
					echo'<div style="margin:20px 0px 0px 50px;">You are logged. <a href="profile.php"><b><u>Continue to profile here!</u> </b></a></div>';

				}
			}
	
	}
	else
		{
			echo'<form action="login.php" method="post">
				<table width="470" border="0" cellpadding="0" cellspacing="0" class="tab_stred">
				
					<td colspan="2"><h2>Login</h2></td>
				  </tr>
				  <tr>
					<td>Email : </td>
					<td><input type="text" name="email" placeholder="Your Email" /></td>
				  </tr>
				  <tr>
					<td>Password : </td>
					<td><input type="password" name="password" placeholder="Your Password" /></td>
				  </tr>
				  <tr>
					<td height="41">&nbsp;</td>
					<td><div align="center"><input type="hidden" name="log" value="true" /><button class="blueButton">LOGIN</button></div></td>
				  </tr>
				  <tr>
					<td colspan="2"><a href=""></a></td>
				  </tr>
				  <tr>
					<td height="30" colspan="2"><a href="forgot_pass.php"><span id="result_box" lang="en" xml:lang="en">Forgot your password?</span></a></td>
				  </tr>
				  <tr>
					<td colspan="2"></td>
				  </tr>   <tr>
				   <td colspan="2"><h2>Register</h2></td>
				  </tr>
				  <tr>
					<td colspan="2"><a href="register.php" class="regi_span">Don´t have an account? Click here to register!</a></td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				   <tr>
					<td width="95">&nbsp;</td>
					<td width="365">&nbsp;</td>
				  </tr>
				  <tr>
				</table>
				</form>';
		}
	  ?>
      </div>
      <div class="mem_stat"><? reklama02();?></div>
    </div>
  </div>
</div>
<div style="clear:both"></div>
<div class="footer"></div>
<? echo scripts();?>
</body>
</html>
