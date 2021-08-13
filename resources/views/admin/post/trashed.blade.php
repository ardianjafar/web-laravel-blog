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
                <th>Penulis</th>
                <th>Cateogry</th>
                <th>Title</th>
                <th>Created at</th>
                <th></th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($post as $item => $result)   
                <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{ $item + $post->firstitem() }}</td>
                <td>{{ $result->user->name }}</td>
                <td>{{ $result->categories->name }}</td>
                <td>{{ $result->title }}</td>
                <td>{{ $result->created_at }}</td>
                <td>{{ $result->slug }} <a href="#">Read More</a></td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin Hapus Permanent?');" action="{{ route('post.delete', $result->id) }}" method="post" class="d-inline">
                      <a href="{{ route('post.restore', $result->id) }}" class="btn btn-primary btn-sm">Restore</a>
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
                                  <a href="{{ asset('storage/' . $result->image ) }}" data-toggle="lightbox" data-title="sample 1 - white">
                                  <img src="{{ asset('storage/' . $result->image ) }}" class="" style="width: 200px">
                                  </a>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <h6><strong> Deskripsi : </strong></h6>
                            <p>
                              {{ $result->description }}
                            </p>
                          </div>
                        </div>
                      </div>
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
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('template.backend.script')

