$('#select-repo').selectize({
    // maxItems: null,
    valueField: 'url',
    labelField: 'name',
    searchField: 'name',
    create: false,
    // render: {
    //     option: function(item, escape) {
    //         console.log(item);
    //         return '<div>' +
    //             '<span class="title">' +
    //                 '<span class="by">' + escape(item.url) + '</span>' +
    //             '</span>' +
    //         '</div>';
    //     }
    // },
    load: function(query, callback) {
        if (!query.length) return callback();
        $.ajax({
            url: 'https://api.github.com/legacy/repos/search/' + encodeURIComponent(query),
            type: 'GET',
            error: function() {
                callback();
            },
            success: function(res) {
              var tmpArr = [
                {url: "url-0", name: "name-0"},
                {url: "url-1", name: "name-1"},
                {url: "url-2", name: "name-2"},
              ];
              console.log(tmpArr);
              callback(tmpArr);
                // console.log(res.repositories.slice(0, 10));
                // callback(res.repositories.slice(0, 10));
            }
        });
    }
});