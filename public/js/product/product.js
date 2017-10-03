$(window).load(function () {
    if (localStorage.getItem('goToReviews'))
    {
        $('html, body').animate({
            scrollTop: $("[data-review-scroll]").offset().top
        }, 1000);
        localStorage.removeItem('goToReviews');
    }
    
    if (localStorage.getItem('goToReviewsTab'))
    {
        $('html, body').animate({
            scrollTop: $("[data-review-scroll-tab]").offset().top
        }, 1000);
        localStorage.removeItem('goToReviewsTab');
    }
});