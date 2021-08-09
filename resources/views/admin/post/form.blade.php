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
                <input type="hidden" name="user_id">
                <div class="form-group">
                  <label for="title">Judul</label>
                  <input type="text" name="title" id="inputName is-invalid" class="form-control">
                  @error('title')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select name="category_id" id="category" class="form-control">
                    <option value="" holder>Choose Category</option>
                    @foreach ($category as $result)
                        <option value="{{ $result->id }}">{{ $result->name }}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="inputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="inputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputDescription">Deskripsi</label>
                  <textarea id="inputDescription" name="description" class="form-control ckeditor" rows="4" id="plugineditor"></textarea>
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


