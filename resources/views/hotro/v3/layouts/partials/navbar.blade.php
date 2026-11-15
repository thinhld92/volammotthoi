<header class="v3-hotro-topbar">
  <div class="d-flex align-items-center gap-3">
    <button type="button" class="btn btn-sm d-lg-none border-0 p-1 shadow-none" id="v3SidebarToggle" aria-label="Mở menu">
      <i class="fa-solid fa-bars fs-4" style="color: var(--v3-jade-dark);"></i>
    </button>

    <nav class="d-flex align-items-center gap-2 small" aria-label="breadcrumb">
      <a href="{{ route('hotro.dashboard') }}" class="fw-bold" style="color: var(--v3-jade-dark);">Hỗ Trợ</a>
      <span style="color: var(--v3-dim);">/</span>
      <span class="fw-semibold" style="color: var(--v3-ink);">@yield('page_title', 'Tổng Quan Tài Khoản')</span>
    </nav>
  </div>

  <div class="d-flex align-items-center gap-2 gap-sm-3">
    <div class="v3-safe-badge d-none d-md-inline-flex">
      <i class="fa-solid fa-shield-halved"></i>
      <span>Bảo mật 2 lớp</span>
    </div>

    <div class="dropdown">
      <button class="v3-user-pill dropdown-toggle border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ auth()->user()->photo }}" alt="{{ auth()->user()->cAccName }}" />
        <span class="d-none d-sm-inline fw-bold small" style="color: var(--v3-ink);">
          {{ auth()->user()->cAccName }}
        </span>
      </button>

      <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 p-2 mt-2" style="min-width: 220px;">
        <li class="px-3 py-2">
          <div class="fw-bold" style="color: var(--v3-ink);">{{ auth()->user()->cRealName }}</div>
          <div class="small" style="color: var(--v3-muted);">{{ auth()->user()->cAccName }}</div>
        </li>
        <li><hr class="dropdown-divider" /></li>
        <li>
          <a class="dropdown-item rounded-3 py-2" href="{{ route('hotro.dashboard') }}">
            <i class="fa-solid fa-user-shield me-2" style="color: var(--v3-jade);"></i>Tổng Quan Tài Khoản
          </a>
        </li>
        <li>
          <a class="dropdown-item rounded-3 py-2" href="{{ route('hotro.users.edit') }}">
            <i class="fa-solid fa-id-card-clip me-2" style="color: var(--v3-jade);"></i>{{ __('Update Info') }}
          </a>
        </li>
        <li>
          <a class="dropdown-item rounded-3 py-2" href="{{ route('hotro.users.kick-acc') }}">
            <i class="fa-solid fa-bolt-lightning me-2" style="color: var(--v3-vermilion);"></i>{{ __('Kick Account') }}
          </a>
        </li>
        <li><hr class="dropdown-divider" /></li>
        <li>
          <a class="dropdown-item rounded-3 py-2 fw-semibold"
             style="color: var(--v3-vermilion);"
             href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('hotro-v3-logout-form').submit();">
            <i class="fa-solid fa-right-from-bracket me-2"></i>Đăng Xuất
          </a>
        </li>
      </ul>
    </div>

    <form id="hotro-v3-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
    </form>
  </div>
</header>
