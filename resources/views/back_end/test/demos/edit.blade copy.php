@extends('back_end.layouts.app')

@section('PageHead')
    {{ ucwords(__('my.edit')) }}
@endsection

@section('PageTitle')
    {{ ucwords(__('my.edit')) }}
@endsection

@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">{{ ucwords(__('my.dashboard')) }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route($routeName . '.index') }}">{{ $headName }}</a></li>
    <li class="breadcrumb-item active">{{ ucwords(__('my.edit')) }}</li>
@endsection

@section('headLinks')
@endsection

@section('actionTitle')
    {{ ucwords(__('my.edit')) }}
@endsection
<x-test-component />

@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-10">
                <div> This item is {!! $testDemo->status_with_icon !!}</div>
                @can('{{ N }} Edit')
                    <form role="form" action="{{ route($routeName . '.update', encrypt($testDemo->id)) }}" method="post"
                        enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">


                                <x-back-end.form.form-group-label-input div_class="col-sm-6" label_for="code"
                                    lable_class="required" label_name="Code" input_type="text" input_name="code" input_id="code"
                                    input_style="" input_class="" input_value="{{ $testDemo->code }}"
                                    input_placeholder="Enter code" />
                                <x-back-end.form.form-group-label-input div_class="col-sm-6" label_for="name"
                                    lable_class="required" label_name="Job Type Name" input_type="text" input_name="name"
                                    input_id="name" input_style="" input_class="" input_value="{{ $testDemo->name }}"
                                    input_placeholder="Job Type Name" />

                                <x-back-end.form.form-group-label-input div_class="col-sm-6" label_for="local_name"
                                    lable_class="required" label_name="{{ $headName }} Local Name" input_type="text"
                                    input_name="local_name" input_id="local_name" input_style="" input_class=""
                                    input_value="{{ $testDemo->local_name }}{{ old('local_name') }}"
                                    input_placeholder="Enter local_name" />

                                <div class="col-sm-10 pl-5 pt-2">
                                    <input type="checkbox" class="form-check-input" name="default" value="1" id="default"
                                        @if ($testDemo->default == 1) {{ 'checked' }} @endif />
                                    <label class="form-check-label" for="default">Is Default</label>
                                    <br>
                                    @if ($errors->has('default'))
                                        <span class="text-danger">{{ $errors->first('default') }}</span>
                                    @endif
                                </div>


                            </div>

                            <!-- /.row -->
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="col-sm-10 pl-5 pt-2">
                                <input type="checkbox" class="form-check-input" name="status" value="1" id="status"
                                    @if ($testDemo->status == 'Active') {{ 'checked' }} @endif />
                                <label class="form-check-label" for="status">Active</label><br>
                                @if ($errors->has('status'))
                                    <span class="text-danger">** {{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="">

                            @can('{{ $permissionName }} Edit')
                                <button type="submit" class="float-right ml-1 btn btn-primary">Update</button>
                            @endcan
                            <a type="button" href="{{ route($routeName . '.index') }}"
                                class="float-right ml-1 btn btn-warning">Back</a>
                    </form>

                    {{-- <a type="button" href="{{ route($routeName . '.restore', encrypt($testDemo->id)) }}"
                        class="float-right ml-1 btn btn-success">Restore</a>
                    <form action="{{ route($routeName . '.force.destroy', encrypt($testDemo->id)) }}" method="POST"
                        class="float-right ml-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i> Hard Delete
                        </button>
                    </form> --}}
                    <form id="delete-form" action="{{ route($routeName . '.force.destroy', encrypt($testDemo->id)) }}"
                        method="POST" class="float-right ml-1">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">
                            <i class="fa-solid fa-trash-can"></i> Hard Delete
                        </button>
                    </form>

                    @if ($testDemo->deleted_at == null)
                        <form action = "{{ route($routeName . '.destroy', encrypt($testDemo->id)) }}" method = "POST"
                            class = "float-right ml-1">
                            @csrf
                            @method('DELETE')
                            < button type = "submit" class = "btn btn-danger">
                                < i class = "fa-solid fa-eraser">
                                    < /i> Soft Delete < /button>
                                            < /form>
                    @endif
                    < /div>
                        < !--/.card-footer -->
                        @endcan

                        < /div>
                            < !--/.col (left) -->

                                < /div>

                                    < !--/.row -->
                                        < /div><!-- /.container - fluid-- >
                        @endsection
                        @section('actionFooter', 'Footer')
                            @section('footerLinks')



                                                    <
                                                    x - back - end.message.message / >

                                                        <
                                                        x - back - end.plugins.jquery - validation - footer / >
                                                        <
                                                        x - back - end.script.status -
                                                        default -value - changing / >



                                                        <
                                                        script >
                                                        $(function() {
                                                            // $.validator.setDefaults({
                                                            //     submitHandler: function() {
                                                            //         alert("Form successful submitted!");
                                                            //     }
                                                            // });
                                                            jQuery.validator.addMethod("noSpace", function(value, element) {
                                                                return value.indexOf(" ") < 0 && value != "";
                                                            });
                                                            $('#quickForm').validate({
                                                                rules: {
                                                                    name: {
                                                                        required: true,
                                                                    },
                                                                    code: {
                                                                        required: true,
                                                                        noSpace: true,
                                                                        alphanumeric: true
                                                                    },
                                                                },
                                                                messages: {
                                                                    name: {
                                                                        required: "Please Enter Name",
                                                                    },
                                                                    code: {
                                                                        required: "Please Enter Code",
                                                                        noSpace: "No space between the code",
                                                                        alphanumeric: "No special characters the code",
                                                                    },
                                                                },
                                                                errorElement: 'span',
                                                                errorPlacement: function(error, element) {
                                                                    error.addClass('invalid-feedback');
                                                                    element.closest('.form-group').append(error);
                                                                },
                                                                highlight: function(element, errorClass, validClass) {
                                                                    $(element).addClass('is-invalid');
                                                                },
                                                                unhighlight: function(element, errorClass, validClass) {
                                                                    $(element).removeClass('is-invalid');
                                                                }
                                                            });
                                                        });
                                        </>
                @endsection
