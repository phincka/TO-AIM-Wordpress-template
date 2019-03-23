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
	setTimeout(showSlides, 10000); // Change image every 2 seconds
};

	  var map;


	  
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
			center: { lat: 54.737364, lng: 18.832070 },
		zoom: 9,
		styles: [
			{
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#f5f5f5"
				}
				]
			},
			{
				"elementType": "labels.icon",
				"stylers": [
				{
					"visibility": "off"
				}
				]
			},
			{
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#616161"
				}
				]
			},
			{
				"elementType": "labels.text.stroke",
				"stylers": [
				{
					"color": "#f5f5f5"
				}
				]
			},
			{
				"featureType": "administrative.land_parcel",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#bdbdbd"
				}
				]
			},
			{
				"featureType": "poi",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#eeeeee"
				}
				]
			},
			{
				"featureType": "poi",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#757575"
				}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#e5e5e5"
				}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#9e9e9e"
				}
				]
			},
			{
				"featureType": "road",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#ffffff"
				}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#757575"
				}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#dadada"
				}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#616161"
				}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#9e9e9e"
				}
				]
			},
			{
				"featureType": "transit.line",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#e5e5e5"
				}
				]
			},
			{
				"featureType": "transit.station",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#eeeeee"
				}
				]
			},
			{
				"featureType": "water",
				"stylers": [
				{
					"color": "#e75a7c"
				}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#c9c9c9"
				}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#e75a7c"
				}
				]
			},
			{
				"featureType": "water",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#9e9e9e"
				}
				]
			}
			]
		});
			   var marker = new google.maps.Marker({
          position: {lat: 54.7179000, lng: 18.4084100},
          map: map,
          title: 'Hello World!'
        });
      }