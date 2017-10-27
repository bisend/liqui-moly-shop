@extends('layout')

@section('content')
    <div class="delivery_payments">
        <div class="container">
            <h1 class="bordered">Оплата</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="payments_item">
                        <img src="/img/pay1.png" alt="">
                        <span> ГОТІВКОВИЙ РОЗРАХУНОК</span>
                        <p>Це найбільш поширений спосіб розрахунку, який здійснюється національною валютою безпосередньо в представництві магазина, або у будь-якому іншому населеному пункті України в офісі кур’єрської служби під час отримання замовленого товару.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="payments_item">
                        <img src="/img/pay3.png" alt="">
                        <span>БЕЗГОТІВКОВИЙ РОЗРАХУНОК</span>
                        <p>Після оформлення покупки, Вам відправлять на зазначену в замовленні електронну пошту рахунок-фактуру, який Ви зможете оплатити в касі відділення будь-якого банку або здійснити платіж із власного рахунку.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="payments_item">
                        <img src="/img/pay2.png" alt="">
                        <span> НАКЛАДЕНИЙ ПЛАТІЖ</span>
                        <p>Відправник висуває умову , за якою вантаж може бути виданий адресатові тільки після сплати ним суми, яку відправник вказав заздалегідь. Якщо одержувач відмовляється оплатити вантаж, товар повертають відправникові.</p>
                    </div>
                </div>
            </div>
            <h2 class="bordered">Доставка</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="delivery_item">
                        <a href=""><img class="novaposhta-img" src="/img/2np_logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="delivery_item">
                        <a href=""><img class="avtolux-img" src="/img/avtolux.png" alt=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="delivery_item">
                        <a href=""><img class="intime-img" src="/img/intime.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection