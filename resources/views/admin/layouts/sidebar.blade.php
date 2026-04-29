<aside id="sidebar" class="sidebar">
  <div class="sidebar-header">
    <div class="sidebar-logo">E</div>
    <span class="sidebar-brand sidebar-label">Admin Panel</span>
  </div>
  <nav class="sidebar-nav space-y-1">
    <a href="{{ route('admin_dashboard') }}" class="nav-link {{ request()->routeIs('admin_dashboard') ? 'active' : '' }}">
      <i class="fa-solid fa-house"></i>
      <span class="sidebar-label">Dashboard</span>
    </a>
    <a href="{{ route('admin_slider_index') }}" class="nav-link {{ request()->routeIs('admin_slider_index') ? 'active' : '' }}">
      <i class="fa-solid fa-sliders"></i>
      <span class="sidebar-label">Slider</span>
    </a>
{{--    <div class="nav-dropdown">--}}
{{--      <a href="javascript:void(0)" class="nav-link nav-dropdown-toggle">--}}
{{--        <i class="fa-solid fa-table"></i>--}}
{{--        <span class="sidebar-label">Tables</span>--}}
{{--        <i class="fa-solid fa-chevron-right nav-arrow sidebar-label"></i>--}}
{{--      </a>--}}
{{--      <div class="nav-dropdown-menu">--}}
{{--        <a href="table.html" class="nav-link nav-sub-link">Table</a>--}}
{{--        <a href="datatable.html" class="nav-link nav-sub-link">DataTable</a>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--    <a href="form.html" class="nav-link">--}}
{{--      <i class="fa-solid fa-file-pen"></i>--}}
{{--      <span class="sidebar-label">Form</span>--}}
{{--    </a>--}}
{{--    <a href="setting-general.html" class="nav-link">--}}
{{--      <i class="fa-solid fa-gear"></i>--}}
{{--      <span class="sidebar-label">Settings</span>--}}
{{--    </a>--}}
  </nav>
</aside>