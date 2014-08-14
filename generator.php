<?
include('lib.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><? echo title();?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js" ></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="ragecomic/scripts/jQuery.cssTransform.Patch.js"></script>
<script type="text/javascript" src="ragecomic/scripts/cp_depends.js"></script>
<script type="text/javascript" src="ragecomic/scripts/excanvas.js"></script>
<script type="text/javascript" src="ragecomic/scripts/CanvasWidget.js"></script>
<script type="text/javascript" src="ragecomic/scripts/CanvasPainter.js"></script>
<script type="text/javascript" src="ragecomic/scripts/jquery.batchImageLoad.js"></script>
<script type="text/javascript" src="ragecomic/scripts/jquery.autogrow.js"></script>
<script type="text/javascript" src="ragecomic/scripts/jquery.flickr-1.0-min.js"></script>
<script type="text/javascript" src="ragecomic/scripts/interface.js"></script>
<script type="text/javascript" src="ragecomic/scripts/jquery.blockUI.min.js"></script>
<script type="text/javascript" src="ragecomic/scripts/colorpicker.js"></script>
<script type="text/javascript" src="ragecomic/scripts/jquery.repeatedclick.js"></script>
<script type="text/javascript" src="ragecomic/scripts/jquery.imgDrop.js"></script>
<script type="text/javascript" src="ragecomic/scripts/jquery.getimagedata.min.js"></script>
<script type="text/javascript" src="ragecomic/scripts/base64.js"></script>
<script type="text/javascript" src="ragecomic/scripts/canvas2image.js"></script>
<script type="text/javascript" src="ragecomic/scripts/rage.unmin.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<link href="ragecomic/css/style.css" rel="stylesheet" type="text/css" />
<link href="ragecomic/css/colorpicker.css" rel="stylesheet" type="text/css" />
<link href="ragecomic/css/start/jquery-ui-1.7.2.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	var siteUrl = "<? echo $weburls;?>/";

	var stylesheet_directory =  "ragecomic/";
	var imageTypeId = 84;
	RageComic.initialize({packRoot: stylesheet_directory,
			      siteUrl: siteUrl,
			      submissionUrl: siteUrl + "save.php?uid=<? echo $userid?>",
			      imageTypeId: imageTypeId});
</script>
</head>
<body class="MEME">
<div style="width:640px;margin:0 auto;">
  <div id="pane2" style="margin: 20px 0; width: 640px; position: relative; min-height: 0px;">
    <div id="blank_content">
      <div class="sharedaddy"></div>
      <div id="memebaseSubmitFormContainer"></div>
      <div>
        <div class="dock" id="toolbar">
          <div class="dock-container" title="Click to add it to the canvas."></div>
        </div>
      </div>
      <div id='promptContainer' title='Import image'>
        <div><strong>URL: </strong>
          <input type='text' id='txtImportUrl' value='' />
        </div>
        <p class='errorText'></p>
        <p> Enter the URL to an image you would like to import. This could be
          another rage comic or anything else. </p>
      </div>
      <div id='flickrContainer' title='Import image from Flickr'>
        <label><strong>Enter keyword: </strong></label>
        <input type="text" value="" id="flickrSearchTerm" />
        <p id="flickrHelpText"> Search for an image on flickr. For example: 'cat white background'. </p>
        <p style="display:none" id="flickrLoading"></p>
        <div id="flickrResult"></div>
      </div>
      <div id='startUpMessageContainer' title='Pro-tip'></div>
      <div id='exportContainer' title=''>
        <div>
          <div style='float: left'><img src="ragecomic/images/messageTroll.png" tppabs="ragecomic/images/messageTroll.png"/></div>
          <div> 
            In the next step, you'll be able to submit your Rage Comic to our Meme gallery. <br/>
           </div>
          <div style='clear: both'></div>
        </div>
      </div>
      <div id="canvasContainer">
        <div id="controllers" class="ui-widget-header ui-corner-all">
          <div id="templateController" class="controllerSubset" style="border-left: none; padding-left: 3px;">
            <select id="drpPacks" title="Template set">
            </select>
          </div>
          <div id="toolsController" class="controllerSubset"> <strong></strong> <span title='Add text box' id='addTextCtrl' class='menuIcon'><img src="ragecomic/images/text_dropcaps.png" alt="text_dropcaps" align="absmiddle" /></span>  <span title='Select brush color' id="customWidget" class='menuIcon'><img src="ragecomic/images/color_wheel.png" alt="color_wheel" align="absmiddle" /></span> <span title='Select brush size' id="brushSize" class='menuIcon'><img src="ragecomic/images/paintbrush.png" alt="paintbrush" align="absmiddle" /></span> <span title="Undo last brush or 'send to back' action" id="undoBrush" class='menuIcon'><img src="ragecomic/images/arrow_undo.png" alt="arrow_undo" align="absmiddle"/></span> </div>
          <div id="panelController" class="controllerSubset" style="float: right;"> <strong>PANELS</strong> <span title='Add row' id='addFrameCtrl' class='menuIcon'><img src="ragecomic/images/add.png" alt="add" align="absmiddle"/></span> <span title='Delete last row' id='removeFrameCtrl' class='menuIcon'><img src="ragecomic/images/delete.png"  alt="delete" align="absmiddle"/></span> </div>
          <span title='Export canvas' id='exportCanvas' class='menuIcon'><img src="ragecomic/images/disk.png" alt="disk" align="absmiddle" style=" margin-left:10px;"/></span>
          <div id="brushSizeSlider"></div>
          <div style="clear: both"></div>
        </div>
        <div id='drawingCanvasContainer'>
          <canvas id="drawingCanvasInterface"></canvas>
          <canvas id="drawingCanvas"></canvas>
        </div>
        <img src="ragecomic/images/watermark.png" alt="watermark" id="watermark" style=" display:none;position:relative; left:50px; bottom:100px;" /> </div>
    </div>
  </div>
</div>
</body>
</html>
