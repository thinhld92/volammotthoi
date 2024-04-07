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
    <h5 class="">{{__('Payments list')}}</h5>
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
        </div>
        <div class="col-4">
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
            <td><span class="badge bg-label-primary">{{ $payment->status_name }}</span></td>
            <td>
              @if (in_array($payment->status, $array_accept))
                <div class="d-flex align-items-sm-center justify-content-sm-center">
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
                  <form id="form-update-{{$payment->id}}" action="{{route('admin.payments.update', $payment)}}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="status" id="payment-status-{{$payment->id}}" value="">
                  </form>
                </div>
              @endif
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
  <link rel="stylesheet" href="{{asset('backend/assets/vendor/libs/select2/select2.css')}}" />

@endsection

@section('script')
  <script src="{{asset('backend/assets/vendor/libs/select2/select2.js')}}"></script>
  <script src="{{asset('backend/assets/js/forms-selects.js')}}"></script>
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