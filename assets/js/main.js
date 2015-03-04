jQuery(document).ready(function($){

	// Push navigation
	function togglePushNav() {
		$('body').toggleClass('push-active');
		$('.push-sidebar').toggleClass('push-left push-open');
		$('#wrapper').toggleClass('wrap-push');
	}
	$('.menu-button').click(function(){
		togglePushNav();
	});

	$('.navigation-overlay').click(function(){
		togglePushNav();
	});

	// Conent Center
	/*function contentCenter() {
		var navigation = $('.primary-nav').height(),
		pushNav = $('.push-sidebar').height(),
		topMargin = (pushNav - navigation) / 2;

		$('.primary-nav').css({
	                "margin-top": topMargin + "px"
	            });
	}

	contentCenter();

	$( window ).resize(function() {
		contentCenter();
	});*/

	/*--------------------------------------------------------------------------------------*/
	/*  Primary navigation
	/*--------------------------------------------------------------------------------------*/
	$('.primary-nav li.menu-item-has-children > a').click(function(event) {
		event.preventDefault();
		var $this = $(this);
		var ul = $this.next('ul');
		var ulChildrenHeight = ul.children().length * 32;

		if(!$this.parent().hasClass('active')){
			$this.parent().toggleClass('active');
			ul.toggleClass('active');
			ul.height(ulChildrenHeight + 'px');
		} else {
			$this.parent().toggleClass('active');
			ul.toggleClass('active');
			ul.height(0);
		}
	});

	/* Auto expend for current menu items */ 
	var $navItems = $('.primary-nav ul li');

	$navItems.each(function(index){
		if ($(this).hasClass('current-menu-item')) {
			$parentUl = $(this).parent();
			$parentUl.height($parentUl.children('li').length * 32 + "px");
			$parentUl.parent().addClass('active');
		}
	});

}(jQuery));