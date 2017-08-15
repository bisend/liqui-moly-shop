<div class="tab-pane" id="additional-info">
    <ul class="tabled-data">
        @foreach($model->properties as $property)
            <li>
                <label>{{ $property->name }}</label>
                <div class="value">{{ $property->value }}</div>
            </li>
        @endforeach
    </ul><!-- /.tabled-data -->
</div><!-- /.tab-pane #additional-info -->