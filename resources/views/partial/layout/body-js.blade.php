<script>
    // Force page reload on browser back button click
    if (!!window.performance && window.performance.navigation.type === 2)
    {
        // value 2 means "The page was accessed by navigating into the history"
        window.location.reload(); // reload whole page
    }
</script>

<script src="/js/template/jquery-1.10.2.min.js"></script>
<script src="/js/template/jquery-migrate-1.2.1.js"></script>
<script src="/js/template/bootstrap.min.js"></script>
<script src="/js/template/jquery.matchHeight.js"></script>
<script src="/js/template/bootstrap-hover-dropdown.min.js"></script>
<script src="/js/template/owl.carousel.min.js"></script>
<script src="/js/template/css_browser_selector.min.js"></script>
<script src="/js/template/echo.min.js"></script>
<script src="/js/template/jquery.easing-1.3.min.js"></script>
<script src="/js/template/bootstrap-slider.min.js"></script>
<script src="/js/template/jquery.raty.min.js"></script>
<script src="/js/template/jquery.prettyPhoto.min.js"></script>
<script src="/js/template/jquery.customSelect.min.js"></script>
<script src="/js/template/wow.min.js"></script>
{{--<script src="/js/template/buttons.js"></script>--}}
<script src="/js/template/scripts.js"></script>

{{--custom scripts--}}
<script src="/js/launch.js"></script>
<script src="/js/jclient.validation.js"></script>
<script src="/js/search/search-desktop.js"></script>
<script src="/js/auth/logout.js"></script>
<script src="/js/auth/login.js"></script>
<script src="/js/auth/register.js"></script>
<script src="/js/auth/restore-password.js"></script>

<!--Page JS BEGIN-->
@stack('js')
<!--Page JS END-->