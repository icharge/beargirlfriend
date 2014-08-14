<?
error_reporting(0);
include('js/facebook.php');

session_start();
$SN = "autorizace";
session_name("$SN");
$sid = session_id();
$at = date("U") - 18000;

$server = 'localhost';
$dblogin = 'root';
$password = '1234';
$database = 'memem';

$MC = mysql_connect($server, $dblogin, $password);
$MS = mysql_select_db($database);

$facebook = new Facebook(array(
	'appId'  => '512581982091695',
	'secret' => '2158c45a83287b71eaba0e4cafeae1e6',
	'cookie' => true
));
	
$pripoj = mysql_query("SELECT * FROM autorizace WHERE (sid = '$sid') AND (time > '$at')");
	while($row = mysql_fetch_object($pripoj))
				{$userid = $row->userid;
				 $time = $row->time;
				 $sidm = $row->sid;}
				 
$pripojdsadsa = mysql_query("SELECT * FROM settings WHERE id = 1");
	while($rowdsadas = mysql_fetch_object($pripojdsadsa))
				{$weburls = $rowdsadas->url;
				 $webtitles = $rowdsadas->title;
				 $webemails = $rowdsadas->email;}



//****************************************************** LOGOUT **************************************/	
$logout = $_GET['logout'];	
if($logout == 'true')
				{
					$SN = "autorizace";
					session_name("$SN");
					$sid = session_id();
					$at = date("U") - 18000;
					mysql_query("DELETE FROM autorizace WHERE sid = '$sid'");
					session_destroy();
				}
//****************************************************** MENU **************************************/	

function login()
{
	$SN = "autorizace";
	session_name("$SN");
	$sid = session_id();
	$at = date("U") - 18000;
	
	$pripoj = mysql_query("SELECT * FROM autorizace WHERE (sid = '$sid') AND (time > '$at')");
	while($row = mysql_fetch_object($pripoj))
				{$userid = $row->userid;
				 $time = $row->time;
				 $sidm = $row->sid;}
				 
	if($sid==$sidm & $time>$at)
		{
			echo'<span class="li_rie"><a href="profile.php" class="li_ri" title="profile">Profile</a></span><a href="index.php?logout=true" class="li_ri"  title="logout">Logout</a>';
		}
	else
		{
			echo'<a href="login.php" class="li_ri"  title="                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login / Register"><img src="images/login.png"  alt="login"/></a>';
		}
}

//****************************************************** META **************************************/
function meta()
{
	$priwisddsa = mysql_query("SELECT * FROM settings WHERE id = 1");
		while($rotisddsa = mysql_fetch_object($priwisddsa))
			{
				
			
	return"<link rel='stylesheet' type='text/css' href='css/jqcloud.css' />
	<link rel='shortcut icon' href='images/favicon.ico'>
			<meta name='Description' content='".$rotisddsa->descr."' />
			<meta name='keywords' content = '".$rotisddsa->keyword."' />
			<meta name='robots' content='index' />
			<meta name='author' content='Meme Software, www.memesoftware.com (www.memesoftware.com)' />
			<script type='text/javascript' src='js/jquery.min.js'></script>
			 <script type='text/javascript' src='js/jqcloud-1.0.1.js'></script>	";
			 }
}

function scripts()
{
	$soubor = fopen("admin/ads/ana.txt", "r");
	$ana1 = fread($soubor, 50000);
	fclose($soubor);
	return"".$ana1."
<script type='text/javascript'>
$('.top').click(function(){
          $('html, body').animate({ scrollTop: 0 }, 'slow');
})
</script>";
}

