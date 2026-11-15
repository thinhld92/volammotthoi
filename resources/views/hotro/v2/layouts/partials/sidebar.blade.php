<aside class="hotro-sidebar" id="hotroSidebar">
  <div class="hotro-brand">
    <a href="{{ route('home') }}" class="d-inline-block text-decoration-none" title="Về Trang Chủ">
      <img src="{{ getWebsiteConfig('site_logo') ?? asset('backend/assets/img/illustrations/logo_volam.png') }}" alt="Logo" />
    </a>
  </div>

  <div class="hotro-nav-scroll">
    <div class="hotro-nav-label">Quản Lý Tài Khoản</div>
    <ul class="hotro-nav-list">
      <li>
        <a href="{{ route('hotro.dashboard') }}" class="hotro-nav-link {{ request()->routeIs('hotro.dashboard') ? 'active' : '' }}">
          <i class="fa-solid fa-user-shield"></i>
          <span>{{ __('Account') }}</span>
        </a>
      </li>

      <li>
        <a href="{{ route('hotro.users.edit') }}" class="hotro-nav-link {{ request()->routeIs('hotro.users.edit') ? 'active' : '' }}">
          <i class="fa-solid fa-id-card-clip"></i>
          <span>{{ __('Update Info') }}</span>
        </a>
      </li>

      <li>
        <a href="{{ route('hotro.users.kick-acc') }}" class="hotro-nav-link {{ request()->routeIs('hotro.users.kick-acc') ? 'active' : '' }}">
          <i class="fa-solid fa-bolt-lightning"></i>
          <span>{{ __('Kick Account') }}</span>
        </a>
      </li>

      {{-- Bỏ comment khi muốn hiển thị menu Nạp Xu trực tiếp trên Sidebar
      <li>
        <a href="{{ route('hotro.payments.create') }}" class="hotro-nav-link {{ request()->routeIs('hotro.payments.*') ? 'active' : '' }}">
          <i class="fa-solid fa-coins"></i>
          <span>Nạp Xu</span>
        </a>
      </li>
      --}}
    </ul>

    <div class="hotro-nav-divider"></div>

    <div class="hotro-nav-label">Liên Kết Nhanh</div>
    <ul class="hotro-nav-list">
      <li>
        <a href="{{ route('welcome') }}" class="hotro-nav-link">
          <i class="fa-solid fa-house-chimney"></i>
          <span>Về Trang Chủ</span>
        </a>
      </li>
      <li>
        <a href="{{ route('home') }}" class="hotro-nav-link">
          <i class="fa-solid fa-newspaper"></i>
          <span>Bảng Tin Sự Kiện</span>
        </a>
      </li>
      @if(getWebsiteConfig('fanpage_url'))
      <li>
        <a href="{{ getWebsiteConfig('fanpage_url') }}" target="_blank" class="hotro-nav-link">
          <i class="fa-brands fa-facebook"></i>
          <span>Cộng Đồng Fanpage</span>
        </a>
      </li>
      @endif
    </ul>
  </div>

  <div class="hotro-sidebar-footer">
    <a href="{{ route('logout') }}"
       class="hotro-logout-btn text-decoration-none"
       onclick="event.preventDefault(); document.getElementById('hotro-logout-form').submit();">
      <i class="fa-solid fa-right-from-bracket"></i>
      <span>Đăng Xuất</span>
    </a>
  </div>
</aside>
