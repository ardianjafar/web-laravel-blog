<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title  }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
              <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" id="inputName is-invalid" class="form-control">
                  @error('title')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              
                <div class="form-group">
                  <label for="inputClientCompany">Foto</label>
                  <input type="file" name="image" id="inputClientCompany" class="form-control">
                </div>
                {{-- <div class="form-group">
                  <label for="inputProjectLeader">Project Leader</label>
                  <input type="text"   id="inputProjectLeader" class="form-control">
                </div> --}}
                <div class="form-group">
                  <label for="inputDescription">Deskripsi</label>
                  <textarea id="inputDescription" name="description" class="form-control" rows="4" name="editor1" id="editor1"></textarea>
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <button class="btn btn-success btn-sm">Create</button>
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