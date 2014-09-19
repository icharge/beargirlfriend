<?
include('lib.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta charset="UTF-8">
<title><? echo title();?> - Make Your Memes Fast And Easy!</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<? echo meta();?>
<script type="text/javascript">
      var word_list = [
        {text: "meme", weight: 13, html: {title: "Meme", "class": "custom-class"}, link: {href: "memes.php?memes=meme"}},
        {text: "maker", weight: 10.5, html: {title: "Maker", "class": "custom-class"}, link: {href: "memes.php?memes=maker"}},
        {text: "me gusta", weight: 9.4, html: {title: "me gusta", "class": "custom-class"}, link: {href: "memes.php?memes=me gusta"}},
        {text: "forever alone", weight: 8, html: {title: "forever alone", "class": "custom-class"}, link: {href: "memes.php?memes=forever alone"}},
        {text: "trollface", weight: 6.2, html: {title: "trollface", "class": "custom-class"}, link: {href: "memes.php?memes=trollface"}},
        {text: "Derp", weight: 5, html: {title: "Derp", "class": "custom-class"}, link: {href: "memes.php?memes=Derp"}},
        {text: "troll", weight: 5, html: {title: "troll", "class": "custom-class"}, link: {href: "memes.php?memes=troll"}},
        {text: "fap fap fap", weight: 5, html: {title: "fap fap fap", "class": "custom-class"}, link: {href: "memes.php?memes=fap fap fap"}},
        {text: "rage", weight: 5, html: {title: "rage", "class": "custom-class"}, link: {href: "memes.php?memes=rage"}},
        {text: "problem?", weight: 4, html: {title: "problem?", "class": "custom-class"}, link: {href: "memes.php?memes=problem?"}},
        {text: "true story", weight: 4, html: {title: "true story", "class": "custom-class"}, link: {href: "memes.php?memes=true story"}},
        {text: "bitch please", weight: 3, html: {title: "bitch please", "class": "custom-class"}, link: {href: "memes.php?memes=bitch please"}},
        {text: "challenge accepted", weight: 3, html: {title: "challenge accepted", "class": "custom-class"}, link: {href: "memes.php?memes=challenge accepted"}},
        {text: "okay guy", weight: 3, html: {title: "okay guy", "class": "custom-class"}, link: {href: "memes.php?memes=okay guy"}},
        {text: "le", weight: 3, html: {title: "le", "class": "custom-class"}, link: {href: "memes.php?memes=le"}},
        {text: "cereal guy", weight: 3, html: {title: "cereal guy", "class": "custom-class"}, link: {href: "memes.php?memes=cereal guy"}},
        {text: "alone", weight: 3, html: {title: "alone", "class": "custom-class"}, link: {href: "memes.php?memes=alone"}},
        {text: "rage comics", weight: 2, html: {title: "rage comics", "class": "custom-class"}, link: {href: "memes.php?memes=rage comics"}},
        {text: "LOL", weight: 2, html: {title: "LOL", "class": "custom-class"}, link: {href: "memes.php?memes=LOL"}},
        {text: "no", weight: 2, html: {title: "no", "class": "custom-class"}, link: {href: "memes.php?memes=no"}},
        {text: "fuck yea", weight: 1, html: {title: "fuck yea", "class": "custom-class"}, link: {href: "memes.php?memes=fuck yea"}},
        {text: "okay", weight: 1, html: {title: "okay", "class": "custom-class"}, link: {href: "memes.php?memes=okay"}},
        {text: "FFFUUUU", weight: 1, html: {title: "Meme", "class": "custom-class"}, link: {href: "memes.php?memes=FFFUUUU"}},
      ];
      $(function() {
        $("#my_favorite_latin_words").jQCloud(word_list);
      });
	  
    </script>
<script type="text/javascript">
$(function(){
    $(".playlist").hide();
    $(".player").hover(
        function(){ $(".playlist").slideDown(); },
        function(){ $(".playlist").slideUp(); }
    );
});
</script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=512581982091695";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
 
$(document).ready(function(){
 
        $(".slidingDiv").hide();
        $(".show_hide").show();
 
    $('.show_hide').click(function(){
    $(".slidingDiv").slideToggle();
    });
 
});
 
</script>
<?

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
    <div class="meme_menu"> <? echo meme_menu(); ?> </div>
    <div class="social">
      <div class="fb-like" data-href="https://www.facebook.com/pages/Memesoftwarecom/478564828840749?fref=ts" data-send="false" data-layout="box_count" data-width="75" data-show-faces="false"></div>
      <div class="tw-like"> <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://mememaker.me">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
      </div>
      <div class="g-like">
        <div class="g-plusone" data-size="medium" data-href="http://mememaker.me"></div>
        <script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
      </div>
    </div>
    <div class="info"><span class="show_hide sho_hide"><a href="#" title="Make The Best Meme!"><img src="images/tlacitko.png" alt="LOL"></a></span>
      <div class="slidingDiv">
        <table class="tab_inde">
          <tr>
            <td><h2>Your Meme Maker TEXT</h2></td>
          </tr>
          <tr>
            <td><p><strong>Meme Maker</strong> is the site bringing a host of exciting memes helping an individual to proliferate his or her message speedily on social media channels. Memes are a type of content with high viral capabilities that pass from person to person. The site owners believe in the rapid creation of memes and they also allow the registered users to make and upload memes to create hypes on social networking sites. </p></td>
          </tr>
          <tr>
           
        </table>
      </div>
    </div>
    <div class="vypis_mem"> <span class="bgBlue"></span> <span class="bgGrey"></span>
      <div class="mem_stats"> 
        <div class="mem_state"> <? reklama02();?></div>
        <div class="mem_menu"> <? echo ranks_right();?> </div>
        <div class="mem_statf"></div>
        <div class="bothed"></div>
        <div class="mem_statots">
          <div id="my_favorite_latin_words" class="tag_cloud" ></div>
        </div>
        <div class="mem_statpo"><? reklama03();?> </div>
        <script>
var header = document.querySelector('.mem_statpo');
var origOffsetY = header.offsetTop;

function onScroll(e) {
  window.scrollY >= origOffsetY ? header.classList.add('header') :
                                  header.classList.remove('header');
}

document.addEventListener('scroll', onScroll);
</script>
      </div>
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
						
						
							echo'<div class="mem_im">
							<div class="image_menu">
							  <div class="mem_title"><a href="'.$row->id.'-'.$title.'" title="'.$row->title.'"><h3>'.$row->title.'</h3></a></div>
							  <div class="mem_fb">
							  
							   <div class="facebook"><div class="fb-like" data-href="http://mememaker.me/'.$row->id.'-'.$title.'" data-send="false" data-layout="button_count" data-width="75" data-show-faces="false"></div></div>
							  </div>
							  <div class="mem_ranks"> <a href="/'.$vote_url.'" class="pluse">'.$row->plus.'</a><div class="mem_stav">'.$row->celkem.'</div><a href="'.$un_url.'" class="minus">'.$row->minus.'</a> </div>
							</div>
							<div class="image_im"><a href="'.$row->id.'-'.$title.'"><img src="images/created/'.$row->name.'" alt="'.$row->title.'" title="'.$row->title.'" width="486" /></a></div>
						  </div>';
						  if($max_stranek > $url_page){echo' <div class="right_pags"><a href="page'.$url_page.'"></a></div>';}
						 
						  echo'<div class="meme_spacer"></div>';
							}
							
						  
						
								
		
		
		
		echo'<div class="paginge">';
		if($url_page>1){echo'<div class="paginge_left"><a href="page'.$url_page_p.'"><img src="images/previous.png" alt="previous_meme"></a></div>';}
		if($max_stranek > $url_page){echo'<div class="paginge_right"><a href="page'.$url_page.'"><img src="images/next.png" alt="next_meme"></a></div>';}
		
		echo'</div>';
	 ?>
    </div>
  </div>
