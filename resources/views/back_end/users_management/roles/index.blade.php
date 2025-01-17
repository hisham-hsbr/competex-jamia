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
                            @can('User Menu')
                                <x-back-end.layouts.div-clearfix>
                                    <x-back-end.form.button-href button_type="" button_oneclick=""
                                        button_class="btn btn-primary" href="{{ route('roles.create') }}"
                                        button_icon="fa fa-add" button_name="Add" />
                                </x-back-end.layouts.div-clearfix>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sn</th>
                                            <th>Name</th>
                                            <th>Users</th>
                                            <th>Permissions</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Created By</th>
                                            <th>Updated By</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td><span class="badge badge-primary badge-pill">{{ $role->users->count() }}
                                                        Users</span></td>
                                                <td> <span
                                                        class="badge badge-warning badge-pill">{{ $role->permissions->count() }}
                                                        Permissions</span></td>
                                                <td>
                                                    @if ($role->status == '1')
                                                        <span
                                                            style="background-color: #04AA6D;color: white;padding: 3px;width:100px;">Active</span>
                                                    @else
                                                        <span
                                                            style="background-color: #ff9800;color: white;padding: 3px;width:100px;">In
                                                            Active</span>
                                                    @endif
                                                </td>
                                                <td>{{ $role->createdBy->name }}</td>
                                                <td>{{ $role->updatedBy->name }}</td>
                                                <td>{{ $role->created_at->format('d-M-Y , h:i:s A') }}</td>
                                                <td>{{ $role->updated_at->format('d-M-Y , h:i:s A') }}</td>
                                                <td>
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="ml-2">
                                                        <i class="fa-solid fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn" type="submit"><i
                                                                class="fa-solid fa-trash-can text-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sn</th>
                                            <th>Name</th>
                                            <th>Users</th>
                                            <th>Permissions</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Created By</th>
                                            <th>Updated By</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            @endcan
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
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
