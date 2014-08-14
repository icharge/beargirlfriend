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
	
	$ana = $_POST['ana'];
	
if($ana == '1')
	{
		$text = $_POST['ana1'];
		$soubor = fopen("ads/ana.txt", "w+");
		fwrite($soubor, $text);
		fclose($soubor);
		echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
	}	
	
	?>
    <div class="onecolumn" >
      <?
$soubor = fopen("ads/ana.txt", "r");
$ana1 = fread($soubor, 50000);
fclose($soubor);

  ?>
      <div class="header"><span><span class="ico gray window"></span>Analytics</span></div>
      <div class="clear"></div>
      <div class="content" >
        <form action="analytics.php" method="post" id="demo">
          <div class="section" >
            <label>Analytics code<small>Insert your Google Analytics code</small></label>
            <div>
              <textarea type="text" name="ana1" class="full" style="height:100px;"> <? echo $ana1;?></textarea>
			  <input type="hidden" name="ana" value="1">
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
