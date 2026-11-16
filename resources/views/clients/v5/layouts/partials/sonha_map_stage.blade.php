@php
  $sonhaMap = getSonHaMapConfig();
@endphp

<!-- Shared SVG Gradients & Filters for 3D Cast-Gold & Faceted Imperial Jade Ornaments -->
<svg width="0" height="0" style="position: absolute; pointer-events: none;" aria-hidden="true">
  <defs>
    <linearGradient id="v5GoldRim" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#FFFDF5" />
      <stop offset="35%" stop-color="#FCE394" />
      <stop offset="75%" stop-color="#C89122" />
      <stop offset="100%" stop-color="#8A5A0E" />
    </linearGradient>

    <linearGradient id="v5WingGoldTop" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#FFFBEB" />
      <stop offset="38%" stop-color="#F5D36C" />
      <stop offset="85%" stop-color="#C28B20" />
      <stop offset="100%" stop-color="#966510" />
    </linearGradient>

    <linearGradient id="v5WingGoldBot" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#DFB247" />
      <stop offset="55%" stop-color="#9A6812" />
      <stop offset="100%" stop-color="#5B3805" />
    </linearGradient>

    <linearGradient id="v5WingJadeTop" x1="0%" y1="0%" x2="100%" y2="80%">
      <stop offset="0%" stop-color="#A7F3D0" />
      <stop offset="45%" stop-color="#2DD4BF" />
      <stop offset="100%" stop-color="#0F766E" />
    </linearGradient>

    <linearGradient id="v5WingJadeBot" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#14B8A6" />
      <stop offset="55%" stop-color="#065F46" />
      <stop offset="100%" stop-color="#042F2E" />
    </linearGradient>

    <linearGradient id="v5MedJadeTop" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#D1FAE5" />
      <stop offset="42%" stop-color="#34D399" />
      <stop offset="100%" stop-color="#0D9488" />
    </linearGradient>

    <linearGradient id="v5MedJadeBot" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#2DD4BF" />
      <stop offset="55%" stop-color="#0F766E" />
      <stop offset="100%" stop-color="#064E3B" />
    </linearGradient>
  </defs>
</svg>

