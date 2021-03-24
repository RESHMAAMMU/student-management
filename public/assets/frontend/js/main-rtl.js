$(window).on("load", function () {

	$('#header .open-menu-btn').click(function () {
		$('body').toggleClass('open-menu');
		return false;
	});

	$('#main-navigation .close-menu-btn').click(function () {
		$('body').removeClass('open-menu');
		return false;
	});

	$('#main-navigation ul.menu > li.parent > a').click(function () {
		if ($(window).width() < 992) {
			$("#main-navigation .content").slideUp(200);
			if ($(this).parent().hasClass('active')) {
				$(this).parent().removeClass('active');
			} else {
				$('#main-navigation ul.menu > li').removeClass('active');
				$(this).parent().addClass('active');
				$(this).parent().find('.content').slideDown(200);
			}
			return false;
		}
	});

	$(".figure1").each(function () {
		var jQuerySrc = $(this).find("img").attr("src");
		$(this).find('img').css("visibility", "hidden");
		$(this).css("background-image", "url(" + jQuerySrc + ")");
	});

	$(".home #banner .item").each(function () {
		var jQuerySrc = $(this).find("img.mobile").attr("src");
		$(this).find('img').css("visibility", "hidden");
		$(this).css("background-image", "url(" + jQuerySrc + ")");
	});

});

$(window).on("load", function () {

	$(".same-height").matchHeight();

	$(".carousel1").owlCarousel({
		loop: true,
		margin: 0,
		nav: true,
		rtl: true,
		dots: false,
		autoplay: true,
		animateOut: 'fadeOut',
		items: 1
	});

  $("#slider-range").slider({
        range: true,
        min: 0,
        max: 10000,
        values: [0, 10000],
        slide: function (event, ui) {
            $("#minval").val(ui.values[0]);
            $("#maxval").val(ui.values[1]);
            $("#sidebar .widget .min p span").html(ui.values[0]);
            $("#sidebar .widget .max p span").html(ui.values[1]);
        }
    });

    $("#sidebar .widget .min p span").html($("#slider-range").slider("values", 0));
    $("#sidebar .widget .max p span").html($("#slider-range").slider("values", 1));

	$("#content .col-lg-3 .filters , #sidebar .close").on("click", function () {
		$("body").toggleClass("sidebar-open");
		return false;
	});

	$('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		rtl: true,
		initialSlide: 2,
		asNavFor: '.slider-nav'
	});

	$('.slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: false,
		centerPadding: '0px',
		rtl: true,
		initialSlide: 0,
		infinite: true,
		centerMode: true,
		focusOnSelect: true
	});

	$("#datepicker").datepicker({
		showOn: "both",
		buttonImage: "assets/frontend/images/calendar.png",
		buttonImageOnly: true,
		buttonText: "Select date"
	});

	objectFitImages();

});

