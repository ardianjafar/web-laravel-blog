@include('template.backend.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('template/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('template.backend.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('template.backend.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-3">
    <!-- Main content -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->

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
        
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Cateogry</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($category as $item => $result)   
                <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{ $item + $category->firstitem() }}</td>
                <td>{{ $result->name }}</td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin Hapus Permanent?');" action="{{ route('category.delete', $result->id) }}" method="post" class="d-inline">
                      <a href="{{ route('category.restore', $result->id) }}" class="btn btn-primary btn-sm">Restore</a>
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
                </tr>
                @empty
                <div class="col-md-12 mt-2 p-1">
                  <div class="alert alert-danger" role="alert">
                    You don't have data trashed
                  </div>               
                </div>
                @endforelse
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
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('template.backend.script')
