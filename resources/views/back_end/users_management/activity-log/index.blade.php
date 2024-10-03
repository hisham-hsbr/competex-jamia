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
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <x-back-end.layouts.div-clearfix>
                                @can('Activity Log Settings')
                                    <x-back-end.form.button-href button_type="" button_oneclick=""
                                        button_class="btn btn-default" href="" button_icon="fa fa-cog"
                                        button_name="Settings" />
                                @endcan {{-- Activity Log Settings End --}}
                                @can('Activity Log Table')
                                    <x-back-end.form.button button_type="" button_oneclick="Refresh()"
                                        button_class="btn btn-success" button_icon="fa fa-refresh" button_name="Refresh" />
                                @endcan {{-- Activity Log Table --}}
                            </x-back-end.layouts.div-clearfix>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        @can('Activity Log Table')
                                            <th>Sn</th>
                                        @endcan
                                        @can('Activity Log Read Log Name')
                                            <th>Log Name</th>
                                        @endcan
                                        @can('Activity Log Read Description')
                                            <th>Description</th>
                                        @endcan
                                        @can('Activity Log Read Event')
                                            <th>Event</th>
                                        @endcan
                                        @can('Activity Log Read Subject Type')
                                            <th>Subject Type</th>
                                        @endcan
                                        @can('Activity Log Read Event User')
                                            <th>Event User</th>
                                        @endcan
                                        @can('Activity Log Created At')
                                            <th>Created At</th>
                                        @endcan
                                        @can('Activity Log view')
                                            <th>View</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- ---- --}}
                                </tbody>
                                <tfoot>
                                    <tr>
                                        @can('Activity Log Table')
                                            <th>Sn</th>
                                        @endcan
                                        @can('Activity Log Read Log Name')
                                            <th>Log Name</th>
                                        @endcan
                                        @can('Activity Log Read Description')
                                            <th>Description</th>
                                        @endcan
                                        @can('Activity Log Read Event')
                                            <th>Event</th>
                                        @endcan
                                        @can('Activity Log Read Subject Type')
                                            <th>Subject Type</th>
                                        @endcan
                                        @can('Activity Log Read Event User')
                                            <th>Event User</th>
                                        @endcan
                                        @can('Activity Log Created At')
                                            <th>Created At</th>
                                        @endcan
                                        @can('Activity Log view')
                                            <th>View</th>
                                        @endcan
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
@section('actionFooter', 'Footer')
@section('footerLinks')


    <x-back-end.script.delete-confirmation />
    <x-back-end.script.force-delete-confirmation />
    <x-back-end.message.message />
    <x-back-end.script.table-update />
    <x-back-end.plugins.dataTable-footer />

    <script>
        $(function() {

            var table = $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "processing": true,
                dom: '<"html5buttons"B>lTftigp',
                buttons: [
                    @can('Activity Log Table Export Excel')
                        'excel',
                    @endcan
                    @can('Activity Log Table Export PDF')
                        'pdf',
                    @endcan
                    @can('Activity Log Table Print')
                        'print',
                    @endcan
                    @can('Activity Log Table Copy')
                        'copy',
                    @endcan
                    @can('Activity Log Table Column Visible')
                        'colvis',
                    @endcan
                ],
                select: true,
                scrollY: '80vh',
                scrollX: true,
                scrollCollapse: true,
                // lengthMenu: [
                //     [10, 25, 50, 100, -1],
                //     [10, 25, 50, 100, "All"]
                // ],
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                ajax: '{!! route('activity-logs.get') !!}',

                // <--- colum serial number order with id
                "columnDefs": [{
                    searchable: false,
                    orderable: false,
                    targets: 0
                }],
                "order": [
                    [6, 'des']
                ],
                // colum serial number order with id --->
                columns: [
                    @can('Activity Log Table')
                        {
                            data: 'id',
                            name: 'id',
                        },
                    @endcan
                    @can('Activity Log Read Log Name')
                        {
                            data: 'log_name',
                            name: 'log_name',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Activity Log Read Description')
                        {
                            data: 'description',
                            name: 'description',
                            defaultContent: '',
                        },
                    @endcan
                    @can('Activity Log Read Event')
                        {
                            data: 'event',
                            name: 'event',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Activity Log Read Subject Type')
                        {
                            data: 'subject_type',
                            name: 'subject_type',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Activity Log Read Event User')
                        {
                            data: 'created_user',
                            name: 'created_user',
                            defaultContent: ''
                            // searchable: false
                        },
                    @endcan
                    @can('Activity Log Created Ate')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            defaultContent: ''
                        },
                    @endcan
                    @can('Activity Log View')
                        {
                            data: 'viewLink',
                            name: 'editLink',
                            searchable: false
                        },
                    @endcan
                ]
            });

            // <--- colum serial number order with id
            table.on('order.dt search.dt', function() {
                    let i = 1;

                    table
                        .cells(null, 0, {
                            search: 'applied',
                            order: 'applied'
                        })
                        .every(function(cell) {
                            this.data(i++);
                        });
                })
                .draw();
            // colum serial number order with id -->
            // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        function Refresh() {
            $('#example1').DataTable().ajax.reload();
            toastr.success("Refreshed");
        }
    </script>


@endsection
