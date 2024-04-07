<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{route('admin.dashboard')}}" class="app-brand-link">
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
      <span class="menu-header-text">Components</span>
    </li>
    <!-- Dashboards -->
    <li class="menu-item {{ (request()-> is('admin/admins*')) ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa-duotone fa-user-secret"></i>
        <div>{{ __('Manage Admins') }}</div>
        <div class="badge bg-primary rounded-pill ms-auto"></div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ (request()-> is('admin/admins')) ? 'active' : '' }}">
          <a href="{{route('admin.admins.index')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa-solid fa-user-shield"></i>
            <div>{{ __('Admins List') }}</div>
          </a>
        </li>
        <li class="menu-item {{ (request()-> is('admin/admins/create')) ? 'active' : '' }}">
          <a href="{{route('admin.admins.create')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa-solid fa-shield-plus"></i>
            <div>{{ __('Create Admin') }}</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item {{ (request()-> is('admin/users*')) ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa fa-users"></i>
        <div>{{ __('Manage Users') }}</div>
        <div class="badge bg-primary rounded-pill ms-auto"></div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ (request()-> is('admin/users')) ? 'active' : '' }}">
          <a href="{{route('admin.users.index')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa fa-user-gear"></i>
            <div>{{ __('Users List') }}</div>
          </a>
        </li>
        <li class="menu-item {{ (request()-> is('admin/users/create')) ? 'active' : '' }}">
          <a href="{{route('admin.users.create')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa fa-user-plus"></i>
            <div>{{ __('Create User') }}</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item {{ (request()-> is('admin/categories*')) ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa-solid fa-icons"></i>
        <div>{{ __('Manage Categories') }}</div>
        <div class="badge bg-primary rounded-pill ms-auto"></div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ (request()-> is('admin/categories')) ? 'active' : '' }}">
          <a href="{{route('admin.categories.index')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa-solid fa-layer-group"></i>
            <div>{{ __('Categories List') }}</div>
          </a>
        </li>
        <li class="menu-item {{ (request()-> is('admin/categories/create')) ? 'active' : '' }}">
          <a href="{{route('admin.categories.create')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa-solid fa-layer-plus"></i>
            <div>{{ __('Create Category') }}</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item {{ (request()-> is('admin/posts*')) ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa-solid fa-list-check"></i>
        <div>{{ __('Manage Posts') }}</div>
        <div class="badge bg-primary rounded-pill ms-auto"></div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ (request()-> is('admin/posts')) ? 'active' : '' }}">
          <a href="{{route('admin.posts.index')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa-sharp fa-solid fa-newspaper"></i>
            <div>{{ __('Posts list') }}</div>
          </a>
        </li>
        <li class="menu-item {{ (request()-> is('admin/posts/create')) ? 'active' : '' }}">
          <a href="{{route('admin.posts.create')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa-sharp fa-solid fa-file-circle-plus"></i>
            <div>{{ __('Create post') }}</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item {{ (request()-> is('admin/payments*')) ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa-sharp fa-solid fa-credit-card"></i>
        <div>{{ __('Manage Payments') }}</div>
        <div class="badge bg-primary rounded-pill ms-auto"></div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ (request()-> is('admin/payments')) ? 'active' : '' }}">
          <a href="{{route('admin.payments.index')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa-sharp fa-solid fa-money-check-dollar"></i>
            <div>{{ __('Payments list') }}</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item {{ (request()-> is('admin/configs*')) ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa-sharp fa-solid fa-gear"></i>
        <div>{{ __('Manage configs') }}</div>
        <div class="badge bg-primary rounded-pill ms-auto"></div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ (request()-> is('admin/configs')) ? 'active' : '' }}">
          <a href="{{route('admin.configs.index')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa-sharp fa-solid fa-gears"></i>
            <div>{{ __('Configs list') }}</div>
          </a>
        </li>
        <li class="menu-item {{ (request()-> is('admin/configs/create')) ? 'active' : '' }}">
          <a href="{{route('admin.configs.create')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa-regular fa-screwdriver-wrench"></i>
            <div>{{ __('Config add') }}</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item {{ (request()-> is('admin/banners*')) ? 'active open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa-sharp fa-solid fa-flag-pennant"></i>
        <div>{{ __('Manage Banner') }}</div>
        <div class="badge bg-primary rounded-pill ms-auto"></div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ (request()-> is('admin/banners')) ? 'active' : '' }}">
          <a href="{{route('admin.banners.index')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa-solid fa-folder-image"></i>
            <div>{{ __('Banners list') }}</div>
          </a>
        </li>
        <li class="menu-item {{ (request()-> is('admin/configs/create')) ? 'active' : '' }}">
          <a href="{{route('admin.banners.create')}}" class="menu-link">
            <i class="menu-icon sub-menu-icon-custom fa-solid fa-image"></i>
            <div>{{ __('Banner add') }}</div>
          </a>
        </li>
      </ul>
    </li>

  </ul>
</aside>