<!-- Interactive Sơn Hà Xã Tắc World Map Stage -->
<section class="v5-map-hero {{ !empty($compactMap) ? 'v5-map-compact' : '' }}" id="v5MapStage" style="background-image: url('{{ asset('frontend/assets/images/v5/map_sonha.jpg') }}');">
  <div class="v5-map-vignette"></div>

  <!-- Embossed Metallic Gold Title Crest with Cloud Filigree (No Dark Box!) -->
  <div class="v5-map-title-crest">
    <svg class="v5-title-flourish" viewBox="0 0 64 20" fill="none" aria-hidden="true">
      <path d="M62 10H18C11 10 8 5 13 3C17 1.5 21 5 18 8M44 14H24C19 14 17 17 21 18" stroke="url(#v5GoldRim)" stroke-width="1.6" stroke-linecap="round"/>
      <polygon points="58,6 63,10 58,14 53,10" fill="url(#v5GoldRim)"/>
    </svg>
    <span class="v5-map-title-text">Sơn Hà Xã Tắc</span>
    <svg class="v5-title-flourish" viewBox="0 0 64 20" fill="none" style="transform: scaleX(-1);" aria-hidden="true">
      <path d="M62 10H18C11 10 8 5 13 3C17 1.5 21 5 18 8M44 14H24C19 14 17 17 21 18" stroke="url(#v5GoldRim)" stroke-width="1.6" stroke-linecap="round"/>
      <polygon points="58,6 63,10 58,14 53,10" fill="url(#v5GoldRim)"/>
    </svg>
  </div>

  <!-- Dynamic Admin-Configured 3D Faceted Crystal-Diamond Map Pins -->
  @foreach($sonhaMap['pins'] as $idx => $pin)
    @if(!empty($pin['enabled']))
      @php
        $isGoldCrystal = ($pin['key'] ?? '') !== 'hoa_son';
      @endphp
      <button
        type="button"
        class="v5-map-pin {{ $isGoldCrystal ? 'pin-gold' : 'pin-jade' }}"
        style="left: {{ $pin['x'] }}%; top: {{ $pin['y'] }}%;"
        data-v5-pin="{{ json_encode($pin, JSON_UNESCAPED_UNICODE) }}"
        aria-label="{{ $pin['name'] }}"
      >
        <span class="v5-pin-crystal">
          <svg viewBox="0 0 48 56" width="46" height="52" fill="none" aria-hidden="true">
            <!-- Outer Golden Diamond Halo Ring + Pointer Tip -->
            <polygon points="24,3 44,23 24,43 4,23" stroke="url(#v5GoldRim)" stroke-width="1.6" fill="rgba(8, 22, 19, 0.32)" />
            <polygon points="20,42 28,42 24,52" fill="url(#v5GoldRim)" />

            @if($isGoldCrystal)
              <!-- 4-Faceted Warm Champagne-Gold 3D Crystal -->
              <polygon points="24,8 24,23 9,23" fill="#FFFDF5" />
              <polygon points="24,8 39,23 24,23" fill="#FDE047" />
              <polygon points="9,23 24,23 24,38" fill="#F59E0B" />
              <polygon points="24,23 39,23 24,38" fill="#B45309" />
              <polygon points="24,8 39,23 24,38 9,23" stroke="#FEF08A" stroke-width="0.9" fill="none" />
            @else
              <!-- 4-Faceted Luminous Imperial-Jade 3D Crystal -->
              <polygon points="24,8 24,23 9,23" fill="#ECFDF5" />
              <polygon points="24,8 39,23 24,23" fill="#34D399" />
              <polygon points="9,23 24,23 24,38" fill="#0D9488" />
              <polygon points="24,23 39,23 24,38" fill="#065F46" />
              <polygon points="24,8 39,23 24,38 9,23" stroke="#A7F3D0" stroke-width="0.9" fill="none" />
            @endif

            <!-- Glowing Star Spark Core -->
            <path d="M24 15 L26 21 L32 23 L26 25 L24 31 L22 25 L16 23 L22 21 Z" fill="#FFFFFF" fill-opacity="0.92" />
          </svg>
        </span>

        <span class="v5-pin-plaque">
          <span class="v5-pin-plaque-inner">{{ $pin['name'] }}</span>
        </span>
      </button>
    @endif
  @endforeach

  <!-- Floating Activity Popover Card (Hidden by default; opens on pin click) -->
  <div class="v5-map-popover" id="v5MapPopover" role="dialog" aria-modal="false">
    <div class="v5-popover-art" id="v5PopArt" style="background-image: url('{{ asset('frontend/assets/images/v5/spotlight_tongkim.jpg') }}');">
      <button type="button" class="v5-popover-close" id="v5PopClose" aria-label="Đóng">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <div class="v5-popover-body">
      <div class="small fw-bold text-uppercase mb-1" id="v5PopSub" style="color: var(--v5-jade-bright); letter-spacing: 0.05em;"></div>
      <h5 class="fw-bolder mb-2" id="v5PopTitle" style="color: var(--v5-gold-light);"></h5>

      <div class="p-2 rounded-2 mb-2 small" style="background: rgba(5, 14, 12, 0.68); border: 1px solid var(--v5-border-subtle);">
        <div class="fw-bold text-white" id="v5PopScheduleRow">
          <i class="fa-regular fa-clock me-1" style="color: var(--v5-gold-light);"></i>
          <span id="v5PopSchedule"></span>
        </div>
        <div class="small mt-1" id="v5PopRewardsRow" style="color: var(--v5-text-muted);">
          <i class="fa-solid fa-gift me-1" style="color: var(--v5-jade-bright);"></i>
          <span id="v5PopRewards"></span>
        </div>
      </div>

      <p class="small mb-3" id="v5PopDesc" style="color: var(--v5-text-main); font-size: 0.84rem;"></p>

      <a href="/home" id="v5PopLink" class="btn-v5-gold py-2 px-4 w-100">
        <span id="v5PopLinkText">Xem Chi Tiết</span>
        <i class="fa-solid fa-arrow-right small"></i>
      </a>
    </div>
  </div>
</section>

