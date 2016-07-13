var app = {};

app.init = function init() {
	app.menu();
	app.readHover();
};

app.menu = function() {
	var menu 	= $('#main-menu').offset().top,
		topMenu = $('.top-fix-nav'),
		win 	= $(window);

	win.scroll(function() {
		if(win.scrollTop() > menu) {
			topMenu.show();
		} else {
			topMenu.hide();
		}
	});

	$('.w-nav-button').off().on({
		'click' : function() {
			topMenu.find('nav').slideToggle();
		}
	});
};

app.readHover = function() {
	$('.cta-div').off().on({
		'mouseenter' : function() {
			$(this).parent().find('h2 a').css('color', '#41d88b');
		},
		'mouseleave' : function() {
			$(this).parent().find('h2 a').removeAttr('style');
		}
	});
	$('.blog-title').off().on({
		'mouseenter' : function() {
			$(this).find('a').css('color', '#41d88b');
			$(this).parent().find('.arrow').css('background-image', 'url('+link+'/images/Green-Arrow@2x.png)');
			$(this).parent().find('.link-read-more').css('color', '#41d88b');
		},
		'mouseleave' : function() {
			$(this).parent().find('.arrow, .link-read-more, .blog-title a').removeAttr('style');
		}
	});

	$('.side-project-cta').off().on({
		'mouseenter' : function() {
			console.log('a');
			$(this).find('.arrow').css('background-image', 'url('+link+'/images/Green-Arrow@2x.png)');
		},
		'mouseleave' : function() {
			$(this).find('.arrow').removeAttr('style');
		}
	});
};

app.init();