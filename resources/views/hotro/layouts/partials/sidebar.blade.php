<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{route('hotro.dashboard')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{{asset('backend/assets/img/illustrations/logo_volam.png')}}" alt="">
      </span>
      {{-- <span class="app-brand-text demo menu-text fw-bold">Promickey</span> --}}
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Components -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text" >Quản lý tài khoản</span>
    </li>
    <!-- Dashboards -->
    {{-- <li class="menu-item {{ (request()-> is('admin/users*')) ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons fa fa-users"></i>&nbsp;&nbsp;
        <div data-i18n="Dashboards">Dashboards</div>
        <div class="badge bg-primary rounded-pill ms-auto"></div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ (request()-> is('admin/users')) ? 'active' : '' }}">
          <a href="" class="menu-link">
            <i class="fa fa-user-gear"></i>&nbsp;&nbsp;
            <div data-i18n="Danh sách user">Danh sách user</div>
          </a>
        </li>
        <li class="menu-item {{ (request()-> is('admin/users/create')) ? 'active' : '' }}">
          <a href="" class="menu-link">
            <i class="fa fa-user-plus"></i>&nbsp;&nbsp;
            <div data-i18n="Thêm user">Thêm user</div>
          </a>
        </li>
      </ul>
    </li> --}}
    <li class="menu-item {{ (request()-> is('hotro')) ? 'active' : '' }}">
      <a href="{{ route('hotro.dashboard') }}" class="menu-link">
        <i class="menu-icon fa fa-user"></i>
        <div >{{ __('Account') }}</div>
      </a>
    </li>
    <li class="menu-item {{ (request()-> is('hotro/users/edit')) ? 'active' : '' }}">
      <a href="{{ route('hotro.users.edit') }}" class="menu-link">
        <i class="menu-icon fa fa-user-pen"></i>
        <div>{{ __('Update Info') }}</div>
      </a>
    </li>
    <li class="menu-item {{ (request()-> is('hotro/kickacc')) ? 'active' : '' }}">
      <a href="{{ route('hotro.users.kick-acc') }}" class="menu-link">
        <i class="menu-icon fa-solid fa-star-shooting"></i>
        <div >{{ __('Kick Account') }}</div>
      </a>
    </li>
    <li class="menu-item {{ (request()-> is('hotro/naptien')) ? 'active' : '' }}">
      <a href="{{ route('hotro.payments.create') }}" class="menu-link">
        <i class="menu-icon fa fa-money-check-dollar"></i>
        <div >{{ __('Nạp tiền') }}</div>
      </a>
    </li>
    {{-- <li class="menu-item {{ (request()-> is('hotro/giftcode')) ? 'active' : '' }}">
      <a href="#" class="menu-link">
        <i class="menu-icon fa-solid fa-gift"></i>
        <div >{{ __('Gift Code') }}</div>
      </a>
    </li> --}}
    
  </ul>
</aside>