<!-- Hand-Painted Soft Celadon-Jade & Antique-Gold Relic Launcher Dock -->
<div class="v5-dock-wrap text-center">
  <div class="v5-relic-dock-sprite">
    <div class="v5-dock-side v5-dock-side-left">
      <a href="{{ route('register') }}" class="v5-dock-btn">
        <span>Đăng Ký</span>
      </a>

      <a href="{{ route('login') }}" class="v5-dock-btn">
        <span>Đăng Nhập</span>
      </a>
    </div>

    <div class="v5-dock-center">
      <a href="{{ getWebsiteConfig('download_link') ?? route('hotro.dashboard') }}" target="_blank" rel="noopener noreferrer" class="v5-medallion-cta">
        <span class="v5-medallion-sheen" aria-hidden="true"></span>
        <span class="v5-medallion-text">Tải về</span>
      </a>
    </div>

    <div class="v5-dock-side v5-dock-side-right">
      <a href="{{ route('hotro.dashboard') }}" class="v5-dock-btn">
        <span>Hỗ Trợ TK</span>
      </a>

      <a href="{{ getWebsiteConfig('fanpage_url') ?? '#' }}" target="_blank" rel="noopener noreferrer" class="v5-dock-btn">
        <span>Cộng Đồng</span>
      </a>
    </div>
  </div>

  @if(!empty($sonhaMap['status_bar']))
    <div class="v5-status-pill-wrap">
      <span class="v5-status-pill">
        <span class="v5-status-dot"></span>
        <span>{{ $sonhaMap['status_bar'] }}</span>
      </span>
    </div>
  @endif
</div>

<script>
  (function () {
    const stage = document.getElementById('v5MapStage');
    const popover = document.getElementById('v5MapPopover');
    const closeBtn = document.getElementById('v5PopClose');
    if (!stage || !popover) return;

    const elTitle = document.getElementById('v5PopTitle');
    const elSub = document.getElementById('v5PopSub');
    const elSchedule = document.getElementById('v5PopSchedule');
    const elScheduleRow = document.getElementById('v5PopScheduleRow');
    const elRewards = document.getElementById('v5PopRewards');
    const elRewardsRow = document.getElementById('v5PopRewardsRow');
    const elDesc = document.getElementById('v5PopDesc');
    const elLink = document.getElementById('v5PopLink');
    const elLinkText = document.getElementById('v5PopLinkText');
    const pins = stage.querySelectorAll('[data-v5-pin]');

    function closePopover() {
      popover.classList.remove('show');
      pins.forEach(function (b) { b.classList.remove('active'); });
    }

    pins.forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.stopPropagation();
        const isAlreadyActive = btn.classList.contains('active') && popover.classList.contains('show');
        closePopover();
        if (isAlreadyActive) return;

        let data = {};
        try {
          data = JSON.parse(btn.getAttribute('data-v5-pin') || '{}');
        } catch (err) {}

        btn.classList.add('active');
        if (elTitle) elTitle.textContent = data.name || '';
        if (elSub) elSub.textContent = data.subtitle || '';
        if (elSchedule) elSchedule.textContent = data.schedule || '';
        if (elScheduleRow) elScheduleRow.style.display = data.schedule ? '' : 'none';
        if (elRewards) elRewards.textContent = data.rewards || '';
        if (elRewardsRow) elRewardsRow.style.display = data.rewards ? '' : 'none';
        if (elDesc) {
          elDesc.textContent = data.description || '';
          elDesc.style.display = data.description ? '' : 'none';
        }
        if (elLink) elLink.setAttribute('href', data.link_url || '/home');
        if (elLinkText) elLinkText.textContent = data.link_text || 'Xem Chi Tiết';

        // Smart position near clicked pin on desktop, safely below top navbar and above bottom dock
        if (window.innerWidth >= 992) {
          const pinX = Number(data.x) || 50;
          const offsetX = pinX < 50 ? Math.min(72, pinX + 14) : Math.max(28, pinX - 14);
          popover.style.left = offsetX + '%';
          popover.style.top = '53%';
        } else {
          popover.style.left = '50%';
          popover.style.top = '53%';
        }

        popover.classList.add('show');
      });
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        closePopover();
      });
    }

    popover.addEventListener('click', function (e) {
      e.stopPropagation();
    });

    document.addEventListener('click', closePopover);
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closePopover();
    });
  })();
</script>
