<? include('lib.php');
if (empty($userid)):

	header("HTTP/1.1 301 Moved Permanently");
	header("Location: ".$url_paass."/admin/index.php");
	header("Connection: close");

else:
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<? echo title();?><? echo css();?><? echo scripts();?>
</head>
<body class="dashborad">
<div id="alertMessage" class="error"></div>
<? echo headers();?>
<div id="shadowhead"></div>
<div id="left_menu"> <? echo menu();?> </div>
<div id="content">
  <div class="inner">
    <div class="topcolumn">
      <div class="logo"></div>
    </div>
    <div class="clear"></div>
	<?
	
	$adse = $_POST['adse'];
	
if($adse == '1')
	{
		$text = $_POST['ads1'];
		$soubor = fopen("ads/ads1.txt", "w+");
		fwrite($soubor, $text);
		fclose($soubor);
		echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
	}
	
if($adse == '2')
	{
		$text = $_POST['ads2'];
		$soubor = fopen("ads/ads2.txt", "w+");
		fwrite($soubor, $text);
		fclose($soubor);
		echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
	}
	
if($adse == '3')
	{
		$text = $_POST['ads3'];
		$soubor = fopen("ads/ads3.txt", "w+");
		fwrite($soubor, $text);
		fclose($soubor);
		echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
	}
	
if($adse == '4')
	{
		$text = $_POST['ads4'];
		$soubor = fopen("ads/ads4.txt", "w+");
		fwrite($soubor, $text);
		fclose($soubor);
		echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
	}
	
	
	?>
    <div class="onecolumn" >
      <?
$soubor = fopen("ads/ads1.txt", "r");
$ads1 = fread($soubor, 50000);
fclose($soubor);

$soubor = fopen("ads/ads2.txt", "r");
$ads2 = fread($soubor, 50000);
fclose($soubor);

$soubor = fopen("ads/ads3.txt", "r");
$ads3 = fread($soubor, 50000);
fclose($soubor);

$soubor = fopen("ads/ads4.txt", "r");
$ads4 = fread($soubor, 50000);
fclose($soubor);


  ?>
      <div class="header"><span><span class="ico gray window"></span>Advertising</span></div>
      <div class="clear"></div>
      <div class="content" >
        <form action="advertising.php" method="post" id="demo">
          <div class="section" >
            <label>Adsense Block 1<small>600px x 160px</small></label>
            <div>
              <textarea type="text" name="ads1" class="full" style="height:100px;"> <? echo $ads1;?></textarea>
			  <input type="hidden" name="adse" value="1">
              <span class="f_help"></span><button class="uibutton loading" title="Saving" rel="1" >submit</button></div>
          </div>
        </form>
         <form action="advertising.php" method="post" id="demo">
          <div class="section" >
            <label>Adsense Block 2<small>300px x 250px</small></label>
            <div><input type="hidden" name="adse" value="2">
              <textarea type="text" name="ads2" class="full" style="height:100px;"> <? echo $ads2;?></textarea>
              <span class="f_help"></span><button class="uibutton loading" title="Saving" rel="1" >submit</button></div>
          </div>
        </form>
         <form action="advertising.php" method="post" id="demo">
          <div class="section" >
            <label>Adsense Block 3<small>300px x 250px</small></label>
            <div><input type="hidden" name="adse" value="3">
              <textarea type="text" name="ads3" class="full" style="height:100px;"> <? echo $ads3;?></textarea>
              <span class="f_help"></span><button class="uibutton loading" title="Saving" rel="1" >submit</button></div>
          </div>
        </form>
        <form action="advertising.php" method="post" id="demo">
          <div class="section" >
            <label>Adsense Block 4<small>486px x 60px</small></label>
            <div><input type="hidden" name="adse" value="4">
              <textarea type="text" name="ads4" class="full" style="height:100px;"> <? echo $ads4;?></textarea>
              <span class="f_help"></span><button class="uibutton loading" title="Saving" rel="1" >submit</button></div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <? echo footer();?> </div>
</div>
</div>
</body>
</html>
<? endif;?>
