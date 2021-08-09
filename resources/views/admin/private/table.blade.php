<div class="card">
    <div class="card-header">
      <h3 class="card-title">User List</h3>

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
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user => $result)    
          <tr>
            {{-- <td>{{ $user + $users->firstitem() }}</td> --}}
            <td>1</td>
            <td>{{ $result->name }}</td>
            <td>{{ $result->email }}</td>
            <td>
              @if($result->email_verified_at == true)
              <span class="badge badge-primary">Active</span>
              @else
              <span class="badge badge-danger">Non Aktif</span>
              @endif
            </td>
            <td>{{ $result->created_at->diffForHumans() }}</td>
          </tr>
          @endforeach
          
        </tbody>
      </table>

      {{-- {{ $users->links() }} --}}
    </div>
    <!-- /.card-body -->
  </div>