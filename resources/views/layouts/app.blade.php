<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    {{-- <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"> --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Modern Education Admin Dashboard for schools, colleges, universities, and eLearning platforms. Includes student and course management, attendance, exams, payments, analytics, and a fully responsive clean UI—ideal for LMS, coaching centers, and academic admin systems.">
    <meta name="keywords"
        content="Education Admin Dashboard, School Admin Panel, College Dashboard, University Dashboard, LMS Dashboard, eLearning Admin Template, Student Management System, Course Management, Education Template, Study Dashboard, Online Learning Dashboard, Academic Admin Panel, Bootstrap Dashboard, React Education Dashboard, Next.js Education Template">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>@yield('title', 'Edudash - School, College & LMS Admin Dashboard Template | Bootstrap 5')</title>
    <link rel="icon" type="image/png"
        href="{{ $setting->favicon ? asset('storage/' . $setting->favicon) : asset('assets-frontend/images/default-favicon.png') }}"
        sizes="16x16">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('assets/css/apexcharts.css') }}">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.min.css') }}">
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{ asset('assets/css/flatpickr.min.css') }}">
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{ asset('assets/css/full-calendar.css') }}">
    <!-- calendar -->
    <link rel="stylesheet" href="{{ asset('assets/css/calendar.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <!-- Theme Customization Structure Start -->
    <div class="body-overlay"></div>
    <button type="button"
        class="theme-customization__button w-48-px h-48-px bg-primary-600 text-white rounded-circle d-flex justify-content-center align-items-center position-fixed end-0 bottom-0 mb-40 me-40 text-2xxl bg-hover-primary-700"
        aria-label="Theme Customization Button">
        <i class="ri-settings-3-line animate-spin"></i>
    </button>
    <div class="theme-customization-sidebar w-100 bg-base h-100vh overflow-y-auto position-fixed end-0 top-0">
        <div class="d-flex align-items-center gap-3 py-16 px-24 justify-content-between border-bottom">
            <div>
                <h6 class="text-sm dark:text-white">Theme Settings</h6>
                <p class="text-xs mb-0 text-neutral-500 dark:text-neutral-200">Customize and preview instantly</p>
            </div>
            <button data-slot="button"
                class="theme-customization-sidebar__close text-neutral-900 bg-transparent text-hover-primary-600 d-flex text-xl">
                <i class="ri-close-fill"></i>
            </button>
        </div>

        <div class="d-flex flex-column gap-48 p-24 overflow-y-auto flex-grow-1">

            <div class="theme-setting-item">
                <h6 class="fw-medium text-primary-light text-md mb-3">Theme Mode</h6>
                <div class="d-grid grid-cols-3 gap-3 dark-light-mode">
                    <button type="button"
                        class="theme-btn theme-setting-item__btn d-flex align-items-center justify-content-center h-64-px rounded-3 text-xl active"
                        data-theme="light" aria-label="light">
                        <i class="ri-sun-line"></i>
                    </button>
                    <button type="button"
                        class="theme-btn theme-setting-item__btn d-flex align-items-center justify-content-center h-64-px rounded-3 text-xl"
                        data-theme="dark" aria-label="dark">
                        <i class="ri-moon-line"></i>
                    </button>
                    <button type="button"
                        class="theme-btn theme-setting-item__btn d-flex align-items-center justify-content-center h-64-px rounded-3 text-xl"
                        data-theme="system" aria-label="system">
                        <i class="ri-computer-line"></i>
                    </button>
                </div>
            </div>

            <div class="theme-setting-item">
                <h6 class="fw-medium text-primary-light text-md mb-3">Page Direction</h6>
                <div class="d-grid grid-cols-2 gap-3">
                    <button type="button"
                        class="theme-setting-item__btn ltr-mode-btn d-flex align-items-center justify-content-center gap-2 h-56-px rounded-3 text-xl"
                        aria-label="LTR">
                        <span><i class="ri-align-item-left-line"></i></span>
                        <span class="h6 text-sm font-medium mb-0">LTR</span>
                    </button>

                    <button type="button"
                        class="theme-setting-item__btn rtl-mode-btn d-flex align-items-center justify-content-center gap-2 h-56-px rounded-3 text-xl"
                        aria-label="RTL">
                        <span class="h6 text-sm font-medium mb-0">RTL</span>
                        <span><i class="ri-align-item-right-line"></i></span>
                    </button>
                </div>
            </div>

            <div class="theme-setting-item">
                <h6 class="fw-medium text-primary-light text-md mb-3">Color Schema</h6>
                <div class="d-grid grid-cols-3 gap-3">
                    <button type="button"
                        class="color-picker-btn d-flex flex-column justify-content-center align-items-center"
                        data-color="base" aria-label="Base">
                        <span class="color-picker-btn__box h-40-px w-100 rounded-3"
                            style="background-color: #25A194;"></span>
                        <span class="fw-medium mt-1" style="color: #25A194;">Base</span>
                    </button>
                    <button type="button"
                        class="color-picker-btn d-flex flex-column justify-content-center align-items-center"
                        data-color="red" aria-label="Red">
                        <span class="color-picker-btn__box h-40-px w-100 rounded-3"
                            style="background-color: #dc2626;"></span>
                        <span class="fw-medium mt-1" style="color: #dc2626;">Red</span>
                    </button>
                    <button type="button"
                        class="color-picker-btn d-flex flex-column justify-content-center align-items-center"
                        data-color="blue" aria-label="Blue">
                        <span class="color-picker-btn__box h-40-px w-100 rounded-3"
                            style="background-color: #2563eb;"></span>
                        <span class="fw-medium mt-1" style="color: #2563eb;">Blue</span>
                    </button>
                    <button type="button"
                        class="color-picker-btn d-flex flex-column justify-content-center align-items-center"
                        data-color="yellow" aria-label="Yellow">
                        <span class="color-picker-btn__box h-40-px w-100 rounded-3"
                            style="background-color: #ff9f29;"></span>
                        <span class="fw-medium mt-1" style="color: #ff9f29;">Yellow</span>
                    </button>
                    <button type="button"
                        class="color-picker-btn d-flex flex-column justify-content-center align-items-center"
                        data-color="cyan" aria-label="Cyan">
                        <span class="color-picker-btn__box h-40-px w-100 rounded-3"
                            style="background-color: #00b8f2;"></span>
                        <span class="fw-medium mt-1" style="color: #00b8f2;">Cyan</span>
                    </button>
                    <button type="button"
                        class="color-picker-btn d-flex flex-column justify-content-center align-items-center"
                        data-color="violet" aria-label="Violet">
                        <span class="color-picker-btn__box h-40-px w-100 rounded-3"
                            style="background-color: #7c3aed;"></span>
                        <span class="fw-medium mt-1" style="color: #7c3aed;">Violet</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
    <!-- Theme Customization Structure End -->

    <div
        class="overlay bg-black bg-opacity-50 w-100 h-100 position-fixed z-9 visibility-hidden opacity-0 duration-300">
    </div>
    <aside class="sidebar">
        <!-- User Info start -->
        <div class="mx-16 py-12">
            <div class="dropdown profile-dropdown">
                <button type="button"
                    class="profile-dropdown__button d-flex align-items-center justify-content-between p-10 w-100 overflow-hidden bg-neutral-50 radius-12 "
                    data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    <span class="d-flex align-items-start gap-10">
                        <img src="{{ auth()->user()->image
                            ? asset('storage/' . auth()->user()->image)
                            : (auth()->user()->gender == 'female'
                                ? asset('assets/images/female-avtar.png')
                                : asset('assets/images/male-avtar.png')) }}"
                            alt="Thumbnail" class="w-40-px h-40-px rounded-circle object-fit-cover flex-shrink-0">
                        <span class="profile-dropdown__contents">
                            <span class="h6 mb-0 text-md d-block text-primary-light">{{ auth()->user()->name }}</span>
                            <span
                                class="text-secondary-light text-sm mb-0 d-block">{{ ucfirst(auth()->user()->getRoleNames()->first()) }}</span>
                        </span>
                    </span>
                    <span class="profile-dropdown__icon pe-8 text-xl d-flex line-height-1">
                        <i class="ri-arrow-right-s-line"></i>
                    </span>
                </button>

                <!-- Dashboard -->
                <ul class="dropdown-menu dropdown-menu-lg-end border p-12">
                    <li>
                        <a href="{{ auth()->user()->hasROle('user') ? route('my.profile') : route('profile.admin', auth()->user()->id) }}"
                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                            <i class="ri-user-3-line"></i>
                            My Profile
                        </a>
                    </li>
                    <li>
                        <a id="logOut" style="cursor: pointer"
                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                            <i class="ri-shut-down-line"></i>
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- User Info end -->

        <div class="sidebar-menu-area">
            <ul class="sidebar-menu" id="sidebar-menu">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="ri-home-4-line"></i>
                        <span>Dashboard </span>
                    </a>
                </li>
                <li>
                    @can('view-admin')
                        <a href="{{ route('admin') }}">
                            <i class="ri-admin-line"></i>
                            <span>Admins</span>
                        </a>
                    @endcan
                </li>
                @if (!auth()->user()->hasRole('user'))
                    <li class="dropdown">
                        <a href="javascript:void(0)">
                            <i class="ri-graduation-cap-line"></i>
                            <span>Students</span>
                        </a>
                        <ul class="sidebar-submenu">
                            @can('create-student')
                                <li>
                                    <a href="{{ route('students.create') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i>
                                        Add New Student
                                    </a>
                                </li>
                            @endcan
                            @can('view-student')
                                <li>
                                    <a href="{{ route('students.index') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i>
                                        Student List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('inactive.students') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i>
                                        Suspend Students
                                    </a>
                                </li>
                            @endcan
                            @can('delete-student')
                                <li>
                                    <a href="{{ route('trash.students') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i> Trash Students
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @can('view-student-old')
                        <li>
                            <a href="{{ route('oldStudents.index') }}">
                                <i class="ri-graduation-cap-line"></i> Old Students
                            </a>
                        </li>
                    @endcan
                    <li class="dropdown">
                        <a href="javascript:void(0)">
                            <i class="ri-book-line"></i>
                            <span>Books</span>
                        </a>
                        <ul class="sidebar-submenu">
                            @can('create-book')
                                <li>
                                    <a href="{{ route('books.create') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i>
                                        Add New Book
                                    </a>
                                </li>
                            @endcan
                            @can('view-book')
                                <li>
                                    <a href="{{ route('books.index') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i>
                                        Book List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('book.status') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i>
                                        Unpublish Book
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)">
                            <i class="ri-newspaper-line"></i>
                            <span>News</span>
                        </a>
                        <ul class="sidebar-submenu">
                            @can('create-news')
                                <li>
                                    <a href="{{ route('news.create') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i>
                                        Add New News
                                    </a>
                                </li>
                            @endcan
                            @can('view-news')
                                <li>
                                    <a href="{{ route('news.index') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i>
                                        News List
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    <li>
                        @can('view-medicine')
                            <a href="{{ route('medicines.index') }}">
                                <i class="ri-capsule-line"></i>
                                <span>Medicines</span>
                            </a>
                        @endcan
                    </li>
                    <li>
                        @can('view-testimonial')
                            <a href="{{ route('testimonials.index') }}">
                                <i class="ri-chat-quote-line"></i>
                                <span>Testimonials</span>
                            </a>
                        @endcan
                    </li>
                    <li>
                        @can('view-enquiry')
                            <a href="{{ route('enquiries.index') }}">
                                <i class="ri-file-list-line"></i>
                                <span>Enquiries</span>
                            </a>
                        @endcan
                    </li>
                    <li>
                        @can('view-role')
                            <a href="{{ route('roles.index') }}">
                                <i class="ri-user-follow-line"></i>
                                <span>Roles</span>
                            </a>
                        @endcan
                    </li>
                    <li>
                        @can('view-permission')
                            <a href="{{ route('permissions.index') }}">
                                <i class="ri-macbook-line"></i>
                                <span>Permissions</span>
                            </a>
                        @endcan
                    </li>
                    <li>
                        @can('view-menu')
                            <a href="{{ route('menus.index') }}">
                                <i class="ri-menu-line"></i>
                                <span>Menus</span>
                            </a>
                        @endcan
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)">
                            <i class="ri-user-settings-line"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sidebar-submenu">
                            @can('create-sitesetting')
                                <li>
                                    <a href="{{ route('siteSettings.index') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i>
                                        General
                                    </a>
                                </li>
                            @endcan

                            @can('view-banner')
                                <li>
                                    <a href="{{ route('banners.index') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i>
                                        Banners
                                    </a>
                                </li>
                            @endcan
                            @can('view-cms')
                                <li>
                                    <a href="{{ route('cms.index') }}">
                                        <i class="ri-circle-fill circle-icon w-auto"></i>
                                        Cms
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </aside>

    <main class="dashboard-main">
        <div class="navbar-header shadow-1">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-4">
                        <button type="button" class="sidebar-mobile-toggle"
                            aria-label="Sidebar Mobile Toggler Button">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                        </button>

                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <button type="button" data-theme-toggle
                            class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                            aria-label="Dark & Light Mode Button"></button>
                        <div class="dropdown d-inline-block">
                            <button
                                class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                                type="button" data-bs-toggle="dropdown" aria-label="Language Change Button">
                                <img src="{{ auth()->user()->image
                                    ? asset('storage/' . auth()->user()->image)
                                    : (auth()->user()->gender == 'female'
                                        ? asset('assets/images/female-avtar.png')
                                        : asset('assets/images/male-avtar.png')) }}"
                                    alt="Thumbnail" class="w-24 h-24 object-fit-cover rounded-circle">
                            </button>
                            <div class="dropdown-menu to-top dropdown-menu-sm">
                                <div class="max-h-400-px overflow-y-auto scroll-sm pe-8">

                                    <li>
                                        <a href="{{ auth()->user()->hasROle('user') ? route('my.profile') : route('profile.admin', auth()->user()->id) }}"
                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                                            <i class="ri-user-3-line"></i>
                                            My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a id="logOut" style="cursor: pointer"
                                            class="dropdown-item rounded text-secondary-light bg-hover-neutral-200 text-hover-neutral-900 d-flex align-items-center gap-2 py-6">
                                            <i class="ri-shut-down-line"></i>
                                            Log Out
                                        </a>
                                    </li>

                                </div>
                            </div>
                        </div><!-- Language dropdown end -->
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <footer class="d-footer">
            <div class="">
                <p>© <span id="year"></span> <span>CEHSM</span>. All rights reserved</p>
                <script>
                    document.getElementById("year").innerText = new Date().getFullYear();
                </script>
            </div>
        </footer>
    </main>

    <!-- jQuery library js -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Apex Chart js -->
    <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('assets/js/iconify-icon.min.js') }}"></script>
    <!-- Data Table js -->
    <script src="{{ asset('assets/js/dataTables.min.js') }}"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script> --}}

    <!-- Custom js -->
    <script src="{{ asset('assets/js/custom-js/data-table-assign-role.js') }}"></script>


    <script>
        // ============================ Revenue Statistics Chart start ===============================
        var options = {
            series: [{
                name: 'Total Fee',
                data: [25, 35, 50, 60, 26, 20, 40, 20, 50, 16, 10, 40]
            }, {
                name: 'Collected Fee',
                data: [15, 16, 24, 30, 20, 15, 20, 10, 25, 10, 6, 20]
            }],
            chart: {
                type: 'bar',
                height: 250,
                stacked: true,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: true
                }
            },
            colors: ["#25A194", "#FF7A2C"],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "50%",
                    shape: "pyramid",
                },
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr',
                    'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ],
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return "$" + value + "k";
                    },
                    style: {
                        fontSize: "14px"
                    }
                },
            },
            legend: {
                show: false,
            },
            fill: {
                opacity: 1
            }
        };

        var chart = new ApexCharts(document.querySelector("#revenueStatistic"), options);
        chart.render()
        // ============================ Revenue Statistics Chart End ===============================

        // ===================== Income Vs Expense Start =============================== 
        function createChartThree(chartId, color1, color2) {
            var options = {
                series: [{
                    name: 'Income',
                    data: [48, 35, 55, 32, 48, 30, 15, 50, 57]
                }, {
                    name: 'Expense',
                    data: [12, 20, 15, 26, 22, 60, 40, 32, 25]
                }],
                legend: {
                    show: false
                },
                chart: {
                    type: 'area',
                    width: '100%',
                    height: 260,
                    toolbar: {
                        show: false
                    },
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'stepline',
                    width: 2,
                    colors: [color1, color2],
                    lineCap: 'round'
                },
                grid: {
                    show: true,
                    borderColor: '#D1D5DB',
                    strokeDashArray: 1,
                    position: 'back',
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    yaxis: {
                        lines: {
                            show: true
                        }
                    },
                    row: {
                        colors: undefined,
                        opacity: 0.2
                    },
                    column: {
                        colors: undefined,
                        opacity: 0.2
                    },
                    padding: {
                        top: -20,
                        right: 0,
                        bottom: -10,
                        left: 0
                    },
                },
                colors: [color1, color2],
                markers: {
                    colors: [color1, color2],
                    strokeWidth: 1,
                    size: 0,
                    hover: {
                        size: 10
                    }
                },
                xaxis: {
                    labels: {
                        show: false
                    },
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    tooltip: {
                        enabled: false
                    },
                    labels: {
                        formatter: function(value) {
                            return value;
                        },
                        style: {
                            fontSize: "14px"
                        }
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return "$" + value + "k";
                        },
                        style: {
                            fontSize: "14px"
                        }
                    },
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    }
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shade: "light",
                        type: "vertical",
                        opacityFrom: 0.4,
                        opacityTo: 0.05,
                        stops: [0, 100]
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector(`#${chartId}`), options);
            chart.render();
        }

        createChartThree('incomeExpense', '#16a34a', '#FF9F29');
        // ===================== Income Vs Expense End =============================== 

        // ================================ New Admissions Chart Start ================================ 
        var options = {
            series: [40, 87, 87, 30],
            colors: ['#0A51CE', '#25A194', '#FF7A2C', '#009F5E'],
            labels: ['Health', 'Business', 'Lifestyle', 'Entertainment'],
            legend: {
                show: false
            },
            chart: {
                type: 'donut',
                height: 270,
                sparkline: {
                    enabled: true // Remove whitespace
                },
                margin: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            },
            stroke: {
                width: 2,
            },
            dataLabels: {
                enabled: false
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
        };

        var chart = new ApexCharts(document.querySelector("#newAdmissions"), options);
        chart.render();
        // ================================ New Admissions Chart End ================================ 

        // ================================ Animated Radial Progress Bar Start ================================ 
        $('svg.radial-progress').each(function(index, value) {
            $(this).find($('circle.complete')).removeAttr('style');
        });

        // Activate progress animation on scroll
        $(window).scroll(function() {
            $('svg.radial-progress').each(function(index, value) {
                // Trigger when the element is fully in the viewport
                if (
                    $(window).scrollTop() >= $(this).offset().top - $(window).height() &&
                    $(window).scrollTop() <= $(this).offset().top + $(this).height()
                ) {
                    // Get percentage of progress
                    const percent = $(value).data('percentage');
                    // Get radius of the svg's circle.complete
                    const radius = $(this).find($('circle.complete')).attr('r');
                    // Get circumference (2πr)
                    const circumference = 2 * Math.PI * radius;
                    // Get stroke-dashoffset value based on the percentage of the circumference
                    const strokeDashOffset = circumference - ((percent * circumference) / 100);
                    // Transition progress for 1.25 seconds
                    $(this).find($('circle.complete')).animate({
                        'stroke-dashoffset': strokeDashOffset
                    }, 1250);
                }
            });
        }).trigger('scroll');
        // ================================ Animated Radial Progress Bar End ================================

        // ============================= Calendar Js Start =================================
        let display = document.querySelector(".display");
        let days = document.querySelector(".days");
        let previous = document.querySelector(".left");
        let next = document.querySelector(".right");

        let date = new Date();

        let year = date.getFullYear();
        let month = date.getMonth();

        function displayCalendar() {
            const firstDay = new Date(year, month, 1);

            const lastDay = new Date(year, month + 1, 0);

            const firstDayIndex = firstDay.getDay(); //4

            const numberOfDays = lastDay.getDate(); //31

            let formattedDate = date.toLocaleString("en-US", {
                month: "long",
                year: "numeric"
            });

            display.innerHTML = `${formattedDate}`;

            for (let x = 1; x <= firstDayIndex; x++) {
                const div = document.createElement("div");
                div.innerHTML += "";

                days.appendChild(div);
            }

            for (let i = 1; i <= numberOfDays; i++) {
                let div = document.createElement("div");
                let currentDate = new Date(year, month, i);

                div.dataset.date = currentDate.toDateString();

                div.innerHTML += i;
                days.appendChild(div);
                if (
                    currentDate.getFullYear() === new Date().getFullYear() &&
                    currentDate.getMonth() === new Date().getMonth() &&
                    currentDate.getDate() === new Date().getDate()
                ) {
                    div.classList.add("current-date");
                }
            }
        }

        // Call the function to display the calendar
        displayCalendar();

        previous.addEventListener("click", () => {
            days.innerHTML = "";

            if (month < 0) {
                month = 11;
                year = year - 1;
            }
            month = month - 1;
            date.setMonth(month);
            displayCalendar();
        });

        next.addEventListener("click", () => {
            days.innerHTML = "";

            if (month > 11) {
                month = 0;
                year = year + 1;
            }

            month = month + 1;
            date.setMonth(month);

            displayCalendar();
        });
        // ============================= Calendar Js End =================================
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const logout = document.getElementById('logOut');

            if (!logout) return;

            logout.addEventListener('click', function(e) {
                e.preventDefault();

                const token = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute('content');

                fetch('/logout', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            window.location.href = '/';
                        } else {
                            alert('Logout failed');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });

            });

        });
    </script>
    {{-- Disable Data Table --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtn = document.querySelector('.filterBtn');
            if (filterBtn) {
                filterBtn.addEventListener('click', function(e) {
                    filterBtn.innerHTML = `
  <span class="spinner-border spinner-border-sm text-primary me-2"></span>
  
`;
                    filterBtn.disabled = true;
                    e.preventDefault();
                    const input = document.querySelector('#input').value;
                    if (!input) {
                        alert('Enter input value');
                        return;
                    }
                    const form = document.querySelector('#inputForm');
                    const action = form.dataset.url;
                    const params = new URLSearchParams(new FormData(form));
                    submitUrl(action, params);
                });
            }

            function submitUrl(action, params) {
                fetch(`${action}?${params}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status) {
                            filterBtn.innerText = 'Search';
                            filterBtn.disabled = false;
                            document.querySelector('.result').innerHTML = data.data;
                            const successMessage = document.querySelector('.successMessage');
                            if (successMessage) {
                                successMessage.style.display = 'block';
                                successMessage.innerText = data.message;
                                setTimeout(() => {
                                    successMessage.style.display = 'none';
                                }, 3000);
                            }
                        } else {
                            filterBtn.innerText = 'Search';
                            filterBtn.disabled = false;
                            const errorMessage = document.querySelector('.errorMessage');
                            if (errorMessage) {
                                errorMessage.style.display = 'block';
                                errorMessage.innerText = data.message;
                                setTimeout(() => {
                                    errorMessage.style.display = 'none';
                                }, 3000);
                            }

                        }
                    })
                    .catch(error => {
                        alert(error);
                    })
            }
        });
    </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            if ($.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable().destroy();
            }
            $('#dataTable').DataTable({
                paging: false,
                searching: false,
                info: false,
                lengthChange: false,
                ordering: false,
                dom: 't',
                scrollX: true
            });
        });
    </script> --}}

</body>

</html>
