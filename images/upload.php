<?
include('lib.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Meme Maker | Upload meme</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<? echo meta();?>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
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
  <div class="reklama_left">
  reklama
  </div>
  <div class="page_right">   
    <div class="vypis_mem"> <span class="bgBlue"></span> <span class="bgGrey"></span>
      <div class="mem_stats">
        <div class="mem_state">
     reklama
        </div>
		 <div class="mem_stat">
   reklama
      </div>
        <div class="mem_menu"> </div>
        
      </div>
      <div class="mem_im"> 
     <?
	 
$img = $_POST['img'];
$upl = $_POST['upl'];
$title = $_POST['title'];
$descr = $_POST['descr'];
$tags = $_POST['tags'];
$date = date("j.m.Y", Time());

if($upl == 'true')
	{
		
		$name_img = rand(100000000000000 , 999999999999999);
	
			$adresar = "/mememaker.g6.cz/web/images/created/"; 
			$obrazek = $adresar . $_FILES['img']['name'];
			$kon = explode('.',$_FILES['img']['name']);
			$obrazek_vel = $adresar . 
			 $kon = $kon[count($kon)-1];
			 
			$obrazekk = $name_img.'.'.$kon; 
			if($kon == 'png' or $kon == 'jpg' or $kon == 'jpeg' or $kon == 'JPG' or $kon == 'gif')
				{
				move_uploaded_file($_FILES['img']['tmp_name'],$adresar.$name_img.'.'.$kon);
				$velikost =  filesize($adresar.$name_img.'.'.$kon);
				if($velikost < 1000000)
					{
					
					if(empty($userid)){$userid = '99999999999';}
					
					mysql_query("INSERT INTO images VALUES ('','$userid','$title','$descr','$tags','$obrazekk','0','0','0','$date','1')");
					mysql_query("INSERT INTO upload VALUES ('','$userid','$obrazekk')");
					echo'The file was uploaded!';
					}
				else
					{
						echo'The file is too big ('.$velikost.' kb)';
						unlink($adresar.$name_img.'.'.$kon);
					}
					
					
				}
			else
				{
					echo'The file must have the extension .jpg, .png or .gif !';
				}
	}
	
	

			echo'<form action="upload.php" method="post" id="signupForm" enctype="multipart/form-data">
			  <table width="470" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
				  <td colspan="2"><h2 align="left"><img src="images/uploader.png" alt="Upload" width="54" align="absmiddle"> Upload Your Meme From PC</h2></td>
				</tr>
				<tr>
				  <td height="70" width="163">Only images format jpg, png or gif. Max size 1Mb</td>
				  <td width="297"><input type="file" name="img" /></td>
				</tr>
				<tr>
				  <td>Title (max 35 ch.) : </td>
				  <td><input type="text" id="title" class="inputer" name="title" maxlength="35"></td>
				</tr>
				<tr>
				  <td>Description : </td>
				  <td><input type="text" name="descr"></td>
				</tr>
				<tr>
				  <td>Tags (max 80 ch.) : </td>
				  <td><input type="text" name="tags" maxlength="80"></td>
				</tr>
				<tr>
				  <td>&nbsp;</td>
				  <td><input type="hidden" name="upl" value="true" />
					<button type="submit" class="blueButton" style="float:right;margin-right:79px;">Upload</button></td>
				</tr>
			  </table>
			</form>';
		
		?>
      </div>
    </div>
  </div>
</div>
<div style="clear:both"></div>
<div class="footer"></div>
<? echo scripts();?>
</body>
</html>
