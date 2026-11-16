<aside class="v5-hotro-sidebar" id="v5Sidebar">
  <div class="v5-hotro-brand">
    <a href="{{ route('welcome') }}" class="d-inline-block" title="Về Bản Đồ">
      <img src="{{ getWebsiteConfig('site_logo') ?? asset('backend/assets/img/illustrations/logo_volam.png') }}" alt="Logo" />
    </a>
    <div class="v5-compass-emblem" title="Sơn Hà Xã Tắc">
      <i class="fa-regular fa-compass"></i>
    </div>
  </div>

  <div class="v5-hotro-nav">
    <div class="v5-hotro-label">Quản Lý Tài Khoản</div>
    <ul class="v5-hotro-menu mb-4">
      <li>
        <a href="{{ route('hotro.dashboard') }}" class="v5-hotro-link {{ request()->routeIs('hotro.dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-user-shield"></i>
          <span>{{ __('Account') }}</span>
        </a>
      </li>

      <li>
        <a href="{{ route('hotro.users.edit') }}" class="v5-hotro-link {{ request()->routeIs('hotro.users.edit') ? 'active' : '' }}">
          <i class="fa-solid fa-id-card-clip"></i>
          <span>{{ __('Update Info') }}</span>
        </a>
      </li>

      <li>
        <a href="{{ route('hotro.users.kick-acc') }}" class="v5-hotro-link {{ request()->routeIs('hotro.users.kick-acc') ? 'active' : '' }}">
          <i class="fa-solid fa-bolt-lightning"></i>
          <span>{{ __('Kick Account') }}</span>
        </a>
      </li>
    </ul>

    <div class="v5-hotro-label">Sơn Hà Giang Hồ</div>
    <ul class="v5-hotro-menu">
      <li>
        <a href="{{ route('welcome') }}" class="v5-hotro-link">
          <i class="fa-solid fa-map-location-dot"></i>
          <span>Về Bản Đồ</span>
        </a>
      </li>
      <li>
        <a href="{{ route('home') }}" class="v5-hotro-link">
          <i class="fa-solid fa-newspaper"></i>
          <span>Bảng Tin</span>
        </a>
      </li>
      @if(getWebsiteConfig('download_link'))
      <li>
        <a href="{{ getWebsiteConfig('download_link') }}" target="_blank" rel="noopener noreferrer" class="v5-hotro-link">
          <i class="fa-solid fa-download"></i>
          <span>Tải về</span>
        </a>
      </li>
      @endif
      @if(getWebsiteConfig('fanpage_url'))
      <li>
        <a href="{{ getWebsiteConfig('fanpage_url') }}" target="_blank" rel="noopener noreferrer" class="v5-hotro-link">
          <i class="fa-brands fa-facebook"></i>
          <span>Cộng Đồng Fanpage</span>
        </a>
      </li>
      @endif
    </ul>
  </div>

  <div class="p-3" style="border-top: 1px solid var(--v5-border-subtle);">
    <a href="{{ route('logout') }}"
       class="btn-v5-jade w-100 py-2"
       style="color: #FCA5A5 !important; border-color: rgba(239, 68, 68, 0.42);"
       onclick="event.preventDefault(); document.getElementById('hotro-v5-logout-form').submit();">
      <i class="fa-solid fa-right-from-bracket"></i>
      <span>Đăng Xuất</span>
    </a>
  </div>
</aside>
