@extends('hotro.v4.layouts.master')

@section('page_title', 'Nạp Xu Tài Khoản')

@section('content')
<div class="row justify-content-center">
  <div class="col-xl-8 col-lg-10">
    <div class="v4-card p-4 p-md-5">
      <div class="d-flex align-items-center gap-3 pb-3 mb-4" style="border-bottom: 1px solid var(--v4-bronze-border);">
        <div class="v4-feature-icon" style="width: 44px; height: 44px; min-width: 44px;">
          <i class="fa-solid fa-coins"></i>
        </div>
        <h4 class="fw-bolder mb-0 text-white">Nạp Xu Vào Tài Khoản</h4>
      </div>

      <form id="formAccountSettings" method="POST" action="{{ route('hotro.payments.store') }}" novalidate>
        @csrf

        <div class="row g-3 mb-4" id="payment-detail">
          <div class="col-md-6">
            <label class="v4-label" for="amount">{{ __('Amount') }} (VND)</label>
            <input
              class="v4-control inputnumber {{ $errors->has('amount') ? 'is-invalid' : '' }}"
              type="text"
              name="amount"
              id="amount"
              placeholder="VD: 100,000"
              value="{{ old('amount') }}"
              autocomplete="off"
            />
            @foreach ($errors->get('amount') as $message)
              <div class="v4-error">
                <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
              </div>
            @endforeach
          </div>

          <div class="col-md-6">
            <label class="v4-label" for="coin">{{ __('Coin receive') }}</label>
            <input
              class="v4-control inputnumber {{ $errors->has('coin') ? 'is-invalid' : '' }}"
              type="text"
              name="coin"
              id="coin"
              placeholder="Tự động tính số xu nhận được"
              value="{{ old('coin') }}"
              autocomplete="off"
              readonly
            />
          </div>
        </div>

        <div class="d-flex flex-wrap gap-3">
          <button type="submit" class="btn-v4-crimson px-4 py-2">
            <i class="fa-solid fa-circle-check"></i>
            <span>Tạo Lệnh</span>
          </button>
          <a href="{{ route('hotro.dashboard') }}" class="btn-v4-bronze px-4 py-2">
            <span>{{ __('Go back') }}</span>
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function () {
    const amountInput = $('#amount');
    const coinInput = $('#coin');

    amountInput.on('keyup change', function () {
      const token = $("input[name='_token']").val();
      const cleaned = String(amountInput.val()).replace(/,/g, '').trim();
      const parsed = parseInt(cleaned, 10);

      if (parsed > 0 && !isNaN(parsed) && String(parsed) === cleaned) {
        amountInput.val(new Intl.NumberFormat('en-US').format(parsed));
        const data = new FormData();
        data.append('amount', parsed);
        data.append('coin', 0);
        data.append('_token', token);

        fetch("{{ route('hotro.payments.genpayment') }}", {
          method: 'POST',
          body: data
        })
          .then(function (res) { return res.json(); })
          .then(function (data) {
            if (data && typeof data.coin !== 'undefined') {
              coinInput.val(new Intl.NumberFormat('en-US').format(data.coin));
            }
          })
          .catch(function (err) { console.error(err); });
      } else {
        coinInput.val('');
      }
    });
  });
</script>
@endsection
