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
        if ($("#header-links > ul ul").length > 0) {
			
			$("#header-links li:has(ul)").addClass('indicator');
			
			$("#header-links li:has(ul)").hover(function(){
				$(this)
					.addClass('hover')
					.children('ul')
						.stop(true,true)
						.slideDown()
						//.animate({opacity:1},{queue:false})
					;
			}, function(){
				$(this)
					.removeClass('hover')
					.children('ul')
						.slideUp()
						//.animate({opacity:0.2},{queue:false})
					;
			});
        }
		// Header Search Form
		$('#menusearchform .s').mouseenter(function(){
			$(this).animate({width:'+=32px',left:'-=16px'});
		}).mouseleave(function(){
            $(this).animate({width:'-=32px',left:'+=16px'});
        });

        // Header Slideshow
		if ($('.wp-sl').length > 0) {
			var sl = $('.wp-sl').wpslideshow({
				thumb: false,
				thumbPath: wpSl.thumbPath,
				limit: 480,
				effectTime: 1000,
				timeout: 10000,
				play: true
			});
			
			$.ajax({
				type: "GET",
				url: wpSl.slideshow,
				dataType: "xml",
				success: function(data){
					if ($('post', data).length == 0) {
						$('#header-slideshow').hide();
					};
					$('post', data).each(function(){
						var _self = $(this);
						sl.addSlide(_self.children('title').text(),
									_self.find('permalink').text(),
									_self.find('image').text(),
									_self.find('content').text());
					});
				}
			});
		}
        // Sidebar Resizer
        if ($('.sidebar').length > 0) {
			
			console.log($('#sidebar').outerHeight(), $('#container').outerHeight(), $('#wrapper').outerHeight(), $('#extra').outerHeight());
			
            if ($('#sidebar').length > 0 && $('#sidebar').outerHeight() > $('#container').outerHeight()) {
                $('#container').css('min-height', $('#sidebar').outerHeight()
											 -  parseInt($('#container').css('padding-top'))
											 -  parseInt($('#container').css('padding-bottom')));
            } else if ($('#sidebar').length > 0 && $('#sidebar').outerHeight() < $('#container').outerHeight()) {
				
                $('#sidebar').css('min-height', $('#container').outerHeight()
											 -  parseInt($('#sidebar').css('padding-top'))
											 -  parseInt($('#sidebar').css('padding-bottom')));
            }
            
            if ($('#extra').length > 0 && $('#extra').outerHeight() > $('#container').outerHeight()) {
                $('#container').css('min-height', $('#extra').outerHeight()
											 -  parseInt($('#container').css('padding-top'))
											 -  parseInt($('#container').css('padding-bottom')));
            }
        }
    });
})(jQuery);