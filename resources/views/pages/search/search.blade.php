@extends('layout')

@section('content')

    <div class="animate-dropdown">

        <!-- ========================================= BREADCRUMB ========================================= -->
        <div id="top-mega-nav">
            <div class="container">
                <nav>
                    <ul class="inline">

                        @include('partial.search-page.breadcrumbs')

                    </ul><!-- /.inline -->
                </nav>

            </div><!-- /.container -->
        </div><!-- /#top-mega-nav -->
        <!-- ========================================= BREADCRUMB : END ========================================= -->
    </div>

    <section id="category-grid">
        <div class="container">
            <!-- ========================================= SIDEBAR ========================================= -->
            <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">


                <!-- ========================================= LINKS ========================================= -->

                <!-- ========================================= LINKS : END ========================================= -->



                <!-- ========================================= FEATURED PRODUCTS ========================================= -->

            @include('partial.search-page.top-sales-sidebar')

            @include('partial.search-page.novelty-sidebar')



            <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
            </div>
            <!-- ========================================= SIDEBAR : END ========================================= -->



            <!-- ========================================= CONTENT ========================================= -->

            <div class="col-xs-12 col-sm-9 no-margin wide sidebar">

                @include('partial.search-page.product-grid')

            </div><!-- /.col -->
            <!-- ========================================= CONTENT : END ========================================= -->
        </div><!-- /.container -->
    </section><!-- /#category-grid -->

    <!-- ========================================= RECENTLY VIEWED ========================================= -->
    @include('partial.viewed-products')
    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->


@endsection

@push('js')
    <script defer src="/js/search/common.js"></script>
@endpush