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
  	$total_view = mysql_num_rows(mysql_query("SELECT * FROM images"));
	$original_faces = mysql_num_rows(mysql_query("SELECT * FROM images WHERE stav = '0'"));
	$created_faces = mysql_num_rows(mysql_query("SELECT * FROM images WHERE stav = '1'"));
	$total_tag = mysql_num_rows(mysql_query("SELECT * FROM users"));
	
  ?>
  <div class="onecolumn" >
    <div class="header"> <span ><span class="ico gray home"></span> Dashboard</span> </div>
    <div class="clear"></div>
    <div class="content" >
      <div class="boxtitle min">website status</div>
      <div class="grid1 rightzero">
        <div class="shoutcutBox"> <span class="ico color chat-exclamation"></span> <strong><? echo $total_view;?></strong> <em>Total Memes and Images</em> </div>
        <div class="breaks"><span></span></div>
        <div class="shoutcutBox" > <span class="ico color item"></span> <strong><? echo $original_faces;?></strong> <em> Pending</em> </div>
        <div class="shoutcutBox" > <span class="ico color emoticon_in_love"></span> <strong><? echo $created_faces;?></strong> <em> Approved</em> </div>
        <div class="shoutcutBox"> <span class="ico color item"></span> <strong><? echo $total_tag;?></strong> <em>Users</em> </div>
        
      </div>
      <div  class="grid2">
        <div class="inner">
        <?
		$sitename = $_POST['sitename'];
		$url = $_POST['url'];
		$email = $_POST['email'];
		$descr = $_POST['descr'];
		$key = $_POST['key'];
		$send = $_POST['send'];
		$fb = $_POST['fb'];
		$tw = $_POST['tw'];
		$id = $_POST['id'];
		$logo = $_FILES['logo']['name'];
		if($send == 'true')
			{
				mysql_query("UPDATE settings SET title='$sitename', url='$url', email='$email', descr='$descr', keyword='$key', fb='$fb', tw='$tw'");
				
		if(empty($logo)){}
		else
			{
			$adresar = $_SERVER["DOCUMENT_ROOT"]."/images/"; 
			$obrazek = $adresar . $_FILES['logo']['name'];
			$kon = explode('.',$_FILES['logo']['name']);
			 $kon = $kon[count($kon)-1];
			 
			$obrazekk = 'logo_meme.png'; 
			if($kon == 'png')
				{
					move_uploaded_file($_FILES['logo']['tmp_name'],$adresar.$obrazekk);
					echo'<div class="alertMessage success SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">success</div>';
				}
			else
				{
					echo'<div class="alertMessage error SE" style="position: relative; left: 0px; top: 0px; opacity: 1; -moz-transform: rotate(0deg);">Logo must png type</div>';
				}

			}
				
			}
		
		$p = mysql_query("SELECT * FROM settings WHERE id = 1 LIMIT 0,1");
			while($rowar = mysql_fetch_object($p))
				{
					echo'<form action="dashboard.php" method="post" enctype="multipart/form-data">
					<div class="section">
						  <label><img src="../images/logo_meme.png" alt="logo" style="width:150px;"></label>
						  <div>
							<input type="file" name="logo" class="filebtn" />
						  </div>
						</div>
						<div class="section">
						  <label> Website Title <small>Your Website Title</small></label>
						  <div>
							<input type="text" name="sitename" id="sitename"  class=" full"  value="'.$rowar->title.'" />
						  </div>
						</div>
						<div class="section">
						  <label> Website Url <small>Your Website Url</small></label>
						  <div>
							<input type="text" name="url" value="'.$rowar->url.'" class=" full" />
						  </div>
						</div>
			
						<div class="section">
						  <label> Email Adress <small>Your Email Adress</small></label>
						  <div>
							<input type="text" name="email" value="'.$rowar->email.'" class=" full" />
						  </div>
						</div>
						<div class="section">
						  <label> Facebook Adress <small>Your Facebook Adress</small></label>
						  <div>
							<input type="text" name="fb" value="'.$rowar->fb.'" class=" full" />
						  </div>
						</div>
						<div class="section">
						  <label> Twitter Adress <small>Your Twitter Adress</small></label>
						  <div>
							<input type="text" name="tw" value="'.$rowar->tw.'" class=" full" />
						  </div>
						</div>
						<div class="section">
						  <label> Website Description <small>Your Website Description</small></label>
						  <div>
							<input type="text" name="descr" value="'.$rowar->descr.'" class=" full" />
						  </div>
						</div>
						<div class="section">
						  <label> Website Keywords <small>Your Website Keywords</small></label>
						  <div>
						  	<input type="hidden" name="send" value="true" />
							<input type="hidden" name="id" value="'.$rowar->id.'" />
							<input type="text" name="key" value="'.$rowar->keyword.'" class=" full" />
						  </div>
						</div>
						<div class="section last">
						  <div> <button class="uibutton loading large"  title="Saving"  rel="1" > save</button></div>
						</div>
					  </form>';
				}
		?>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  
  <div class="column_left" >
    <div class="onecolumn">
      <div class="header"><span><span class="ico gray access_point"></span> New  Memes and Images</span></div>
      <br class="clear"/>
      <div class="content">
        <div id="news_update" style="position: relative;" >
          <ul style="position: absolute; margin: 0pt; padding: 0pt; top: 0px; width: 100%;">
            <?
		 $conect = mysql_query("SELECT * FROM images WHERE (stav = '0') ORDER BY id DESC");
			while($rowa = mysql_fetch_object($conect))
				{
					$date = strftime("%d/%m/%Y", $rowa->date);
					
					echo' <li>
					  <div class="temp_news"><img src="../images/created/'.$rowa->name.'" alt="'.$rowa->title.'" /></div>
					  <div class="detail_news">
						<div class="boxtitle min" >'.$rowa->title.'</div>
						 </div>
					  <br class="clear"/>
					</li>';
				}
		 ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="clear"></div>
    <? echo footer();?> </div>
</div>
</body>
</html>
<? endif;?>
