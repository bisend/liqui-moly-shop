function Category() {

    //variables
    //Category context
    var ctx = this,
        //selectors
        $body = $('body'),
        elems = {
            //product grid-list elements
            grid: {
                productGrid: '[data-product-grid]',
                gridLi: '[data-grid-li]',
                listLi: '[data-list-li]',
                gridViewBtn: '[data-grid-view-btn]',
                listViewBtn: '[data-list-view-btn]',
                productHolder: '[data-product-holder]'
            },
            //sort menu elements
            sortMenu: {
                menuSelect: '[data-sort-menu-select]',
                spanSelected: '[data-span-selected]',
                dropDownContainer: '[data-dropdown-container]',
                sortItem: '[data-sort-item-url]'
            }
        },
        //elements jquery
        $elems = {
            //product grid/list elements
            grid: {
                productGrid: $(elems.grid.productGrid),
                gridLi: $(elems.grid.gridLi),
                listLi: $(elems.grid.listLi),
                gridViewBtn: $(elems.grid.gridViewBtn),
                listViewBtn: $(elems.grid.listViewBtn),
                productHolder: $(elems.grid.productHolder)
            },
            //sort menu elements
            sortMenu: {
                menuSelect: $(elems.sortMenu.menuSelect),
                spanSelected: $(elems.sortMenu.spanSelected),
                dropDownContainer: $(elems.sortMenu.dropDownContainer),
                sortItem: $(elems.sortMenu.sortItem)
            }
        };

    //functions

    //grid-list status view
    var checkGridViewStatus,
        setGridViewStatus,
        setListViewStatus;

    //sort-menu
    var showSortMenu,
        hideSortMenu,
        changeSorting;


    //initialize components
    ctx.init = function () {

        //VIEW STATUS FUNCTIONS
        //check status grid
        checkGridViewStatus = function () {
            if (localStorage.getItem('display') == 'list')
            {
                setListViewStatus();
            }
        };

        //set LIST status
        setListViewStatus = function () {
            localStorage.setItem('display', 'list');

            $elems.grid.productGrid.addClass('category-list-view');
            $elems.grid.gridLi.removeClass('active');
            $elems.grid.listLi.addClass('active');
            $elems.grid.productHolder.removeClass('hover');
        };

        //set GRID status
        setGridViewStatus = function () {
            localStorage.setItem('display', 'grid');

            $elems.grid.productGrid.removeClass('category-list-view');
            $elems.grid.listLi.removeClass('active');
            $elems.grid.gridLi.addClass('active');
            $elems.grid.productHolder.addClass('hover');
        };


        //SORT MENU FUNCTIONS
        showSortMenu = function () {
            $elems.sortMenu.menuSelect.attr('tabindex', 1).focus();
            $elems.sortMenu.menuSelect.toggleClass('active');
            $elems.sortMenu.dropDownContainer.slideToggle(300);
        };

        hideSortMenu = function () {
            $elems.sortMenu.menuSelect.removeClass('active');
            $elems.sortMenu.dropDownContainer.slideUp(300);
        };

        changeSorting = function (url) {
            window.location.replace(url);
        };
    };


    //subscribe elements to event handlers
    ctx.subscribe = function () {

        //check current grid-list status
        checkGridViewStatus();

        //click on list button
        $body.on('click', elems.grid.listViewBtn, function () {
            if (!$elems.grid.listLi.hasClass('active'))
            {
                $elems.grid.productGrid.closest('.tab-content').css('display', 'none').fadeIn(300);
            }
            setListViewStatus();
        });

        //click on grid button
        $body.on('click', elems.grid.gridViewBtn, function () {
            if (!$elems.grid.gridLi.hasClass('active'))
            {
                $elems.grid.productGrid.closest('.tab-content').css('display', 'none').fadeIn(300);
            }
            setGridViewStatus();
        });


        //click on sort menu
        $body.on('click', elems.sortMenu.menuSelect, function () {
            showSortMenu();
        });

        //focusout of sort menu
        $body.on('focusout', elems.sortMenu.menuSelect, function () {
            hideSortMenu();
        });

        //click on sort menu item
        $body.on('click', elems.sortMenu.sortItem, function () {
            var url = $(this).attr('data-sort-item-url');
            changeSorting(url);
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
// (function () {
// })();
//
new Category();
// $(window).load( function () {
// });

// $(document).ready(function () {
// });
