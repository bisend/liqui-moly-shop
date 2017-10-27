<li class="dropdown">
    @if($model->language == 'uk')
        <a class="dropdown-toggle"  data-toggle="dropdown" href="{{ url_current('uk') }}">
            <img src='/img/uk.png'>
            Українська
        </a>
        <ul class="dropdown-menu" role="menu" >
            <li role="presentation">
                <a role="menuitem" tabindex="-1" href="{{ url_current('ru') }}">
                    <img src='/img/ru.png'>
                    Русский
                </a>
            </li>
        </ul>
    @elseif($model->language == 'ru')
        <a class="dropdown-toggle"  data-toggle="dropdown" href="{{ url_current('ru') }}">
            <img src='/img/ru.png'>
            Русский
        </a>
        <ul class="dropdown-menu" role="menu" >
            <li role="presentation">
                <a role="menuitem" tabindex="-1" href="{{ url_current('uk') }}">
                    <img src='/img/uk.png'>
                    Українська
                </a>
            </li>
        </ul>
    @endif
</li>