<?
include('lib.php');
$p = mysql_query("SELECT * FROM users WHERE (stav = '1') AND (id = '$userid')");
					while($rowe = mysql_fetch_object($p))
						{$title_meme = $rowe->name;}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo title();?> |<? echo $title_meme?></title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link href="css/facebook.alert.css" rel="stylesheet" type="text/css">
<? echo meta();?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript" src="js/original.js"></script>
<script type="text/javascript" src="js/Tooltip.js"></script>
<script type="text/javascript" src="js/jquery_facebook.alert.js"></script>
<meta name="robots" content="noindex, nofollow">
</head>
<body>
<?
$updatee = $_POST['updatee'];

if($updatee == 'true')
	{
		$id_img_up = $_POST['id_img_up'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$tags = $_POST['tags'];
		$query = mysql_query("UPDATE images SET title='$title',description='$description',tags='$tags' WHERE id = $id_img_up");
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
  <div class="reklama_left"><? reklama01();?> </div>
  <div class="page_right">
    <div class="profile_menu">
      <?
	$pripoj = mysql_query("SELECT * FROM users WHERE id = '$userid'");
		while($row = mysql_fetch_object($pripoj))
			{
				echo'<div class="profile_menu_icon"><img src="images/user_profile.png" alt="'.$row->name.'" width="46" height="34" align="left" />'.$row->name.'</div><div class="feed_profil">
				<form action="feed_stream.php" method="get">
				
				<select name="user" style="float:left; margin-top:10px;"><option value="">FEED</option>';
				
			$p = mysql_query("SELECT * FROM feed_user WHERE userid = '$userid'");
				while($r = mysql_fetch_object($p))
					{						
				
				$pr = mysql_query("SELECT * FROM users WHERE id = '$r->feed_user'");
					while($ro = mysql_fetch_object($pr))
						{
							echo'<option value="'.$ro->id.'">'.$ro->name.'</option>';
						}
						
					}
				
				

				echo'</select>
				<button class="blueButton" style=" width:65px; height:30px;font-size:12px;line-height:10px;padding:0;margin-top:5px;"  >Subscribe</button>
				</form>
				</div>';
			}
	?>
    </div>
    <?

$del = $_GET['del'];
$del_img = $_GET['del_img'];
	
if($del == 'true')
	{
		$pripoje = mysql_query("SELECT * FROM images WHERE (userid = '$userid') AND (name = '$del_img')");
		$radky = mysql_num_rows($pripoje);
		
		if($radky == 1)
			{
				unlink('images/created/'.$del_img.'');
				mysql_query("DELETE FROM images WHERE (userid = '$userid') AND (name = '$del_img')");
			}
			
	}
?>
    <div class="vypis_mem"> <span class="bgBlue"></span> <span class="bgGrey"></span>
      <div class="mem_stats">
        <div class="mem_stat"><? reklama02();?></div>
        <div class="mem_stat"> <? reklama03();?> </div>
        <div class="mem_menu"></div>
      </div>
      <div class="profile">
        <?
	
		
		$pripoj = mysql_query("SELECT * FROM users WHERE id = '$userid'");
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
		
		$pri = mysql_query("SELECT * FROM ranking WHERE userid = '$userid'");
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
         <div class="profile_score">Total score : '.$celkem.' </div>';
		
		$pripojt = mysql_query("SELECT * FROM thropy WHERE (userid = '$userid') AND (typ = '1')");
		$c_best_us = mysql_num_rows($pripojt);
		while($rowt = mysql_fetch_object($pripojt))
			{
				echo'<span class="thropty_item" title="Best user for month '.$rowt->date.'"><img src="images/thropy.png" alt="Best user for month '.$rowt->date.'" title="Best user for month '.$rowt->date.'"></span>';
			}
			
		$pripojte = mysql_query("SELECT * FROM thropy WHERE (userid = '$userid') AND (typ = '2')");
		$c_best_upload = mysql_num_rows($pripojte);
		while($rowte = mysql_fetch_object($pripojte))
			{
				echo'<span class="thropty_item" title="Best uploader for month '.$rowte->date.'"><img src="images/thropy.png" alt="Best uploader for month '.$rowte->date.'" title="Best user for month '.$rowte->date.'"></span>';
			}
			
		$pripojtu = mysql_query("SELECT * FROM thropy WHERE (userid = '$userid') AND (typ = '3')");
		$c_best_maker = mysql_num_rows($pripojtu);
		while($rowut = mysql_fetch_object($pripojtu))
			{
				echo'<span class="thropty_item" title="Best maker for month '.$rowut->date.'"><img src="images/thropy.png" alt="Best uploader for month '.$rowut->date.'" title="Best maker for month '.$rowut->date.'"></span>';
			}
			
		$pripojta = mysql_query("SELECT * FROM thropy WHERE (userid = '$userid') AND (typ = '4')");
		$c_best_voter = mysql_num_rows($pripojta);
		while($rowta = mysql_fetch_object($pripojta))
			{
				echo'<span class="thropty_item" title="Best ranker for month '.$rowta->date.'"><img src="images/thropy.png" alt="Best uploader for month '.$rowta->date.'" title="Best ranker for month '.$rowta->date.'"></span>';
			}
		
		if($c_best_us == 0 and $c_best_upload == 0 and $c_best_maker == 0 and $c_best_voter == 0)
			{
				 echo'';
			}

       echo'</div>
	  <div class="profile_images">';
	  }
	  $page = $_GET['page'];
      $radku = mysql_num_rows(mysql_query("SELECT * FROM images WHERE userid = '$userid'"));
	    $po = 15; 
        $max_stranek = ceil($radku / $po);
		if(empty($page )){$pocet = $po;} 
 	    else{$page = $page ;}
		$pocet = $page * $po;
	    $url_page = $page + 1;
		$url_page_p = $page - 1;
        
		
		$kolo = 1;
	$pripoj = mysql_query("SELECT * FROM images WHERE userid = '$userid' ORDER BY id DESC LIMIT ".intval($pocet).",$po");
		while($row = mysql_fetch_object($pripoj))
			{			$co = ' ';
						$cim = '-';
						$title = str_replace( $co, $cim, $row->title);
						$cor = ':';
						$cimr = '';
						$title = str_replace( $cor, $cimr, $title);
					echo'<script type="text/javascript">
					 $(document).ready(function(){
							$(".'.$row->id.'").hide();
							$(".show_hide'.$row->id.'").show();
						$(".show_hide'.$row->id.'").click(function(){
						$(".'.$row->id.'").slideToggle(); }); });
					 </script>';
				echo'<div class="simple-tooltip-content tooltip-content" id="simple-content-'.$kolo.'">
				<img src="images/created/'.$row->name.'" alt="'.$row->name.'" width="300" />
				</div>
					<div class="profile_img_item">
					 <div class="profile_img_hov"><div id="simple-target-'.$kolo.'">					 
					 <a href="'.$row->id.'-'.$title.'">
				     <img src="images/created/'.$row->name.'" alt="'.$row->name.'" title="'.$row->title.'" /></a></div>
					 </div>
					 <div class="profile_img_menu">
					 <span class="show_hide'.$row->id.' sho_hide'.$row->id.'">
					 <button class="blueButton" style=" width:65px; height:30px;font-size:12px;line-height:20px;padding:0;" >UPDATE</button></span>
					 <div class="'.$row->id.' slidingDive"> <br>

					 <strong>Change properties a meme</strong><br>
<br>

					 <form action="profile.php" method="post">
					 <table width="370" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td width="130">Title (max 35 ch.) :</td>
						<td><input type="text" name="title" value="'.$row->title.'" maxlength="35" /></td>
					  </tr>
					  <tr>
						<td>Description :</td>
						<td><input type="text" name="description" value="'.$row->description.'" /></td>
					  </tr>
					  <tr>
						<td>Tags (max 80 ch.) : </td>
				        <td><input type="text" name="tags" value="'.$row->tags.'"  maxlength="80" /></td>
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td><input type="hidden" name="updatee" value="true" />
						<input type="hidden" name="id_img_up" value="'.$row->id.'" />
						<a href="#"><button class="blueButton" style=" width:65px; height:30px;font-size:12px;line-height:30px;padding:0; float:left;" >UPDATE</button></a></td>
					  </tr>
					</table>
</form>
					  </div>
					  </form>';
					 
					 echo"<script type='text/javascript'>
							$(document).ready(function () {
					$('#delete_confirm".$kolo."').click(function () {
						jConfirm('Delete ".$row->title."?', 'Confirmation Dialog',
				
						function (r) {
							if (r == true) {
								window.location.href = 'profile.php?del_img=".$row->name."&del=true';
							}
						});
					});
				
				});			
						</script>
					  <a href='#' class='blueButton' style='float:right; width:60px; height:28px;font-size:12px;line-height:30px;padding:0;' id='delete_confirm".$kolo."'>DELETE</a>";
					
					 echo'</div>
					 </div>';
					 
					 $kolo = $kolo + 1;
			}
			
	echo'<div class="paginge">';
		if($url_page>1){echo'<div class="paginge_left"><a href="profile.php?page='.$url_page_p.'"><img src="images/previous.png" alt="previous_meme"></a></div>';}
		if($max_stranek > $url_page){echo'<div class="paginge_right"><a href="profile.php?page='.$url_page.'"><img src="images/next.png" alt="next_meme"></a></div>';}
		echo'</div>';
	?>
      </div>
    </div>
  </div>
</div>
<div style="clear:both"></div>
<div class="footer"></div>
<? echo scripts();?>
<script type="text/javascript">
 function deletechecked(message)
{
    var answer = confirm(message)
    if (answer){
        document.messages.submit();
    }
    
    return false;  
}  
</script>
</body>
</html>
