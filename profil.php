<?
include('lib.php');
$useridr = $_GET['user'];
$p = mysql_query("SELECT * FROM users WHERE (stav = '1') AND (id = '$useridr')");
					while($rowe = mysql_fetch_object($p))
						{$title_meme = $rowe->name;}
?>
<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo title();?> |<? echo $title_meme?></title>
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
  <div class="reklama_left"><? reklama01();?> </div>
  <div class="page_right">
    <div class="profile_menu">
      <?
	$pripoj = mysql_query("SELECT * FROM users WHERE id = '$useridr'");
		while($row = mysql_fetch_object($pripoj))
			{
				echo'<div class="profile_menu_icon"><img src="images/user_profile.png" alt="'.$row->name.'" width="46" height="34" align="left" />'.$row->name.'</div>';
			}
		$user = $_GET['user'];
		$feed = $_GET['feed'];
		
		if($feed == 'true')
			{
				mysql_query("INSERT INTO feed_user VALUES ('','$userid','$user')");
				echo'<div class="feed_profil"><img src="images/feed_ok.png" alt="feed success" class="img_feedd"></div>';
			}
		else
			{
				$priew = mysql_query("SELECT * FROM feed_user WHERE (userid = '$userid') AND (feed_user = '$useridr')");
				$radky_feed = mysql_num_rows($priew);
				if($radky_feed == 0)
					{
						echo'<div class="feed_profil"><a href="profil.php?user='.$useridr.'&feed=true">Sign up feed</a></div>';
					}
				else
					{
						echo'<div class="feed_profil"><img src="images/feed_ok.png" alt="feed success" class="img_feedd"></div>';
					}
				
			}

	?>
    </div>
    <div class="vypis_mem"> <span class="bgBlue"></span> <span class="bgGrey"></span>
      <div class="mem_stats">
        <div class="mem_stat"> <? reklama02();?></div>
        <div class="mem_stat"> <? reklama03();?> </div>
        <div class="mem_menu"></div>
      </div>
      <div class="profile">
        <?
	
		
		$pripoj = mysql_query("SELECT * FROM users WHERE id = '$useridr'");
		while($row = mysql_fetch_object($pripoj))
			{
			$pripo = mysql_query("SELECT * FROM make WHERE userid = '$row->id'");
			$make = mysql_num_rows($pripo);
			$prip = mysql_query("SELECT * FROM upload WHERE userid = '$row->id'");
			$upload = mysql_num_rows($prip);
			$pri = mysql_query("SELECT * FROM voted WHERE userid = '$row->id'");
			$voted = mysql_num_rows($pri);
			$celkem = $make + $upload + $voted;
			mysql_query("UPDATE users SET score='$celkem' WHERE id = '$row->id'");
		
		$pri = mysql_query("SELECT * FROM ranking WHERE userid = '$useridr'");
		while($r = mysql_fetch_object($pri))
			{$poradi = $r->overal;}
		
	 
       echo' <div class="profile_stats">
          <div class="profile_rank">
            <div class="profile_rank_tit">Voter</div>
            <div class="profile_rank_point"><a href="rankings.php">'.$poradi.'.</a></div>
            <div class="profile_rank_stat">Score : '.$voted.' <br/>
              Ranked : '.$voted.'x</div>
          </div>
          <div class="profile_make">
            <div class="profile_make_tit">Maker</div>
            <div class="profile_make_point"><a href="rankings.php">'.$poradi.'.</a></div>
            <div class="profile_make_stat">Score : '.$make.' <br/>
              Ranked : '.$make.'x</div>
          </div>
          <div class="profile_upload">
            <div class="profile_upload_tit">Uploader</div>
            <div class="profile_upload_point"><a href="rankings.php">'.$poradi.'.</a></div>
            <div class="profile_upload_stat">Score : '.$upload.' <br/>
              Ranked : '.$upload.'x</div>
          </div>
        </div>
       
      </div>
	  <div class="profile_images">';
	  }
      
     $page = $_GET['page'];
      $radku = mysql_num_rows(mysql_query("SELECT * FROM images WHERE userid = '$useridr'"));
	    $po = 15; 
        $max_stranek = ceil($radku / $po);
		if(empty($page )){$pocet = $po;} 
 	    else{$page = $page ;}
		$pocet = $page * $po;
	    $url_page = $page + 1;
		$url_page_p = $page - 1;  

	$pripoj = mysql_query("SELECT * FROM images WHERE userid = '$useridr' LIMIT ".intval($pocet).",$po");
		while($row = mysql_fetch_object($pripoj))
			{
				$co = ' ';
						$cim = '-';
						$title = str_replace( $co, $cim, $row->title);
						$cor = ':';
						$cimr = '';
						$title = str_replace( $cor, $cimr, $title);
				echo'<div class="profile_img_item">
					 <div class="profile_img_hov"><a href="'.$row->id.'-'.$title.'">
				     <img src="images/created/'.$row->name.'" alt="'.$row->name.'" title="'.$row->title.'" /></a>
					 </div>
					 </div>';
			}
			
		echo'<div class="paginge">';
		if($url_page>1){echo'<div class="paginge_left"><a href="profil.php?page='.$url_page_p.'&user='.$useridr.'"><img src="images/previous.png" alt="previous_meme"></a></div>';}
		if($max_stranek > $url_page){echo'<div class="paginge_right"><a href="profil.php?page='.$url_page.'&user='.$useridr.'"><img src="images/next.png" alt="next_meme"></a></div>';}
		echo'</div>';
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
