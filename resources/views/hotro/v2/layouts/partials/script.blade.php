<script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  (function () {
    // Theme Switcher (Synchronized with modern_theme across entire website)
    const switchBtn = document.getElementById('hotroThemeSwitch');
    if (switchBtn) {
      switchBtn.addEventListener('click', function () {
        const isLight = document.body.classList.toggle('light-theme');
        localStorage.setItem('modern_theme', isLight ? 'light' : 'dark');
      });
    }

    // Mobile Sidebar Drawer
    const sidebar = document.getElementById('hotroSidebar');
    const backdrop = document.getElementById('hotroSidebarBackdrop');
    const toggleBtn = document.getElementById('hotroSidebarToggle');

    function closeSidebar() {
      if (sidebar) sidebar.classList.remove('show');
      if (backdrop) backdrop.classList.remove('show');
    }

    if (toggleBtn && sidebar && backdrop) {
      toggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('show');
        backdrop.classList.toggle('show');
      });
      backdrop.addEventListener('click', closeSidebar);
    }

    // Password Eye Toggle Handler
    document.querySelectorAll('[data-pw-toggle]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        const targetId = btn.getAttribute('data-pw-toggle');
        const input = document.getElementById(targetId);
        const icon = btn.querySelector('i');
        if (!input) return;

        if (input.type === 'password') {
          input.type = 'text';
          if (icon) icon.className = 'fa-regular fa-eye';
        } else {
          input.type = 'password';
          if (icon) icon.className = 'fa-regular fa-eye-slash';
        }
      });
    });
  })();
</script>

@yield('script')
