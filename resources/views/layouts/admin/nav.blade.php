<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
      <a href="{{ route('post.dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    @if (Auth::user()->type == 1)
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
          Post
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('post.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Lihat Post</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('post.create') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Create Post</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('post.trashed') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Trashed Post Data</p>
          </a>
        </li>
      </ul>
    </li>        
    <li class="nav-item">
      <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
        <p>
          Kategori
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('category.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Lihat Kategori</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('category.trashed') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>List Trashed Category</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          Users
          <i class="fas fa-angle-left right"></i>
          <span class="badge badge-info right">2</span>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('user.index') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>List User</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('user.create') }}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Create Users</p>
          </a>
        </li>
      </ul>
    </li>
    
    <li class="nav-item">
      <a href="{{ route('photos') }}" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
          Gallery
        </p>
      </a>
    </li>
    {{-- Jika user admin belom verifikasi akun , maka arahkan ke halaman verifikasi akun--}}
    @elseif(Auth::user() != 'verified')
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Post
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('post.index') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Lihat Post</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('post.create') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Create Post</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('post.trashed') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Trashed Post Data</p>
            </a>
          </li>
        </ul>
      </li>
    @endif
  </ul>
</nav>
    
