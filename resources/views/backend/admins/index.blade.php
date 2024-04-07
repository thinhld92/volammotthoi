@extends('backend.layouts.master')

@section('content')

<style>
  .card-header{
    text-transform: uppercase;
  }
</style>

<!-- Admin List Table -->
<div class="card">
  <div class="card-header header-elements">
    <h5 class="">{{__('Admin list')}}</h5>
    <form class="input-group input-group-merge">
      <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
      <input
        type="search"
        class="form-control"
        placeholder="Search..."
        aria-label="Search..."
        aria-describedby="basic-addon-search31"
        name="search"
        value="{{ $search ?? '' }}"
      />
    </form>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th class="status">Status</th>
          <th class="actions">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($admins as $admin)
          <tr>
            <td>{{$admin->id}}</td>
            <td>
              <span class="fw-medium">{{ $admin->name }}</span>
            </td>
            <td>{{ $admin->username }}</td>
            <td>
              {{ $admin->email }}
            </td>
            <td>
              <label class="switch switch-success">
                <input type="checkbox" class="switch-input" checked />
                <span class="switch-toggle-slider"></span>
              </label>
            </td>
            <td>
              <div class="d-flex align-items-sm-center justify-content-sm-center">
                <a href="{{route('admin.admins.edit', $admin->id)}}" class="btn btn-icon"><i class="fa fa-pencil"></i></a>
                <a href="" class="btn btn-icon delete-record me-2" onclick="submitFormDelete(event, {{$admin->id}})">
                  <form id="form-delete-{{$admin->id}}" action="{{route('admin.admins.destroy', $admin)}}" method="post">
                    @csrf
                    @method('DELETE')
                  </form>
                  <i class="fa fa-trash"></i> 
                </a>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="pt-3">
  {{ $admins->links() }}
</div>
@endsection

@section('script')
  <script>
    function submitFormDelete(event, id) {
      event.preventDefault();
      document.getElementById('form-delete-' + id).submit();
    }
  </script>
@endsection