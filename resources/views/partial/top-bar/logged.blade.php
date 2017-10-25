<li>
    <a data-action-profile
       href="{{ $model->view != 'personal-info' ? url_personal_info($model->language) : 'javascript:void(0);' }}">
       {{ auth()->user()->name }}
    </a>
</li>
<li>
    <a href="javascript:void(0);" data-action-logout>
        {{ trans('header.logout') }}
    </a>
</li>