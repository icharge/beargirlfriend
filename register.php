<?
include('lib.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo title();?> | Register</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<? echo meta();?>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/cs_CZ/all.js#xfbml=1&appId=512581982091695";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="header">
  <div class="header_line">
    <div class="menu"> <? echo logo();?>
      <ul  class="navigation">
        <? echo navigation_li();?>
        <li ><? echo login();?></li>
      </ul>
      <? echo social(); ?> </div>
  </div>
  <div class="header_line_bot">
    <div class="meme_up"> <? echo meme_me(); ?> </div>
  </div>
</div>
<div class="page">
  <div class="reklama_left"><? reklama01();?> </div>
  <div class="page_right">
    <div class="vypis_mem"> <span class="bgBlue"></span> <span class="bgGrey"></span>
      <div class="mem_stats">
        <div class="mem_stat"> <? reklama02();?> </div>
        <div class="mem_stat"> <? reklama03();?> </div>
        <div class="mem_menu"> </div>
        
      </div>
      <div class="mem_im">
        <?
	  
	  $email = $_POST['email'];
	  $password = $_POST['password'];
	  $pass = $_POST['pass'];
	  $name = $_POST['name'];
	  $reg = $_POST['reg'];
	  $passe = md5($password);
	  
	  if($reg == 'true')
	  	{
			$pripoj = mysql_query("SELECT * FROM users WHERE email='$email'");
			$radku = mysql_num_rows($pripoj);
			
			if($password == $pass)
				{
					if($radku == 0)
						{
							mysql_query("INSERT INTO users VALUES('','','$email','$passe','$name','0','1')");
							
							$to = $email;
							$subject = 'Register Mememaker.me';
$message = "Hi (".$name."),

Thanks for signing up for Mememaker.me

 
Now that you have created your account, you may login here with the following account details:

Username: (".$email.")

Password: (The Password You Used At Signup)

 

Thanks for becoming a part of Mememaker.me
Enjoy the Meme fun!";
							$headers = "From: info@mememaker.me\r\nReply-To: info@smememaker.me";
							$mail_sent = @mail( $to, $subject, $message, $headers );
							
							echo'<span class="success">You have been registered.</span><br /><br /><br />';
					
						}
					else
						{
							echo'<span class="error">Email to this address is already registered.</span><br /><br /><br />';
						}
				
				}
			else
				{
					echo'<span class="error">Passwords do not match.</span><br /><br /><br />';
				}
		}
	  
	  ?>
        <form action="register.php" method="post">
          <table width="371" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2"><h2 align="left">Register on Memefaces.me</h2></td>
            </tr>
            <tr>
              <td width="128"><div align="left">Your Name : </div></td>
              <td width="272"><input type="text" name="name"  placeholder="Your Name" /></td>
            </tr>
            <tr>
              <td><div align="left">Email : </div></td>
              <td><input type="text" name="email"  placeholder="Your Email" /></td>
            </tr>
            <tr>
              <td><div align="left">Password :</div></td>
              <td><input type="password" name="password"  placeholder="Your Password" /></td>
            </tr>
            <tr>
              <td><div align="left">Password required :</div></td>
              <td><input type="password" name="pass"  placeholder="Required Password" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right">
                  <input type="hidden" name="reg" value="true" />
                  <button class="blueButton">REGISTER</button>
                </div></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<div style="clear:both"></div>
<div class="footer"></div>
<? echo scripts();?>
</body>
</html>
