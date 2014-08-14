$(document).ready(function(){
		$('#simple-target-1').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-1',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
	$(document).ready(function(){
		$('#simple-target-2').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-2',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
	//*************************************************//
	$(document).ready(function(){
		$('#simple-target-3').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-3',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
		//*************************************************//
	$(document).ready(function(){
		$('#simple-target-4').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-4',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
		//*************************************************//
	$(document).ready(function(){
		$('#simple-target-5').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-5',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
		//*************************************************//
	$(document).ready(function(){
		$('#simple-target-6').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-6',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
		//*************************************************//
	$(document).ready(function(){
		$('#simple-target-7').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-7',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
	//*************************************************//
	$(document).ready(function(){
		$('#simple-target-8').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-8',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
	//*************************************************//
	$(document).ready(function(){
		$('#simple-target-9').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-9',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
	//*************************************************//
	$(document).ready(function(){
		$('#simple-target-10').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-10',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
	//*************************************************//
	$(document).ready(function(){
		$('#simple-target-11').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-11',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-12').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-12',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-13').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-13',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-14').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-14',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-14').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-14',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-14').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-14',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-15').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-15',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-16').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-16',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-17').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-17',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-18').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-18',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-19').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-19',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-20').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-20',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-21').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-21',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-22').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-22',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-23').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-23',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-24').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-24',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-25').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-25',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-26').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-26',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-27').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-27',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-28').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-28',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
//*************************************************//
	$(document).ready(function(){
		$('#simple-target-29').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-29',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});
	
	//*************************************************//
	$(document).ready(function(){
		$('#simple-target-30').ezpz_tooltip();
		
		$("#effects").ezpz_tooltip({
			contentId: 'simple-content-30',
			showContent: function(content) {
				content.fadeIn('slow');
			},
			hideContent: function(content) {
				
				content.stop(true, true).fadeOut('slow');
			}
		});
		
		$("#static-target-1").ezpz_tooltip({
			contentPosition: 'rightStatic'
		});
		
		$("#stay-target-1").ezpz_tooltip({
			contentPosition: 'belowStatic',
			stayOnContent: true,
			offset: 0
		});
		
		$("#ajax-target-1").ezpz_tooltip({
			beforeShow: function(content){
				if (content.html() == "") {
					$.get("/ajax.txt", function(html){
						content.html(html);
					});
				}
			}
		});

		$("#fancy-target-1").ezpz_tooltip();
	});