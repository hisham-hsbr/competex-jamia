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
                            @can('User Read')
                                <x-back-end.layouts.div-clearfix>
                                    @can('User Create')
                                        <x-back-end.form.button-href button_type="" button_oneclick=""
                                            button_class="btn btn-primary" href="{{ route('users.create') }}"
                                            button_icon="fa fa-add" button_name="Add" />
                                    @endcan {{-- User Create End --}}
                                    @can('User Settings')
                                        <x-back-end.form.button-href button_type="" button_oneclick=""
                                            button_class="btn btn-default" href="{{ route('users.create') }}"
                                            button_icon="fa fa-cog" button_name="Settings" />
                                    @endcan {{-- User Settings End --}}
                                    @can('User Read')
                                        <x-back-end.form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success" button_icon="fa fa-refresh" button_name="Refresh" />
                                    @endcan {{-- User Read --}}
                                </x-back-end.layouts.div-clearfix>
                                @can('User Read')
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @can('User Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('User Read First Name')
                                                    <th>First Name</th>
                                                @endcan
                                                @can('User Read Last Name')
                                                    <th>Last Name</th>
                                                @endcan
                                                @can('User Read DOB')
                                                    <th>DOB</th>
                                                @endcan
                                                @can('User Read Phone1')
                                                    <th>Phone1</th>
                                                @endcan
                                                @can('User Read Phone2')
                                                    <th>Phone2</th>
                                                @endcan
                                                @can('User Read Gender')
                                                    <th>Gender</th>
                                                @endcan
                                                @can('User Read Email')
                                                    <th>Email</th>
                                                @endcan
                                                @can('User Read Email Verified')
                                                    <th>Email Verified</th>
                                                @endcan
                                                @can('User Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('User Read City')
                                                    <th>City</th>
                                                @endcan
                                                @can('User Read Time Zone')
                                                    <th>Time Zone</th>
                                                @endcan
                                                @can('User Read Roles')
                                                    <th>Roles</th>
                                                @endcan
                                                @can('User Read Permissions')
                                                    <th>Special Permissions</th>
                                                @endcan
                                                @can('User Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('User Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('User Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('User Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('User Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('User Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- ------ --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @can('User Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('User Read First Name')
                                                    <th>First Name</th>
                                                @endcan
                                                @can('User Read Last Name')
                                                    <th>Last Name</th>
                                                @endcan
                                                @can('User Read DOB')
                                                    <th>DOB</th>
                                                @endcan
                                                @can('User Read Phone1')
                                                    <th>Phone1</th>
                                                @endcan
                                                @can('User Read Phone2')
                                                    <th>Phone2</th>
                                                @endcan
                                                @can('User Read Gender')
                                                    <th>Gender</th>
                                                @endcan
                                                @can('User Read Email')
                                                    <th>Email</th>
                                                @endcan
                                                @can('User Read Email Verified')
                                                    <th>Email Verified</th>
                                                @endcan
                                                @can('User Read Status')
                                                    <th>Status</th>
                                                @endcan
                                                @can('User Read City')
                                                    <th>City</th>
                                                @endcan
                                                @can('User Read Time Zone')
                                                    <th>Time Zone</th>
                                                @endcan
                                                @can('User Read Roles')
                                                    <th>Roles</th>
                                                @endcan
                                                @can('User Read Permissions')
                                                    <th>Special Permissions</th>
                                                @endcan
                                                @can('User Read Created By')
                                                    <th>Created By</th>
                                                @endcan
                                                @can('User Read Updated By')
                                                    <th>Updated By</th>
                                                @endcan
                                                @can('User Read Created At')
                                                    <th>Created At</th>
                                                @endcan
                                                @can('User Read Updated At')
                                                    <th>Updated At</th>
                                                @endcan
                                                @can('User Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('User Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                @endcan {{-- User Read End --}}
                            @endcan {{-- User Menu End --}}
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
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "processing": true,

                // "paging": true,
                // "searching": false,
                // "ordering": true,
                // "info": true,

                // dom: 'Bfrtip',
                dom: '<"html5buttons"B>lTftigp',
                "fnDrawCallback": function(oSettings) {
                    $('.delete-user').on('click', function() {
                        var userID = $(this).data('user_id');
                        var isReady = confirm("Are you sure to delete");
                        var myHeaders = new Headers({
                            "X-CSRF-TOKEN": $("input[name='_token']").val()
                        });
                        if (isReady) {
                            fetch("/admin/users-management/users/destroy" +
                                userID, {
                                    method: 'DELETE',
                                    headers: myHeaders,
                                }).then(function(response) {
                                return response.json();
                            });
                            $('#example1').DataTable().ajax.reload();
                            toastr.danger("user Deleted");
                        }

                    });
                },

                // "buttons": ["excel", "pdf", "print", "colvis"],
                buttons: [
                    @can('User Read Export Excel')
                        'excel',
                    @endcan
                    @can('User Read Export PDF')
                        'pdf',
                    @endcan
                    @can('User Read Print')
                        'print',
                    @endcan
                    @can('User Read Copy')
                        'copy',
                    @endcan
                    @can('User Read Column Visible')
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

                // {data: 'action', name: 'action', orderable: false, searchable: false},

                ajax: '{!! route('users.get') !!}',

                columns: [
                    @can('User Read')
                        {
                            data: 'id',
                            name: 'id',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read First Name')
                        {
                            data: 'name',
                            name: 'name',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read Last Name')
                        {
                            data: 'last_name',
                            name: 'last_name',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read DOB')
                        {
                            data: 'dob',
                            name: 'dob',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read Phone1')
                        {
                            data: 'phone1',
                            name: 'phone1',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read Phone2')
                        {
                            data: 'phone2',
                            name: 'phone2',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read Gender')
                        {
                            data: 'gender',
                            name: 'gender',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read Email')
                        {
                            data: 'email',
                            name: 'email',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read Email Verified')
                        {
                            data: 'emailVerified',
                            name: 'emailVerified',
                            defaultContent: '',
                            searchable: false,
                        },
                    @endcan
                    @can('User Read Status')
                        {
                            data: 'status',
                            name: 'status',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read City')
                        {
                            data: 'cityName',
                            name: 'cityName',
                            defaultContent: '',
                            searchable: false,
                        },
                    @endcan
                    @can('User Read Time Zone')
                        {
                            data: 'timeZone',
                            name: 'timeZone',
                            defaultContent: '',
                            searchable: false,
                        },
                    @endcan
                    @can('User Read Roles')
                        {
                            data: 'roles',
                            name: 'roles',
                            defaultContent: '',
                            searchable: false,
                        },
                    @endcan
                    @can('User Read Permissions')
                        {
                            data: 'permissions',
                            name: 'permissions',
                            defaultContent: '',
                            searchable: false,
                        },
                    @endcan
                    @can('User Read Created By')
                        {
                            data: 'created_by',
                            name: 'created_by',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read Updated By')
                        {
                            data: 'updated_by',
                            name: 'updated_by',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read Created At')
                        {
                            data: 'created_at',
                            name: 'created_at',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Read Updated At')
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Edit')
                        {
                            data: 'editLink',
                            name: 'editLink',
                            defaultContent: '',
                        },
                    @endcan
                    @can('User Delete')
                        {
                            data: 'deleteLink',
                            name: 'deleteLink',
                            defaultContent: '',
                        },
                    @endcan
                ]
            });
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
