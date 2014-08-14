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
		  $down_tag = $_GET['down_tag'];
		 $up_tag = $_GET['up_tag'];
		  $del_tag = $_GET['del_tag'];
		 
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
			
			
			
			if($down_tag == 'true')
			{
				mysql_query("UPDATE tags SET active='0' WHERE id = '$img'");
				echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
			}
						
		if($up_tag == 'true')
			{
				mysql_query("UPDATE tags SET active='1' WHERE id = '$img'");
				echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
			}
			
		if($del_tag == 'true')
			{
				mysql_query("DELETE FROM tags WHERE id = '$img'");
				echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
			}
		  
		  ?>
    <div class="onecolumn" >
      <div class="header"> <span ><span class="ico  gray random"></span>Validation</span> </div>
      <!-- End header -->
      <div class=" clear"></div>
      <div class="content"  >
        <div class="tableName">
          <h3>New Memes and Images For Validation</h3>
          <table class="display data_table2" >
            <thead>
              <tr>
                <th><div class="th_wrapp">Picture</div></th>
                <th><div class="th_wrapp">Title</div></th>
                <th><div class="th_wrapp">Date</div></th>
                <th><div class="th_wrapp">Validation</div></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?
	$wheele = 1;
	$pripk = mysql_query("SELECT * FROM images WHERE stav = '0'");
		while($rok = mysql_fetch_object($pripk))
			{   

				$img = str_replace( '.jpg', '', $rok->img);
				$date = strftime("%d/%m/%Y", $rok->date);
				if($wheele % 2){$clases = 'odd gradeA';}else{$clases = 'even gradeA';}
		  		 echo' <tr class="'.$clases.'">
					  <td>
                        <img src="../images/created/'.$rok->name.'" title="'.$rok->title.'" style="width:150px;"/>		
						</td>
					  <td>'.$rok->title.'</td>
					  <td>'.$rok->date.'</td>';
					  $upid = $rok->upid;
					  $pripkw = mysql_query("SELECT * FROM images WHERE id = '$upid'");
						while($rokw = mysql_fetch_object($pripkw))
							{
							$imgs = str_replace( '.jpg', '', $rokw->img);
					 		 echo' <td><img src="../images/created/'.$imgs.'" title="'.$rokw->title.'" style="width:50px;"/></td>';
							}
					   				 
					  
					  if($rok->active == 1){echo'<td > <span class="tip" ><a href="validation.php?down=true&amp;img='.$rok->id.'" title="Activate" class="loading large"> <img alt="emoticon_confused" src="images/icon/color_18/emoticon_confused.png"></a></span> </td>';}
					  
					  else{echo' <td ><span class="tip" ><a href="validation.php?up=true&amp;img='.$rok->id.'" title="Activated" class="loading large" > <img alt="emoticon_confused" src="images/icon/color_18/emoticon_confused.png"></a></span>';}
					  
					  echo' <span class="tip" ><a href="validation.php?del=true&amp;img='.$rok->id.'" title="Delete"> <img alt="Delete" src="images/icon/color_18/close.png"> </a></span></td></tr>';
					
				$wheele++;
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
