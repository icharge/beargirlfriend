(function ($) {
    $.fn.batchImageLoad = function (options) {
        var images = $(this);
        var totalImagesCount = images.size();
        var elementsLoaded = 0;
        $.fn.batchImageLoad.defaults = {
            loadingCompleteCallback: null
        }
        var opts = $.extend({}, $.fn.batchImageLoad.defaults, options);
        images.each(function () {
            if ($(this)[0].complete) {
                totalImagesCount--;
            } else {
                $(this).load(function () {
                    elementsLoaded++;
                    if (elementsLoaded >= totalImagesCount) if (opts.loadingCompleteCallback) opts.loadingCompleteCallback();
                });
                $(this).error(function () {
                    elementsLoaded++;
                    if (elementsLoaded >= totalImagesCount) if (opts.loadingCompleteCallback) opts.loadingCompleteCallback();
                });
            }
        });
        if (totalImagesCount <= 0) if (opts.loadingCompleteCallback) opts.loadingCompleteCallback();
    };
})(jQuery);