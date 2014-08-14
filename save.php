<?
include('lib.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? echo title();?> | Meme created</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>
<body>
<? 


define('UPLOAD_DIR', 'images/created/');
$img = $_POST['image'];
$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = UPLOAD_DIR . uniqid() . '.jpg';
$success = file_put_contents($file, $data);

$date = date("j.m.Y", time());
$title = $_POST['title'];
$desc = $_POST['desc'];
$tags = $_POST['tags'];
$userid = $_GET['uid'];

$co = 'images/created/';
$cim = '';
$file = str_replace( $co, $cim, $file);

mysql_query("INSERT INTO images VALUES ('','$userid','$title','$desc','$tags','$file','0','0','0','$date','0')");
mysql_query("INSERT INTO make VALUES ('','$userid','$file')");

if(empty($userid)){$userid = '99999999999';}
$prip = mysql_query("SELECT * FROM images WHERE (userid = '$userid') AND (title = '$title') LIMIT 1");
					while($row = mysql_fetch_object($prip))
						{
							echo'<table width="550" height="295" border="0" align="center" cellpadding="0" cellspacing="0">
								  <tr>
									<td height="53"><h3>Meme created ! </h3></td>
									<td></td>
								  </tr>
								  <tr>
									<td height="38">Title : '.$row->title.'</td>
									<td></td>
								  </tr>
								   <tr>
									<td height="38">Description : '.$row->description.'</td>
									<td></td>
								  </tr>
								   <tr>
									<td height="38">Tags : '.$row->tags.'</td>
									<td></td>
								  </tr>
								  <tr>
									<td><img src="images/created/'.$row->name.'" width="500" alt="" /></td>
									<td></td>
								  </tr>
								  
								  <tr>
								  <td></td>
									<td height="20"><form action="generator.php" method="post"><div align="center"><button class="blueButton">
									Next
									</button>
									</div></form></td>
								  </tr>
								</table>';
						}


?>
</body>
</html>
