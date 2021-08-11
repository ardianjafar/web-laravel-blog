<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/admin/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.admin.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('template/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @include('layouts.admin.nav')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Posts Lists</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->

      @if(session()->has('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
      @endif
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
    
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Penulis</th>
                <th>Cateogry</th>
                <th>Created at</th>
                <th>Title</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($posts as $item => $hasil)    
                <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{ $item + $posts->firstitem() }}</td>
                <td>{{ $hasil->user->name }}</td>
                <td>{{ $hasil->categories->name }}</td>
                <td>{{ $hasil->created_at }}</td>
                <td>{{ $hasil->slug }} <a href="#">Read More</a></td>
                <td>
                  <form action="{{ route('post.destroy', $hasil->id) }}" method="post" class="d-inline">
                    <a href="{{ route('post.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </td>
                </tr>
                <tr class="expandable-body">
                    <td colspan="15">
                      <div class="container justify-content-lg-between d-flex">
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="filter-container">
                              <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                  <a href="{{ asset('storage/' . $hasil->image ) }}" data-toggle="lightbox" data-title="sample 1 - white">
                                  <img src="{{ asset('storage/' . $hasil->image ) }}" class="" style="width: 200px">
                                  </a>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <h6><strong> Deskripsi : </strong></h6>
                            <p>
                              {!! $hasil->description !!}
                            </p>
                          </div>
                        </div>
                      </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.admin.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>


{{-- <form action="{{ route('post.destroy', $hasil->id) }}" method="post" class="d-inline">
                    <a href="{{ route('post.show',$hasil->slug) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('post.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form> --}}
{{-- Modal --}}


<!-- Modal -->

<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('template/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/admin/dist/js/demo.js') }}"></script>
</body>
</html>
