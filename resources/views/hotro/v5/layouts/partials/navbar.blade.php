<header class="v5-hotro-topbar">
  <div class="d-flex align-items-center gap-3">
    <button type="button" class="btn btn-sm d-lg-none border-0 p-1 shadow-none" id="v5SidebarToggle" aria-label="Mở menu">
      <i class="fa-solid fa-bars fs-4" style="color: var(--v5-gold-light);"></i>
    </button>

    <nav class="d-flex align-items-center gap-2 small" aria-label="breadcrumb">
      <a href="{{ route('hotro.dashboard') }}" class="fw-bold" style="color: var(--v5-gold-light);">Hỗ Trợ</a>
      <span style="color: var(--v5-text-dim);">/</span>
      <span class="fw-semibold text-white">@yield('page_title', 'Tổng Quan Tài Khoản')</span>
    </nav>
  </div>

  <div class="d-flex align-items-center gap-2 gap-sm-3">
    <div class="v5-badge d-none d-md-inline-flex">
      <i class="fa-solid fa-shield-halved"></i>
      <span>Bảo mật 2 lớp</span>
    </div>

    <div class="dropdown">
      <button class="v5-user-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ auth()->user()->photo }}" alt="{{ auth()->user()->cAccName }}" />
        <span class="d-none d-sm-inline fw-bold small text-white">
          {{ auth()->user()->cAccName }}
        </span>
      </button>

      <ul class="dropdown-menu dropdown-menu-end v5-dropdown-menu rounded-3 p-2 mt-2" style="min-width: 220px;">
        <li class="px-3 py-2">
          <div class="fw-bold text-white">{{ auth()->user()->cRealName }}</div>
          <div class="small" style="color: var(--v5-text-muted);">{{ auth()->user()->cAccName }}</div>
        </li>
        <li><hr class="dropdown-divider" style="border-color: var(--v5-border-subtle);" /></li>
        <li>
          <a class="dropdown-item py-2" href="{{ route('hotro.dashboard') }}">
            <i class="fa-solid fa-user-shield me-2" style="color: var(--v5-gold-light);"></i>Tổng Quan Tài Khoản
          </a>
        </li>
        <li>
          <a class="dropdown-item py-2" href="{{ route('hotro.users.edit') }}">
            <i class="fa-solid fa-id-card-clip me-2" style="color: var(--v5-gold-light);"></i>{{ __('Update Info') }}
          </a>
        </li>
        <li>
          <a class="dropdown-item py-2" href="{{ route('hotro.users.kick-acc') }}">
            <i class="fa-solid fa-bolt-lightning me-2" style="color: #F87171;"></i>{{ __('Kick Account') }}
          </a>
        </li>
        <li><hr class="dropdown-divider" style="border-color: var(--v5-border-subtle);" /></li>
        <li>
          <a class="dropdown-item py-2 fw-semibold"
             style="color: #FCA5A5 !important;"
             href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('hotro-v5-logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket me-2"></i>Đăng Xuất
          </a>
        </li>
      </ul>
    </div>

    <form id="hotro-v5-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </div>
</header>
