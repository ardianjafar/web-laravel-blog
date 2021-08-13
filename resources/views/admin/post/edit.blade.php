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
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" value="{{ $post->title }}" id="inputName @error('title') is-invalid @enderror" class="form-control">
                  @error('title')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category_id" id="category" class="form-control">
                    <option value="" holder>Choose Category</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}"
                          @if ($item->id == $post->category_id)
                            selected    
                          @endif
                          >{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputClientCompany">Foto</label>
                  <input type="file" name="image" value="default"  id="inputClientCompany" class="form-control @error('image') is-invalid @enderror">
                  @error('image')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="inputDescription">Deskripsi</label>
                  <textarea id="inputDescription" name="description" class="form-control @error('description') is-invalid @enderror" rows="4" name="editor1" id="editor1">
                    {!! $post->description !!}
                  </textarea>
                  @error('description')
                      <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-success btn-sm">Edit</button>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
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

