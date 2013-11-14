(function($) {
    $.fn.spasticNav = function(options){
        
        options = $.extend({
           overlap : 20,
           speed : 500,
           reset : 2500,
           color : '#0b2b61',
           easing : 'easeOutExpo'
        }, options);
        
        return this.each(function(){
            
            var nav = $(this),
                currentPageItem = $('.active', nav),
                blob,
                reset;
                
            $('<li id="blob" class="visible-lg"></li>').css({
                width : currentPageItem.outerWidth(),
                height : currentPageItem.outerHeight() + options.overlap,
                left : currentPageItem.position().left,
                top : currentPageItem.position().top - options.overlap/2,
                backgroundColor : options.color
            }).appendTo('.myNav');
            
            blob = $('#blob',nav);
            
            $('li', nav).hover(function(){
                clearTimeout(reset);
                blob.animate(
                {
                    left : $(this).position().left,
                    width : $(this).width()
                },
                {
                    duration : options.speed,
                    esasing : options.esasing,
                    queue : false
                }
                );
            }, function(){
               //mouse out
            
                blob.stop().animate({
                   left : $(this).position().left,
                   width : $(this).width()
                }, options.speed);
                
                reset = setTimeout(function() {
                    blob.animate({
                        width : currentPageItem.outerWidth(),
                        left : currentPageItem.position().left     
                    }, options.speed);
                },options.reset);
            });
        });
    };
}(jQuery));


