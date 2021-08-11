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
          @if (Session::has('success'))
              <div class="alert alert-success" role="alert">
                {{ Session('success') }}
              </div>
          @endif
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
              <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="type">Type</label>
                  <select name="type" id="type" class="form-control">
                    <option value="" holder>Choose Type</option>
                    <option value="0">Admin</option>
                    <option value="1">Super Admin</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" id="name @error('name') is-invalid @enderror" class="form-control">
                  <input type="hidden" name="username">
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="photo_profile">Foto Profile</label>
                  <input type="file" name="photo_profile" id="photo_profile @error('photo_profile') is-invalid @enderror" class="form-control">
                  @error('photo_profile')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email @error('email') is-invalid @enderror" class="form-control">
                  @error('email')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" name="password" id="password" class="form-control">
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