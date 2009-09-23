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
				$(this).stop(true,true)
					.addClass('hover')
					.children('ul').show();
			}, function(){
				$(this).stop(true,true)
					.removeClass('hover')
					.children('ul').hide();
			});
        }

        // Header Slideshow

        // Sidebar Resizer
        if ($('.sidebar').length > 0) {
			
            if ($('#sidebar').length > 0 && $('#sidebar').outerHeight() > $('#container').outerHeight()) {
                $('#container').css('height', $('#sidebar').outerHeight() + 6
											 -  parseInt($('#container').css('padding-top'))
											 -  parseInt($('#container').css('padding-bottom')));
            } else if ($('#sidebar').length > 0 && $('#sidebar').outerHeight() < $('#container').outerHeight()) {
				
                $('#sidebar').css('height', $('#container').outerHeight() - 6
											 -  parseInt($('#sidebar').css('padding-top'))
											 -  parseInt($('#sidebar').css('padding-bottom')));
            }
            
            if ($('#extra').length > 0 && $('#extra').outerHeight() > $('#container').outerHeight()) {
                $('#container').css('height', $('#extra').outerHeight() + 6
											 -  parseInt($('#container').css('padding-top'))
											 -  parseInt($('#container').css('padding-bottom')));
            }
        }
    });
})(jQuery);