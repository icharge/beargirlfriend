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
		 $down = $_GET['down'];
		 $img = $_GET['img'];
		 $up = $_GET['up'];
		  $del = $_GET['del'];
		 
		if($down == 'true')
			{
				mysql_query("UPDATE images SET stav='0' WHERE id = '$img'");
				echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
			}
			
		if($up == 'true')
			{
				mysql_query("UPDATE images SET stav='1' WHERE id = '$img'");
				echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
			}
			
		if($del == 'true')
			{
				mysql_query("DELETE FROM images WHERE id = '$img'");
				echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
			}
		  
		  ?>
    <div class="onecolumn" >
      <div class="header"> <span ><span class="ico  gray random"></span>Memes</span> </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content"  >
        <div class="tableName">
          <h3>Memes and images</h3>
          <table class="display data_table2" >
            <thead>
              <tr>
                <th><div class="th_wrapp">Picture</div></th>
                <th><div class="th_wrapp">Title</div></th>
                <th><div class="th_wrapp">Tags</div></th>
                <th><div class="th_wrapp">Date</div></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?
	$wheele = 1;
	$pripk = mysql_query("SELECT * FROM images ORDER BY stav");
		while($rok = mysql_fetch_object($pripk))
			{   
			$imgid = $rok->id;
		
				$img = str_replace( '.jpg', '', $rok->img);
				$date = strftime("%d/%m/%Y", $rok->date);
				if($wheele % 2){$clases = 'odd gradeA';}else{$clases = 'even gradeA';}
		  		 echo' <tr class="'.$clases.'">
					  <td>
                        <img src="../images/created/'.$rok->name.'" title="'.$rok->title.'" style="width:80px;"/>		
						</td>
					  <td>'.$rok->title.'</td>
					  <td>'.$rok->tags.'</td>
					  <td>'.$rok->date.'</td>
					  <td ><span class="tip" > <a href="original-face_edit.php?img='.$rok->id.'" title="Edit" > <img alt="Edit" src="images/icon/color_18/pencil.png"> </a> </span>
					  <span class="tip" ><a href="original-face.php?del=true&amp;img='.$rok->id.'" title="Delete"> <img alt="Delete" src="images/icon/color_18/close.png"> </a></span>';
						 
					  
					  if($rok->stav == 1){echo' <span class="tip" ><a href="original-face.php?down=true&amp;img='.$rok->id.'" title="Activated" class="loading large"> <img alt="emoticon_confused" src="images/icon/color_18/emoticon_confused.png"></a></span> ';}
					  
					  else{echo' <span class="tip" ><a href="original-face.php?up=true&amp;img='.$rok->id.'" title="Deactivated" class="loading large" > <img alt="emoticon_confused" src="images/icon/color_18/emoticon_angry.png"></a></span>';}
					  
					  echo'</td>
					</tr>';
					
				$wheele++;
				unset($tags);
			}
	   
	   ?>
            </tbody>
          </table>
        </div>
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
