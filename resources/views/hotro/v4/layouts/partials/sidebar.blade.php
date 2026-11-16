<aside class="v4-hotro-sidebar" id="v4Sidebar">
  <div class="v4-hotro-brand">
    <a href="{{ route('home') }}" class="d-inline-block" title="Về Trang Chủ">
      <img src="{{ getWebsiteConfig('site_logo') ?? asset('backend/assets/img/illustrations/logo_volam.png') }}" alt="Logo" />
    </a>
  </div>

  <div class="v4-hotro-nav">
    <div class="v4-hotro-label">Quản Lý Tài Khoản</div>
    <ul class="v4-hotro-menu mb-4">
      <li>
        <a href="{{ route('hotro.dashboard') }}" class="v4-hotro-link {{ request()->routeIs('hotro.dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-user-shield"></i>
          <span>{{ __('Account') }}</span>
        </a>
      </li>

      <li>
        <a href="{{ route('hotro.users.edit') }}" class="v4-hotro-link {{ request()->routeIs('hotro.users.edit') ? 'active' : '' }}">
          <i class="fa-solid fa-id-card-clip"></i>
          <span>{{ __('Update Info') }}</span>
        </a>
      </li>

      <li>
        <a href="{{ route('hotro.users.kick-acc') }}" class="v4-hotro-link {{ request()->routeIs('hotro.users.kick-acc') ? 'active' : '' }}">
          <i class="fa-solid fa-bolt-lightning"></i>
          <span>{{ __('Kick Account') }}</span>
        </a>
      </li>
    </ul>

    <div class="v4-hotro-label">Điều Hướng Nhanh</div>
    <ul class="v4-hotro-menu">
      <li>
        <a href="{{ route('welcome') }}" class="v4-hotro-link">
          <i class="fa-solid fa-house-chimney"></i>
          <span>Về Trang Chủ</span>
        </a>
      </li>
      <li>
        <a href="{{ route('home') }}" class="v4-hotro-link">
          <i class="fa-solid fa-newspaper"></i>
          <span>Bảng Tin Sự Kiện</span>
        </a>
      </li>
      @if(getWebsiteConfig('download_link'))
      <li>
        <a href="{{ getWebsiteConfig('download_link') }}" target="_blank" rel="noopener noreferrer" class="v4-hotro-link">
          <i class="fa-solid fa-download"></i>
          <span>Tải về</span>
        </a>
      </li>
      @endif
      @if(getWebsiteConfig('fanpage_url'))
      <li>
        <a href="{{ getWebsiteConfig('fanpage_url') }}" target="_blank" rel="noopener noreferrer" class="v4-hotro-link">
          <i class="fa-brands fa-facebook"></i>
          <span>Cộng Đồng Fanpage</span>
        </a>
      </li>
      @endif
    </ul>
  </div>

  <div class="p-3" style="border-top: 1px solid var(--v4-bronze-border);">
    <a href="{{ route('logout') }}"
       class="btn-v4-bronze w-100 py-2"
       style="color: #FCA5A5 !important; border-color: rgba(239, 68, 68, 0.45);"
       onclick="event.preventDefault(); document.getElementById('hotro-v4-logout-form').submit();">
      <i class="fa-solid fa-right-from-bracket"></i>
      <span>Đăng Xuất</span>
    </a>
  </div>
</aside>
