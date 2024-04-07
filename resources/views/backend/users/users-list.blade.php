@extends('backend.layouts.master')

@section('content')

<div class="card">
  <h5 class="card-header">{{__('User list')}}</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover" id="users-table">
      <thead>
        <tr>
          <th>Account Name</th>
          <th>Real Name</th>
          <th>Email</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
    </table>
  </div>
</div>

@endsection

@section('script')
  <script>
  $(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: false,
        ajax: '{!! route('admin.users-data') !!}',
        columns: [
            { data: 'cAccName', name: 'cAccName' },
            { data: 'cRealName', name: 'cRealName' },
            { data: 'cEMail', name: 'cEMail' },
            { data: 'nMac', name: 'nMac' },
            // { data: '', name: '' }
        ]
    });
  });
  </script>
@endsection