</div>
<div class="both"></div>
<a href="#" class="top">TOP</a>
<div class="footer">
  <table class="tableses">
    <tr>
      <td><ul>
          <li><a href="http://www.memesoftware.com" title="Home">Powered by Memesoftware.com</a></li>
          
      <td><p>Meme is a broad word that contains various meanings when used in different perspectives. Meme maker is one <br>
          of the famous online apps today. It merely relates to any idea spreads all over the web. It can be images, videos, <br>
          audio files, quotes, stories and others the term meme is not limited though it is more about images.  This idea is<br>
          very famous and there is no doubt that it became viral especially when meme became a part of Facebook. <br>
          There are merely millions of Facebook users these days that are actually opening the meme maker app and it <br>
          is just so impossible for an app to become unnoticed especially now that social media is so famous. </p></td>
      <td><ul  class="socials clearfix">
          <li class="fb" title="Follow us on Facebook!"><a href="https://www.facebook.com/pages/Mememakerme/195974057199386" target="_blank"></a></li>
          <li class="tw" title="Follow us on Twitter!"><a href="https://twitter.com/Mememakerme" target="_blank"></a></li>
          <li class="rss" title="RSS Feed"></li>
        </ul></td>
    </tr>
  </table>
</div>
<? echo scripts();?>
</body>
</html>
