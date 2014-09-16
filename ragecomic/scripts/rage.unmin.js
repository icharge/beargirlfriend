RageComic = {};
RageComic.initialize = function (options) {
    var manifestVersion = 1;
    var packRoot = options.packRoot;
    var submissionSiteUrl = options.siteUrl;
    var imageTypeId = options.imageTypeId;
    var submissionUrl = options.submissionUrl;
    var userAgent = navigator.userAgent.toLowerCase();
    var canvasPainter;
    var canvasRowCount = 0;
    var canvasInitialRows = 3;
    var initBrushColor = '000000';
    var initialBrushWidth = 5;

    var faceIndex = 0;
    var restorePoints = [];

    function rC(nam) {
        var tC = document.cookie.split('; ');
        for (var i = tC.length - 1; i >= 0; i--) {
            var x = tC[i].split('=');
            if (nam = x[0]) return unescape(x[1]);
        }
        return '~';
    }
    function wC(nam, val) {
        document.cookie = nam + '=' + escape(val);
    }
    function lC(nam, pg) {
        var val = rC(nam);
        if (val.indexOf('~' + pg + '~') != -1) return false;
        val += pg + '~';
        wC(nam, val);
        return true;
    }
    function firstTime(cN) {
        return lC('pWrD4jBo', cN);
    }
    function thisPage() {
        var page = location.href.substring(location.href.lastIndexOf('\/') + 1);
        pos = page.indexOf('.');
        if (pos > -1) {
            page = page.substr(0, pos);
        }
        return page;
    }

    function getRotationDegrees(css) {
        if (css != 'none' && css.indexOf('rotate') >= 0) {
            var startIndex = css.indexOf('rotate(') + "rotate(".length;
            var endIndex = css.indexOf('deg)');
            return parseInt(css.substring(startIndex, endIndex));
        } else {
            return 0;
        }
    }

    function rotateImage(img, degrees) {
        var currentDegrees = getRotationDegrees($(img).css('transform'));
        var newDegrees = parseInt(currentDegrees) + parseInt(degrees);
        newDegrees = "rotate(" + newDegrees + "deg)";
        if ($(img).css('transform').indexOf('rotate') >= 0) {
            $(img).css('transform', $(img).css('transform').replace('rotate(' + currentDegrees + 'deg)', newDegrees));
        } else {
            if ($(img).css('transform') == 'none') {
                $(img).css('transform', newDegrees);
            } else {
                $(img).css('transform', newDegrees + ' ' + $(img).css('transform'));
            }
        }
        return false;
    }

    function sendToBack(face, isFace) {
        saveRestorePoint();
        if (isFace) drawFaceOnCanvas(face);
        else drawTextOnCanvas(face);
        return false;
    }

    function removeFace(face) {
        face.parent().parent().remove();
        return false;
    }

    function changeTextSize(face, increment) {
        var textAreaControl = face.parent().parent().find("textarea.speechTextBox");
        var newFontSize = parseInt(textAreaControl.css('font-size').replace('px', '')) + increment;
        textAreaControl.css('font-size', "" + newFontSize + "px");
        return false;
    }

    function toggleTextBoldStyle(face) {
        var textBox = $(face).parent().parent().find("textarea.speechTextBox");
        var fontWeight = textBox.css('font-weight');
        if (fontWeight == 'bold') textBox.css('font-weight', '');
        else textBox.css('font-weight', 'bold');
        return false;
    }

    function toggleTextItalicStyle(face) {
        var textBox = $(face).parent().parent().find("textarea.speechTextBox");
        var fontStyle = textBox.css('font-style');
        if (fontStyle == 'italic') textBox.css('font-style', '');
        else textBox.css('font-style', 'italic');
        return false;
    }

    function horizontalFlipImage(face) {
        var img = face.parent().parent().find('.faceImage');
        var currentTransformation = img.css('transform');
        if (currentTransformation.indexOf('scaleX(-1)') >= 0) {
            img.css('filter', '');
            img.css('transform', img.css('transform').replace('scaleX(-1)', ''));
        } else {
            img.css('filter', 'fliph');
            img.css('transform', img.css('transform') != 'none' ? img.css('transform') + ' scaleX(-1)' : 'scaleX(-1)');
        }
        return false;
    }
    var addFace = function (packName, name, successCallback, failCallback) {
            var faceId = "face" + faceIndex;
            $("<div class='face draggableFace' id='" + faceId + "'>" +
                "<div class='objectControllerContainer'>" + "<span class='remove'>" +
                "<img class='objectController' title='เอาออก' src='" + packRoot + "images/delete.png' />" +
                "</span>" +
                "<span class='sendToBack'>" + "<img class='objectController' title='แปะถาวร' src='" + packRoot + "images/shape_move_backwards.png' />" +
                "</span>" +
                "<span class='rotateLeft'>" + "<img class='objectController' title='หมุนรูปทวนเข็ม' src='" + packRoot + "images/shape_rotate_anticlockwise.png' />" +
                "</span>" +
                "<span class='rotateRight'>" + "<img class='objectController' title='หมุนรูปตามเข็ม' src='" + packRoot + "images/shape_rotate_clockwise.png' />" +
                "</span>" +
                "<span class='flipHorizontal'>" + "<img class='objectController' title='กลับด้าน' src='" + packRoot + "images/shape_flip_horizontal.png' />" +
                "</span>" +
                "<span class='cloneFace'>" + "<img class='objectController' title='แยกร่าง' src='" + packRoot + "images/application_double.png' />" +
                "</span>" +
                "</div>" +
                "<img class='faceImage' title='Drag me around! This is also resizable!' src='" + getImagePath(packName, name, true) + "' />" + "</div>").appendTo('#canvasContainer').hover(function () {
                $("#" + faceId + " > div.objectControllerContainer").show();
            }, function () {
                $("#" + faceId + " > div.objectControllerContainer").hide();
            }).draggable({
                stack: {
                    group: '.draggableFace',
                    min: 500
                },
                cursor: 'pointer'
            });
            $("#" + faceId + " > div.objectControllerContainer > span.remove").click(function () {
                return removeFace($(this));
            });
            $("#" + faceId + " > div.objectControllerContainer > span.sendToBack").click(function () {
                return sendToBack($(this).parent().parent(), true);
            });
            $("#" + faceId + " > div.objectControllerContainer > span.rotateLeft").repeatedclick(function () {
                return rotateImage($(this).parent().parent().find('.faceImage'), -1);
            }, {
                duration: 0,
                speed: 0.2,
                min: 100
            });
            $("#" + faceId + " > div.objectControllerContainer > span.rotateRight").repeatedclick(function () {
                return rotateImage($(this).parent().parent().find('.faceImage'), 1);
            }, {
                duration: 0,
                speed: 0.2,
                min: 100
            });
            $("#" + faceId + " > div.objectControllerContainer > span.flipHorizontal").click(function () {
                return horizontalFlipImage($(this));
            });
            $("#" + faceId + " > div.objectControllerContainer > span.cloneFace").click(function () {
                return cloneFace($(this).parent().parent());
            });
            $("#" + faceId + " > img").error(function () {
                if (failCallback) failCallback();
                $("#" + faceId + " > div.objectControllerContainer > span.remove").trigger('click');
            });
            $("#" + faceId + " > img").load(function () {
                var selector = "#" + faceId + " > img";
                selector = "$(\"" + selector + "\")";
                setTimeout(selector + ".resizable({aspectRatio: true, autoHide: true});", 0);
                if (successCallback) successCallback();
            });
            if ($.browser.safari) $("#" + faceId + " > img").attr('src', getImagePath(packName, name));
            faceIndex++;
            return $("#" + faceId);
        };
    RageComic.addFace = addFace;

    function cloneFace(face) {
        var faceImg = face.find('img.faceImage');
        var newFace = addFace('', faceImg.attr('src'));
        newFace.find('img.faceImage').attr('style', faceImg.attr('style'));
        newFace.css('z-index', parseInt(face.css('z-index')) + 1);
        var newPosition = face.offset();
        newPosition.left += 50;
        newPosition.top += 50;
        newFace.css(newPosition);
        return newFace;
    }

    function cloneText(face) {
        var originalTextarea = face.find('textarea.speechTextBox');
        var newText = addText();
        newText.find('textarea.speechTextBox').attr('style', originalTextarea.attr('style')).val(originalTextarea.val());
        var newPosition = face.offset();
        newPosition.left += 50;
        newPosition.top += 50;
        newText.css(newPosition);
        return newText;
    }

    function addText() {
        var faceId = "face" + faceIndex;
        $("<div class='face draggableFace' id='" + faceId + "'>" + "<div class='objectControllerContainer objectControllerContainerText'>" + "<span class='remove'>" + "<img class='objectController' title='Remove' src='" + packRoot + "images/delete.png' />" + "</span>" + "<img class='objectController' title='Move - Click and drag' src='" + packRoot + "images/arrow_out.png' />" + "<span class='changeColor'>" + "<img class='objectController' title='Set color' src='" + packRoot + "images/color_wheel.png' />" + "</span>" + "<span class='sendToBack'>" + "<img class='objectController' title='Send to back' src='" + packRoot + "images/shape_move_backwards.png' />" + "</span>" + "<span class='decrease'>" + "<img class='objectController' title='Decrease size' src='" + packRoot + "images/text_lowercase.png' />" + "</span>" + "<span class='increase'>" + "<img class='objectController' title='Increase size' src='" + packRoot + "images/text_uppercase.png' />" + "</span>" + "<span class='bold'>" + "<img class='objectController' title='Toggle Bold' src='" + packRoot + "images/text_bold.png' />" + "</span>" + "<span class='italic'>" + "<img class='objectController' title='Toggle Italic' src='" + packRoot + "images/text_italic.png' />" + "</span>" + "<span class='cloneFace'>" + "<img class='objectController' title='Clone text' src='" + packRoot + "images/application_double.png' />" + "</span>" + "</div>" + "<textarea style='font-size: 15px' spellcheck='false' class='speechTextBox'>[Click here to change text]</textarea>" + "</div>").appendTo('#canvasContainer').hover(function () {
            $("#" + faceId + " > div.objectControllerContainer").show();
            $("#" + faceId + " > .speechTextBox").addClass('withBorder');
        }, function () {
            $("#" + faceId + " > div.objectControllerContainer").hide();
            $("#" + faceId + " > .speechTextBox").removeClass('withBorder');
        }).draggable({
            stack: {
                group: '.draggableFace',
                min: 500
            },
            cursor: 'pointer'
        });
        $("#" + faceId).find(".speechTextBox").autogrow({
            minHeight: 30,
            lineHeight: 16
        });
        $("#" + faceId + " > div.objectControllerContainer > span.remove").click(function () {
            return removeFace($(this));
        });
        $("#" + faceId + " > div.objectControllerContainer > span.changeColor").ColorPicker({
            color: '#000000',
            onShow: function (colpkr) {
                $(colpkr).fadeIn(500);
                return false;
            },
            onSubmit: function (hsb, hex, rgb, el) {
                $(el).ColorPickerHide();
                $(el).parent().parent().find("textarea.speechTextBox").css('color', "#" + hex);
            },
            onChange: function (hsb, hex, rgb) {
                $("#" + faceId).find("textarea.speechTextBox").css('color', "#" + hex);
            }
        });
        $("#" + faceId + " > div.objectControllerContainer > span.sendToBack").click(function () {
            return sendToBack($(this).parent().parent(), false);
        });
        $("#" + faceId + " > div.objectControllerContainer > span.increase").click(function () {
            return changeTextSize($(this), 3);
        });
        $("#" + faceId + " > div.objectControllerContainer > span.decrease").click(function () {
            return changeTextSize($(this), -3);
        });
        $("#" + faceId + " > div.objectControllerContainer > span.bold").click(function () {
            return toggleTextBoldStyle($(this));
        });
        $("#" + faceId + " > div.objectControllerContainer > span.italic").click(function () {
            return toggleTextItalicStyle($(this));
        });
        $("#" + faceId + " > div.objectControllerContainer > span.cloneFace").click(function () {
            return cloneText($(this).parent().parent());
        });
        faceIndex++;
        return $("#" + faceId);
    }

    function flickrSearchResultCallback(list) {
        var images = $(list).find("li > a > img");
        var count = images.size();
        if (count > 0) {
            images.batchImageLoad({
                loadingCompleteCallback: function () {
                    $('#flickrLoading').hide();
                    $('#flickrResult').show();
                }
            });
        } else {
            $("#flickrLoading").html("No images found!");
        }
    }

    function importFlickrImage(url, dialog) {
        $('#flickrResult').hide();
        block('Importing ...');
        $.getImageData({
            url: url,
            success: function (image) {
                addFace('', image.src, function () {
                    dialog.dialog('close');
                    unblock();
                });
            },
            error: function (xhr, text_status) {
                unblock();
            }
        });
        return false;
    }

    function LoadPacks($dropdown) {
        $dropdown.html("");
        $dropdown.change(function () {
            LoadPack($("#toolbar"), $(this).val());
        });
        $.getJSON(packRoot + "packs/manifest.json?v=" + manifestVersion, function (data) {
            $.each(data, function (text, value) {
                $("<optgroup label='" + text + "'></optgroup>").appendTo($dropdown);
                $.each(value, function (optionText, optionValue) {
                    $dropdown.children('optgroup[label=' + text + ']').append("<option value='" + optionText + "'>" + optionValue + "</option>");
                });
            });
            $dropdown.trigger('change');
        });
    }

    function LoadPack($toolbar, packName) {
        block('Loading images : ' + $("#drpPacks option:selected").text());
        $toolbar.find('.dock-container').html("");
        $.getJSON(getPackManifest(packName), function (data) {
            $.each(data, function (icon, title) {
                $toolbar.find('.dock-container').append("<a onMouseDown=\"RageComic.addFace('" + packName + "', '" + icon + "'); return false;\" class='dock-item' href='javascript:void(0)'>" + "<img src='" + getImagePath(packName, icon) + "' />" + "</a>")
            });
            $('.dock-container').find('a > img').batchImageLoad({
                loadingCompleteCallback: unblock
            });
            $toolbar.Fisheye({
                maxWidth: 50,
                items: 'a',
                itemsText: 'span',
                container: '.dock-container',
                itemWidth: 50,
                proximity: 40,
                halign: 'center'
            });
        });
    }

    function getPackManifest(packName) {
        return packRoot + "packs/" + packName + "/manifest.json?v=" + manifestVersion;
    }

    function getImagePath(packName, name, preventChrome) {
        if (preventChrome && $.browser.safari) return "";
        if (packName != '') return packRoot + "packs/" + packName + "/images/" + name;
        else return name;
    }

    function addRows(number) {
        canvasRowCount += number;
        adjustDrawingCanvasSize();
        addRowsBackground(number);
        addRowsLines(number);
    }

    function addRowsBackground(number) {
        var panelHeight = canvasPainter.context.canvas.height / canvasRowCount;
        canvasPainter.context.save();
        canvasPainter.context.fillStyle = '#fff';
        canvasPainter.context.fillRect(0, (canvasRowCount - number) * panelHeight, canvasPainter.context.canvas.width, canvasPainter.context.canvas.height);
        canvasPainter.context.restore();
    }

    function addRowsLines(number) {
        // เกี่ยวกับวาดเส้นแถว
        var panelHeight = canvasPainter.context.canvas.height / canvasRowCount;
        var canvasHeight = canvasPainter.context.canvas.height;
        canvasPainter.context.save();
        canvasPainter.context.strokeStyle = '#000';
        canvasPainter.context.lineWidth = 1;
        canvasPainter.context.beginPath();
        for (var i = 1; i <= number; i++) {
            var y = ((canvasRowCount - number + i) * panelHeight);
            y == 0 ? y = 1 : y -= 1;
            //alert('canvas: '+canvasHeight+'\ny: '+ y+'\nRow: '+canvasRowCount);
            // if (canvasHeight - 1 != y && canvasRowCount == 2)
            // {
                canvasPainter.context.moveTo(0, y);
                canvasPainter.context.lineTo(canvasPainter.context.canvas.width, y);
            // }
        }
        // เส้นขอบซ้าย
        // canvasPainter.context.moveTo(1, (canvasRowCount - number) * panelHeight);
        // canvasPainter.context.lineTo(1, canvasPainter.context.canvas.height);
        // เส้นขอบขวา
        // canvasPainter.context.moveTo(canvasPainter.context.canvas.width - 1, (canvasRowCount - number) * panelHeight);
        // canvasPainter.context.lineTo(canvasPainter.context.canvas.width - 1, canvasPainter.context.canvas.height);
        // เส้นกลาง
        // canvasPainter.context.moveTo(canvasPainter.context.canvas.width / 2, (canvasRowCount - number) * panelHeight);
        // canvasPainter.context.lineTo(canvasPainter.context.canvas.width / 2, canvasPainter.context.canvas.height);
        canvasPainter.context.closePath();
        canvasPainter.context.stroke();
        canvasPainter.context.restore();
    }

    function removeRow() {
        if (canvasRowCount > 1) {
            canvasRowCount -= 1;
            adjustDrawingCanvasSize();
        }
    }

    function adjustDrawingCanvasSize() {
        if (canvasPainter) {
            var panelWidth = $("#drawingCanvas").width() / 2;
            var panelHeight = panelWidth / 1.3333;
            canvasPainter.resize(panelWidth * 2, panelHeight * canvasRowCount);
        }
        canvasPainter.setLineWidth($("#brushSizeSlider").slider('option', 'value'));
    }

    function saveRestorePoint() {
        var oCanvas = $("#drawingCanvas")[0];
        var oImg = Canvas2Image.saveAsPNG(oCanvas, true);
        restorePoints.push(oImg.src);
    }

    function restorePoint() {
        if (restorePoints.length > 0) {
            var oImg = new Image();
            oImg.onload = function () {
                canvasPainter.context.drawImage(this, 0, 0, this.width, this.height);
            };
            oImg.src = restorePoints.pop();
        }
    }

    function getOriginalWidthOfImg(img) {
        var t = new Image();
        t.src = (img.getAttribute ? img.getAttribute("src") : false) || img.src;
        return t.width;
    }

    function getOriginalHeightOfImg(img) {
        var t = new Image();
        t.src = (img.getAttribute ? img.getAttribute("src") : false) || img.src;
        return t.height;
    }

    function exportComic(target, submissionTitle) {
        var orderedFaces = $(".face").get();
        orderedFaces.sort(function (a, b) {
            var compA = $(a).css('z-index');
            var compB = $(b).css('z-index');
            return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
        });
        $.each(orderedFaces, function () {
            if ($(this).find('.faceImage').length > 0) {
                drawFaceOnCanvas($(this));
            } else if ($(this).find('.speechTextBox').length > 0) {
                drawTextOnCanvas($(this));
            }
        });
        //if (target != 'smhlmao') addWatermark();
		addWatermark();
        canvasPainter.resize(canvasPainter.context.canvas.width, canvasPainter.context.canvas.height - 1);
        var oCanvas = $("#drawingCanvas")[0];
        var oImg = Canvas2Image.saveAsPNG(oCanvas, true);
        oImg.id = "canvasImage";
        restorePoints = [];
        $('#blank_content').empty().addClass('completedComicSubmission');
        var builderContainer = $('#blank_content')[0];
        $("body").unbind("dragover dragenter drop");
        builderContainer.appendChild(oImg);
        var localSaveMsg = "Right click on the image below and save it locally on your computer!";
        var encodedImageData = $('#canvasImage').attr('src').split(',', 2)[1];
        $(builderContainer).prepend("<!DOCTYPE html><html><head><script type='text/javascript' src='../../js/jquery.mine.js'></script><script type='text/javascript' src='../../js/jquery.validate.js'></script><script type='text/javascript' src='../../js/validate.js'></script></head><body><h1>Ready to Submit!</h1><p>Please write your title,dscription, text and click submit to display your rage comic on the main page.</p><form action='" + submissionUrl + "' id='signupForm' method='post'><label name='title'>Title  (max 80 ch.) :</label><input type='text' id='title' class='inputer' name='title' value=''  maxlength='35' /><br /><label name='desc'>Description :</label><input type='text' name='desc' value='' /><br /><label name='tags'>Tags (max 80 ch.) :</label><input type='text' name='tags' value=''  maxlength='80'/><br /><input type='hidden' name='userid' value='<? echo $userid;?>' /><input type='hidden' name='image' value='" + encodedImageData + "' /><input type='hidden' name='imageTypeId' value='" + imageTypeId + "' /><input type='submit' /></form></body></html>");
    }

    function addWatermark() {
        var img = $("#watermark");
        var paddings = -19;
        canvasPainter.resize(canvasPainter.context.canvas.width, canvasPainter.context.canvas.height + img.height() + (paddings * 2));
        var x = canvasPainter.context.canvas.width - img.width() - paddings;
        var y = canvasPainter.context.canvas.height - img.height() - paddings;
        canvasPainter.context.drawImage(img[0], 2, 2, img.width(), img.height());
    }

    function getImageUnrotatedOffset(oImg) {
        var currentDegrees = getRotationDegrees($(oImg).css('transform'));
        var imgOffset = $(oImg).offset();
        if (currentDegrees != 0) {
            var originalTransform = $(oImg).css('transform');
            $(oImg).css('transform', $(oImg).css('transform').replace('rotate(' + currentDegrees + 'deg)', 'rotate(0deg)'));
            imgOffset = $(oImg).offset();
            $(oImg).css('transform', originalTransform);
        }
        return imgOffset;
    }

    function drawFaceOnCanvas(face) {
        canvasPainter.context.save();
        var canvasPos = $('#drawingCanvas').offset();
        var oImg = face.find('.faceImage')[0];
        var imgPosition = getImageUnrotatedOffset(oImg);
        imgPosition.left -= canvasPos.left;
        imgPosition.top -= canvasPos.top;
        var imgW = $(oImg).width();
        var imgH = $(oImg).height();
        var rotationDegrees = getRotationDegrees($(oImg).css('transform'));
        var isHorizontallyFlipped = $(oImg).css('transform').indexOf('scaleX') >= 0;
        if (rotationDegrees != 0) {
            if (rotationDegrees < 0) rotationDegrees = 360 + rotationDegrees;
            canvasPainter.context.translate(imgPosition.left + (imgW / 2), imgPosition.top + (imgH / 2));
            canvasPainter.context.rotate(rotationDegrees * (Math.PI / 180));
            if (isHorizontallyFlipped) canvasPainter.context.scale(-1, 1);
            canvasPainter.context.drawImage(oImg, 0, 0, getOriginalWidthOfImg(oImg), getOriginalHeightOfImg(oImg), (-1 * imgW) / 2, (-1 * imgH) / 2, imgW, imgH);
        } else {
            var x = imgPosition.left;
            var y = imgPosition.top;
            if (isHorizontallyFlipped) {
                canvasPainter.context.scale(-1, 1);
                x = (x * -1) - imgW;
            }
            canvasPainter.context.drawImage(oImg, x, y, imgW, imgH);
        }
        canvasPainter.context.restore();
        face.remove();
    }

    function drawTextOnCanvas(face) {
        canvasPainter.context.save();
        var canvasPos = $('#drawingCanvas').offset();
        var textBoxTmp = face.find('.speechTextBox');
        var textBoxTmpSizePx = parseInt(textBoxTmp.css('font-size').replace("px", ""));
        var boldness = textBoxTmp.css('font-weight') == 'bold' ? "bold " : "";
        var italic = textBoxTmp.css('font-style') == 'italic' ? "italic " : "";
        var textFont = textBoxTmp.css('font-family');
        canvasPainter.context.textBaseline = "top";
        canvasPainter.context.fillStyle = textBoxTmp.css('color');
        canvasPainter.context.font = boldness + italic + textBoxTmpSizePx + "px " + textFont;
        var textBoxTmpSplit = textBoxTmp.val().split('\n');
        var curPos = $(textBoxTmp).offset();
        curPos.left -= canvasPos.left;
        curPos.top -= canvasPos.top;
        for (var cnt = 0; cnt < textBoxTmpSplit.length; cnt++) {
            canvasPainter.context.fillText(textBoxTmpSplit[cnt], curPos.left, curPos.top + cnt * textBoxTmpSizePx);
        }
        canvasPainter.context.restore();
        face.remove();
    }

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function setBrushColor(color) {
        $('#customWidget').css('color', '#' + color);
        if (canvasPainter) canvasPainter.setColor("#" + color);
    }

    function block(text) {
        $.blockUI({
            css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: 1.0,
                color: '#fff'
            },
            baseZ: 9999,
            message: text
        });
    }

    function unblock() {
        $.unblockUI();
    }
    $.browser = {
        version: (userAgent.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [0, '0'])[1],
        safari: /webkit/.test(userAgent),
        opera: /opera/.test(userAgent),
        msie: /msie/.test(userAgent) && !/opera/.test(userAgent),
        mozilla: /mozilla/.test(userAgent) && !/(compatible|webkit)/.test(userAgent)
    };
    $.fn.makeAbsolute = function (rebase) {
        return this.each(function () {
            var el = $(this);
            pos = el.position();
            el.css({
                position: "absolute",
                marginLeft: 0,
                marginTop: 0,
                top: pos.top,
                left: pos.left
            });
            if (rebase) el.remove().appendTo("body");
        });
    };
    $(window).load(function () {

        $("canvas").width($("#canvasContainer").width());
        canvasPainter = new CanvasPainter("drawingCanvas", "drawingCanvasInterface", {
            x: $("#drawingCanvas").offset().left,
            y: $("#drawingCanvas").offset().top
        }, saveRestorePoint);
        if (canvasRowCount == 0) addRows(canvasInitialRows);
        canvasPainter.setDrawAction(1);
        canvasPainter.setLineWidth(initialBrushWidth);
        LoadPacks($("#drpPacks"));
        unblock();
        if (firstTime(thisPage())) {
            var imgName = "";
            var startUpMsg = "";
            if ($.browser.msie) {
                startUpMsg = "This application does not support Internet Explorer! Please use Firefox, Chrome or Safari!";
                imgName = "images/messageLol.png";
            }
            if (startUpMsg != "") {
                startUpMsg = "<div>" + "<div style='float: left'><img src='" + imgName + "'></div>" + "<div>" + startUpMsg + "</div>" + "<div style='clear: both'></div>" + "</div>";
                $("#startUpMessageContainer").html(startUpMsg);
                $("#startUpMessageContainer").dialog({
                    modal: true,
                    resizable: false,
                    buttons: {
                        "Ok": function () {
                            $(this).html("");
                            $(this).dialog("close");
                        }
                    }
                });
            }
        }
    });
    $(document).ready(function () {
        block('Loading ...');
        $("#exportContainer").dialog({
            width: 400,
            modal: true,
            resizable: false,
            autoOpen: false,
            buttons: {
                "NEXT": function () {
                    $(this).dialog("close");
                    exportComic('NEXT');
                },
                "Close": function () {
                    $(this).dialog("close");
                }
            }
        });
        $("#promptContainer").dialog({
            modal: true,
            resizable: false,
            autoOpen: false,
            buttons: {
                "Import": function () {
                    var url = $("#txtImportUrl").val();
                    $dlg = $(this);
                    $dlg.find('.errorText').html("");
                    if (url != '') {
                        block('Importing...');
                        $.getImageData({
                            url: url,
                            success: function (image) {
                                addFace('', image.src, function () {
                                    $dlg.dialog("close");
                                    unblock();
                                }, function () {
                                    $dlg.find('.errorText').html('Invalid image!');
                                    unblock();
                                });
                            },
                            error: function (xhr, text_status) {
                                $dlg.find('.errorText').html('Error: ' + text_status);
                                unblock();
                            }
                        });
                    } else {
                        $dlg.find('.errorText').html('Please set URL to image!');
                    }
                },
                "Close": function () {
                    $(this).dialog("close");
                }
            },
            close: function (event, ui) {
                $("#txtImportUrl").val("");
                $("#promptContainer").find('.errorText').html("");
            }
        });
        $("#flickrContainer").dialog({
            modal: true,
            resizable: false,
            autoOpen: false,
            buttons: {
                "Search": function () {
                    $("#flickrResult").html("");
                    var val = $("#flickrSearchTerm").val();
                    if (val != '') {
                        $dlg = $(this);
                        $("#flickrResult").hide();
                        $("#flickrHelpText").hide();
                        $("#flickrLoading").html("<img src='images/loading.gif' alt='Loading ...' />").show();
                        $('#flickrResult').flickr({
                            api_key: flickrApiKey,
                            type: 'search',
                            text: val,
                            per_page: 6,
                            sort: 'relevance',
                            attr: "onClick=\"return importFlickrImage(this.href, $dlg);\"",
                            callback: flickrSearchResultCallback
                        });
                    }
                },
                "Close": function () {
                    $(this).dialog("close");
                }
            },
            close: function (event, ui) {
                $("#flickrSearchTerm").val("");
                $("#flickrResult").html("");
                $("#flickrLoading").html("");
                $("#flickrHelpText").show();
            }
        });
        $('#addFrameCtrl').click(function () {
            addRows(1);
        });
        $('#removeFrameCtrl').click(removeRow);
        $('#clearCanvas').click(function () {
            if (confirm("Are you sure you want to clear the canvas?")) {
                $(".face").remove();
                canvasPainter.clearCanvas();
                if (canvasRowCount > canvasInitialRows) {
                    while (canvasRowCount > canvasInitialRows)
                    removeRow();
                } else if (canvasRowCount < canvasInitialRows) {
                    addRows(canvasInitialRows - canvasRowCount);
                }
                addRowsBackground(canvasRowCount);
                addRowsLines(canvasRowCount);
                restorePoints = [];
            }
        });
        $('#addTextCtrl').click(addText);
        $('#exportCanvas').click(function () {
            $("#exportContainer").dialog('open');
        });
        $('#importImage').click(function () {
            $("#promptContainer").dialog('open');
        });
        $('#flickrImport').click(function () {
            $("#flickrContainer").dialog('open');
        });
        if ($.browser.mozilla || $.browser.safari) {
            $("body").imgDrop({
                beforeDrop: function () {
                    block('Importing ...');
                },
                afterDrop: function (img) {
                    addFace('', img.attr('src'));
                },
                afterAllDrop: function () {
                    unblock();
                }
            });
        }
        $('#undoBrush').click(function () {
            restorePoint();
        });
        $('#customWidget').ColorPicker({
            color: initBrushColor,
            onShow: function (colpkr) {
                $(colpkr).fadeIn(500);
                return false;
            },
            onSubmit: function (hsb, hex, rgb, el) {
                $(el).ColorPickerHide();
            },
            onChange: function (hsb, hex, rgb) {
                setBrushColor(hex);
            }
        });
        $("#brushSizeSlider").slider({
            min: 1,
            max: 50,
            orientation: 'vertical',
            value: initialBrushWidth,
            change: function (event, ui) {
                canvasPainter.setLineWidth(ui.value);
            },
            stop: function (event, ui) {
                $('#brushSize').trigger('click');
            }
        });
        $('#brushSize').click(function () {
            var pos = $(this).offset();
            pos.left += 10;
            pos.top += 20;
            $("#brushSizeSlider").slideToggle();
        });
        setBrushColor(initBrushColor);
    });
};