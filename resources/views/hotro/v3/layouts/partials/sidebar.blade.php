<aside class="v3-hotro-sidebar" id="v3Sidebar">
  <div class="v3-hotro-brand">
    <a href="{{ route('home') }}" class="d-inline-block" title="Về Trang Chủ">
      <img src="{{ getWebsiteConfig('site_logo') ?? asset('backend/assets/img/illustrations/logo_volam.png') }}" alt="Logo" />
    </a>
  </div>

  <div class="v3-hotro-nav">
    <div class="v3-hotro-label">Quản Lý Tài Khoản</div>
    <ul class="v3-hotro-menu mb-4">
      <li>
        <a href="{{ route('hotro.dashboard') }}" class="v3-hotro-link {{ request()->routeIs('hotro.dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-user-shield"></i>
          <span>{{ __('Account') }}</span>
        </a>
      </li>

      <li>
        <a href="{{ route('hotro.users.edit') }}" class="v3-hotro-link {{ request()->routeIs('hotro.users.edit') ? 'active' : '' }}">
          <i class="fa-solid fa-id-card-clip"></i>
          <span>{{ __('Update Info') }}</span>
        </a>
      </li>

      <li>
        <a href="{{ route('hotro.users.kick-acc') }}" class="v3-hotro-link {{ request()->routeIs('hotro.users.kick-acc') ? 'active' : '' }}">
          <i class="fa-solid fa-bolt-lightning"></i>
          <span>{{ __('Kick Account') }}</span>
        </a>
      </li>
    </ul>

    <div class="v3-hotro-label">Điều Hướng Nhanh</div>
    <ul class="v3-hotro-menu">
      <li>
        <a href="{{ route('welcome') }}" class="v3-hotro-link">
          <i class="fa-solid fa-house-chimney"></i>
          <span>Về Trang Chủ</span>
        </a>
      </li>
      <li>
        <a href="{{ route('home') }}" class="v3-hotro-link">
          <i class="fa-solid fa-newspaper"></i>
          <span>Bảng Tin Sự Kiện</span>
        </a>
      </li>
      @if(getWebsiteConfig('download_link'))
      <li>
        <a href="{{ getWebsiteConfig('download_link') }}" target="_blank" rel="noopener noreferrer" class="v3-hotro-link">
          <i class="fa-solid fa-download"></i>
          <span>Tải về</span>
        </a>
      </li>
      @endif
      @if(getWebsiteConfig('fanpage_url'))
      <li>
        <a href="{{ getWebsiteConfig('fanpage_url') }}" target="_blank" rel="noopener noreferrer" class="v3-hotro-link">
          <i class="fa-brands fa-facebook"></i>
          <span>Cộng Đồng Fanpage</span>
        </a>
      </li>
      @endif
    </ul>
  </div>

  <div class="p-3" style="border-top: 1px solid var(--v3-border);">
    <a href="{{ route('logout') }}"
       class="btn-v3-soft w-100 py-2"
       style="color: var(--v3-vermilion) !important; border-color: rgba(225, 29, 72, 0.22);"
       onclick="event.preventDefault(); document.getElementById('hotro-v3-logout-form').submit();">
      <i class="fa-solid fa-right-from-bracket"></i>
      <span>Đăng Xuất</span>
    </a>
  </div>
</aside>
