function SearchDesktop() {
    //context Search
    var ctx = this,
        $body = $('body'),
        elems = {
            search: {
                form: '[data-desktop-search-form]',
                input: '[data-desktop-search-input]',
                resultBox: '[data-desktop-async-search-result]',
                submit: '[data-desktop-search-submit]'
            }
        },
        $elems = {
            search: {
                form: $(elems.search.form),
                input: $(elems.search.input),
                resultBox: $(elems.search.resultBox),
                submit: $(elems.search.submit)
            }
        };

    //functions
    var searchSubmit,
        searchAsync,
        setSearchSeries,
        clearResultBox,
        showResultBox,
        hideResultBox;

    //additional variables
    var searchUrl = '/search/',
        searchUrlAsync = '/search/async/',
        searchSeries = '',
        isSearchInProcess = false,
        timer = undefined;

    //init functions
    ctx.init = function () {

        clearResultBox = function () {
            $elems.search.resultBox.fadeOut({
                duration: 200,
                complete: function () {
                    $elems.search.resultBox.html('');
                }
            });
        };

        showResultBox = function (view) {
            $elems.search.resultBox.html(view).fadeIn(200);
        };

        hideResultBox = function () {
            $elems.search.resultBox.fadeOut(200);
        };

        setSearchSeries = function () {
            searchSeries = $elems.search.input.val()
        };


        searchSubmit = function () {
            searchUrl = '/search/';
            searchUrl += buildSearchUrl(searchSeries);
            searchUrl = buildUrlWithLang(searchUrl + '/');
            window.location.href = searchUrl;
        };

        searchAsync = function () {
            searchUrlAsync = '/search/async/';
            searchUrlAsync += buildSearchUrl(searchSeries);
            searchUrlAsync = buildUrlWithLang(searchUrlAsync + '/');

            if (!isSearchInProcess)
            {
                isSearchInProcess = true;

                $('[data-desktop-search-text]').css('display', 'none');
                $('[data-desktop-search-loader]').css('display', 'block');

                var text = $elems.search.submit.text();
                $elems.search.submit.text();

                $.ajax({
                    type: 'get',
                    url: searchUrlAsync,
                    success: function (data) {
                        isSearchInProcess = false;
                        
                        showResultBox(data.view);
                        $('[data-desktop-search-text]').css('display', 'block');
                        $('[data-desktop-search-loader]').css('display', 'none');
                    },
                    error: function () {
                        isSearchInProcess = false;
                        $('[data-desktop-search-text]').css('display', 'block');
                        $('[data-desktop-search-loader]').css('display', 'none');
                    }
                });
            }
        };
    };

    //subscribe functions to event handlers
    ctx.subscribe = function () {

        $body.on('focusout', elems.search.input, function (e) {
            hideResultBox();
        });

        $body.on('focusin', elems.search.input, function (e) {
            showResultBox();
        });


        $body.on('keyup', elems.search.input, function (e) {
            setSearchSeries();

            hideResultBox();

            if (searchSeries != '')
            {
                if (!isSearchInProcess)
                {
                    if (timer) {
                        clearTimeout(timer);
                        timer = undefined;
                    }
                    timer = setTimeout(function () {
                        searchAsync();
                    }, 300);
                }
            }
            else
            {
                if (timer) {
                    clearTimeout(timer);
                    timer = undefined;
                }

                clearResultBox();
            }
        });

        $body.on('click', elems.search.submit, function (e) {
            e.preventDefault();
            if (searchSeries != '')
            {
                searchSubmit();
            }

        });

    };

    // Launch
    ctx.launch = function () {
        ctx.init();
        ctx.subscribe();
    };

    // Launcher
    ctx.launch();
    
}

var search = new SearchDesktop();