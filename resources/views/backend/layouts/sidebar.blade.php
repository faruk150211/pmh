<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <h3><i class="fas fa-stethoscope"></i>PMH Admin Panel</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> Dashboard</a></li>
        <li>
            <a href="javascript:void(0);" class="dropdown-toggle collapsed" data-toggle="dropdown"><i class="fas fa-home"></i> Home Page Settings</a>
            <ul class="sidebar-submenu">
                <li><a href="{{ route('admin.hero-section.edit') }}"><i class="fas fa-file-alt"></i> Hero Section</a></li>
                <li><a href="{{ route('admin.problem-section.edit') }}"><i class="fas fa-exclamation-circle"></i> Problem Section</a></li>
                <li><a href="{{ route('admin.solution-section.edit') }}"><i class="fas fa-lightbulb"></i> Solution Section</a></li>
                <li><a href="{{ route('admin.why-choose-us-section.edit') }}"><i class="fas fa-star"></i> Why Choose Us</a></li>
                <li><a href="{{ route('admin.how-it-works-section.edit') }}"><i class="fas fa-cog"></i> How It Works</a></li>
                <li><a href="{{ route('admin.founder.edit') }}"><i class="fas fa-user"></i> About the Founder</a></li>
                <li><a href="{{ route('admin.get-in-touch.edit') }}"><i class="fas fa-phone"></i> Get In Touch</a></li>
                <li><a href="{{ route('admin.coverage-areas.index') }}"><i class="fas fa-map"></i> Coverage Areas</a></li>
                <li><a href="{{ route('admin.pricing.edit') }}"><i class="fas fa-tag"></i> Pricing</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" class="dropdown-toggle collapsed" data-toggle="dropdown"><i class="fas fa-info-circle"></i> About Us</a>
            <ul class="sidebar-submenu" id="managementSubmenu">
                <li><a href="{{ route('admin.about-us.index') }}"><i class="fas fa-users"></i> Who We Are</a></li>
                <li><a href="{{ route('admin.mission-vision.index') }}"><i class="fas fa-building"></i> Mission & Vision</a></li>
            </ul>
        </li>
        <li><a href="{{ route('admin.services.index') }}"><i class="fas fa-briefcase"></i> Services</a></li>
        <li><a href="{{ route('admin.testimonials.index') }}"><i class="fas fa-comments"></i> Testimonials</a></li>
        <li><a href="{{ route('admin.contact-messages.index') }}"><i class="fas fa-envelope"></i> Contact Messages</a></li>
        <li><a href="{{ route('admin.service-requests.index') }}"><i class="fas fa-calendar-check"></i> Service Requests</a></li>
        <li><a href="{{ route('admin.branding.index') }}"><i class="fas fa-palette"></i> Branding</a></li>
        <li><a href="{{ route('admin.settings.index') }}"><i class="fas fa-sliders-h"></i> Settings</a></li>
    </ul>
</div>
