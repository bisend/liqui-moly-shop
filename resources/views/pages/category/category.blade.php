{{--{{ dd($model->categoryProducts[0]->products[0]->images[0]->small) }}--}}
{{--{{ dd($model) }}--}}
{{--{{ $model->categoryProducts[0]->prods[0]->name_uk }}--}}
@extends('layout')

@section('content')
    <div class="animate-dropdown">

        <!-- ========================================= BREADCRUMB ========================================= -->
        <div id="top-mega-nav">
            <div class="container">
                <nav>
                    <ul class="inline">
                        <!-- <li class="dropdown le-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-list"></i> shop by department
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="#">Computer Cases & Accessories</a></li>
                                <li><a href="#">CPUs, Processors</a></li>
                                <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                                <li><a href="#">Graphics, Video Cards</a></li>
                                <li><a href="#">Interface, Add-On Cards</a></li>
                                <li><a href="#">Laptop Replacement Parts</a></li>
                                <li><a href="#">Memory (RAM)</a></li>
                                <li><a href="#">Motherboards</a></li>
                                <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                                <li><a href="#">Motherboard Components</a></li>
                            </ul>
                        </li> -->

                        @include('partial.category-page.breadcrumbs')

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


                <!-- ========================================= CATEGORY TREE ========================================= -->

                @include('partial.category-page.category-tree')

                <!-- ========================================= CATEGORY TREE : END ========================================= -->

                <!-- ========================================= LINKS ========================================= -->

                <!-- ========================================= LINKS : END ========================================= -->



                <!-- ========================================= FEATURED PRODUCTS ========================================= -->
                @include('partial.category-page.top-sales-sidebar')

                @include('partial.category-page.novelty-sidebar')



                <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
            </div>
            <!-- ========================================= SIDEBAR : END ========================================= -->



            <!-- ========================================= CONTENT ========================================= -->

            <div class="col-xs-12 col-sm-9 no-margin wide sidebar">

                @include('partial.category-page.product-grid')

            </div><!-- /.col -->
            <!-- ========================================= CONTENT : END ========================================= -->
        </div><!-- /.container -->
    </section><!-- /#category-grid -->

    <!-- ========================================= RECENTLY VIEWED ========================================= -->
    @include('partial.viewed-products')
    <!-- ========================================= RECENTLY VIEWED : END ========================================= -->
@endsection

@push('js')
    <script defer src="/js/category/category.js"></script>
@endpush