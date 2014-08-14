<?
include('lib.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo title();?> | Rankings</title>
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
  <div class="reklama_left">
<? reklama01();?>
  </div>
  <div class="page_right">
    <div class="meme_menu"> <? echo meme_menus(); ?> </div>
    <div class="vypis_mem"> <span class="bgBlue"></span> <span class="bgGrey"></span>
      <div class="mem_stats">
        <div class="mem_state">
  <? reklama02();?>
        </div>
		<div class="mem_stat">
      <? reklama03();?>
      </div>
        <div class="mem_menu"> </div>
      </div>
      <div class="mem_im"><h2>Rankings <? echo $_GET['best']; ?></h2>
	  <table width="490" border="0" align="center" cellpadding="0" cellspacing="0" class="tab_rank">
  <tr>
    <td width="150" colspan="2" class="tr_h"><div align="center"><strong>NAME</strong></div></td>
    <td width="86" class="tr_h"><div align="center"><strong>CREATOR <br>
      SCORE  </strong></div></td>
    <td width="79" class="tr_h"><div align="center"><strong>UPLOAD SCORE </strong></div></td>
    <td width="76" class="tr_h"><div align="center"><strong>VOTE SCORE </strong></div></td>
    <td width="97" class="tr_h"><div align="center"><strong>TOTAL<br> 
      SCORE </strong></div></td>
  </tr>
 <?
 	if(empty($_GET['best']))
		{mysql_query("DELETE FROM ranking");
			$count = 1;	
			$pripoe = mysql_query("SELECT * FROM users WHERE stav = '1' ORDER BY score DESC LIMIT 0,5000");
			while($ro = mysql_fetch_object($pripoe))
				{
					$pripor = mysql_query("SELECT * FROM make WHERE userid = '$ro->id'");
					$make = mysql_num_rows($pripor);
					$pripr = mysql_query("SELECT * FROM upload WHERE userid = '$ro->id'");
					$upload = mysql_num_rows($pripr);
					$prir = mysql_query("SELECT * FROM voted WHERE userid = '$ro->id'");
					$voted = mysql_num_rows($prir);

					 mysql_query("INSERT INTO ranking VALUES ('','$ro->id','$count','$upload','$make','$voted')"); 
					 $count = $count + 1;
		
				}
		$counte = 1;			
		$pripoef = mysql_query("SELECT * FROM users WHERE stav = '1' ORDER BY score DESC LIMIT 0,100");
			while($rof = mysql_fetch_object($pripoef))
				{
					$priporf = mysql_query("SELECT * FROM make WHERE userid = '$rof->id'");
					$makef = mysql_num_rows($priporf);
					$priprt = mysql_query("SELECT * FROM upload WHERE userid = '$rof->id'");
					$uploadt = mysql_num_rows($priprt);
					$prirt = mysql_query("SELECT * FROM voted WHERE userid = '$rof->id'");
					$votedt = mysql_num_rows($prirt);
					
			if($counte == 1)
				{
				echo'<tr>
					<td colspan="6">
					<div class="mem_menu_firstz">
					<div class="meme_namez">
					  <div class="counf">'.$counte.'.</div>
					  <a href="profil.php?user='.$rof->id.'">'.$rof->name.'</a></div>
					<div class="meme_pointz">'.$rof->score.'</div>
					<div class="meme_pointz">'.$votedt.'</div>
					<div class="meme_pointz">'.$uploadt.'</div>
					<div class="meme_pointz">'.$makef.'</div>
				  </div>
					</td>
					  </tr>';
				}
				
			if($counte == 2)
				{
				echo'<tr>
					<td colspan="6">
					<div class="mem_menu_secondz">
					<div class="meme_namez">
					  <div class="couns">'.$counte.'.</div>
					  <a href="profil.php?user='.$rof->id.'">'.$rof->name.'</a></div>
					<div class="meme_pointz">'.$rof->score.'</div>
					<div class="meme_pointz">'.$votedt.'</div>
					<div class="meme_pointz">'.$uploadt.'</div>
					<div class="meme_pointz">'.$makef.'</div>				
				  </div>
					</td>
					  </tr>';
				}
				
			if($counte == 3)
				{
				echo'<tr>
					<td colspan="6">
					<div class="mem_menu_therdz">
					<div class="meme_namez">
					  <div class="count">'.$counte.'.</div>
					  <a href="profil.php?user='.$rof->id.'">'.$rof->name.'</a></div>
					<div class="meme_pointz">'.$rof->score.'</div>
					<div class="meme_pointz">'.$votedt.'</div>
					<div class="meme_pointz">'.$uploadt.'</div>
					<div class="meme_pointz">'.$makef.'</div>
				  </div>
					</td>
					  </tr>';
				}
				
			if($counte > 3)
				{
				echo'<tr>
					<td colspan="6">
					<div class="mem_menu_itemz">
					<div class="meme_namez">
					  <div class="coun">'.$counte.'.</div>
					  <a href="profil.php?user='.$rof->id.'">'.$rof->name.'</a></div>
					<div class="meme_pointz">'.$rof->score.'</div>
					<div class="meme_pointz">'.$votedt.'</div>
					<div class="meme_pointz">'.$uploadt.'</div>
					<div class="meme_pointz">'.$makef.'</div>
				  </div>
					</td>
					  </tr>';
				}	
					
					  
					 $counte = $counte + 1;
				}	
		}
	else
		{
			if($_GET['best'] == 'uploader'){$scorede = 'upload_count';}
			if($_GET['best'] == 'voter'){$scorede = 'voted_count';}
			if($_GET['best'] == 'maker'){$scorede = 'make_count';}
			$countr = 1;	
		 	$pripoere = mysql_query("SELECT * FROM ranking ORDER BY ".$scorede." DESC LIMIT 0,100");
					while($rote = mysql_fetch_object($pripoere))
					{
						$ides = $rote->userid;

					
		$pripoer = mysql_query("SELECT * FROM users WHERE (stav = '1') AND (id = '$ides') ORDER BY score DESC LIMIT 0,100");
					while($rot = mysql_fetch_object($pripoer))
						{
							$pripor = mysql_query("SELECT * FROM make WHERE userid = '$rot->id'");
							$make = mysql_num_rows($pripor);
							$pripr = mysql_query("SELECT * FROM upload WHERE userid = '$rot->id'");
							$upload = mysql_num_rows($pripr);
							$prir = mysql_query("SELECT * FROM voted WHERE userid = '$rot->id'");
							$voted = mysql_num_rows($prir);
			if($countr == 1)
				{
				echo'<tr>
					<td colspan="6">
					<div class="mem_menu_firstz">
					<div class="meme_namez">
					  <div class="counf">'.$countr.'.</div>
					  <a href="profil.php?user='.$rot->id.'">'.$rot->name.'</a></div>
					<div class="meme_pointz">'.$rot->score.'</div>
					<div class="meme_pointz">'.$voted.'</div>
					<div class="meme_pointz">'.$upload.'</div>
					<div class="meme_pointz">'.$make.'</div>
				  </div>
					</td>
					  </tr>';
				}
				
			if($countr == 2)
				{
				echo'<tr>
					<td colspan="6">
					<div class="mem_menu_secondz">
					<div class="meme_namez">
					  <div class="couns">'.$countr.'.</div>
					  <a href="profil.php?user='.$rot->id.'">'.$rot->name.'</a></div>
					<div class="meme_pointz">'.$rot->score.'</div>
					<div class="meme_pointz">'.$voted.'</div>
					<div class="meme_pointz">'.$upload.'</div>
					<div class="meme_pointz">'.$make.'</div>
				  </div>
					</td>
					  </tr>';
				}
				
			if($countr == 3)
				{
				echo'<tr>
					<td colspan="6">
					<div class="mem_menu_therdz">
					<div class="meme_namez">
					  <div class="count">'.$countr.'.</div>
					  <a href="profil.php?user='.$rot->id.'">'.$rot->name.'</a></div>
					<div class="meme_pointz">'.$rot->score.'</div>
					<div class="meme_pointz">'.$voted.'</div>
					<div class="meme_pointz">'.$upload.'</div>
					<div class="meme_pointz">'.$make.'</div>
				  </div>
					</td>
					  </tr>';
				}
				
			if($countr > 3)
				{
				echo'<tr>
					<td colspan="6">
					<div class="mem_menu_itemz">
					<div class="meme_namez">
					  <div class="coun">'.$countr.'.</div>
					  <a href="profil.php?user='.$rot->id.'">'.$rot->name.'</a></div>
					<div class="meme_pointz">'.$rot->score.'</div>
					<div class="meme_pointz">'.$voted.'</div>
					<div class="meme_pointz">'.$upload.'</div>
					<div class="meme_pointz">'.$make.'</div>
				  </div>
					</td>
					  </tr>';
				}	
				$countr = $countr + 1;	
				
						}
						 
					}
			
		}
	
 
 ?>
</table>
 </div>
    </div>
  </div>
</div>
<div style="clear:both"></div>
<div class="footer">
</div>
<? echo scripts();?>
</body>
</html>
