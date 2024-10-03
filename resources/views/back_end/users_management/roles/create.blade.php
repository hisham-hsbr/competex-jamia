@extends('back_end.layouts.app')

@section('PageHead')
    {{ ucwords(__('my.create')) }}
@endsection

@section('PageTitle')
    {{ ucwords(__('my.create')) }}
@endsection

@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">{{ ucwords(__('my.dashboard')) }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route($routeName . '.create') }}">{{ $headName }}</a></li>
    <li class="breadcrumb-item active">{{ ucwords(__('my.create')) }}</li>
@endsection

@section('headLinks')
    <x-back-end.plugins.dual-list-box-head />
@endsection

@section('actionTitle')
    {{ ucwords(__('my.create')) }}
@endsection

@section('mainContent')
    <div class="container-fluid">
        @can('Role Create')
            <div class="row">
                <div class="col-md-1">

                </div>
                <!-- left column -->
                <div class="col-md-10">
                    <form role="form" action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data"
                        id="quickForm">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control-sm"
                                        id="name" placeholder="Enter Role Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        @if (Auth::user()->settings['personal_settings'] == 1)
                                            @if (Auth::user()->settings['permission_view'] == 'list')
                                                <label>Assign Permissions</label>

                                                <select name="permission[]" class="duallistbox" multiple="multiple">
                                                    @foreach ($permissions as $key => $value)
                                                        @foreach ($value as $permission)
                                                            <option value="{{ $permission->id }}">{{ $permission->name }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            @endif
                                            @if (Auth::user()->settings['permission_view'] == 'group')
                                                <label><input class="p-5 form-check-input" id="checkall" type="checkbox">
                                                    Select All
                                                </label>
                                                <div class="container">
                                                    <div class="row">
                                                        @foreach ($permissions as $key => $value)
                                                            <div class="col-md-4">
                                                                <div class="card card-primary">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">{{ $key }}</h3>
                                                                    </div>
                                                                    <!-- /.card-header -->
                                                                    <div class="card-body">
                                                                        <div class="clearfix form-group">
                                                                            <div class="icheck-primary d-inline">
                                                                                @foreach ($value as $permission)
                                                                                    <input type="checkbox" name="permission[]"
                                                                                        class="checkitem" id="checkboxPrimary1"
                                                                                        value="{{ $permission->id }}"
                                                                                        id="{{ $permission->id }}">
                                                                                    <label for="{{ $permission->id }}"
                                                                                        class="form-check-label">{{ $permission->name }}</label>
                                                                                    <br>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                </div>
                                                                <!-- /.card -->
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            @if ($default_layout->data['permission_view'] == 'list')
                                                <label>Assign Permissions</label>

                                                <select name="permission[]" class="duallistbox" multiple="multiple">
                                                    @foreach ($permissions as $key => $value)
                                                        @foreach ($value as $permission)
                                                            <option value="{{ $permission->id }}">{{ $permission->name }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            @endif
                                            @if ($default_layout->data['permission_view'] == 'group')
                                                <label><input class="p-5 form-check-input" id="checkall" type="checkbox">
                                                    Select All
                                                </label>
                                                <div class="container">
                                                    <div class="row">
                                                        @foreach ($permissions as $key => $value)
                                                            <div class="col-md-4">
                                                                <div class="card card-primary">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">{{ $key }}</h3>
                                                                    </div>
                                                                    <!-- /.card-header -->
                                                                    <div class="card-body">
                                                                        <div class="clearfix form-group">
                                                                            <div class="icheck-primary d-inline">
                                                                                @foreach ($value as $permission)
                                                                                    <input type="checkbox" name="permission[]"
                                                                                        class="checkitem" id="checkboxPrimary1"
                                                                                        value="{{ $permission->id }}"
                                                                                        id="{{ $permission->id }}">
                                                                                    <label for="{{ $permission->id }}"
                                                                                        class="form-check-label">{{ $permission->name }}</label>
                                                                                    <br>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                </div>
                                                                <!-- /.card -->
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="pt-2 pl-5 col-sm-10">
                                <input type="checkbox" class="form-check-input" name="status" value="1" id="status" />
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">
                            @can('Role Create')
                                <button type="submit" class="float-right ml-1 btn btn-primary">Save</button>
                            @endcan
                            <a type="button" href="{{ route('roles.index') }}"
                                class="float-right ml-1 btn btn-warning">Back</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>

                </div>
                <!--/.col (left) -->

            </div>
        @endcan
        <!-- /.row -->
    </div><!-- /.container-fluid -->


@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')

    @if (Session::has('message_store'))
        <script>
            toastr.success("{!! Session::get('message_store') !!}");
        </script>
    @endif

    @if (Session::has('message_update'))
        <script>
            toastr.success("{!! Session::get('message_update') !!}");
        </script>
    @endif

    @if ($errors->count() > 0)
        @foreach ($errors->all() as $error)
            <script>
                toastr.error("{{ $error }}");
            </script>
        @endforeach
    @endif
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        $("#checkall").change(function() {
            $(".checkitem").prop("checked", $(this).prop("checked"))
        })
        $(".checkitem").change(function() {
            if ($(this).prop("checked") == false) {
                $("#checkall").prop("checked", false)
            }
            if ($(".checkitem:checked").length == $(".checkitem").length) {
                $("#checkall").prop("checked", true)
            }
        })
    </script>
    {{-- <script>
        var checkid = '{{ $key }}';
        var checkclass = '{{ $key }}';

        $('#checkall' + checkid).change(function() {
            $('.check' + checkclass).prop("checked",
                $(this).prop("checked"))
        })
        $('.check' + checkclass).change(function() {
            if ($(this).prop("checked") == false) {
                $("#checkall' + checkid").prop("checked", false)
            }
            if ($('.check' + checkclasschecked).length == $('.check' +
                    checkclass).length) {
                $("#checkall' + checkid").prop("checked", true)
            }
        })
    </script> --}}
    <!-- Bootstrap4 Duallistbox -->
    <script
        src="{{ asset('back_end_links/adminLinks/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}">
    </script>
    <script>
        $(function() {
            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()
        })
    </script>




@endsection
