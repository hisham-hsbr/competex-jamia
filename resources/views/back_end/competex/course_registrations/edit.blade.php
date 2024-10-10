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

@section('mainContent')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-1">

            </div>
            <!-- left column -->
            <div class="col-md-12">
                {{-- <div> This item is {!! $courseRegistration->status_with_icon !!}</div> --}}
                @can('{{ N }} Edit')
                    <form role="form" action="{{ route($routeName . '.update', encrypt($courseRegistration->id)) }}"
                        method="post" enctype="multipart/form-data" id="quickForm">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="card-body">
                            <!-- /.card-header -->
                            <div style="border-style: groove;" class="p-3 form-group row">
                                @can('{{ $permissionName }} Read Application Number')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Application Number</label>
                                        <label><code>: COA-{{ $courseRegistration->application_number }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read First Name')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">First Name</label>
                                        <label><code>: {{ $courseRegistration->name }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Last Name')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Last Name</label>
                                        <label><code>: {{ $courseRegistration->last_name }}</code></label>
                                    </div>
                                @endcan

                                @can('{{ $permissionName }} Read Date Of Birth')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Date Of Birth</label>
                                        <label><code>: {{ $courseRegistration->dob }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Phone 1')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Phone 1</label>
                                        <label><code>: {{ $courseRegistration->phone_1 }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Address')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Address</label>
                                        <label><code>:
                                                {{ $courseRegistration->CityName->state }},
                                                {{ $courseRegistration->CityName->district }},
                                                {{ $courseRegistration->CityName->city }},
                                                {{ $courseRegistration->CityName->zip_code }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Created At')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Created At</label>
                                        <label><code>: {{ $courseRegistration->created_at }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Updated At')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Updated At</label>
                                        <label><code>: {{ $courseRegistration->updated_at }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Updated By')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Updated By</label>
                                        <label><code>: {{ $courseRegistration->updated_by }}</code></label>
                                    </div>
                                @endcan
                            </div>

                            <!-- /.row -->
                        </div>

                        <div class="card-body">
                            <!-- /.card-header -->
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="application_status" class="required col-form-label">Application Status</label>
                                    <select name="application_status" id="application_status" class="form-control select2">
                                        <option disabled {{ $courseRegistration->application_status == '' ? 'selected' : '' }}>
                                            --Status--
                                        </option>

                                        <option @if ($courseRegistration->application_status == 'read') { selected } @endif
                                            @if (old('application_status') == 'read') { selected } @endif value="read">Read
                                        </option>
                                        <option @if ($courseRegistration->application_status == 'waiting') { selected } @endif
                                            @if (old('application_status') == 'waiting') { selected } @endif value="waiting">
                                            Waiting
                                        </option>
                                        <option @if ($courseRegistration->application_status == 'approved') { selected } @endif
                                            @if (old('application_status') == 'approved') { selected } @endif value="approved">Approved
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="required">Application Updates</label>
                                        <textarea name="application_update" class="form-control" rows="3" placeholder="Enter address ...">{{ $courseRegistration->application_update }}</textarea>
                                    </div>
                                </div>
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


                </div>
                <!-- /.card-footer -->
            @endcan

        </div>
        <!--/.col (left) -->

    </div>

    <!-- /.row -->
    </div><!-- /.container-fluid -->

    <!-- Modal HTML -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to "Delete" this item?.
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" action="{{ route($routeName . '.destroy', encrypt($courseRegistration->id)) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmHardDeleteModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmHardDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmHardDeleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to "Force Delete" this item? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <form id="deleteForm"
                        action="{{ route($routeName . '.force.destroy', encrypt($courseRegistration->id)) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')



    <x-back-end.message.message />

    <x-back-end.plugins.jquery-validation-footer />
    <x-back-end.script.status-default-value-changing />


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForm = document.getElementById('deleteForm');
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            const confirmCheck = document.getElementById('confirmCheck');

            confirmDeleteBtn.addEventListener('click', function() {
                if (confirmCheck.checked) {
                    deleteForm.submit();
                } else {
                    alert('Please confirm that you understand this action cannot be undone.');
                }
            });
        });
    </script>



    <script>
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
    </script>


@endsection
