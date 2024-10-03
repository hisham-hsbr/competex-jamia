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
                        <div> This item is {!! $testDemo->status_with_icon !!}</div>
                        <div class="card-body">
                            <div style="border-style: groove;" class="p-3 form-group row">
                                @can('{{ $permissionName }} Read Name')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Name</label>
                                        <label><code>: {{ $testDemo->name }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Local Name')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Local Name</label>
                                        <label><code>: {{ $testDemo->name }}</code></label>
                                    </div>
                                @endcan

                                @can('{{ $permissionName }} Read Local Name')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Status</label>
                                        <label><code>: {{ $testDemo->status }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Created At')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Created At</label>
                                        <label><code>: {{ $testDemo->created_at }}</code></label>
                                    </div>
                                @endcan
                                @can('{{ $permissionName }} Read Updated At')
                                    <div class="col-sm-6">
                                        <label class="col-sm-4">Updated At</label>
                                        <label><code>: {{ $testDemo->updated_at }}</code></label>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>


                    <!-- /.card-body -->

                    <div class="">
                        @can('Mobile Service Pdf')
                            <a type="button" href="{{ route($routeName . '.pdf', encrypt($testDemo->id)) }}"
                                class="float-right ml-1 btn btn-info"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                        @endcan
                        <a type="button" href="{{ route($routeName . '.edit', encrypt($testDemo->id)) }}"
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
