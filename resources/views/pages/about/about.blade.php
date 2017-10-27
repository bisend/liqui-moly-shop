@extends('layout')

@section('content')
    <div class="about_section">
        <div class="container">
            <div class="about_item">
                <h1 class="bordered">Про нас</h1>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy</p>
            </div>

            <div class="row about-item-info">
                <div class="col-md-4">
                    <div class="about_item">
                            <div class="service-icon primary-bg"><i class="fa fa-truck"></i></div>
                            <span>Швидка доставка</span>
                            <p>Ми здійснюємо відправку та доставку товару в найкоротші строки. Спосіб доставки Ви обираєте самі.</p>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="about_item">
                        <div class="service-icon primary-bg"><i class="fa fa-life-saver"></i></div>
                        <span>Підтримка 24/7</span>
                        <p>Наші менеджери з радістю зорієнтують Вас в асортименті товарів і допоможуть обрати найкраще рішення!</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="about_item">
                        <div class="service-icon primary-bg"><i class="fa fa-star"></i></div>
                        <span>Гарантія якості</span>
                        <p>Вся продукція представлена на сайті інтернет магазину, відповідає існуючим нормам і стандартам якості.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection