/**
 * @package WordPress
 * @subpackage Constructor
 */
(function($){
    /**
     * Create a new instance of slideshow.
     *
     * @classDescription	This class creates a new slideshow and manipulate it
     *
     * @return {Object}	Returns a new slideshow object.
     * @constructor
     */
    $.fn.wpslideshow = function(options) {
        var defaults = {};
        var options  = $.extend({}, defaults, options);
        
        var slideshow = this;

        /**
         * external functions - append to $
         *
         * @param string title
         * @param string url
         * @param string img
         * @param string text
         */
        slideshow.addSlide = function(title, url, img, text){ 
            slideshow.each(function () { this.addSlide(title, url, img, text); })
        };
        
        /**
         * external functions - append to $
         */
        slideshow.nextSlide = function(){ 
            slideshow.each(function () { this.nextSlide(); })
        };
        
		/*
		 * Construct
		 */
		return this.each(function(){
            var _self = this;
            var $this = $(this);
            var counter = 0;
            
            /**
             * add slide to stack
             *
             * @param string title
             * @param string url
             * @param string img
             * @param string text
             */
            this.addSlide = function(title, url, img, text){                
                if (text.length > 180) {
                    text = text.substring(0,180);
                    text += '...';
                }
                
                $this.append('<div><a href="'+url+'" title="'+title+'">'+title+'</a><img src="'+img+'" alt="'+title+'"/><p>'+text+'<span></span></p></div>');
                
                var div = $this.find('> div:last');
                
                div.click(function(){
                    _self.nextSlide();
                });
                
                if (counter!=0) {
                    div.hide();
                }
                counter++;
            };
            
            this.nextSlide = function(){
                
                if ($this.find('> div').length == 1) return;
                
                var current = $this.find('> div:visible');
                var next    = $this.find('> div:visible').next();
                
                if (next.length == 0) {
                    next = $this.find('> div:first');
                }
                
                current.css({});
                next.css({left:$this.width()}).show();
                
                current.animate({left:-$this.width()}, 'slow', function(){ $(this).hide()});
                next.animate({left:0}, 'slow');
            }

            return _self;
        });
    }
    
    $(document).ready(function(){
        var sl = $('.wp-sl').wpslideshow();
        
        $('.hentry').each(function(){
            
            var text  = $(this).find('.entry').text();            
            var title = $(this).find('.title a').attr('title');
            var url   = $(this).find('.title a').attr('href');
            var img   = $(this).find('.entry img:first').attr('src');
            
            if (img)
                sl.addSlide(title,url,img,text);
        });
    });
    
})(jQuery);
