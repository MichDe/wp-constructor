/**
 * @package WordPress
 * @subpackage Constructor
 * 
 * @author   Anton Shevchuk <AntonShevchuk@gmail.com>
 * @link     http://anton.shevchuk.name
 * 
 * @version 0.2
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
        var defaults = {
            thumb:false,
            thumbPath:'/wp-content/themes/constructor/timthumb.php?src=',
            effectTime:300,
            timeout:3000,
            limit:240,
            play:true
            
        };
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
            var playId = null;
            
            $this.addClass('opacity');
            $this.append('<span class="prev opacity">&laquo;</span>');
            $this.append('<span class="next opacity">&raquo;</span>');
            $this.find('> span.prev').click(function(){
                _self.prevSlide();
            });
            $this.find('> span.next').click(function(){
                _self.nextSlide();
            });
            
            /**
             * add slide to stack
             *
             * @param string title
             * @param string url
             * @param string img
             * @param string text
             */
            this.addSlide = function(title, url, img, text){                
                if (text.length > options.limit) {
                    text = text.substring(0, options.limit);
                    text += '...';
                }
                var domain = document.domain;
                    domain = domain.replace(/\./i,"\.");  // for strong check domain name

                var relocal = new RegExp("^((https?:\/\/"+domain+")|(?!http:\/\/))", "i");
                
                if (options.thumb && relocal.test(img))
                    img = options.thumbPath + escape(img) + '&h=' + $this.height() + '&w=' + Math.round($this.width()/2) + '&zc=1&q=95';
                
                $this.append('<div><a href="'+url+'" title="'+title+'" class="title opacity shadow">'+title+'</a><img src="'+img+'" alt="'+title+'"/><p class="box shadow opacity">'+text+'</p></div>');
                
                var div = $this.find('> div:last');
                
                div.click(function(){
                    _self.stop();
                });
                
                if (counter!=0) {
                    div.hide();
                }
                counter++;
            };
            
            this.nextSlide = function(){
                
                if ($this.find('> div').length == 1) return;
                
                var current = $this.find('> div:visible');
                var next    = $this.find('> div:visible').next('div');
                
                if (next.length == 0) {
                    next = $this.find('> div:first');
                }
                
                current.css({});
                next.css({left:$this.width()}).show();
                
				current.stop(true, true);
				next.stop(true, true);
				
                current.animate({left:-$this.width()}, options.effectTime, function(){ $(this).hide()});
                next.animate({left:0}, options.effectTime);
                
                _self.stop();
                
                if (options.play) {
                    _self.play();
                }
            }
            this.prevSlide = function(){
                
                if ($this.find('> div').length == 1) return;
                
                var current = $this.find('> div:visible');
                var prev    = $this.find('> div:visible').prev('div');
                
                if (prev.length == 0) {
                    prev = $this.find('> div:last');
                }
                
                current.css({});
                prev.css({left:-$this.width()}).show();
                
				current.stop(true, true);
				prev.stop(true, true);
				
                current.animate({left:$this.width()}, options.effectTime, function(){ $(this).hide()});
                prev.animate({left:0}, options.effectTime);
                
                _self.stop();
                
                if (options.play) {
                    _self.play();
                }
            }
            
            this.play = function(){
                _self.playId = setTimeout(function(){
                    _self.nextSlide();
                }, options.timeout);
            }
            
            this.stop = function(){
                if (_self.playId)
                    clearTimeout(_self.playId);
            }

            if (options.play) {
                this.play();
            }
            return _self;
        });
    }
})(jQuery);