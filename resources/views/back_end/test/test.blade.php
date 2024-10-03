@extends('back_end.layouts.app')

@section('PageHead', 'Job Type Index')

@section('PageTitle', 'Job Type Index')
@section('pageNavHeader')
    <li class="breadcrumb-item"><a href="{{ route('back-end.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route($route_name . '.index') }}">{{ $head_name }}</a></li>
    <li class="breadcrumb-item active">Index</li>
@endsection

@section('headLinks')
    <x-back_end.plugins.dataTable-head />

@endsection

@section('actionTitle', 'Job Type Index')
@section('mainContent')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            @can('Job Type Read')
                                <x-back_end.layouts.div-clearfix>
                                    @can('Job Type Create')
                                        <x-back_end.form.button-href button_type="" button_oneclick=""
                                            button_class="btn btn-primary btn-sm" href="{{ route($route_name . '.create') }}"
                                            button_icon="fa fa-add" button_name="Add" />
                                    @endcan {{-- Job Type Create End --}}
                                    @can('Job Type Import')
                                        <x-back_end.form.button-href button_type="" button_oneclick=""
                                            button_class="btn btn-warning btn-sm" href="{{ route($route_name . '.import') }}"
                                            button_icon="fa fa-upload" button_name="Import" />
                                    @endcan {{-- Job Type Create End --}}
                                    @can('Job Type Settings')
                                        <x-back_end.form.button-href button_type="" button_oneclick=""
                                            button_class="btn btn-default btn-sm" href="" button_icon="fa fa-cog"
                                            button_name="Settings" />
                                    @endcan {{-- Job Type Settings End --}}
                                    @can('Job Type Table')
                                        <x-back_end.form.button button_type="" button_oneclick="Refresh()"
                                            button_class="btn btn-success btn-sm" button_icon="fa fa-refresh"
                                            button_name="Refresh" />
                                    @endcan {{-- Job Type Table --}}
                                </x-back_end.layouts.div-clearfix>


                                @can('Job Type Filter')
                                    <div class="col-md-12">
                                        <div class="card card-success collapsed-card">
                                            <div class="card-header">

                                                <h3 class="card-title"><i class="fa-solid fa-filter"></i> Filter</h3>
                                                <div class="card-tools">
                                                    {{-- <x-back_end.form.button button_type="" button_oneclick="Refresh()"
                                                    button_class="btn btn-success btn-sm"
                                                    button_icon="fa-solid fa-filter-circle-xmark" button_name="Refresh" /> --}}
                                                    <button type="" class="btn btn-tool" onClick="Reset()"><i
                                                            class="fa-solid fa-filter-circle-xmark"></i> Reset
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                            class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div id="myFilter" class="row">
                                                    @can('Job Type Read Code')
                                                        <div class="form-group col-sm-4">
                                                            <label class="col-form-label">Code</label>
                                                            <input type="text" class="form-control filter-input" id="code"
                                                                placeholder="Search Code" data-column="1" />
                                                        </div>
                                                    @endcan
                                                    @can('Job Type Read Name')
                                                        <div class="form-group col-sm-4">
                                                            <label class="col-form-label">Name</label>
                                                            <input type="text" class="form-control filter-input" id="name"
                                                                placeholder="Search Name" data-column="2" />
                                                        </div>
                                                    @endcan
                                                    @can('Job Type Read Created By')
                                                        <div class="form-group col-sm-4">
                                                            <label class="col-form-label">Created By</label>
                                                            <select data-column="6" class="form-control select2 filter-select">
                                                                <option value="">Select Created By</option>
                                                                {{-- @foreach ($createdByUsers as $createdByUser)
                                                                    <option value="{{ $createdByUser->name }}">
                                                                        {{ $createdByUser->name }}
                                                                    </option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    @endcan
                                                    @can('Job Type Read Updated By')
                                                        <div class="form-group col-sm-4">
                                                            <label class="col-form-label">Updated By</label>
                                                            <select data-column="7" class="form-control select2 filter-select">
                                                                <option value="">Select Updated By</option>
                                                                {{-- @foreach ($updatedByUsers as $updatedByUser)
                                                                    <option value="{{ $updatedByUser->name }}">
                                                                        {{ $updatedByUser->name }}
                                                                    </option>
                                                                @endforeach --}}
                                                            </select>
                                                        </div>
                                                    @endcan
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                @endcan

                                @can('Job Type Table')
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                @can('Job Type Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Job Type Read Code')
                                                    <th width="10%">code</th>
                                                @endcan
                                                @can('Job Type Read Name')
                                                    <th width="20%">Name</th>
                                                @endcan
                                                @can('Job Type Read Status')
                                                    <th width="10%">Status</th>
                                                @endcan
                                                @can('Job Type Read Created At')
                                                    <th width="20%">Created At</th>
                                                @endcan
                                                @can('Job Type Read Updated At')
                                                    <th width="20%">Updated At</th>
                                                @endcan
                                                @can('Job Type Read Created By')
                                                    <th width="20%">Created By</th>
                                                @endcan
                                                @can('Job Type Read Updated By')
                                                    <th width="20%">Updated By</th>
                                                @endcan
                                                @can('Job Type Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Job Type Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- ---- --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                @can('Job Type Read')
                                                    <th>Sn</th>
                                                @endcan
                                                @can('Job Type Read Code')
                                                    <th width="10%">code</th>
                                                @endcan
                                                @can('Job Type Read Name')
                                                    <th width="20%">Name</th>
                                                @endcan
                                                @can('Job Type Read Status')
                                                    <th width="10%">Status</th>
                                                @endcan
                                                @can('Job Type Read Created At')
                                                    <th width="20%">Created At</th>
                                                @endcan
                                                @can('Job Type Read Updated At')
                                                    <th width="20%">Updated At</th>
                                                @endcan
                                                @can('Job Type Read Created By')
                                                    <th width="20%">Created By</th>
                                                @endcan
                                                @can('Job Type Read Updated By')
                                                    <th width="20%">Updated By</th>
                                                @endcan
                                                @can('Job Type Edit')
                                                    <th>Edit</th>
                                                @endcan
                                                @can('Job Type Delete')
                                                    <th>Delete</th>
                                                @endcan
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @endcan{{-- Job Type Table end --}}
                                @endcan {{-- Job Type Read end --}}
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


    <x-back_end.message.message />
    <x-back_end.message.table-update />

    <x-back_end.plugins.dataTable-footer />




@endsection
