$(document).ready(function() {

	if($('body').attr('id')) {
		$.ajax({ type: "POST", 
			 url: "/ajax/view.php", 
			 data: "meme=" + $('body').attr('id')
		});	
	}

	$('#scrollClick').live('click', function() {
		var template = $(this).attr('rel');
		var image = $('img', this).attr('src');
		image = image.replace("/120", "");
		$('#createUpload').hide();
		$('#scrollPreview').attr('src', image);
		$('#generateDoo').attr('rel', 'main-' + template);
	});

	$('.lmao, .lmao-active').live('click', function() { 
		var voteData = $(this).attr('id');
		splitData = voteData.split('-');
		var location = splitData[3];
		var currentScore = $('#' + voteData).html();
		var currentClass = $(this).attr('class');
		var smhClass = $('#smh-' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).attr('class');

			$.ajax({ type: "POST", 
					 url: "/ajax/vote.php", 
					 data: "type=" + splitData[1] + "&item_id=" + splitData[2] + "&value=lmao", 
					 success: function(msg) { 
						if(msg) { alert(msg); } else { 

							if(currentClass=="lmao") { 
					
								if(smhClass=="smh") {
					
									$('#lmao-' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).removeClass('lmao').addClass('lmao-active');
									$('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text(Math.max(parseInt($('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text()) + 1));
					
								} else {
					
									$('#smh-' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).removeClass('smh-active').addClass('smh');
									$('#lmao-' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).removeClass('lmao').addClass('lmao-active');
									$('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text(Math.max(parseInt($('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text()) + 2));

								}

							} else {
					
								$('#lmao-' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).removeClass('lmao-active').addClass('lmao');
					
								$('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text(Math.max(parseInt($('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text()) - 1));

							}

						}
					 } 
			});
	});
	$('.smh, .smh-active').live('click', function() { 
		var voteData = $(this).attr('id');
		splitData = voteData.split('-');
		var currentScore = $('#' + voteData).html();
		var currentClass = $(this).attr('class');
		var lmaoClass = $('#lmao-' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).attr('class');

			$.ajax({ type: "POST", 
					 url: "/ajax/vote.php", 
					 data: "type=" + splitData[1] + "&item_id=" + splitData[2] + "&value=smh", 
					 success: function(msg) { 
						if(msg) { alert(msg); } else { 

							if(currentClass=="smh") { 
					
								if(lmaoClass=="lmao") {
					
									$('#smh-' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).removeClass('lmao-active').removeClass('smh').addClass('smh-active');
									$('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text(Math.max(parseInt($('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text()) - 1));
					
								} else {
					
									$('#lmao-' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).removeClass('lmao-active').addClass('lmao');
									$('#smh-' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).removeClass('lmao-active').removeClass('smh').addClass('smh-active');
									$('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text(Math.max(parseInt($('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text()) - 2));
					
								}
					
							} else {
					
								$('#smh-' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).removeClass('lmao-active').removeClass('smh-active').addClass('smh');
					
								$('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text(Math.max(parseInt($('#' + splitData[1] + '-' + splitData[2] + '-' + splitData[3]).text()) + 1));
					
							}

						}

					 } 
			});

	});
	$('#generateDo, #generateDoo').live('click', function() {
		var data = $(this).attr('rel');
		data = data.split('-');

		if(data[0]=="random") {
			var top = $('#rand-top-input').val();
			var bottom = $('#rand-bottom-input').val();

		} else if(data[0]=="main") { 
			var top = $('#main-top-input').val();
			var bottom = $('#main-bottom-input').val();
		} else if(data[0]=="upCust") { 
			var top = $('#main-top-input').val();
			var bottom = $('#main-bottom-input').val();
			data[1] = $('#scrollPreview').attr('rel');
			data[1] = data[1].replace("http://meme.generatorscripts.com", "");
		}

		if(!top && !bottom) {
			alert("Y No Enter Text?");
		} else {

			top = fetchAscii(top);
			bottom = fetchAscii(bottom);

			$.ajax({ type: "POST", 
					 url: "/ajax/createMeme.php", 
					 data: "meme=" + data[1] + "&top=" + encodeURIComponent(top) + "&bottom=" + encodeURIComponent(bottom), 
					 success: function(msg) { 
						if(msg=='error') { 
							alert("You have hit your limit of meme's as a free user.\nSign up free or try again in an hour.");
						} else { 
							window.location = msg;
						}
					 } 
			});

		}
		return false;
	});

});

function fetchAscii(obj)
{

      var convertedObj = '';

      for(i = 0; i < obj.length; i++)
      { 

            var asciiChar = obj.charCodeAt(i);

            convertedObj += '&#' + asciiChar + ';';

      } 

      return convertedObj;

}