function meme_me()
{

$SN = "autorizace";
	session_name("$SN");
	$sid = session_id();
	$at = date("U") - 18000;
	
	$pripoj = mysql_query("SELECT * FROM autorizace WHERE (sid = '$sid') AND (time > '$at')");
	while($row = mysql_fetch_object($pripoj))
				{$userid = $row->userid;
				 $time = $row->time;
				 $sidm = $row->sid;}
				 
	if($sid==$sidm & $time>$at)
		{
			return'<a href="create.php" title="Make a meme!"><img src="images/make_a_meme.png" alt="make a meme" /></a><a href="upload.php" title="Upload a meme!"><img src="images/upload.png" alt="upload meme" /></a><a href="rankings.php" title="Rankings"> <img src="images/rank.png" alt="rank" /></a>';
		}
	else
		{
			return'<a href="create.php" title="Make a meme!"><img src="images/make_a_meme.png" alt="make a meme" /></a><a href="upload.php" title="Upload a meme!"><img src="images/upload.png" alt="upload meme" /></a><a href="rankings.php" title="Rankings"> <img src="images/rank.png" alt="rank" /></a>';
		}


}

function social()
{
	return'<ul  class="socials clearfix">
			<li class="fb" title="Follow us on Facebook!"><a href="https://www.facebook.com/pages/Memesoftwarecom/478564828840749" target="_blank"></a></li>
			<li class="tw" title="Follow us on Twitter!"><a href="https://twitter.com/memesoftware" target="_blank"></a></li>
			
		  </ul>
		  <div class="search"><form action="memes.php" method="post"><input type="text" name="memes" class="search_inp"  placeholder="Search a meme"/><input type="submit" value="GO" /></form></div>';
}

function meme_menu()
{

$pripoj = mysql_query("SELECT * FROM images WHERE stav = '1' ORDER BY id ASC");
	while($row = mysql_fetch_object($pripoj))
		{$prv_id = $row->id;}
$pripo = mysql_query("SELECT * FROM images WHERE stav = '1' ORDER BY id DESC");
	while($row = mysql_fetch_object($pripo))
		{$pos_id = $ro->id;}
$random = rand($prv_id , $pos_id);


	return'<h2> <a class="blueButton" href="index.php">TOP  MEMES</a> </h2><h2><a class="blueButton" href="top_meme.php">ALL MEMES</a></h2><h2><a class="blueButton" href="recent_meme.php">RECENT MEMES</a></h2><h2> <a class="blueButton" href="random_meme.php">RANDOM MEMES</a></h2>';
}

function meme_menus()
{
	return'<a class="blueButton" href="rankings.php">TOTAL</a> <a class="blueButton" href="bestmaker">BEST MAKER</a> <a class="blueButton" href="bestuploader">BEST UPLOADER</a> <a class="blueButton" href="bestvoter">BEST VOTER</a>';
}


function ranks_right()
{
echo'<div class="mem_menu_nad"><a href="rankings.php" title="Rankings">TOP users on Memefaces.me</a></div>';


$pripoj = mysql_query("SELECT * FROM users WHERE stav = '1'");
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
		}
	$count = 1;	
	
$pripo = mysql_query("SELECT * FROM users WHERE stav = '1' ORDER BY score DESC LIMIT 0,7");
	while($ro = mysql_fetch_object($pripo))
		{	
			if($count == 1)
				{
				echo'<div class="mem_menu_first">
					<div class="meme_name">
					  <div class="counf">'.$count.'.</div>
					  <a href="profil.php?user='.$ro->id.'">'.$ro->name.'</a></div>
					<div class="meme_point">'.$ro->score.'</div>
				  </div>';
				}
				
			if($count == 2)
				{
				echo'<div class="mem_menu_second">
					<div class="meme_name">
					  <div class="couns">'.$count.'.</div>
					 <a href="profil.php?user='.$ro->id.'">'.$ro->name.'</a></div>
					<div class="meme_point">'.$ro->score.'</div>
				  </div>';
				}
				
			if($count == 3)
				{
				echo'<div class="mem_menu_therd">
					<div class="meme_name">
					  <div class="count">'.$count.'.</div>
					  <a href="profil.php?user='.$ro->id.'">'.$ro->name.'</a></div>
					<div class="meme_point">'.$ro->score.'</div>
				  </div>';
				}
				
			if($count > 3)
				{
				echo'<div class="mem_menu_item">
					<div class="meme_name">
					  <div class="coun">'.$count.'.</div>
					  <a href="profil.php?user='.$ro->id.'">'.$ro->name.'</a></div>
					<div class="meme_point">'.$ro->score.'</div>
				  </div>';
				}	
  
				$count = $count + 1;
			}
}

