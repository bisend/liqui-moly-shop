<div class="drop-menu-select" data-sort-menu-select>
    <div class="select">
        <span data-span-selected>
            @foreach($model->sortItems->items as $item)
                @if($item->isSelected)
                    @if($item->sortSlug == 'default')
                        {{ trans('sort-menu.sorting') }}
                    @else
                        {{ $item->name }}
                    @endif
                @endif
            @endforeach
        </span>
        <i class="fa fa-chevron-down"></i>
    </div>
    <ul class="dropeddown" data-dropdown-container>
        @foreach($model->sortItems->items as $item)
            @if($item->isVisible)
                <li data-sort-item-url="{{ $item->url_search }}">
                    {{ $item->name }}
                </li>
            @endif
        @endforeach
    </ul>
</div>