/**
 * @package WordPress
 * @subpackage Constructor
 * 
 * @author   Anton Shevchuk <AntonShevchuk@gmail.com>
 * @link     http://anton.shevchuk.name
 */
(function($){
    $(document).ready(function(){

        // Header Drop-Down Menu
        if ($("#menu ul ul").length > 0) {
			
			$("#menu li:has(ul)").addClass('indicator');
			
			$("#menu li:has(ul)").hover(function(){
				$(this)
					.addClass('hover')
					.children('ul')
						.stop(true,true)
						.slideDown()
					;
				$(this).find('div.menu-header-menu-container')
					   .children('ul')
                           .stop(true,true)
                           .slideDown()
					;
			}, function(){
				$(this)
					.removeClass('hover')
					.children('ul')
					.slideUp()
					;
				$(this).find('div.menu-header-menu-container')
					   .children('ul').slideUp()
					;
			});
        }
		
		// Header Search Form
        var $menuSearch = $('#menusearchform .s');
        var defaultValue = $menuSearch.hasClass('default')?$menuSearch.val():'Search...';

		$('#menusearchform .s').mouseenter(function(){
            /* hover logic */
		    if (!$menuSearch.data('expand')) {
		        $menuSearch.data('expand', true);
			    $menuSearch.animate({width:'+=32px',left:'-=16px'});
		    }
            /* end */
		}).mouseleave(function(){
            /* hover logic */
		    $menuSearch.data('expand', false);
            $menuSearch.animate({width:'-=32px',left:'+=16px'});
            /* end */
            if ($menuSearch.val() == '') {
                $menuSearch.val(defaultValue);
                $menuSearch.addClass('default');
            }
        }).click(function(){
            if ($menuSearch.val() == defaultValue) {
                $menuSearch.val('');
                $menuSearch.removeClass('default');
            }
        });

        // Header Slideshow
		if ($('.wp-sl').length > 0) {
			var sl = $('.wp-sl').wpslideshow({
			    url:wpSl.slideshow,
				thumb: wpSl.thumb,
				thumbPath: wpSl.thumbPath,
				limit: 480,
				effectTime: 1000,
				timeout: 10000,
				play: true
			});
		}

        // Tiles - small tile layout
        $('.tiles').hover(function(){
           $(this).find('.thumbnail').hide();
           $(this).find('.announce').fadeIn();
        }, function(){
           var $self = $(this);
           $self.find('.announce').fadeOut(function(){
               $self.find('.thumbnail').show();
           });
        });

		// No underline for a with img
		$('a:has(img)').css({border:0});
    });
})(jQuery);