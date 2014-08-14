(function ($) {
    function getTransformProperty(element) {
        var properties = ['transform', 'WebkitTransform', 'MozTransform'];
        var p;
        while (p = properties.shift()) {
            if (typeof element.style[p] != 'undefined') {
                return p;
            }
        }
        return 'transform';
    }
    var proxied = $.fn.css;
    $.fn.css = function (arg) {
        if (typeof $.props['transform'] == 'undefined' && (arg == 'transform' || (typeof arg == 'object' && typeof arg['transform'] != 'undefined'))) {
            $.props['transform'] = getTransformProperty(this.get(0));
        }
        if (arg == 'transform') {
            arg = $.props['transform'];
        }
        return proxied.apply(this, arguments);
    };
})(jQuery);