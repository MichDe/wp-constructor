/**
 * @package WordPress
 * @subpackage Constructor
 */
(function($){
    $(document).ready(function(){

        // Header Drop-Down Menu
        if ($("#header-links > ul ul").length > 0) {
            $("#header-links > ul").superfish().find('ul').bgIframe({opacity:false});
        }

        // Header Font Resizer
        if ($("#size").length > 0) {

            $("#size a.big").click(function(){
                $('body').css('font-size', '0.72em');
                return false;
            });

            $("#size a.normal").click(function(){
                $('body').css('font-size', '0.625em');
                return false;
            });

            $("#size a.small").click(function(){
                $('body').css('font-size', '0.56em');
                return false;
            });
        }

        // Header Slideshow

        // Sidebar Resizer
        if ($('.sidebar').length > 0) {
            if ($('#sidebar').length > 0 && $('#sidebar').height() > $('#container').height()) {
                $('#container').css('height', $('#sidebar').height() + 6 +'px');
            }
            
            if ($('#extra').length > 0 && $('#extra').height() > $('#container').height()) {
                $('#container').css('height', $('#extra').height() + 6 +'px');
            }
        }
    });
})(jQuery);