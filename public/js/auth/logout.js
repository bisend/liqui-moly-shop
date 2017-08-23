function Logout() {
    //variables
    //context
    var ctx = this,
        $body = $('body'),
        //selectors elems
        elems = {
            logoutBtn: '[data-action-logout]'
        },
        //jquery elems
        $elems = {
            logoutBtn: $(elems.logoutBtn)
        };

    //functions
    var logout;


    ctx.init = function () {

        //send ajax for logout user
        logout = function () {
            $.ajax({
                type: 'post',
                url: '/logout',
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (data) {

                }
            })
        };

    };

    ctx.subscribe = function () {

        //click on logout button
        $body.on('click', elems.logoutBtn, function (e) {
            logout();
        });

    };

    ctx.launch = function () {
        ctx.init();
        ctx.subscribe();
    };

    ctx.launch();
}

var logout = new Logout();