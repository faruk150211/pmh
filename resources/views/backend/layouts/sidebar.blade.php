<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h3><i class="fas fa-stethoscope"></i>PMH Admin Panel</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="#" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.hero-section.edit') }}"><i class="fas fa-file-alt"></i> Hero Section</a></li>
        <li>
            <a href="#" class="dropdown-toggle collapsed" data-toggle="dropdown"><i class="fas fa-info-circle"></i> About Us</a>
            <ul class="sidebar-submenu" id="managementSubmenu">
                <li><a href="{{ route('admin.about-us.index') }}"><i class="fas fa-users"></i> Who We Are</a></li>
                <li><a href="{{ route('admin.mission-vision.index') }}"><i class="fas fa-building"></i> Mission & Vision</a></li>
            </ul>
        </li>
        <li><a href="{{ route('admin.services.index') }}"><i class="fas fa-briefcase"></i> Services</a></li>
        {{-- <li><a href="#"><i class="fas fa-star"></i> Testimonials</a></li>
        <li><a href="#"><i class="fas fa-comments"></i> Feedbacks</a></li> --}}
        <li><a href="{{ route('admin.branding.index') }}"><i class="fas fa-palette"></i> Branding</a></li>
        <li><a href="{{ route('admin.settings.index') }}"><i class="fas fa-sliders-h"></i> Settings</a></li>
    </ul>
</div>
