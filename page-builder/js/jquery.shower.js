(function ($) {
    function ShowerObj() {
        this.loaded = false;
        this.self = null;
        this.opt = {
            bufferWidth: 50,
            animation: 'opacity',
            afterAnimate: function(e) {},
            onAnimate: function (e) {}
        };
        this.init = function (self) {
            var animObj = this.animation[this.opt.animation];
            var opts = this.opt;
            this.self = self;
            var myobj = this;
            animObj.init(self);
            $(window).on('scroll init load', function () {
                if(myobj.loaded == true) {
                    return false;
                }
                /* Check the location of each desired element */

                //var bottom_of_object = self.offset().top + self.outerHeight();
                var top_of_object = self.offset().top + opts.bufferWidth;
                var bottom_of_window = $(window).scrollTop() + $(window).height();
                /* If the object is completely visible in the window, fade it it */
                if (bottom_of_window > top_of_object) {
                    opts.afterAnimate(self)
                    animObj.show(self, opts.onAnimate);
                    myobj.loaded = true;
                }

            });
        };
    }
    ;
    function ShowerObjAnimation() {
        this.init = function (self) {};
        this.show = function (self) {};
    }
    ShowerObj.prototype.animation = new Object();
    ShowerObj.prototype.animation['opacity'] = new ShowerObjAnimation();
    ShowerObj.prototype.animation['opacity'].init = function (self) {
        self.css('opacity', 0);
    };
    ShowerObj.prototype.animation['opacity'].show = function (self, onAnimate) {
        self.animate({'opacity': '1'}, 1000);
        onAnimate(self);
    };

    $.fn.shower = function (options) {
        this.each(function (i) {
            var so = new ShowerObj();
            so.opt = $.extend({}, so.opt, options);
            so.init($(this));
        });
        return this;
    };
})(jQuery);
