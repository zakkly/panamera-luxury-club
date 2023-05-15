$(function() {
	var $header = $('.global-header');
	// Nav Fixed
	$(window).scroll(function() {
	if ($(window).scrollTop() > 100) {
		$header.addClass('fixed');
	} else {
		$header.removeClass('fixed');
	}
	});
	$(document).ready(function() {
		$('.drawer').drawer();
	});
	$("#datepicker").datepicker({minDate: '0d'});
	//ローディングエリアを取得
	var loading = $("section.loading");
	window.setTimeout(function() {
		$("section.loading .logo_white").delay(0).fadeIn(1000);
		$("section.loading .loading__img").delay(2000).fadeOut(1200);
		$("section.loading").delay(3000).fadeOut(2000);
    }, 2000);
    var headerHeight = $('.global-header').outerHeight();
	$('a[href^="#"]').click(function() {
		var href= $(this).attr("href");
		var target = $(href);
		var position = target.offset().top - headerHeight;
		$('body,html').stop().animate({scrollTop:position}, 500);   
	return false;
	});
	AOS.init({
		easing: 'ease-out-back',
		duration: 1000
	});
});
