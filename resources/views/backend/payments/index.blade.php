@extends('backend.layouts.master')

@section('content')

<style>
  .card-header{
    text-transform: uppercase;
  }
</style>

<!-- payments List Table -->
<div class="card">
  <div class="card-header header-elements">
    <div class="col-6">
      <h5 class="">{{__('Payments list')}}</h5>
    </div>
    <div class="col-6">
      <h5>Total: <span class="text-danger">{{number_format($totalAmount)}}</span> VND</h5>
    </div>
  </div>
  <div class="card-body">
    <form class="">
      <div class="row">
        <div class="col-12 mb-3">
          <div class="input-group input-group-merge">
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
          </div>
          <input type="submit" hidden>
        </div>
        <div class="col-md-3">
          <select 
            name="status" 
            id="" 
            class="select2 form-select"
            onchange="submit();"
          >
          <option {{$status == 0 ? 'selected' : ''}} value="0">Tất cả</option>
          @foreach ($paymentStatuses as $key => $value)
            <option {{$status == $key ? 'selected' : ''}}
              value="{{$key}}"
            >
              {{__(mb_strtoupper($value))}}</option>
          @endforeach
          </select>
        </div>
        <div class="col-1">
        </div>
        <div class="col-1">
          <label class="form-label" for="multicol-fromdate">Từ ngày:</label>
        </div>
        <div class="col-md-2">
          <input
            type="text"
            name="fromdate"
            id="multicol-fromdate"
            class="form-control dob-picker"
            placeholder="{{ __('YYYY-MM-DD') }}"
            value="{{$fromdate ?? $opening_time ?? '2024-05-03'}}"
            onchange="submit();"
          />
        </div>
        <div class="col-1">
        </div>
        <div class="col-1">
          <label class="form-label" for="multicol-todate">Đến Ngày:</label>
        </div>
        <div class="col-md-2">
          <input
            type="text"
            name="todate"
            id="multicol-todate"
            class="form-control dob-picker"
            placeholder="{{ __('YYYY-MM-DD') }}"
            value="{{$todate ?? ''}}"
            onchange="submit();"
          />
        </div>
      </div>
    </form>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Account Name</th>
          <th>Số tiền</th>
          <th>Số xu</th>
          <th>Thời Gian</th>
          <th>Image</th>
          <th class="status">Description</th>
          <th class="status">Status</th>
          <th class="actions">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach ($payments as $payment)
          <tr>
            <td>
              <span class="fw-medium">{{ $payment->cAccName }}</span>
            </td>
            <td>{{ number_format($payment->amount) }}</td>
            <td>{{ number_format($payment->coin) }}</td>
            <td>{{ ($payment->payment_date) }}</td>
            <td>
              <img data-bs-toggle="modal" data-bs-target="#createApp" 
                class="payment-thumbnail" 
                src="{{$payment->image}}" alt=""
                onclick="showPaymentImage(event)"
              >
            </td>
            <td>{{ $payment->description }}</td>
            <td><span class="badge bg-label-primary">{{ $payment->status_name }}</span></td>
            <td>
              <div class="d-flex align-items-sm-center justify-content-sm-center">
                <a href="{{route('admin.payments.edit', $payment->id)}}" 
                  class="btn btn-icon waves-effect waves-light"
                >
                  <i class="fa-solid fa-pencil"></i>
                </a>
                @if (in_array($payment->status, $array_accept))
                  <a href="" 
                    class="btn btn-icon btn-success"
                    onclick="submitFormUpdate(event, {{$payment->id}}, {{\App\Enums\PaymentStatus::COMPLETED}})"
                  >
                    <i class="fa-solid fa-check"></i>
                  </a>
                  <a href="" 
                    class="btn btn-icon delete-record me-2 btn-danger" 
                    onclick="submitFormUpdate(event, {{$payment->id}}, {{\App\Enums\PaymentStatus::REJECTED}})"
                  >
                    <i class="fa-sharp fa-solid fa-xmark"></i>
                  </a>
                  <form id="form-update-{{$payment->id}}" action="{{route('admin.payments.fast-update', $payment)}}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="status" id="payment-status-{{$payment->id}}" value="">
                  </form>
                @endif
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="pt-3">
  {{ $payments->links() }}
</div>
<!-- Create App Modal -->
<div class="modal fade" id="createApp" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-simple modal-upgrade-plan">
    <div class="modal-content custom-content">
      <img id="payment-image" src="" alt="">
    </div>
  </div>
</div>
<!--/ Create App Modal -->
@endsection

@section('link_css')
  <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/flatpickr/flatpickr.css')}}" />
  <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('script')
  <script src="{{asset('backend/assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
  <script src="{{asset('backend/assets/vendor/libs/select2/select2.js')}}"></script>

  <script src="{{asset('backend/assets/js/forms-selects.js')}}"></script>
  <script src="{{asset('backend/assets/js/form-layouts.js')}}"></script>
  <script>
    function submitFormUpdate(event, id, status) {
      event.preventDefault();
      document.getElementById('payment-status-' + id).value = status;
      document.getElementById('form-update-' + id).submit();
    }

    function showPaymentImage(event){
      const imageUrl = event.target.src;
      console.log(imageUrl);
      document.getElementById('payment-image').src = imageUrl;

    }
  </script>
@endsection