@extends('layouts.dashboard')
@section('title')
    {{ trans('dashboard.title.index') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard_home') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-3">
      <div class="card">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
          <h5 class="card-title">14 Posts</h5>
          <a href="#" class="btn btn-primary btn-sm rightButton">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
          <h5 class="card-title">10 Tags</h5>
          <a href="#" class="btn btn-primary btn-sm">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card">
        <div class="card-header">
            Categories
        </div>
        <div class="card-body">
          <h5 class="card-title">8 Categories</h5>
          <a href="#" class="btn btn-primary btn-sm">View</a>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
          <h5 class="card-title">5 Users</h5>
          <a href="#" class="btn btn-primary btn-sm">View</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row p-0 mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Title</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Post</th>
                        <th>Popular Views</th>
                        <th>Created at</th>
                        <th>Created By</th>
                        <th>Option</th>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>dummy</td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm">See more</a>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
