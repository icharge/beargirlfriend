<? include('lib.php');?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
<title>Meme Maker Admin</title>
<? echo css();?><? echo scripts();?>
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

<style type="text/css">
html {
	background-image: none;
}
#versionBar {
	background-color:#212121;
	position:fixed;
	width:100%;
	height:35px;
	bottom:0;
	left:0;
	text-align:center;
	line-height:35px;
}
.copyright{
	text-align:center; font-size:10px; color:#CCC;
}
.copyright a{
	color:#A31F1A; text-decoration:none
}    
</style>

</head>
<body >
         
<div id="alertMessage" class="error"></div>
<div id="successLogin"></div>
<div class="text_success"><img src="images/loadder/loader_green.gif"  alt="Memesoftware.com" /><span>Please wait</span></div>

<div id="login" >
  
  <div class="inner">
  <div  class="logo" ><img src="images/logo_login.png" alt="Memesoftware.com" /></div>
  <div class="userbox"></div>
  <div class="formLogin">
  <?
  	$username = $_POST['username'];
	$password = $_POST['password'];
	$send = $_POST['send'];
	$p = md5($password);
	
  if($send=='true')
	{
		$pripoj = mysql_query("SELECT * FROM user WHERE (login='$username') AND (password='$p')");
			$count = mysql_num_rows($pripoj);
			if($count == 1)
				{
				$pripoje = mysql_query("SELECT * FROM user WHERE (login='$username') AND (password='$p')");
					while($row = mysql_fetch_object($pripoje))
						{	
							$userid = $row->id;
							mysql_query("DELETE FROM autorizaces WHERE userid = '$userid'");
							$SN = "autorizace";
							session_name("$SN");
							$sid = session_id();
							$time = date("U");
							mysql_query("INSERT INTO autorizaces VALUES ('','$sid','$userid','$time')");
							echo"<script> setTimeout( 'Login()', 2500 );</script>";
							
						}
				}
			else
				{
					echo'<form name="formLogin" id="formLogin" action="index.php" method="post">
					<p><font color="#ff0000">Failed Password or Username</font></p>
						  <div class="tip">
						  <input name="username" type="text" id="username_id"  title="Username"   />
						  </div>
						  <div class="tip">
						  <input name="password" type="password" id="password"   title="Password"  />
						  </div>
						  <div style="padding:20px 0px 0px 0px ;">
							<div style="float:left; padding:0px 0px 2px 0px ;">
							 <input type="hidden" name="send" value="true" />
						   <input type="checkbox" id="on_off" name="remember" class="on_off_checkbox"  value="1"   />
							  <span class="f_help">Remember me</span>
							  </div>
						  <div style="float:right;padding:2px 0px ;">
							  <div> 
								<ul class="uibutton-group">
								   <li><button class="uibutton normal" href="#"  id="but_login" >Login</button></li>
							   </ul>
							  </div>
							</div>
							</div>
						  </form>';
				}				
		}
	else
		{
		echo'<form name="formLogin" id="formLogin" action="index.php" method="post">
			  <div class="tip">
			  <input name="username" type="text"  id="username_id"  title="Username"   />
			  </div>
			  <div class="tip">
			  <input name="password" type="password" id="password"   title="Password"  />
			  </div>
			  <div style="padding:20px 0px 0px 0px ;">
				<div style="float:left; padding:0px 0px 2px 0px ;">
				 <input type="hidden" name="send" value="true" />
			   <input type="checkbox" id="on_off" name="remember" class="on_off_checkbox"  value="1"   />
				  <span class="f_help">Remember me</span>
				  </div>
			  <div style="float:right;padding:2px 0px ;">
				  <div> 
					<ul class="uibutton-group">
					   <li><button class="uibutton normal" href="#"  id="but_login" >Login</button></li>
				   </ul>
				  </div>
				</div>
				</div>
			  </form>';
		}	
  ?>
   
  </div>
</div>
  <div class="clear"></div>
  <div class="shadow"></div>
</div>
<div class="clear"></div>
<div id="versionBar" >
  <div class="copyright" >  Copyright &copy; 2013-2014  All Rights Reserved <span class="tip"><a  href="http://memesoftware.com" title="Meme Software" >Meme Software</a> </span> </div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="components/effect/jquery-jrumble.js"></script>
<script type="text/javascript" src="components/ui/jquery.ui.min.js"></script>     
<script type="text/javascript" src="components/tipsy/jquery.tipsy.js"></script>
<script type="text/javascript" src="components/checkboxes/iphone.check.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</body>
</html>