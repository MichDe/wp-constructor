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
    $.fn.slideshow = function(settings) {

        var _slideshow = this;

		/*
		 * Construct
		 */
		this.each(function(){
            var ext = $(this);

            /**
             * add slide to stack
             *
             * @param string title
             * @param string text
             * @param string img
             */
            this.addSlide = function(title, text, img){

            };

            return ext;
        });


        /**
         * external functions - append to $
         *
         * @param string title
         * @param string text
         * @param string img
         */
        _slideshow.addSlide = function(title, text, img){ _slideshow.each(function () { this.addSlide(); }) };
    }
})(jQuery);
