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
		 $title = $_POST['title'];
		 $description = $_POST['description'];
		 $tags = $_POST['tags'];
		 $active = $_POST['active'];
		 $img = $_GET['img'];
		  $update = $_POST['update'];
		 
		if($update == 'true')
			{
				mysql_query("UPDATE images SET title='$title',description='$description',tags='$tags',stav='$active' WHERE id = '$img'");
				echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
			}
		  
		  ?>
    <div class="column_left">
	<?	$imgid = $_GET['img'];
		
		$pripka = mysql_query("SELECT * FROM images WHERE id = '$imgid'");
			while($roka = mysql_fetch_object($pripka))
				{
				echo'<div class="onecolumn" >
						<div class="header"><span><span class="ico gray undo"></span>'.$roka->title.'</span></div>
						<div class="clear"></div>
						<div class="content" >
						  <div class="boxtitle "></div>
						  <div align="center">
							<div class="animate" style="overflow:hidden; " > <img  src="../images/created/'.$roka->name.'" style="width:300px;"   /> </div>
						  </div>
						</div>
					  </div>';
				}
	?>	  
    </div>
    <div class="column_right">
      <div class="onecolumn" >
        <div class="header"><span><span class="ico gray scissors"></span>Data Editor</span></div>
        <div class="clear"></div>
        <div class="content" >
<?
	$pripkas = mysql_query("SELECT * FROM images WHERE id = '$imgid'");
			while($rokas = mysql_fetch_object($pripkas))
				{
					$date = strftime("%d/%m/%Y", $rokas->date);
					
					echo'<div class="boxtitle  ">Rage Face : title</div>
					  <form action="original-face_edit.php?img='.$rokas->id.'" method="post">
						<div class="section">
						  <label> Title <small>Rage Faces Title</small></label>
						  <div>
							<input type="text" name="title" id="title"  class=" full"  value="'.$rokas->title.'" />
						  </div>
						</div>
						<div class="section">
						  <label> Description </label>
						  <div>
							<input type="text" name="description" value="'.$rokas->description.'" class=" full" />
						  </div>
						</div>
						<div class="section">
						  <label> Tags </label>
						  <div>
							<input type="text" name="tags" value="'.$rokas->tags.'" class=" full" />
						  </div>
						</div>
						<div class="section">
						  <label>Date <small>Created Date</small></label>
						  <div>
							'.$rokas->date.'
						  </div>
						</div>
						<div class="section">
						  <label> Status <small>website status </small></label>
						  <div>';
						  if($rokas->stav == '1')
						  	{
								echo'<input type="checkbox" id="online" name="active"   class="online"  value="1"   checked="checked" />';
							}
						else
							{
								echo'<input type="checkbox" id="online" name="active"   class="online"  value="1"  />';
							}
							
							
						  echo'</div>
						</div>
						<div class="section last">
						  <div>
						  	<input type="hidden" name="update" value="true" />
							<button class="uibutton loading large"  title="Saving"  rel="1" > save</button>
						  </div>
						</div>
					  </form>';
				}
?>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <span class="wtip"><a href="original-face.php" class="uibutton icon prev normal " title="Back" >Back</a></span>
  <div class="clear"></div>
  <? echo footer();?> </div>
</div>
</div>
</body>
</html>
<? endif;?>
