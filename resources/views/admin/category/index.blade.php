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
    <section class="content">
        <div class="container-fluid">
          <br><br>
          @if (Session::has('success'))
              <div class="alert alert-success" role="alert">
                {{ Session('success') }}
              </div>
          @endif
          @if (Session::has('success-delete'))
              <div class="alert alert-primary" role="alert">
                {{ Session('success-delete') }}
              </div>
          @endif
          <div class="row">
            <!-- /.col -->
            <div class="col-md-6">  
              <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Your Category</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Category</th>
                          <th>Created at</th>
                          <th>Action</th>
                          <th style="width: 40px"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categories as $category => $hasil)    
                        <tr>
                          <td>{{ $category + $categories->firstitem() }}</td>
                          <td>{{ $hasil->name }}</td>
                          <td>{{ $hasil->created_at }}</td>
                          <td>
                            <form  action="{{ route('category.destroy', $hasil->id) }}" method="post" class="d-inline">
                                <a href="{{ route('category.edit', $hasil->id) }}"  class="btn btn-primary btn-sm" >Edit</a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                              </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                  <!-- /.card-body -->
                </div>
               {{ $categories->links() }}
              <!-- /.card -->
            </div>
            <div class="col-md-6">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Create Bangsat</h3>
                </div>
                <form action="{{ route('category.store') }}" method="post">
                <!-- /.card-header -->
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="category">Category : </label>
                        <input class="form-control @error('name') is-invalid @enderror" id="category" name="name" placeholder="category name">
                        @error('name')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Create</button>
                    </div>
                    <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Reset</button>
                    </div>
                </form>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>
          </div>

          
          <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('template.backend.script')

