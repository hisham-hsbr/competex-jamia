@extends('back_end.layouts.app')

@section('PageHead')
    {{ ucwords(__('my.show')) }}
@endsection

@section('PageTitle')
    {{ ucwords(__('my.show')) }}
@endsection

@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">{{ ucwords(__('my.dashboard')) }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route($routeName . '.index') }}">{{ $headName }}</a></li>
    <li class="breadcrumb-item active">{{ ucwords(__('my.show')) }}</li>
@endsection

@section('headLinks')
    <x-back-end.plugins.dataTable-head />
@endsection

@section('actionTitle')
    {{ ucwords(__('my.show')) }}
@endsection

@section('mainContent')
    <div class="container-fluid">
        @can('Services View')
            <div class="row">
                <div class="col-md-1">

                </div>
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card-body">
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- <div> This item is {!! $courseRegistration->status_with_icon !!}</div> --}}
                        <div class="card-body">
                            <div style="border-style: groove;" class="p-3 form-group row">
                                @can('{{ $permissionName }} Read First Name')
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

                                @can('{{ $permissionName }} Read Email')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Email</label>
                                        <label><code>: {{ $courseRegistration->email }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Phone 1')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Phone 1</label>
                                        <label><code>: {{ $courseRegistration->phone_1 }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Phone 2')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Phone 2</label>
                                        <label><code>: {{ $courseRegistration->phone_2 }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Gender')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Gender</label>
                                        <label><code>: {{ $courseRegistration->gender }}</code></label>
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
                                @can('{{ $permissionName }} Read Address Details')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Address Details</label>
                                        <label><code>: {{ $courseRegistration->address_detail }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Description')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Description</label>
                                        <label><code>: {{ $courseRegistration->description }}</code></label>
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
                                @can('{{ $permissionName }} Read Application Status')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Application Status</label>
                                        <label><code>: {{ $courseRegistration->application_status }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Application Update')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Application Update</label>
                                        <label><code>: {{ $courseRegistration->application_update }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Updated By')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Updated By</label>
                                        <label><code>: {{ $courseRegistration->updated_by }}</code></label>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->

                    <div class="">
                        @can('Mobile Service Pdf')
                            <a type="button" href="{{ route($routeName . '.pdf', encrypt($courseRegistration->id)) }}"
                                class="float-right ml-1 btn btn-info"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                        @endcan
                        <a type="button" href="{{ route($routeName . '.edit', encrypt($courseRegistration->id)) }}"
                            class="float-right ml-1 btn btn-primary">Edit</a>
                        <a type="button" href="{{ route($routeName . '.index') }}"
                            class="float-right ml-1 btn btn-warning">Back</a>
                    </div>
                    <!-- /.card-footer -->

                </div>
                <!--/.col (left) -->

            </div>

            <h1>History</h1>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Description</th>
                        <th>Event</th>
                        <th>User</th>
                        <th>Created At</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activityLog as $a)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $a->description }}</td>
                            <td>{{ $a->event }}</td>
                            <td>{{ $a->activityUser->name }}</td>
                            <td>{{ $a->created_at }}</td>
                            <td><a href="{{ route('activity-logs.show', $a->id) }}" class="ml-2"><i
                                        class="fa-solid fa fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sn</th>
                        <th>Description</th>
                        <th>Event</th>
                        <th>User</th>
                        <th>Created At</th>
                        <th>View</th>
                    </tr>
                </tfoot>
            </table>

            {{-- @foreach ($activityLog->properties as $key => $value)
                    <div class="pt-2 col-md-6">
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th colspan="2" class="bg-secondary color-palette">
                                        @if ($key == 'attributes')
                                            New {{ $activityLog->event }} {{ $activityLog->log_name }}
                                        @elseif ($key == 'old')
                                            Old {{ $activityLog->log_name }}
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($value as $lists => $data)
                                    <tr class="bg-light color-palette">
                                        <td style="color:red ;width: 10%">{{ $lists }}</td>
                                        <td>{{ $data }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach --}}


            <!-- /.row -->
        @endcan
    </div><!-- /.container-fluid -->


@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')


    <x-back-end.message.message />
    <x-back-end.script.table-update />
    <x-back-end.plugins.dataTable-footer />
    <script>
        $(function() {
            $("#example1").DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                })
                .buttons()
                .container()
                .appendTo("#example1_wrapper .col-md-6:eq(0)");
            $("#example2").DataTable({
                paging: true,
                lengthChange: false,
                searching: false,
                ordering: true,
                info: true,
                autoWidth: false,
                responsive: true,
            });
        });
    </script>



@endsection
