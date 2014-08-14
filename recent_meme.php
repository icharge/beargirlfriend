<?
include('lib.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo title();?> | Recent meme</title>
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
 
});</script>
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
  <div class="reklama_left"> <? reklama01();?> </div>
  <div class="page_right">
    <div class="meme_menu"> <? echo meme_menu(); ?> </div>
    <div class="social">
      <div class="fb-like" style="float:left;" data-href="https://www.facebook.com/pages/Mememakerme-The-Best-Meme-Maker/195974057199386" data-send="false" data-layout="box_count" data-width="75" data-show-faces="false"></div>
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
            <td><h2>Meme Maker Brings a Range of Exciting Memes to Create Hypes on Social Media</h2></td>
          </tr>
          <tr>
            <td><p>August 29, 2012 – <strong>Meme Maker</strong> is the site bringing a host of exciting memes helping an individual to proliferate his or her message speedily on social media channels. Memes are a type of content with high viral capabilities that pass from person to person. The site owners believe in the rapid creation of memes and they also allow the registered users to make and upload memes to create hypes on social networking sites. </p></td>
          </tr>
          <tr>
            <td><p>The founder of Mememaker.me, Martin believes, “Memes are supposed to be light-hearted but they can convey a marketing message very effectively, if created with an underlined intended goal. We have a large collection of memes, both user generated and created by us, that can engage the audience and deliver the intended message as well.” </p></td>
          </tr>
          <tr>
            <td><p>According to Martin, meme creation has been in existence for some time and at the present time, they are internet’s favorite phenomena for creating highly viral content. He says that it’s a cultural element and each meme can be attributed to an individual’s personal taste, belief and choices. This is the reason memes can have a wide variety and an internet savvy person can always use them to deliver intended message to their target audience. Considering the importance of memes, Martin founded this <strong>meme creator</strong> site which is today very popular among the <strong>meme generator</strong> community. </p></td>
          </tr>
          <tr>
            <td><p>Martin claims that numerous hottest memes are available on his site and users are actually enjoying this huge collection. Many social marketers are quite regular on his site to make use of exceptional memes for audience engagement. Memes have become a veritable tool for sharing viral content over internet and create awareness on various products, services or issues. </p></td>
          </tr>
          <tr>
            <td><p>Pavel is a very talented engineer and artist who takes care of the technological aspects of the <strong>meme generator</strong> on the site. He assures that the site has scores of technologically and creatively excellent memes and stresses upon the need of knowing the audience before selecting memes for creating some viral content. According to him, audience’s tastes and language are the key determinants to choose memes from a particular genre besides adding a great sense of humor. </p></td>
          </tr>
          <tr>
            <td><p>Lucie, another important team member of <strong>Meme Maker</strong>, uses her insight to help select the best meme pictures that can resonate with the focused target audience and convey the message in the best possible manner. Anyone can register on their site <a href="http://mememaker.me">www.mememaker.me</a> to check, create, upload and share numerous memes. </p></td>
          </tr>
          <tr>
            <td><h2>About Meme Maker</h2></td>
          </tr>
          <tr>
            <td><p>Website: <a href="http://mememaker.me">www.mememaker.me</a></p></td>
          </tr>
          <tr>
            <td><p> Meme Maker is a team of young people who are net savvy and creative and constantly endeavor to create something funny. Founded by Martin, a 25-year-old student, the site strives to provide memes that can be used by people as a communication or a promotional tool. They offer a large collection of memes and promise to keep on adding new ones on a regular basis. </p></td>
          </tr>
          <tr>
            <td><h2>Customer Care: Meme Maker</h2></td>
          </tr>
          <tr>
            <td><p>Should you have any question, or want to know more about the memes and how can you use for your benefit, you can contact them at: info@mememaker.me</p></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="vypis_mem"> <span class="bgBlue"></span> <span class="bgGrey"></span>
      <div class="mem_stats">
        <div class="mem_state"><? reklama02();?> </div>
        <div class="mem_menu"> <? echo ranks_right();?> </div>
        <div class="mem_stat">
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
	if($url_page>1){echo'<div class="left_pags"><a href="recent_meme.php?page='.$url_page_p.'"></a></div>';}	
	 $pri = mysql_query("SELECT * FROM images WHERE stav = '1' ORDER BY id DESC LIMIT ".intval($pocet).",$po");
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
							<div class="image_im"><a href="'.$row->id.'-'.$title.'" ><a href="'.$row->id.'-'.$title.'" ><img src="images/created/'.$row->name.'" alt="'.$row->title.'" title="'.$row->title.'" width="486" /></a></div>
						  </div>
						  <div class="meme_spacer"></div>';
							}
							
						  
						 
		
		if($max_stranek > $url_page){echo' <div class="right_pags"><a href="recent_meme.php?page='.$url_page.'"></a></div>';}
		echo'<div class="paginge">';
		if($url_page>1){echo'<div class="paginge_left"><a href="recent_meme.php?page='.$url_page_p.'"><img src="images/previous.png" alt="previous_meme"></a></div>';}
		if($max_stranek > $url_page){echo'<div class="paginge_right"><a href="recent_meme.php?page='.$url_page.'"><img src="images/next.png" alt="next_meme"></a></div>';}
		echo'</div>';
	 ?>
    </div>
  </div>
</div>
<div style="clear:both"></div>
<a href="#" class="top">TOP</a>
<div class="footer"> </div>
<? echo scripts();?>
</body>
</html>
