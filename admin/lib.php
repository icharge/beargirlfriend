<?
error_reporting(0);
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

//******************************************************USER DATA*******************************************************//

$pripo = mysql_query("SELECT * FROM autorizaces");
	while($row = mysql_fetch_object($pripo))
				{
					 $userid = $row->userid;
					 $time = $row->time;
					 $sidm = $row->sid;
				}
				
$pas = mysql_query("SELECT * FROM settings LIMIT 0,1");
	while($rowarasa = mysql_fetch_object($pas))
		{
			$url_paass = $rowarasa->url;			
		}
				
$prip = mysql_query("SELECT * FROM user WHERE id = '$userid'");
	while($ro = mysql_fetch_object($prip))
				{
					 $user = $ro->login;
				}
				
$logout = $_GET['log'];
	if($logout == 'true')
		{
			mysql_query("DELETE FROM autorizaces WHERE userid = '$userid'");
		}
function title()
	{
		return'<title>Meme Maker Admin</title>';
	}
			
function css()
	{
	  	 return'<link rel="shortcut icon" type="image/ico" href="images/favicon2.html" /> 
				<link rel="stylesheet" type="text/css" href="css/style.css"/>
				<link rel="stylesheet" type="text/css" href="css/icon.css"/>
				<link rel="stylesheet" type="text/css" href="css/ui-custom.css"/>
				<link rel="stylesheet" type="text/css" href="css/timepicker.css"  />
				<link rel="stylesheet" type="text/css" href="components/colorpicker/css/colorpicker.css"  />
				<link rel="stylesheet" type="text/css" href="components/elfinder/css/elfinder.css" />
				<link rel="stylesheet" type="text/css" href="components/datatables/dataTables.css"  />
				<link rel="stylesheet" type="text/css" href="components/validationEngine/validationEngine.jquery.css" />
				<link rel="stylesheet" type="text/css" href="components/jscrollpane/jscrollpane.css" media="screen" />
				<link rel="stylesheet" type="text/css" href="components/fancybox/jquery.fancybox.css" media="screen" />
				<link rel="stylesheet" type="text/css" href="components/tipsy/tipsy.css" media="all" />
				<link rel="stylesheet" type="text/css" href="components/editor/jquery.cleditor.css"  />
				<link rel="stylesheet" type="text/css" href="components/chosen/chosen.css" />
				<link rel="stylesheet" type="text/css" href="components/confirm/jquery.confirm.css" />
				<link rel="stylesheet" type="text/css" href="components/sourcerer/sourcerer.css"/>
				<link rel="stylesheet" type="text/css" href="components/fullcalendar/fullcalendar.css"/>
				<link rel="stylesheet" type="text/css" href="components/Jcrop/jquery.Jcrop.css"  />
				<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="components/flot/excanvas.min.js"></script><![endif]-->';
	}
	
function scripts()
	{
		return'<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
				<script type="text/javascript" src="components/ui/jquery.ui.min.js"></script>
				<script type="text/javascript" src="components/ui/jquery.autotab.js"></script>
				<script type="text/javascript" src="components/ui/timepicker.js"></script>
				<script type="text/javascript" src="components/colorpicker/js/colorpicker.js"></script>
				<script type="text/javascript" src="components/checkboxes/iphone.check.js"></script>
				<script type="text/javascript" src="components/elfinder/js/elfinder.full.js"></script>
				<script type="text/javascript" src="components/datatables/dataTables.min.js"></script>
				<script type="text/javascript" src="components/scrolltop/scrolltopcontrol.js"></script>
				<script type="text/javascript" src="components/fancybox/jquery.fancybox.js"></script>
				<script type="text/javascript" src="components/jscrollpane/mousewheel.js"></script>
				<script type="text/javascript" src="components/jscrollpane/mwheelIntent.js"></script>
				<script type="text/javascript" src="components/jscrollpane/jscrollpane.min.js"></script>
				<script type="text/javascript" src="components/spinner/ui.spinner.js"></script>
				<script type="text/javascript" src="components/tipsy/jquery.tipsy.js"></script>
				<script type="text/javascript" src="components/editor/jquery.cleditor.js"></script>
				<script type="text/javascript" src="components/chosen/chosen.js"></script>
				<script type="text/javascript" src="components/confirm/jquery.confirm.js"></script>
				<script type="text/javascript" src="components/validationEngine/jquery.validationEngine.js" ></script>
				<script type="text/javascript" src="components/validationEngine/jquery.validationEngine-en.js" ></script>
				<script type="text/javascript" src="components/vticker/jquery.vticker-min.js"></script>
				<script type="text/javascript" src="components/sourcerer/sourcerer.js"></script>
				<script type="text/javascript" src="components/fullcalendar/fullcalendar.js"></script>
				<script type="text/javascript" src="components/flot/flot.js"></script>
				<script type="text/javascript" src="components/flot/flot.pie.min.js"></script>
				<script type="text/javascript" src="components/flot/flot.resize.min.js"></script>
				<script type="text/javascript" src="components/flot/graphtable.js"></script>
				<script type="text/javascript" src="components/uploadify/swfobject.js"></script>
				<script type="text/javascript" src="components/uploadify/uploadify.js"></script>        
				<script type="text/javascript" src="components/checkboxes/customInput.jquery.js"></script>
				<script type="text/javascript" src="components/effect/jquery-jrumble.js"></script>
				<script type="text/javascript" src="components/filestyle/jquery.filestyle.js" ></script>
				<script type="text/javascript" src="components/placeholder/jquery.placeholder.js" ></script>
				<script type="text/javascript" src="components/Jcrop/jquery.Jcrop.js" ></script>
				<script type="text/javascript" src="components/imgTransform/jquery.transform.js" ></script>
				<script type="text/javascript" src="components/webcam/webcam.js" ></script>
				<script type="text/javascript" src="components/rating_star/rating_star.js"></script>
				<script type="text/javascript" src="components/dualListBox/dualListBox.js"  ></script>
				<script type="text/javascript" src="components/smartWizard/jquery.smartWizard.min.js"></script>
				<script type="text/javascript" src="js/jquery.cookie.js"></script>
				<script type="text/javascript" src="js/custom.js"></script>';
	}
	
