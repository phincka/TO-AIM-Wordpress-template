jQuery(document).ready(function ($) {

	/**
	 * Animates to anchor if href has hashtag
	 */
	$(document).on('click', 'a[href^="#"]', function (e) {
		e.preventDefault();
		if ($.attr(this, 'href') != '#') {
			$('html, body').animate({
				scrollTop: $($.attr(this, 'href')).offset().top
			}, 500);
		}
	});

	/**
	 * Do action after scolling more than $scrollOffset 
	 */
	// var st;
	// var scrollOffset = 500;
	// $(window).scroll(function () {
	// 	st = $(document).scrollTop() >= scrollOffset ?
	// 		$(".header").removeClass('header--fixed') :
	// 		$(".header").addClass('header--fixed');
	// });


	/**
	 * escape key 
	 */
	// $(document).keyup(function (e) {
	// 	if (e.keyCode == 27) {
	// 		// hide lightbox
	// 	}
	// });


	/**
	 * rellax example
	 */
	// var rellax = new Rellax('.rellax', {
	//   center: true,
	//   vertical: true,
	// });


	/**
	 * animejs example
	 */
	// var cssSelector = anime({
	// 	targets: '.class',
	// 	translateX: 250
	// });

	/**
	 * Aoe example
	 */
	// aoe();


	/**
	 * Init headroom
	 */
	var header = document.querySelector("header");
	var headroom = new Headroom(header);
	headroom.init();

	/**
	 * Toggle mobile menu
	 */
	$(".menu__toggle").click(function () {
		$(".header").toggleClass('header--toggled');
		$("body").toggleClass('body--toggled');
	});

	$("body").addClass('loaded');
	console.log("https://websitestyle.pl - Strony internetowe - zapraszamy na rozmowę rekrutacyjną :)");



});

let slideIndex = 0;
showSlides();

function showSlides() {
	const slides = document.getElementsByClassName("slieds");
	const dots = document.getElementsByClassName("dot");
	for (let i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	slideIndex++;
	if (slideIndex > slides.length) { slideIndex = 1 }
	for (let i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	slides[slideIndex - 1].style.display = "block";
	dots[slideIndex - 1].className += " active";
	setTimeout(showSlides, 5000); // Change image every 2 seconds
}