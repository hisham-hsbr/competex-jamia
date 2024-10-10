<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>pdf Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    {{-- <h1>Page 1</h1>
    <div class="page-break"></div>
    <h1>Page 2</h1> --}}
    <div class="container-fluid">
        @can('Activity Log View')
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1">
                    </div>
                    <!-- left column -->

                    <div class="col-sm-11">
                        <!-- form start -->
                        {{-- <h5 class="card-title">TECHSO</h5>
                        <p class="card-text">jubai, saudi arabia, TECHSO@gmail.com ,
                            +91 900000000</p>
                        <p class="card-text"></p> --}}
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
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        @endcan
    </div><!-- /.container-fluid -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
