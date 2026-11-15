<header class="hotro-topbar">
  <div class="d-flex align-items-center gap-3">
    <button type="button" class="btn btn-sm d-lg-none text-warning border-0 p-1" id="hotroSidebarToggle" aria-label="Mở menu">
      <i class="fa-solid fa-bars fs-4"></i>
    </button>

    <nav class="hotro-breadcrumb" aria-label="breadcrumb">
      <a href="{{ route('hotro.dashboard') }}" class="crumb-root text-decoration-none">Hỗ Trợ</a>
      <span class="crumb-sep">/</span>
      <span class="crumb-current">@yield('page_title', 'Tổng Quan Tài Khoản')</span>
    </nav>
  </div>

  <div class="d-flex align-items-center gap-2 gap-sm-3">
    <div class="hotro-safe-pill d-none d-md-inline-flex">
      <i class="fa-solid fa-shield-halved"></i>
      <span>Online Safe</span>
    </div>

    <button type="button" class="hotro-theme-switch" id="hotroThemeSwitch" title="Đổi giao diện Sáng / Tối">
      <i class="fa-solid fa-moon"></i>
      <i class="fa-solid fa-sun"></i>
      <span class="switch-thumb"></span>
    </button>

    <div class="dropdown">
      <button class="hotro-user-trigger dropdown-toggle border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ auth()->user()->photo }}" alt="{{ auth()->user()->cAccName }}" />
        <span class="d-none d-sm-inline fw-bold small" style="color: var(--text-heading);">
          {{ auth()->user()->cAccName }}
        </span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end hotro-dropdown-menu">
        <li class="px-3 py-2">
          <div class="fw-bold" style="color: var(--text-heading);">{{ auth()->user()->cRealName }}</div>
          <div class="small text-muted">{{ auth()->user()->cAccName }}</div>
        </li>
        <li><hr class="dropdown-divider" /></li>
        <li>
          <a class="dropdown-item" href="{{ route('hotro.dashboard') }}">
            <i class="fa-solid fa-user-shield text-warning"></i>
            <span>Tổng Quan Tài Khoản</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('hotro.users.edit') }}">
            <i class="fa-solid fa-id-card-clip text-warning"></i>
            <span>{{ __('Update Info') }}</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('hotro.users.kick-acc') }}">
            <i class="fa-solid fa-bolt-lightning text-danger"></i>
            <span>{{ __('Kick Account') }}</span>
          </a>
        </li>
        <li><hr class="dropdown-divider" /></li>
        <li>
          <a class="dropdown-item text-danger"
             href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('hotro-logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Đăng Xuất</span>
          </a>
        </li>
      </ul>
    </div>

    <form id="hotro-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </div>
</header>
