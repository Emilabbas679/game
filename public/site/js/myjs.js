function copyFunction() {
	var copyText = document.getElementById("link_inpt");
	copyText.select();
	copyText.setSelectionRange(0, 99999)
	document.execCommand("copy");
  }

	
  $(document).ready(function () {

	var tst_cnt = $("div.swiper-slide").index();
	// alert(tst_cnt);
	$("div#tst").first().addClass("swiper-slide-active");

	$('div.test-rows input').click(function() {
		$("div#tst").removeClass("swiper-slide-active");
		$(this).nextEl();
		
		var adcls = $(this).parent("div.row_in").parent("div.row-frm").parent("div.test-rows").parent("div.swiper-slide").next().addClass("swiper-slide-active");
		tst_cnt = tst_cnt + 1;
		
		if(tst_cnt<10){
			
			$('html, body').animate({
			scrollTop: $(adcls).offset().top
			}, 1000)
			
		}else {
			return true;
		}
		
  	})


  });



$(window).on('beforeunload', function(){
    $(window).scrollTop(0);
});



var swiper = new Swiper('.swiper-container', {

	direction: 'vertical',
	mousewheelControl: false,
	mousewheel: false,
	speed: 1000,
	// animationTime: 4000,
	slidesPerView: 1,
	navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
	keyboard: {
	  enabled: false,
	  onlyInViewport: false,
	},
	// freeMode: true,
	// freeModeSticky: true,
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