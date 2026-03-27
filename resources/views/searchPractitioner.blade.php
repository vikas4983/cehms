@extends('layouts.frontend')
@section('title', 'Search Practitioner')

@section('content')

    <style>
        .table tr:hover {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 10px;
        }

        td {
            word-break: break-word;
        }

        /* ✅ Mobile Responsive Table → Card Style */
    </style>
    <section class="form-wrapper padding-sm">
        <div class="container mt-4">

            <!-- ✅ Header (Fixed Mobile Issue) -->
            <div class="text-center mb-3">
                <h4 class="fw-bold">Practitioner Information</h4>
            </div>

            @if (!empty($student))

                <div class="card shadow border-0 rounded-3">
                    <div class="card-body p-3 p-md-4">

                        <!-- ✅ Success Message -->
                        <div class="alert alert-success text-center fw-bold m" style="margin-top: 2rem">
                            Record found successfully.
                        </div>

                        <!-- ✅ Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <th class="bg-light w-50">Registration No.</th>
                                        <td class="text-primary fw-semibold">
                                            {{ $student->registration_no ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Registration Date</th>
                                        <td class="text-primary fw-semibold">
                                            {{ $student->registration_date ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Name</th>
                                        <td class="text-primary fw-semibold">
                                            {{ $student->first_name ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Father/Husband Name</th>
                                        <td class="text-primary fw-semibold">
                                            {{ $student->father_name ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Address</th>
                                        <td class="text-primary fw-semibold">
                                            {{ $student->address ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Course</th>
                                        <td class="text-primary fw-semibold">
                                            {{ $student->course ?? '' }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <!-- ✅ Validity Check -->
                        @if (\Carbon\Carbon::parse($student->registration_date)->isPast())
                            <div class="alert alert-danger text-center mt-3 fw-bold">
                                Practitioner validity is overdue.
                            </div>
                        @else
                            <div class="alert alert-success text-center mt-3 fw-bold">
                                Practitioner validity is valid.
                            </div>
                        @endif

                    </div>
                </div>
            @else
                <div class="alert alert-danger text-center fw-bold" style="margin-top: 2rem">
                    Record not found.
                </div>

            @endif

        </div>
    </section>

@endsection
