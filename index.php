<?
include('lib.php');

$tplf = "template/2014/";
include $tplf."head.php";
include $tplf."nav.php";
include $tplf."header.php";


//////////
$vote = $_GET['page'];
$text= "-uv";
$obsahuje = strpos($vote, $text);
if($obsahuje === false){}
else
	{
		$stropese = explode('-uv' , $vote);
		$voted = $stropese[1];
		empty($unvote);
	}

$texte= "-nv";
$obsahujew = strpos($vote, $texte);
if($obsahujew === false){}
else
	{
		$stropes = explode('-nv' , $vote);
		$unvote = $stropes[1];
		empty($voted);
	}

if(empty($voted)){}
else
{
	$pripo = mysql_query("SELECT * FROM voted WHERE (userid='$userid') AND (idimg = '$voted')");
	$radky_vote = mysql_num_rows($pripo);

		if($radky_vote == 0)
			{
				$prip = mysql_query("SELECT * FROM images WHERE id = '$voted'");
					while($row = mysql_fetch_object($prip))
						{
							$plus = $row->plus + 1;
							$celkem = $row->celkem + 1;
						}
							if($userid == 0){}
							else
								{
									mysql_query("INSERT INTO voted VALUES ('','$voted','$userid','1')");
									mysql_query("UPDATE images SET plus='$plus', celkem='$celkem' WHERE id = '$voted'");
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

  <div class="content content-2 clearfix">
<?
	    $jedna = explode('page' , $vote);
		$dve = $jedna[0];
		$tri = explode('-' , $dve);
		$page = $tri[0];


	    $radku = mysql_num_rows(mysql_query("SELECT * FROM images WHERE stav = '1'"));
	    $po = 10;
        $max_stranek = ceil($radku / $po);
		if(empty($page )){$pocet = $po;}
 	    else{$page = $page ;}
		$pocet = $page * $po;
	    $url_page = $page + 1;
		$url_page_p = $page - 1;
	  	$wheel = 1;

	  if($url_page>1){echo'<div class="left_pags"><a href="page'.$url_page_p.'"></a></div>';}
	 $pri = mysql_query("SELECT * FROM images WHERE stav = '1' ORDER BY celkem DESC LIMIT ".intval($pocet).",$po");
					while($row = mysql_fetch_object($pri))
						{
						if(empty($userid)){$un_url = 'login.php';}
						else{$un_url = 'page'.$page.'-nv'.$row->id.'';}
						if(empty($userid)){$vote_url = 'login.php';}
						else{$vote_url = 'page'.$page.'-uv'.$row->id.'';}

						$co = ' ';
						$cim = '-';
						$title = str_replace( $co, $cim, $row->title);
						$cor = ':';
						$cimr = '';
						$title = str_replace( $cor, $cimr, $title);


							// echo'<div class="mem_im">
							// <div class="image_menu">
							//   <div class="mem_title"><a href="'.$row->id.'-'.$title.'" title="'.$row->title.'"><h3>'.$row->title.'</h3></a></div>
							//   <div class="mem_fb">

							//    <div class="facebook"><div class="fb-like" data-href="http://mememaker.me/'.$row->id.'-'.$title.'" data-send="false" data-layout="button_count" data-width="75" data-show-faces="false"></div></div>
							//   </div>
							//   <div class="mem_ranks"> <a href="/'.$vote_url.'" class="pluse">'.$row->plus.'</a><div class="mem_stav">'.$row->celkem.'</div><a href="'.$un_url.'" class="minus">'.$row->minus.'</a> </div>
							// </div>
							// <div class="image_im"><a href="'.$row->id.'-'.$title.'"><img src="images/created/'.$row->name.'" alt="'.$row->title.'" title="'.$row->title.'" width="486" /></a></div>
						 //  </div>';

              echo <<<HTML
    <div class="post-item clearfix">
      <h2 class="post-item-title">{$row->title}</h2>
      <div class="post-item-infobar clearfix">
        <div class="post-item-profile-pic">
          <img class="_image _image-2" src="images/profilepicsmall.jpg">
        </div>
        <span class="post-item-owner">????</span>
        <div class="post-item-infobar-spectator"></div>
        <div class="post-item-time clearfix">
          <span class="_text">????</span>
        </div>
      </div>
      <div class="post-item-contentpic post-item-contentpic-1 clearfix">
        <img class="post-item-img" src="images/created/{$row->name}">
      </div>
      <div class="post-item-likebtn post-item-likebtn-1 clearfix">
        <img class="image" src="images/thumb-up_64.png">
      </div>
      <div class="post-item-likecount post-item-likecount-1 clearfix">
        <span class="_text _text-2">{$row->plus}</span>
      </div>
    </div>

HTML;

						  if($max_stranek > $url_page){echo' <div class="right_pags"><a href="page'.$url_page.'"></a></div>';}

						  echo'<div class="meme_spacer"></div>';
							}



		echo'<div class="paginge">';
		if($url_page>1){echo'<div class="paginge_left"><a href="page'.$url_page_p.'"><img src="images/previous.png" alt="previous_meme"></a></div>';}
		if($max_stranek > $url_page){echo'<div class="paginge_right"><a href="page'.$url_page.'"><img src="images/next.png" alt="next_meme"></a></div>';}

		echo'</div>';
	 ?>
  </div>
<? include $tplf."sidebar.php";?>
</body>
</html>
