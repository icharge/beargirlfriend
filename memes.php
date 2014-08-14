<?
include('lib.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo title();?></title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<? echo meta();?>
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
  <div class="reklama_left"><? reklama01();?></div>
  <div class="page_right">
    <? 
  if(empty($_POST['memes'])){$memes = $_GET['memes'];}
	  else {$memes = $_POST['memes'];}
	  echo'<h3>Search Result For : "'.$memes.'"</h3>';
  ?>
    <div class="vypis_mem"> <span class="bgBlue"></span> <span class="bgGrey"></span>
      <div class="mem_stats">
        <div class="mem_state"> <? reklama02();?>
         
        </div>
        <div class="mem_stat"><? reklama03();?> </div>
      </div>
      <?
	  
	  if(empty($memget)){$memes = $_POST['memes'];}
	  else {$memes = $_GET['memes'];}

	 $prir = mysql_query("SELECT * FROM images WHERE (stav = '1') AND (title LIKE '%$memes%' ) ORDER BY id DESC LIMIT 0,20");
	 	$pocer_ra = mysql_num_rows($prir);
		if($pocer_ra == 0){echo'<p>No result</p>';}
	 $pri = mysql_query("SELECT * FROM images WHERE (stav = '1') AND (title LIKE '%$memes%' ) ORDER BY id DESC LIMIT 0,20");
					while($row = mysql_fetch_object($pri))
						{
							
							if(empty($userid)){$un_url = 'login.php';}
							else{$un_url = 'memes.php?vote='.$row->id.'';}
							if(empty($userid)){$vote_url = 'login.php';}
							else{$un_url = 'memes.php?vote='.$row->id.'';}
							$co = ' ';
							$cim = '-';
							$title = str_replace( $co, $cim, $row->title);
							$cor = ':';
							$cimr = '';
							$title = str_replace( $cor, $cimr, $title);
							echo'<div class="mem_im">
							<div class="image_menu">
							  <div class="mem_title"><a href="'.$row->id.'-'.$title.'" title="'.$row->title.'">'.$row->title.'</a></div>
							  <div class="mem_fb">
							   <div class="facebook"><div class="fb-like" data-href="http://mememaker.me/'.$row->id.'-'.$title.'" data-send="false" data-layout="button_count" data-width="75" data-show-faces="false"></div></div>
							  </div>
							  <div class="mem_ranks"> <a href="'.$un_url.'" class="pluse">'.$row->plus.'</a><div class="mem_stav">'.$row->celkem.'</div><a href="'.$vote_url.'" class="minus">'.$row->minus.'</a> </div>
							</div>
							<div class="image_im"><a href="'.$row->id.'-'.$title.'"><img src="images/created/'.$row->name.'" alt="'.$row->title.'" title="'.$row->title.'" width="486" /></a></div>
						  </div>';
						}
	 ?>
    </div>
  </div>
</div>
<div style="clear:both"></div>
<a href="#" class="top">TOP</a>
<div class="footer"></div>
<? echo scripts();?>
</body>
</html>