//****************************************************** THROPY **************************************/

$day = date("j", time());
$month = date("m", time());

$best_thropy = mysql_query("SELECT * FROM thropy WHERE (date = '$month') AND (typ = '1')");
$pocet_best_thropy = mysql_num_rows($best_thropy);

if($day > 5 and $pocet_best_thropy == '0')
	{
	$priw = mysql_query("SELECT * FROM users ORDER BY score DESC LIMIT 0,5");
		while($rot = mysql_fetch_object($priw))
			{
				
					mysql_query("INSERT INTO thropy VALUES ('','$rot->id','$month','1')");

			}
	}
//****************************************************** maker **************************************/	
$best_thropyt = mysql_query("SELECT * FROM thropy WHERE (date = '$month') AND (typ = '2')");
$pocet_best_thropyt = mysql_num_rows($best_thropyt);

if($day > 5 and $pocet_best_thropyt == '0')
	{
	$priwt = mysql_query("SELECT * FROM ranking ORDER BY make_count DESC LIMIT 0,5");
		while($rott = mysql_fetch_object($priwt))
			{
				
					mysql_query("INSERT INTO thropy VALUES ('','$rott->userid','$month','2')");

			}
	}
//****************************************************** uploader **************************************/	
$best_thropye = mysql_query("SELECT * FROM thropy WHERE (date = '$month') AND (typ = '3')");
$pocet_best_thropye = mysql_num_rows($best_thropye);

if($day > 5 and $pocet_best_thropye == '0')
	{
	$priwe = mysql_query("SELECT * FROM ranking ORDER BY upload_count DESC LIMIT 0,5");
		while($rote = mysql_fetch_object($priwe))
			{
				
					mysql_query("INSERT INTO thropy VALUES ('','$rote->userid','$month','3')");

			}
	}
//****************************************************** voter **************************************/	
$best_thropyi = mysql_query("SELECT * FROM thropy WHERE (date = '$month') AND (typ = '4')");
$pocet_best_thropyi = mysql_num_rows($best_thropyi);

if($day > 5 and $pocet_best_thropyi == '0')
	{
	$priwi = mysql_query("SELECT * FROM ranking ORDER BY upload_count DESC LIMIT 0,5");
		while($roti = mysql_fetch_object($priwi))
			{
				
					mysql_query("INSERT INTO thropy VALUES ('','$roti->userid','$month','4')");

			}
	}
	
function logo()
{
	echo'<div class="logo">
        <h1>Meme Maker Generator</h1>
        <a href="index.php" title="mememaker.me"><img src="images/logo_meme.png" alt="meme maker" width="234" height="45" /></a></div>';
}

function title()
{
	$priwisd = mysql_query("SELECT * FROM settings WHERE id = 1");
		while($rotisd = mysql_fetch_object($priwisd))
			{
				echo''.$rotisd->title.'';
			}
}


function navigation_li()
{
	echo'';
}

/************************************************************reklamy***********************************************/
function reklama01()
	{
		$soubor01 = fopen("admin/ads/ads1.txt", "r");
		$ads1 = fread($soubor01, 50000);
		fclose($soubor01);
		echo''.$ads1.'';
	}
	
function reklama02()
	{
		$soubor02 = fopen("admin/ads/ads2.txt", "r");
		$ads2 = fread($soubor02, 50000);
		fclose($soubor02);
		echo''.$ads2.'';
	}
	
function reklama03()
	{
		$soubor03 = fopen("admin/ads/ads3.txt", "r");
		$ads3 = fread($soubor03, 50000);
		fclose($soubor03);
		echo''.$ads3.'';
	}
	
function reklama04()
	{
		$soubor04 = fopen("admin/ads/ads4.txt", "r");
		$ads4 = fread($soubor04, 50000);
		fclose($soubor04);
		echo''.$ads4.'';
	}
?>

