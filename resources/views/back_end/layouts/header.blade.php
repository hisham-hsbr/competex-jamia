 <section class="content-header">
     <div class="container-fluid">
         <div class="mb-2 row">
             <div class="col-sm-6">
                 <h1>{{ $headName }} @yield('PageTitle')</h1>
             </div>
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     @section('pageNavHeader')
                     @show
                 </ol>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>
