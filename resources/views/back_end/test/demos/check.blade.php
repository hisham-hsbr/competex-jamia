@extends('back_end.layouts.app')

@section('PageHead')
    {{ ucwords(__('my.index')) }}
@endsection

@section('PageTitle')
    {{ ucwords(__('my.index')) }}
@endsection

@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">{{ ucwords(__('my.dashboard')) }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route($routeName . '.index') }}">{{ $headName }}</a></li>
    <li class="breadcrumb-item active">{{ ucwords(__('my.index')) }}</li>
@endsection

@section('headLinks')
    <x-back-end.plugins.dataTable-head />
@endsection

@section('actionTitle')
    {{ ucwords(__('my.index')) }}
@endsection

@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        @can('{{ $permissionName }} Read')
                            {{-- page controls --}}
                            <x-back-end.layouts.page-controls :route_name="$routeName" permission_name="$permissionName" />

                            {{-- data filter --}}


                            @can('{{ $permissionName }} Table')
                                <div class="alert alert-warning" role="alert">
                                    {{ $default_more_than }} <a href="#" class="alert-link">an example link</a>.
                                </div>
                                @if (isset($default_not_set) && !empty($default_not_set))
                                    <div class="alert alert-warning" role="alert">
                                        {{ $default_not_set }} <a href="#" class="alert-link">an example link</a>.
                                    </div>
                                @endif

                            @endcan <!-- /.Table end -->
                        @endcan <!-- /.Read end -->
                    </div><!-- /.card-body -->

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>





@endsection <!-- /.mainContent end -->
@section('actionFooter', 'Footer')
@section('footerLinks')


    <x-back-end.script.delete-confirmation />
    <x-back-end.script.force-delete-confirmation />
    <x-back-end.message.message />
    <x-back-end.script.table-update />
    <x-back-end.plugins.dataTable-footer />






@endsection
