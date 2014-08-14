<?
include('lib.php');
?>
<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" lang="cs">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo title();?> | Forgot password</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<? echo meta();?>
</head>
<body>
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
  <div class="reklama_left">
  <? reklama01();?>
  </div>
  <div class="page_right">
    <div class="vypis_mem"> <span class="bgBlue"></span> <span class="bgGrey"></span>
      <div class="login">
        <?
	  $forg = $_POST['forg'];
	  $email = $_POST['email'];
	  	
	  if($forg == 'true')
	  	{

			  $mozne_znaky = 'abcdefghijklmnopqrstuvwxyz123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			  $vystup = '';
			  $pocet_moznych_znaku = strlen($mozne_znaky);
			  for ($i=0;$i<6;$i++) {
			$vystup .= $mozne_znaky[mt_rand(0,$pocet_moznych_znaku - 1)];
			}

			
			$passe = $vystup;
			$to = $email;
			$subject = 'Forgot password';
			$message = "Your new password :  ".$passe."";
			$headers = "From: info@memefaces.me\r\nReply-To: info@memefaces.me";
			$mail_sent = @mail( $to, $subject, $message, $headers );
			
			$pass = md5($passe);
			
			mysql_query("UPDATE users SET password='$pass' WHERE email = '$email'");
			
			echo'New password was sent your to email <a href="login.php" class="blueButton">OK</a>';
		}
	else
		{
			echo'<form action="forgot_pass.php" method="post">
					<table width="365" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
					   <td colspan="2"><h2>Forgot your password ? </h2></td>
					  </tr>
					  <tr>
						<td width="95">Mail : </td>
						<td width="365"><input type="text" name="email" placeholder="Your Email" /></td>
					  </tr>
					  <tr>
						<td height="41">&nbsp;</td>
						<td><div align="center"><input type="hidden" name="forg" value="true" /><button class="blueButton">Send new password</button></div></td>
					  </tr>
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
<script type='text/javascript'>
            $(function() {
                $('#activator').click(function(){
                    $('#overlay').fadeIn('fast',function(){
                        $('#box').animate({'top':'100px'},500);
                    });
                });
                $('#boxclose').click(function(){
                    $('#box').animate({'top':'-1000px'},500,function(){
                        $('#overlay').fadeOut('fast');
                    });
                });

            });
        </script>
<? echo scripts();?>
</body>
</html>
