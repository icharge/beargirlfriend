<?
include('lib.php');
if(empty($_GET['meme']))
{
if(empty($_GET['vote'])){$meme_id = $_GET['unvote'];}
else{$meme_id = $_GET['vote'];}


}
		
else{$meme_id = $_GET['meme'];}
$p = mysql_query("SELECT * FROM images WHERE (stav = '1') AND (id = '$meme_id')");
					while($rowe = mysql_fetch_object($p))
						{$title_meme = $rowe->title;}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo title();?> | <? echo $title_meme?></title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<? echo meta();?>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=512581982091695";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?
$vote = $_GET['vote'];
$unvote = $_GET['unvote'];

if(empty($vote)){}
else
{
	$pripo = mysql_query("SELECT * FROM voted WHERE (userid='$userid') AND (idimg = '$vote')");
	$radky_vote = mysql_num_rows($pripo);
	
		if($radky_vote == 0)
			{
				$prip = mysql_query("SELECT * FROM images WHERE id = '$vote'");
					while($row = mysql_fetch_object($prip))
						{
							$plus = $row->plus + 1;
							$celkem = $row->celkem + 1;
						}
							if($userid == 0){}
							else
								{
									mysql_query("INSERT INTO voted VALUES ('','$vote','$userid','1')");
									mysql_query("UPDATE images SET plus='$plus', celkem='$celkem' WHERE id = '$vote'");
								}
					
			}	
}

if(empty($unvote)){}
else
{
	$pripo = mysql_query("SELECT * FROM voted WHERE (userid='$userid') AND (idimg = '$unvote')");
	$radky_vot = mysql_num_rows($pripo);
	
		if($radky_vot == 0)
			{
				$prip = mysql_query("SELECT * FROM images WHERE id = '$unvote'");
					while($row = mysql_fetch_object($prip))
						{
							$minus = $row->minus + 1;
							$celkem = $row->celkem - 1;
						}
					
							if($userid == 0){}
							else
								{
									mysql_query("INSERT INTO voted VALUES ('','$unvote','$userid','2')");
									mysql_query("UPDATE images SET minus='$minus', celkem='$celkem' WHERE id = '$unvote'");
								}
			}	
}

?>
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
    <div class="vypis_mem"> <span class="bgBluee"></span> <span class="bgGreye"></span>
      <div class="mem_statse">
        <div class="mem_states">
         <? reklama02();?>
        </div>
      </div>
      <div class="mem">
        <?
		
	   
	  
	  $pr = mysql_query("SELECT * FROM images WHERE (stav = '1') AND (id < '$meme_id') ORDER BY id DESC LIMIT 1");
					while($ro = mysql_fetch_object($pr))
						{$pre = $ro->id;
						$co = ' ';
						$cim = '-';
						$titlese = str_replace( $co, $cim, $ro->title);
						$cor = ':';
						$cimr = '';
						$titlese = str_replace( $cor, $cimr, $titlese);}
						
		 $p = mysql_query("SELECT * FROM images WHERE (stav = '1') AND (id > '$meme_id') LIMIT 1  ");
					while($r = mysql_fetch_object($p))
						{$next = $r->id;
						 $co = ' ';
						$cim = '-';
						$titles = str_replace( $co, $cim, $r->title);
						$cor = ':';
						$cimr = '';
						$titles = str_replace( $cor, $cimr, $titles);}
	  

	   if($pre>1){echo'<div class="left_pag"><a href="'.$pre.'-'.$titlese.'"></a></div>';}


	  
	  
	 $pri = mysql_query("SELECT * FROM images WHERE (stav = '1') AND (id = '$meme_id')");
					while($row = mysql_fetch_object($pri))
						{
							$titleses = $row->title;
							 $co = ' ';
							$cim = '-';
							$titleses = str_replace( $co, $cim, $titleses);
							$cor = ':';
							$cimr = '';
							$titleses = str_replace( $cor, $cimr, $titleses);
							$imagesss = $row->name;
							$idess = $row->id;
							if(empty($userid)){$un_url = 'login.php';}
							else{$un_url = 'meme.php?vote='.$row->id.'';}
							if(empty($userid)){$vote_url = 'login.php';}
							else{$vote_url = 'meme.php?unvote='.$row->id.'';}
							$img = $row->name;
						
							echo'<div class="me_im">
							  <div class="imag_menu">
								<div class="mem_titlee"><a href="" title="'.$row->title.'">'.$row->title.'</a></div>
								<div class="mem_ranks"> <a href="'.$un_url.'" class="pluse">'.$row->plus.'</a><div class="mem_stav">'.$row->celkem.'</div><a href="'.$vote_url.'" class="minus">'.$row->minus.'</a> </div></div>
							  <div class="image_ime"><img src="images/created/'.$row->name.'" alt="'.$row->title.'" title="'.$row->title.'" width="620"  /></div>
							  <div class="image_menu_bote">
								<div class="menu_bot_lefte">Created : '.$row->date.'</div>
								<div class="menu_bot_tags">Tags : '.$row->tags.'</div>
								<div class="menu_bot_righte">';
								 $pr = mysql_query("SELECT * FROM users WHERE id = '$row->userid'");
									while($ro = mysql_fetch_object($pr))
										{
												echo'from : <a href="profil.php?user='.$ro->id.'">'.$ro->name.'</a>';
										}
								
								echo'</div> </div>';
								if($next>1){echo'<div class="right_pag"><a href="'.$next.'-'.$titles.'"></a></div>';}
							 echo'</div>';
						}
						

	  

	 ?>
	 <div class="meme_share"><table width="550" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="150"><div class="fb-like" data-href="<? echo $weburls;?>/<? echo $idess;?>-<? echo $titleses;?>" data-send="true" data-layout="button_count" data-width="150" data-show-faces="false"></div></td>
    <td width="80"><div class="g-plusone" data-href="<? echo $weburls;?>/<? echo $idess;?>-<? echo $titleses;?>"></div></td>
    <td width="80"><a href="https://twitter.com/share" class="twitter-share-button" data-via="Mememakerme" data-size="large">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></td>
    <td width="80"><a href="http://pinterest.com/pin/create/button/?url=<? echo $weburls;?>/<? echo $idess;?>-<? echo $titleses;?>&media=<? echo $weburls;?>/images/created/<? echo $img;?>&description=Meme%20Maker%20Is%20Best%20Memes%20Fun%20On%20The%20Internet" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a></td>
  </tr>
</table>
</div>
	 <div class="reklama_top">
	 <? reklama04();?></div>
<div class="fb_recom"><a href="http://www.facebook.com/dialog/feed?
  app_id=512581982091695&
  link=<? echo $weburls;?>/<? echo $idess;?>-<? echo $titleses;?>&
  picture=<? echo $weburls;?>/images/created/<? echo $imagesss;?>&
  name=<? echo $webtitles;?>&
  caption=<? echo $titleses;?>&
  description=Make A Memes Fast And Easy!&
  redirect_uri=<? echo $weburls;?>/<? echo $idess;?>-<? echo $titleses;?>"><img src="images/share_on_fb.png" alt="Share on Facebook"></a></div>
        <div class="fb-comments" style="margin-left:10px;" data-href="<? echo $weburls;?>/<? echo $idess;?>-<? echo $titleses;?>" data-num-posts="5" data-width="620"></div>
      </div>
    </div>
  </div>
</div>
<div style="clear:both"></div>
<div class="footer"></div>
<? echo scripts();?>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
</body>
</html>
