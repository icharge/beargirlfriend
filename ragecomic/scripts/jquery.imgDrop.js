jQuery(function () {
    jQuery('head').append('<style type="text/css">[draggable=true] {-webkit-user-drag: element; -webkit-user-select: none; -moz-user-select: none;}</style>');
});
(function ($) {
    $.fn.imgDrop = function (options) {
        return this.each(function () {
            var self = $(this);
            var settings = new Object;
            settings.imageHandler = function (file) {
                self.reader = new FileReader();
                var img = $('<img/>');
                self.reader.onload = function (event) {
                    img.attr('src', event.target.result);
                    settings.afterDrop(img, self);
                };
                self.reader.onerror = function (event) {
                    switch (event.target.error.code) {
                    case event.target.error.NOT_FOUND_ERR:
                        alert('File Not Found!');
                        break;
                    case event.target.error.NOT_READABLE_ERR:
                        alert('File is not readable');
                        break;
                    case event.target.error.ABORT_ERR:
                        break;
                    default:
                        alert('An error occurred reading this file.');
                    }
                };
                self.reader.onabort = function (event) {
                    alert('File read cancelled');
                };
                self.reader.readAsDataURL(file);
            }, settings.afterDrop = function (element, dropTarget) {
                $(element).appendTo(dropTarget);
            }, settings.accepts = {
                'image': settings.imageHandler
            };
            if (typeof options.beforeDrop == 'function') {
                settings.beforeDrop = options.beforeDrop;
            }
            if (typeof options.afterDrop == 'function') {
                settings.afterDrop = options.afterDrop;
            }
            if (typeof options.afterAllDrop == 'function') {
                settings.afterAllDrop = options.afterAllDrop;
            }
            self.bind('dragover dragenter', function (event) {
                if (event.preventDefault) {
                    event.preventDefault();
                }
                return false;
            });
            self.bind('drop', function (event) {
                if (event.preventDefault) {
                    event.preventDefault();
                }
                var dataTransfer = event.originalEvent.dataTransfer;
                if (!dataTransfer) return false;
                if (!dataTransfer.files || dataTransfer.files.length == 0) return false;
                settings.beforeDrop();
                for (var i = 0; i < dataTransfer.files.length; i++) {
                    var file = dataTransfer.files[i];
                    var handler = null;
                    for (var type in settings.accepts) {
                        if (file.type.match(type)) {
                            handler = settings.accepts[type];
                            break;
                        }
                    }
                    if (!handler) {
                        continue;
                    }
                    handler(file);
                }
                settings.afterAllDrop();
                return false;
            });
        });
    };
})(jQuery);