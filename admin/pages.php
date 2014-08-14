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
	
	$term1 = $_POST['term1'];
	$term = $_POST['term'];
	$term2 = $_POST['term2'];
	$termes = $_POST['termes'];
	$active = $_POST['active'];
	$active2 = $_POST['active2'];
	
if($term == '1')
	{
		mysql_query("UPDATE pages SET text='$term1', active='$active' WHERE id = '1'");
		echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
	}
	
if($termes == '1')
	{
		mysql_query("UPDATE pages SET text='$term2', active='$active2' WHERE id = '2'");
		echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
	}	
	
	
	?>
    <div class="onecolumn" >
      <div class="header"><span><span class="ico gray window"></span>Pages</span></div>
      <div class="clear"></div>
      <div class="content" >
      <?
	  $pripkas = mysql_query("SELECT * FROM pages WHERE id = '1'");
			while($rokas = mysql_fetch_object($pripkas))
				{
					$term = $rokas->text;
					$active = $rokas->active;
				}
				
		$pripkasas = mysql_query("SELECT * FROM pages WHERE id = '2'");
			while($rokasas = mysql_fetch_object($pripkasas))
				{
					$terms = $rokasas->text;
					$actives = $rokasas->active;
				}
	  ?>
        <form action="pages.php" method="post" id="demo">
          <div class="section" >
            <label>FAQ<small></small></label>
            <div>
              <textarea type="text" name="term1" class="full" style="height:700px;"> <? echo $term;?></textarea>
              <span class="f_help">Write a text for FAQ page.</span>
              </div>
              <div class="section" >
              <label> Status <small>Online or Offline mode </small></label><div>
             <?  if($active == '1')
						  	{
								echo'<input type="checkbox" id="online" name="active"   class="online"  value="1"   checked="checked" />';
							}
						else
							{
								echo'<input type="checkbox" id="online" name="active"   class="online"  value="1"  />';
							}
			?></div><div class="section" >
			  <input type="hidden" name="term" value="1">
              <button class="uibutton loading" title="Saving" rel="1" >submit</button></div>
          </div>
          </form>
		  
		  <form action="pages.php" method="post" id="demo">
          <div class="section" >
            <label>Our Team<small></small></label>
            <div>
              <textarea type="text" name="term2" class="full" style="height:700px;"> <? echo $terms;?></textarea>
              <span class="f_help">Write a text for our team page.</span>
              </div>
              <div class="section" >
              <label> Status <small>Online or Offline mode </small></label><div>
             <?  if($actives == '1')
						  	{
								echo'<input type="checkbox" id="online" name="active2"   class="online"  value="1"   checked="checked" />';
							}
						else
							{
								echo'<input type="checkbox" id="online" name="active2"   class="online"  value="1"  />';
							}
			?></div><div class="section" >
			  <input type="hidden" name="termes" value="1">
              <button class="uibutton loading" title="Saving" rel="1" >submit</button></div>
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
