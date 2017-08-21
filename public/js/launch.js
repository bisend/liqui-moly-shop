var LANGUAGE = $('html').attr('lang'),
    DEFAULT_LANGUAGE = 'uk';

function Launch() {
    var ctx = this;
    
    var setAjaxSetup = function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    };
    
    ctx.init = function () {
        setAjaxSetup();
    };
    
    ctx.launch = function () {
        ctx.init();
    };
    
    ctx.launch();
}

var launch = new Launch();










// $(document).ready()
// {
// }








//helpers

//URL WITH LANGUAGE
function buildUrlWithLang(url) 
{
    if (LANGUAGE == DEFAULT_LANGUAGE)
    {
        return url;
    }
    else
    {
        return url += '/' + LANGUAGE;
    }
}

//URL FOR SEARCH
function buildSearchUrl(series) 
{
    series = series
        .toLowerCase()
        .replace(/[^a-zA-Zа-яА-ЯїЇіІьЬєЄэЭъЪёЁґҐ0-9 ]/gi, ' ')
        .replace(/\s+/g, ' ')
        .trim()
        .replace(/\s/g, '+');

    return series;
}