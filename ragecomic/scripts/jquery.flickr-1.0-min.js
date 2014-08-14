(function ($) {
    $.fn.flickr = function (o) {
        var s = {
            api_key: null,
            type: null,
            photoset_id: null,
            text: null,
            user_id: null,
            group_id: null,
            tags: null,
            tag_mode: 'any',
            sort: 'date-posted-asc',
            thumb_size: 's',
            size: null,
            per_page: 100,
            page: 1,
            attr: '',
            api_url: null,
            params: '',
            api_callback: '?',
            callback: null
        };
        if (o) $.extend(s, o);
        return this.each(function () {
            var list = $('<ul>').appendTo(this);
            var url = $.flickr.format(s);
            $.getJSON(url, function (r) {
                if (r.stat != "ok") {
                    for (i in r) {
                        $('<li>').text(i + ': ' + r[i]).appendTo(list);
                    };
                } else {
                    if (s.type == 'photoset') r.photos = r.photoset;
                    list.append('<input type="hidden" value="' + r.photos.page + '" />');
                    list.append('<input type="hidden" value="' + r.photos.pages + '" />');
                    list.append('<input type="hidden" value="' + r.photos.perpage + '" />');
                    list.append('<input type="hidden" value="' + r.photos.total + '" />');
                    for (var i = 0; i < r.photos.photo.length; i++) {
                        var photo = r.photos.photo[i];
                        var t = 'http://farm' + photo['farm'] + '.static.flickr.com/' + photo['server'] + '/' + photo['id'] + '_' + photo['secret'] + '_' + s.thumb_size + '.jpg';
                        var h = 'http://farm' + photo['farm'] + '.static.flickr.com/' + photo['server'] + '/' + photo['id'] + '_';
                        switch (s.size) {
                        case 'm':
                            h += photo['secret'] + '_m.jpg';
                            break;
                        case 'b':
                            h += photo['secret'] + '_b.jpg';
                            break;
                        case 'o':
                            if (photo['originalsecret'] && photo['originalformat']) {
                                h += photo['originalsecret'] + '_o.' + photo['originalformat'];
                                break;
                            };
                        default:
                            h += photo['secret'] + '.jpg';
                        };
                        list.append('<li><a href="' + h + '" ' + s.attr + ' title="' + photo['title'] + '"><img src="' + t + '" alt="' + photo['title'] + '" /></a></li>');
                    };
                    if (s.callback) s.callback(list);
                };
            });
        });
    };
    $.flickr = {
        format: function (s) {
            if (s.url) return s.url;
            var url = 'http://api.flickr.com/services/rest/?format=json&jsoncallback=' + s.api_callback + '&api_key=' + s.api_key;
            switch (s.type) {
            case 'photoset':
                url += '&method=flickr.photosets.getPhotos&photoset_id=' + s.photoset_id;
                break;
            case 'search':
                url += '&method=flickr.photos.search&sort=' + s.sort;
                if (s.user_id) url += '&user_id=' + s.user_id;
                if (s.group_id) url += '&group_id=' + s.group_id;
                if (s.tags) url += '&tags=' + s.tags;
                if (s.tag_mode) url += '&tag_mode=' + s.tag_mode;
                if (s.text) url += '&text=' + s.text;
                break;
            default:
                url += '&method=flickr.photos.getRecent';
            };
            if (s.size == 'o') url += '&extras=original_format';
            url += '&per_page=' + s.per_page + '&page=' + s.page + s.params;
            return url;
        }
    };
})(jQuery);