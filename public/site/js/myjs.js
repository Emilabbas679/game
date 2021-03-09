function copyFunction() {
	var copyText = document.getElementById("link_inpt");
	copyText.select();
	copyText.setSelectionRange(0, 99999)
	document.execCommand("copy");
  }
  
    $("#scroll-div").submit(function(e){
		$($('.slt').not('.selected').get().reverse()).each(function() {
		 
			swiper.slideTo($(this).index()); 
			if($(this).index() >= 0) {
			e.preventDefault();
			}
		});
        
    });
 

	$("#start_form").submit(function(e){
        var strt_input = $("#start_iput").val();
		if(strt_input == "") {
			e.preventDefault();
		}
    });



$(window).on('beforeunload', function(){
    $(window).scrollTop(0);
});


var swiper = new Swiper('.swiper-container', {

	direction: 'vertical',
	mousewheelControl: false,
	mousewheel: false,
	speed: 1000,
	// allowTouchMove: false,
	slidesPerView: 1,
	navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
	keyboard: {
	  enabled: false,
	  onlyInViewport: false,
	},
  });
  
  window.addEventListener('wheel', function (e) {
	  if (e.deltaY > 0) {
	  // down
	  swiper.slideNext()
	} else {
	  // UP
	  swiper.slidePrev()
	}
  })


  $(document).ready(function () {


	$('div.test-rows input').click(function() {
		$(this).parents('.swiper-slide').addClass('selected');
		setTimeout(function(){  swiper.slideTo(swiper.clickedIndex + 1);}, 500);
		console.log( swiper.realIndex); 
		
	})
});

