{{-- page controls --}}
@props(['route_name', 'permission_name'])
<x-back-end.layouts.div-clearfix>
    @can('{{ $permission_name }} Create')
        <x-back-end.form.button-href button_type="" button_oneclick="" button_class="btn btn-primary btn-sm"
            href="{{ route($route_name . '.create') }}" button_icon="fa fa-add" button_name="{{ ucwords(__('my.add')) }}" />
    @endcan
    @can('{{ $permission_name }} Import')
        <x-back-end.form.button-href button_type="" button_oneclick="" button_class="btn btn-warning btn-sm"
            href="{{ route($route_name . '.import') }}" button_icon="fa fa-upload"
            button_name="{{ ucwords(__('my.import')) }}" />
    @endcan
    @can('{{ $permission_name }} Settings')
        <x-back-end.form.button-href button_type="" button_oneclick="" button_class="btn btn-default btn-sm" href=""
            button_icon="fa fa-cog" button_name="{{ ucwords(__('my.settings')) }}" />
    @endcan
    @can('{{ $permission_name }} Table')
        <x-back-end.form.button button_type="" button_oneclick="Refresh()" button_class="btn btn-success btn-sm"
            button_icon="fa fa-refresh" button_name="{{ ucwords(__('my.refresh')) }}" />
    @endcan
</x-back-end.layouts.div-clearfix>
