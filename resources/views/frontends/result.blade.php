@if (!empty($student))
    <div class="card shadow border-0 rounded-3">
        <div class="card-body p-4">
            <div class="alert alert-success text-center mt-3 mb-0 fw-bold" style="margin-top: 2rem">
                Record found successfully.
            </div>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th class="bg-light w-50">Registration No.</th>
                            <td class="text-primary fw-semibold">{{ $student->practitioner_registration ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light">Name</th>
                            <td class="text-primary fw-semibold">{{ $student->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Father/Husband Name</th>
                            <td class="text-primary fw-semibold">{{ $student->father_name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Address</th>
                            <td class="text-primary fw-semibold">{{ $student->address ?? '' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Course</th>
                            <td class="text-primary fw-semibold">{{ $student->qualification ?? '' }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Registration Date</th>
                            <td class="text-primary fw-semibold">{{ $student->registration_date ?? '' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Footer Message -->
            @if ($student->registration_date <= carbon\Carbon::now())
                <div class="alert alert-danger text-center mt-3 mb-0 fw-bold">
                    Practitioner validity is overdue.
                </div>
            @else
                <div class="alert alert-success text-center mt-3 mb-0 fw-bold">
                    Practitioner validity is valid.
                </div>
            @endif

        </div>
    </div>
@else
    <div class="alert alert-danger text-center mt-3 mb-0 fw-bold" style="margin-top: 2rem">
        Record not found.
    </div>
@endif
