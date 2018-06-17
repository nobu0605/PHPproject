;(function(){

			// Menu settings
			$('#menuToggle, .menu-close').on('click', function(){
				$('#menuToggle').toggleClass('active');
				$('body').toggleClass('body-push-toleft');
				$('#theMenu').toggleClass('menu-open');
			});

			
		  $(function(){
		    $(".hamburger-menu").on("click", function() {
		      $(".header-menu").slideToggle();
		      });
		    });

	
		  $('.header-menu a').click(function(){
		    var id = $(this).attr('href');
		    var position = $(id).offset().top;
		    $('html,body').animate({ 
		      'scrollTop':position 
		    }, 300);
		  });


})(jQuery)