<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description"
        content="Modern Education Admin Dashboard for schools, colleges, universities, and eLearning platforms. Includes student and course management, attendance, exams, payments, analytics, and a fully responsive clean UI—ideal for LMS, coaching centers, and academic admin systems.">
    <meta name="keywords"
        content="Education Admin Dashboard, School Admin Panel, College Dashboard, University Dashboard, LMS Dashboard, eLearning Admin Template, Student Management System, Course Management, Education Template, Study Dashboard, Online Learning Dashboard, Academic Admin Panel, Bootstrap Dashboard, React Education Dashboard, Next.js Education Template">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>CEHMS - Register</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $setting?->favicon ?? '' ) }}" sizes="16x16">
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

    <div class="d-flex min-vh-100">

        <!-- Left Image -->
        <div class="w-50 d-none d-lg-block overflow-hidden">
            <img src="{{ asset('assets/images/login-img1.png') }}" alt="Register Image"
                class="w-100 h-100 object-fit-cover">
        </div>

        <!-- Right Form Section -->
        <div class="w-50 px-40 py-40 d-flex align-items-center justify-content-center bg-light">

            <div class="w-100" style="max-width:750px;">

                <!-- Heading -->
                <div class="mb-32 text-center">
                    <h1 class="h4 fw-bold text-primary-light">Create Your Account 🚀</h1>
                    <p class="text-sm text-secondary-light">
                        Fill in the details to get started
                    </p>
                </div>

                <!-- FORM START -->
                <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">

                        <!-- PERSONAL INFO -->
                        <div class="col-12">
                            <div class="card shadow-sm border-0">

                                <div class="card-header bg-white">
                                    <h6 class="mb-0 fw-semibold">Personal Info</h6>
                                </div>

                                <div class="card-body">

                                    <div class="row g-3">

                                        <!-- NAME -->
                                        <div class="col-md-6">
                                            <label class="form-label">Full Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Enter your full name" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- GENDER -->
                                        <div class="col-md-6">
                                            <label class="form-label">Gender <span
                                                    class="text-danger">*</span></label>
                                            <select name="gender"
                                                class="form-select @error('gender') is-invalid @enderror" required>
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            @error('gender')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- DOB -->
                                        <div class="col-md-6">
                                            <label class="form-label">Date of Birth <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="dob"
                                                class="form-control @error('dob') is-invalid @enderror" required>
                                            @error('dob')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- PHONE -->
                                        <div class="col-md-6">
                                            <label class="form-label">Phone <span class="text-danger">*</span></label>

                                            <input type="text" name="mobile"
                                                class="form-control @error('mobile') is-invalid @enderror"
                                                maxlength="12" pattern="^(\d{10}|\d{12})$"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                                placeholder="Enter phone number" required>

                                            @error('mobile')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- ADDRESS -->
                                        <div class="col-md-6">
                                            <label class="form-label">Address </label>
                                            <input type="text" name="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Enter address">
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- QUALIFICATION -->
                                        <div class="col-md-6">
                                            <label class="form-label">Qualification </label>
                                            <input type="text" name="qualification"
                                                class="form-control @error('qualification') is-invalid @enderror"
                                                placeholder="Enter qualification">
                                            @error('qualification')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- IMAGE -->
                                        <div class="col-md-4">
                                            <label class="form-label">Student Photo </label>
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">10th Marksheet (PDF) </label>
                                            <input type="file" name="10th_marksheet"
                                                class="form-control  @error('10th_marksheet') is-invalid @enderror">
                                            @error('10th_marksheet')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">12th Marksheet (PDF) </label>
                                            <input type="file" name="12th_marksheet"
                                                class="form-control  @error('12th_marksheet') is-invalid @enderror">
                                            @error('12th_marksheet')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- PARENT INFO -->
                        <div class="col-12">
                            <div class="card shadow-sm border-0">

                                <div class="card-header bg-white">
                                    <h6 class="mb-0 fw-semibold">Parent & Guardian Info</h6>
                                </div>

                                <div class="card-body">

                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label class="form-label">Father Name </label>
                                            <input type="text" name="father_name"
                                                class="form-control @error('father_name') is-invalid @enderror"
                                                placeholder="Enter father name">
                                            @error('father_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- LOGIN DETAILS -->
                        <div class="col-12">
                            <div class="card shadow-sm border-0">

                                <div class="card-header bg-white">
                                    <h6 class="mb-0 fw-semibold">Login Details</h6>
                                </div>

                                <div class="card-body">

                                    <div class="row g-3">

                                        <!-- EMAIL -->
                                        <div class="col-md-4">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter email" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- PASSWORD -->
                                        <div class="col-md-4">
                                            <label class="form-label">Password <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Enter password" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- CONFIRM PASSWORD -->
                                        <div class="col-md-4">
                                            <label class="form-label">Confirm Password <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                placeholder="Confirm password" required>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- BUTTONS -->
                        <div class="col-12 text-center mt-3">

                            <button type="reset" class="btn btn-outline-danger px-5">
                                Reset
                            </button>

                            <button type="submit" class="btn btn-primary px-5">
                                Save Changes
                            </button>

                        </div>

                    </div>

                </form>

                <!-- LOGIN LINK -->
                <div class="text-center mt-4">
                    Already have an account?
                    <a href="{{ route('login') }}" class="fw-semibold text-primary">
                        Log In
                    </a>
                </div>

            </div>

        </div>

    </div>

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

</body>

</html>
