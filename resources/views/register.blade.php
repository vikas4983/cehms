<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CEHMS - Register</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>

    <div class="container-fluid min-vh-100">
        <div class="row min-vh-100">

            <!-- LEFT IMAGE (hidden on mobile) -->
            <div class="col-lg-6 d-none d-lg-block p-0">

                <img src="{{ asset('assets/images/login-img1.png') }}" class="w-100 h-100 object-fit-cover"
                    alt="Register Image">

            </div>


            <!-- RIGHT FORM -->
            <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center bg-light px-lg-5 px-3 py-4">

                <div class="w-100" style="max-width:750px;">


                    <!-- Heading -->
                    <div class="mb-4 text-center">

                        <h3 class="fw-bold">Create Your Account 🚀</h3>

                        <p class="text-muted">
                            Fill in the details to get started
                        </p>
                        <a href="{{ route('/') }}" class="btn btn-outline-success rounded-circle border"
                            title="Back">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <!-- PERSONAL INFO -->

                        <div class="card shadow-sm mb-4">

                            <div class="card-header bg-white">
                                <h6 class="mb-0 fw-semibold">Personal Info</h6>
                            </div>

                            <div class="card-body">

                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="form-label">Full Name *</label>

                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter full name">

                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">Gender *</label>

                                        <select name="gender"
                                            class="form-select @error('gender') is-invalid @enderror">

                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>

                                        </select>

                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">Date of Birth *</label>

                                        <input type="date" name="dob"
                                            class="form-control @error('dob') is-invalid @enderror">

                                        @error('dob')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">Phone *</label>

                                        <input type="text" name="mobile"
                                            class="form-control @error('mobile') is-invalid @enderror"
                                            placeholder="Enter phone">

                                        @error('mobile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">Address</label>

                                        <input type="text" name="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Enter address">

                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-6">
                                        <label class="form-label">Qualification</label>

                                        <input type="text" name="qualification"
                                            class="form-control @error('qualification') is-invalid @enderror"
                                            placeholder="Enter qualification">

                                        @error('qualification')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label">Student Photo</label>

                                        <input type="file" name="image"
                                            class="form-control @error('image') is-invalid @enderror">

                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label">10th Marksheet</label>

                                        <input type="file" name="10th_marksheet"
                                            class="form-control @error('10th_marksheet') is-invalid @enderror">

                                        @error('10th_marksheet')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label">12th Marksheet</label>

                                        <input type="file" name="12th_marksheet"
                                            class="form-control @error('12th_marksheet') is-invalid @enderror">

                                        @error('12th_marksheet')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>
                        </div>



                        <!-- PARENT DETAILS -->

                        <div class="card shadow-sm mb-4">

                            <div class="card-header bg-white">
                                <h6 class="mb-0 fw-semibold">Parent Details</h6>
                            </div>

                            <div class="card-body">

                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <label class="form-label">Father Name</label>

                                        <input type="text" name="father_name"
                                            class="form-control @error('father_name') is-invalid @enderror">

                                        @error('father_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>
                        </div>



                        <!-- ACCOUNT DETAILS -->

                        <div class="card shadow-sm mb-4">

                            <div class="card-header bg-white">
                                <h6 class="mb-0 fw-semibold">Account Details</h6>
                            </div>

                            <div class="card-body">

                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label class="form-label">Email *</label>

                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror">

                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label">Password *</label>

                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror">

                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label">Confirm Password *</label>

                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror">

                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>

                            </div>
                        </div>



                        <!-- BUTTONS -->

                        <div class=" text-center ">
                            <button type="submit" class="btn btn-outline-primary ">
                                Submit
                            </button>

                        </div>
                    </form>
                    <div class="text-center mt-4">
                        Already have an account?
                        <a href="{{ route('login') }}" class="fw-semibold">
                            Log In & &nbsp;<a href="{{ route('/') }}" class="btn btn-sm btn-outline-success">
                                Home
                            </a>
                        </a>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
