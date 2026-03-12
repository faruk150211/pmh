<!-- Top Bar -->
<div class="topbar" id="topbar">
    <div class="topbar-left">
        <button class="toggle-sidebar" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>
        <h2 class="topbar-title" id="pageTitle">Dashboard</h2>
    </div>
    <div class="topbar-right">
        <div class="profile-dropdown">
            <div class="profile-menu" id="profileMenu">
                <div class="profile-image">
                    <i class="fas fa-user"></i>
                </div>
                <span class="profile-name" id="userName">User</span>
                <i class="fas fa-chevron-down" style="font-size: 12px; color: #999;"></i>
            </div>
            <div class="dropdown-menu-custom" id="dropdownMenu">
                <a href="#"><i class="fas fa-user"></i> My Profile</a>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </div>
</div>
