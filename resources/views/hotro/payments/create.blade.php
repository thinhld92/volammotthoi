
@extends('hotro.layouts.master')
@section('content')
<!-- Change Password -->
<div class="card mb-4">
  <h5 class="card-header">{{ __('Nạp xu vào tài khoản') }}</h5>
  <div class="card-body">
    <form id="formAccountSettings" 
      method="POST" 
      action="{{route('hotro.payments.store')}}"
      class="card-body needs-validation {{$errors->any() ? 'was-validated custom-validate' : ''}}" 
    >
      @csrf
      <div class="row" id="payment-detail">
        <div class="col-12">
          <span class="text-primary">{{ __('Please enter some info below') }}.  Khoản bonus tính riêng cho từng lần nạp</span>
        </div>
        <div class="col-12">
          <span class="text-danger">❤</span><span class="text-primary"> Mỗi 1 xu nhận được sẽ có 1 điểm VIP kèm theo </span><span class="text-danger">❤</span>
        </div>
        <div class="col-12 mb-4">
          <ul class="text-danger">
            <li class="text-success fw-bolder"><span>100k VND 🚀🚀 1k xu</span></li>
            {{-- <li><span class="text-danger">Trên 100k thêm 10%, 500k thêm 20%, 1 triệu được thêm 30%, trên 2 triệu được thêm 50%</span></li> --}}
            <!-- <li><span class="text-danger">200k thêm 10%</span></li> -->
            <li><span class="text-danger">500k thêm 10%</span></li>
            <li><span class="text-danger">1tr thêm 20%</span></li>
            <!-- <li><span class="text-danger">2tr thêm 50%</span></li>
            <li><span class="text-danger">5tr thêm 100%</span></li> -->
            {{-- <li><span class="text-danger"><strong>🎉Siêu hot: Nạp lần đầu được x2 số xu🎉</strong></span></li> --}}
          </ul>
        </div>
        <div class="mb-3 col-md-6 form-password-toggle">
          <label class="form-label" for="amount">{{ __('Amount') }} (VND)</label>
          <div class="input-group input-group-merge">
            <input
              class="form-control inputnumber"
              type="text"
              name="amount"
              id="amount"
              placeholder="Ex: 1,000,000"
              value="{{old('amount')}}"
              autocomplete="off"
            />
          </div>
          @foreach ($errors->get('amount') as $message)
            <div class="invalid-feedback">{{$message}}</div>
          @endforeach
        </div>
        <div class="mb-3 col-md-6 form-password-toggle">
          <label class="form-label" for="coin">{{ __('Coin receive') }}</label>
          <div class="input-group input-group-merge">
            <input
              class="form-control inputnumber"
              type="text"
              step="1"
              name="coin"
              id="coin"
              placeholder="Ex: 13,000" 
              value="{{old('coin')}}"
              autocomplete="off"
              readonly
            />
          </div>
          @foreach ($errors->get('coin') as $message)
            <div class="invalid-feedback">{{$message}}</div>
          @endforeach
        </div>
      </div>
      <div class="row">
        <div>
          <button type="submit" class="btn btn-primary me-2">Xác nhận</button>
          {{-- <button type="reset" class="btn btn-label-secondary">Cancel</button> --}}
        </div>
      </div>
    </form>
  </div>
</div>
<!--/ Change Password -->
@endsection

@section('script')
<script>
  // $('#payment-detail').change(function(event) {
  //   if (event.target.classList.contains("inputnumber")) {
  //     // remove any commas from earlier formatting
  //     const value = event.target.value.replace(/,/g, '');
  //     // try to convert to an integer
  //     const parsed = parseInt(value);
  //     // check if the integer conversion worked and matches the expected value
  //     if (!isNaN(parsed) && parsed == value) {
  //       // update the value
  //       event.target.value = new Intl.NumberFormat('en-US').format(value);
  //     }
  //   }
  // });

  $(document).ready(function () {
    amountInput();
    // coinInput();
  });

  function amountInput() {
    const amountInput = $('#amount');
    const cointInput = $('#coin');
    
    amountInput.on('keyup', function () {
      const token = $("input[name='_token']").val();
      // console.log(amountInput.val());
      const amountValue = $('#amount').val().replace(/,/g, '');
      const amountParsed = parseInt(amountValue);
      if (amountParsed > 0 && !isNaN(amountParsed) && amountParsed == amountValue) {

        amountInput.val(new Intl.NumberFormat('en-US').format(amountParsed))

        const data = new FormData();
        data.append('amount', amountParsed);
        data.append('coin', 0);
        data.append('_token', token);
        fetch("{{route('hotro.payments.genpayment')}}", {
          method: 'POST',
          body: data
        }).then(
          response => response.json() // if the response is a JSON object
        ).then(
          // success
          (data) => {cointInput.val(new Intl.NumberFormat('en-US').format(data.coin));} // Handle the success response object
        ).catch(
          error => console.log(error) // Handle the error response object
        );
      }
      else{
        cointInput.val('');
      }
    });
  }

  function coinInput() {
    const amountInput = $('#amount');
    const cointInput = $('#coin');
    
    cointInput.on('keyup', function () {
      const token = $("input[name='_token']").val();
      // console.log(amountInput.val());
      const coinValue = $('#coin').val().replace(/,/g, '');
      const coinParsed = parseInt(coinValue);
      if (coinParsed > 0 && !isNaN(coinParsed) && coinParsed == coinValue) {

        cointInput.val(new Intl.NumberFormat('en-US').format(coinParsed))

        const data = new FormData();
        data.append('amount', 0);
        data.append('coin', coinParsed);
        data.append('_token', token);
        fetch("{{route('hotro.payments.genpayment')}}", {
          method: 'POST',
          body: data
        }).then(
          response => response.json() // if the response is a JSON object
        ).then(
          // success
          (data) => {amountInput.val(new Intl.NumberFormat('en-US').format(data.amount));} // Handle the success response object
        ).catch(
          error => console.log(error) // Handle the error response object
        );
      }
      else{
        amountInput.val('');
      }
    });
  }


  

</script>
    
@endsection