function menu()
	{  
	
	$pripsse = mysql_query("SELECT * FROM settings WHERE id = '1'");
		while($ross = mysql_fetch_object($pripsse))
				{
					 $weburl = $ross->url;
				}
	
	
		$pages = $_SERVER['PHP_SELF'];
		$pages = trim($pages);
		if($pages == '/admin/dashboard.php'){$clases = ' select';}
		if($pages == '/admin/original-face.php'){$clases2 = ' select';}
		if($pages == '/admin/user-face.php'){$clases2 = ' select';}
		if($pages == '/admin/validation.php'){$clases2 = ' select';}
		if($pages == '/admin/user-face_edit.php'){$clases2 = ' select';}
		if($pages == '/admin/original-face_edit.php'){$clases2 = ' select';}
		if($pages == '/admin/request.php'){$clases3 = ' select';}
		if($pages == '/admin/advertising.php'){$clases4 = ' select';}
		if($pages == '/admin/analytics.php'){$clases5 = ' select';}
		if($pages == '/admin/pages.php'){$clases6 = ' select';}
		if($pages == '/admin/blog.php'){$clases7 = ' select';}
		
		return'<ul id="main_menu" class="main_menu">
		<li class="limenu" ><a href="'.$weburl.'" target="_blank"><span class="ico gray shadow window" ></span><b>View Page</b></a></li>
			<li class="limenu'.$clases.'" ><a href="dashboard.php"><span class="ico gray shadow home" ></span><b>Dashboard</b></a></li>
			<li class="limenu'.$clases2.'" ><a href="#" ><span class="ico gray shadow firewall"></span><b>Memes</b></a>
			  <ul>
				<li ><a href="original-face.php">All Memes</a></li>
				<li ><a href="validation.php"> Validation </a></li>
			  </ul>
			</li>
		
			<li class="limenu'.$clases4.'" ><a href="advertising.php"><span class="ico gray shadow  paragraph_align_left"></span><b>Advertising</b> </a></li>
			<li class="limenu'.$clases5.'" ><a href="analytics.php"><span class="ico gray shadow  stats_lines"></span><b>Analytics</b> </a></li>
		  </ul>';
	}
	
function headers()
	{
session_start();
$SN = "autorizace";
session_name("$SN");
$sid = session_id();
$at = date("U") - 18000;

	$pripoqw = mysql_query("SELECT * FROM autorizaces WHERE (sid = '$sid') AND (time > '$at')");
		while($rowqw = mysql_fetch_object($pripoqw))
			{ $userid = $rowqw->userid;}
			
	$prips = mysql_query("SELECT * FROM user WHERE id = '$userid'");
		while($roq = mysql_fetch_object($prips))
			{$user = $roq->login;}
				
		return'<div id="header" >
			  <div id="account_info"> <img src="images/avatar.png" alt="Online" class="avatar" />
				<div class="setting"><b>Welcome </b> <b class="red">'.$user.'</b><img src="images/gear.png" class="gear"  alt="Profile Setting" ></div>
				<a href="index.php?log=true" class="logout" title="Disconnect"><b >Logout</b> <img src="images/connect.png" name="connect" class="disconnect" alt="disconnect" ></a> </div>
			</div>';
	}
	
	
function footer()
	{
		return'<div id="footer">  Copyright &copy; 2013-2014 <span class="tip"><a  href="http://memesoftware.com" target="_blank" title="Memesoftware.com" >Memesoftware.com</a> </span> </div>';
	}
	

?>