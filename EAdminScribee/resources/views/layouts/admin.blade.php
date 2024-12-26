<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />

    <!-- DateTimePicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

    <!-- CoreUI CSS -->
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dark-mode.css') }}">

    @yield('styles')

    <style>
        .c-header {
            position: fixed; /* Ensure the header is fixed at the top */
            top: 0; /* Position it at the top of the viewport */
            left: 0; /* Align it to the left */
            width: 100%; /* Make it span the full width */
            z-index: 9999; /* Set a high z-index value to ensure it's above all other elements */
            background-color: #fff; /* Optional: Ensure background color for better visibility */
        }
    </style>
</head>

<body class="c-app">
    @include('partials.menu')

    <div class="c-wrapper">
        <header class="c-header c-header-fixed px-3">
            <!-- Toggler for desktop view -->
            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
                <i class="fas fa-fw fa-bars"></i>
            </button>

            <!-- Brand for mobile view -->
            <a class="c-header-brand d-lg-none" href="#">{{ trans('panel.site_title') }}</a>

            <!-- Main Navbar -->
            <nav class="navbar {{ session('dark-mode') ? 'dark-mode' : '' }}">
                <!-- Logo and Sidebar Toggle -->
                <div class="logo_item">
                    <i class="bx bx-menu" id="sidebarOpen"></i>
                    <a href="{{ url('/home') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                        <span>EAdmin Scribe</span>
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="search_bar">
                    <input type="text" placeholder="Search" class="{{ session('dark-mode') ? 'dark-mode' : '' }}" />
                </div>

                <!-- Navbar Content -->
                <div class="navbar_content">
                    <!-- Night Mode Toggle Button -->
                    <button class="btn btn-link" id="darkLightToggle">
                        <i class='{{ session('dark-mode') ? 'fas fa-sun' : 'far fa-moon' }}'></i>
                    </button>

                    <!-- Notification Icon -->
                    <i class='far fa-bell'></i>

                    <!-- Profile Dropdown -->
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle profile_link {{ session('dark-mode') ? 'dark-mode' : '' }}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="profile" onerror="this.src='{{ asset('images/profile.png') }}';">
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end {{ session('dark-mode') ? 'dark-mode' : '' }}" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                            <li>
                                <a class="dropdown-item" href="#" id="logout-button">Logout</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Language Dropdown -->
                    @if(count(config('panel.available_languages', [])) > 1)
                        <ul class="c-header-nav ml-auto">
                            <li class="c-header-nav-item dropdown d-md-down-none">
                                <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    {{ strtoupper(app()->getLocale()) }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @foreach(config('panel.available_languages') as $langLocale => $langName)
                                        <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    @endif
                </nav>
            </header>

            <div class="c-body">
                <main class="c-main">
                    <div class="container-fluid">
                        @if(session('message'))
                            <div class="row mb-2">
                                <div class="col-lg-12">
                                    <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                                </div>
                            </div>
                        @endif
                        @if($errors->count() > 0)
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </main>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        <!-- JavaScript files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
        <script src="https://unpkg.com/@coreui/coreui@3.2/dist/js/coreui.min.js"></script>
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

        <!-- Custom JavaScript -->
        <script src="{{ asset('js/main.js') }}"></script>
        @yield('scripts')

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function() {
                // Initialize dropdowns
                $('.dropdown-toggle').dropdown();

                // Function to update the dark/light mode icon
                function updateDarkLightIcon() {
                    if ($('body').hasClass('dark-mode')) {
                        $('#darkLightToggle i').removeClass('far fa-moon').addClass('fas fa-sun');
                    } else {
                        $('#darkLightToggle i').removeClass('fas fa-sun').addClass('far fa-moon');
                    }
                }

                // Toggle dark mode
                $('#darkLightToggle').on('click', function() {
                    $('body').toggleClass('dark-mode');
                    localStorage.setItem('dark-mode', $('body').hasClass('dark-mode'));
                    updateDarkLightIcon(); // Update the icon based on the current mode
                });

                // Set dark mode based on local storage and update icon
                if (localStorage.getItem('dark-mode') === 'true') {
                    $('body').addClass('dark-mode');
                }
                updateDarkLightIcon(); // Ensure the icon is correctly set on page load

                // Add event listener to the logout button
                $('#logout-button').on('click', function(e) {
                    e.preventDefault(); // Prevent the default form submission

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, logout!',
                        cancelButtonText: 'No, cancel!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Submit the form if the user confirms
                            $('#logout-form').submit();
                        }
                    });
                });
            });
        </script>

    </body>

</html>
