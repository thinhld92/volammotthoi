@extends('hotro.v2.layouts.master')

@section('page_title', 'Nạp Xu Tài Khoản')

@section('content')
<div class="row justify-content-center">
  <div class="col-xl-8 col-lg-10">
    <div class="hotro-card">
      <div class="hotro-card-header">
        <h5 class="hotro-card-title">
          <i class="fa-solid fa-coins"></i>
          <span>Nạp Xu Vào Tài Khoản</span>
        </h5>
      </div>

      <div class="hotro-card-body">
        <div class="p-3 rounded-3 mb-4" style="background: var(--hotro-card-inner); border: 1px solid var(--border-gold);">
          <div class="fw-bold mb-2" style="color: var(--accent-gold);">
            <i class="fa-solid fa-gift me-1"></i> Tỷ Lệ Quy Đổi & Khuyến Mãi Nạp Xu
          </div>
          <p class="small text-muted mb-2">
            Khoản bonus tính riêng cho từng lần nạp. Mỗi <strong>1 Xu</strong> nhận được sẽ kèm theo <strong>1 điểm VIP</strong>.
          </p>
          <div class="d-flex flex-wrap gap-2">
            <span class="badge-modern badge-modern-gold mb-0">100,000 VND = 1,000 Xu chuẩn</span>
            <span class="badge-modern badge-modern-blue mb-0">Từ 500k: +10% đến +20%</span>
            <span class="badge-modern badge-modern-blue mb-0">Từ 1 Triệu trở lên: Ưu đãi cao</span>
          </div>
        </div>

        <form id="formAccountSettings" method="POST" action="{{ route('hotro.payments.store') }}" novalidate>
          @csrf

          <div class="mb-3">
            <label class="hotro-form-label">Chọn nhanh mệnh giá (VND)</label>
            <div class="hotro-amount-chips">
              <button type="button" class="hotro-chip" data-amount="100000">100,000đ</button>
              <button type="button" class="hotro-chip" data-amount="200000">200,000đ</button>
              <button type="button" class="hotro-chip" data-amount="500000">500,000đ</button>
              <button type="button" class="hotro-chip" data-amount="1000000">1,000,000đ</button>
              <button type="button" class="hotro-chip" data-amount="2000000">2,000,000đ</button>
              <button type="button" class="hotro-chip" data-amount="5000000">5,000,000đ</button>
            </div>
          </div>

          <div class="row g-3 mb-4" id="payment-detail">
            <div class="col-md-6">
              <label class="hotro-form-label" for="amount">{{ __('Amount') }} (VND)</label>
              <input
                class="hotro-control inputnumber {{ $errors->has('amount') ? 'is-invalid' : '' }}"
                type="text"
                name="amount"
                id="amount"
                placeholder="VD: 1,000,000"
                value="{{ old('amount') }}"
                autocomplete="off"
              />
              @foreach ($errors->get('amount') as $message)
                <div class="hotro-error-msg">
                  <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                </div>
              @endforeach
            </div>

            <div class="col-md-6">
              <label class="hotro-form-label" for="coin">{{ __('Coin receive') }}</label>
              <input
                class="hotro-control inputnumber {{ $errors->has('coin') ? 'is-invalid' : '' }}"
                type="text"
                name="coin"
                id="coin"
                placeholder="Tự động tính số xu nhận được"
                value="{{ old('coin') }}"
                autocomplete="off"
                readonly
              />
              @foreach ($errors->get('coin') as $message)
                <div class="hotro-error-msg">
                  <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                </div>
              @endforeach
            </div>
          </div>

          <div class="d-flex flex-wrap gap-3">
            <button type="submit" class="btn-modern-primary px-4 py-2">
              <i class="fa-solid fa-circle-check"></i>
              <span>Tạo Lệnh Nạp Xu</span>
            </button>
            <a href="{{ route('hotro.dashboard') }}" class="btn-modern-secondary px-4 py-2">
              <span>{{ __('Go back') }}</span>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function () {
    const amountInput = $('#amount');
    const coinInput = $('#coin');
    const chips = document.querySelectorAll('.hotro-chip');

    function calculateCoinFromAmount(rawValue) {
      const token = $("input[name='_token']").val();
      const cleaned = String(rawValue).replace(/,/g, '').trim();
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
    }

    amountInput.on('keyup change', function () {
      chips.forEach(function (c) { c.classList.remove('active'); });
      calculateCoinFromAmount(amountInput.val());
    });

    chips.forEach(function (chip) {
      chip.addEventListener('click', function () {
        chips.forEach(function (c) { c.classList.remove('active'); });
        chip.classList.add('active');
        const val = chip.getAttribute('data-amount');
        amountInput.val(val);
        calculateCoinFromAmount(val);
      });
    });
  });
</script>
@endsection
