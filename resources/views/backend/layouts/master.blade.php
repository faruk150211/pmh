<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - Premier Medical Housecall')</title>
    <link href="{{ asset(setting('favicon_url', 'frontend/assets/img/favicon.png')) }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend/css/dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('styles')
</head>
<body>
    @include('backend.layouts.sidebar')
    @include('backend.layouts.topbar')

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="container-custom">
            @yield('content')
        </div>
    </div>

    @include('backend.layouts.footer')

    <!-- Logout Form -->
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // SweetAlert Notification Functions
        const showNotification = {
            success: (title, message) => {
                Swal.fire({
                    icon: 'success',
                    title: title,
                    text: message,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            },
            error: (title, message) => {
                Swal.fire({
                    icon: 'error',
                    title: title,
                    text: message,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            },
            warning: (title, message) => {
                Swal.fire({
                    icon: 'warning',
                    title: title,
                    text: message,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            },
            info: (title, message) => {
                Swal.fire({
                    icon: 'info',
                    title: title,
                    text: message,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            },
            confirm: (title, message, callback) => {
                Swal.fire({
                    icon: 'question',
                    title: title,
                    text: message,
                    showCancelButton: true,
                    confirmButtonColor: '#667eea',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed && callback) {
                        callback();
                    }
                });
            }
        };

        // Toggle Sidebar
        const toggleBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const topbar = document.getElementById('topbar');
        const mainContent = document.getElementById('mainContent');
        const footer = document.getElementById('footer');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            topbar.classList.toggle('full-width');
            mainContent.classList.toggle('full-width');
            footer.classList.toggle('full-width');
        });

        // Profile Dropdown
        const profileMenu = document.getElementById('profileMenu');
        const dropdownMenu = document.getElementById('dropdownMenu');

        profileMenu.addEventListener('click', () => {
            dropdownMenu.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.profile-dropdown')) {
                dropdownMenu.classList.remove('active');
            }
        });

        // Set user name (you can replace with actual user data)
        const userName = document.getElementById('userName');
        const userNameDisplay = document.getElementById('userNameDisplay');

        @if(auth()->check())
            userName.textContent = '{{ auth()->user()->name }}';
            if (userNameDisplay) {
                userNameDisplay.textContent = '{{ auth()->user()->name }}';
            }
            document.getElementById('profileMenu').querySelector('.profile-image').innerHTML =
                '<span>' + '{{ auth()->user()->name }}'.charAt(0).toUpperCase() + '</span>';
        @endif

        // Close dropdown on link click
        document.querySelectorAll('.dropdown-menu-custom a').forEach(link => {
            link.addEventListener('click', () => {
                dropdownMenu.classList.remove('active');
            });
        });

        // Update page title based on sidebar menu
        document.querySelectorAll('.sidebar-menu a').forEach(link => {
            link.addEventListener('click', (e) => {
                document.querySelectorAll('.sidebar-menu a').forEach(a => a.classList.remove('active'));
                link.classList.add('active');
                const title = link.textContent.trim();
                document.getElementById('pageTitle').textContent = title;
            });
        });

        // Dropdown toggle functionality
        document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                toggle.classList.toggle('collapsed');
                const submenu = toggle.parentElement.querySelector('.sidebar-submenu');
                if (submenu) {
                    submenu.classList.toggle('show');
                }
            });
        });

        // Close submenu when a submenu item is clicked
        document.querySelectorAll('.sidebar-submenu a').forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                if (href && href !== '#') {
                    // Allow navigation for actual links
                    return true;
                }
                e.preventDefault();
                const itemName = link.textContent.trim();
                showNotification.info('Navigation', `Navigating to ${itemName}...`);
                console.log('Navigating to:', itemName);
            });
        });

        // Show welcome notification on page load (only on first login)
        window.addEventListener('load', () => {
            @if(session('login_success'))
                showNotification.success('Welcome!', 'You have successfully logged in to your dashboard.');
                @php session()->forget('login_success'); @endphp
            @endif
        });
    </script>

    @stack('scripts')
</body>
</html>
