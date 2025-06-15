@extends('backend.layouts.master')

@section('content')

<style>
  .card-header{
    text-transform: uppercase;
  }
</style>

{{-- <div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Session</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">21,459</h3>
              <p class="text-success mb-0">(+29%)</p>
            </div>
            <p class="mb-0">Total Users</p>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-primary">
              <i class="ti ti-user ti-sm"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Paid Users</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">4,567</h3>
              <p class="text-success mb-0">(+18%)</p>
            </div>
            <p class="mb-0">Last week analytics</p>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-danger">
              <i class="ti ti-user-plus ti-sm"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Active Users</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">19,860</h3>
              <p class="text-danger mb-0">(-14%)</p>
            </div>
            <p class="mb-0">Last week analytics</p>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-success">
              <i class="ti ti-user-check ti-sm"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Pending Users</span>
            <div class="d-flex align-items-center my-2">
              <h3 class="mb-0 me-2">237</h3>
              <p class="text-success mb-0">(+42%)</p>
            </div>
            <p class="mb-0">Last week analytics</p>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-warning">
              <i class="ti ti-user-exclamation ti-sm"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}
<!-- Users List Table -->
<div class="card">
  @csrf
  <div class="card-header header-elements">
    <h5 class="">{{__('User list')}}</h5>
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
          <th>Account Name</th>
          <th>Real Name</th>
          <th>Email</th>
          <th>Register Date</th>
          <th>End Date</th>
          <th>IP</th>
          <th class="status">Status</th>
          <th class="actions">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($users as $user)
          <tr>
            <td>
              <span class="fw-medium">{{ $user->cAccName }}</span>
            </td>
            <td>{{ $user->cRealName }}</td>
            <td>
              {{ $user->cEMail }}
            </td>
            <td>
              {{ $user->registerDate }}
            </td>
            <td id="endDate{{$user->iid}}">
              {{ $user->account_habitus->endDate }}
            </td>
            <td>
              @if(optional($user->log_user)->ip)
                <a href="https://ipinfo.io/{{ optional($user->log_user)->ip }}" target="_blank">
                  {{ optional($user->log_user)->ip }}
                </a>
              @else
                {{-- Nếu không có IP thì để trống hoặc hiển thị dấu gạch ngang --}}
                -
              @endif
            </td>
            <td>
              @php
                if ($user->account_habitus->dEndDate >= now()) {
                  $checked = "checked";
                }else{
                  $checked = "";
                }
              @endphp
              <label class="switch switch-success">
                <input type="checkbox" 
                  class="switch-input" {{$checked}}
                  onclick="changeStatusUser(event, {{$user->iid}}, '{{$user->cAccName}}')"
                />
                <span class="switch-toggle-slider">
                  {{-- <span class="switch-on">
                    <i class="ti ti-check"></i>
                  </span>
                  <span class="switch-off">
                    <i class="ti ti-x"></i>
                  </span> --}}
                </span>
                {{-- <span class="switch-label">Success</span> --}}
              </label>
            </td>
            <td>
              <div class="d-flex align-items-sm-center justify-content-sm-center">
                <a href="{{route('admin.users.edit', $user->iid)}}" class="btn btn-icon"><i class="fa fa-pencil"></i></a>
                <a href="" class="btn btn-icon delete-record me-2" onclick="submitFormDelete(event, {{$user->iid}})">
                  <form id="form-delete-{{$user->iid}}" action="{{route('admin.users.destroy', $user)}}" method="post">
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
  {{ $users->links() }}
</div>
@endsection

@section('link_css')
  <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/animate-css/animate.css')}}" />
  <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
    
@endsection

@section('script')
  <script src="{{asset('backend/assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
  <script src="{{asset('backend/assets/js/extended-ui-sweetalert2.js')}}"></script>
  <script>
    function submitFormDelete(event, iid) {
      event.preventDefault();
      Swal.fire({
        title: 'Bạn có chắc?',
        text: "Bạn sẽ không thể lấy lại được",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đúng, xoá người dùng',
        cancelButtonText: 'Huỷ bỏ',
        customClass: {
          confirmButton: 'btn btn-primary me-3',
          cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
          Swal.fire({
            icon: 'success',
            title: 'Đã xoá!',
            text: 'Người dùng đã được xoá',
            showConfirmButton: false,
            customClass: {
              confirmButton: 'btn btn-success'
            }
          });
          document.getElementById('form-delete-' + iid).submit();
        }
      });
      // if ($confirm) {
      //   document.getElementById('form-delete-' + iid).submit();
      // }
    }

    function changeStatusUser(event, iid, cAccName) {
      // event.preventDefault();
      let active = 0;
      if (event.target.checked) {
        active = 1;
      }
      endDateEle = document.getElementById('endDate'+iid);
      const token = $("input[name='_token']").val();
      const data = new FormData();
      data.append('iid', iid);
      data.append('active', active);
      data.append('cAccName', cAccName);
      data.append('_token', token);
      fetch("{{route('admin.users.update-enddate')}}", {
        method: 'POST',
        body: data
      }).then(
        response => response.json() // if the response is a JSON object
      ).then(
        // success
        (data) => {endDateEle.innerHTML = data.dEndDate} // Handle the success response object
      ).catch(
        error => console.log(error) // Handle the error response object
      );
    }
  </script>
@endsection