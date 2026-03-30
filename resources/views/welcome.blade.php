@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="dashboard-main-body">
        <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <div class="">
                <h6 class="fw-semibold mb-0">Dashboard</h6>
                <p class="text-neutral-600 mt-4 mb-0">Student -> Manage courses and students.</p>
            </div>
        </div>

        <div class="mt-24">
            <div class="row gy-4">

                <!-- Dashboard widgets start -->
                <div class="col-xxl-4">
                    <div class="card radius-12 border-0 h-100">
                        <div class="card-body p-24 d-flex gap-16 flex-sm-nowrap flex-wrap">
                            <div
                                class="radius-8 overflow-hidden position-relative z-1 py-32 px-20 text-center d-flex justify-content-center align-items-center flex-grow-1">
                                <img src="{{ asset('assets/images/edit-profile-bg.png') }}" alt="BG Image"
                                    class="position-absolute start-0 top-0 w-100 h-100 z-n1">
                                <div class="">
                                    <span class="mb-12">
                                        <img src="{{ $user->image
                                            ? asset('storage/' . $user->image)
                                            : ($user->gender == 'female'
                                                ? asset('assets/images/female-avtar.png')
                                                : asset('assets/images/male-avtar.png')) }}"
                                            alt="User Image" class="rounded-circle object-fit-cover">
                                    </span>
                                    <h6 class="text-white">{{ auth()->user() ? ucfirst(auth()->user()->name) : '' }}</h6>
                                    <span
                                        class="text-white text-lg d-block">{{ ucfirst($user->getRoleNames()->first()) ?? '' }}</span>
                                    @can('edit-student')
                                        <div class="mt-12">
                                            <a href="{{ route('profile.edit') }}"
                                                class="px-20 py-8 text-white bg-white bg-opacity-10 radius-6 fw-medium text-lg">Edit
                                                Profile</a>
                                        </div>
                                    @endcan
                                </div>
                            </div>

                            <div class="d-flex flex-column gap-20 flex-grow-1 justify-content-between">
                                <div class="radius-8 py-24 px-24 text-start d-flex align-items-center gap-12 bg-purple-100">
                                    <span
                                        class="w-48-px h-48-px d-inline-flex justify-content-center align-items-center rounded-circle border border-purple-300 bg-purple-200">
                                        {{-- <img src="{{ asset('assets/') }}images/icons/teacher-widget-icon1.png"
                                            alt="User Icon"> --}}
                                    </span>
                                    <div class="">
                                        <span class="text-secondary-light fw-medium d-block">Events</span>
                                        <h5 class="text-primary-light">10</h5>
                                    </div>
                                </div>
                                <div
                                    class="radius-8 py-24 px-24 text-start d-flex align-items-center gap-12 bg-success-100">
                                    <span
                                        class="w-48-px h-48-px d-inline-flex justify-content-center align-items-center rounded-circle border border-success-300 bg-success-200">
                                        {{-- <img src="{{ asset('assets/') }}images/icons/teacher-widget-icon2.png"
                                            alt="User Icon"> --}}
                                    </span>
                                    <div class="">
                                        <span class="text-secondary-light fw-medium d-block">Notifications</span>
                                        <h5 class="text-primary-light">15</h5>
                                    </div>
                                </div>
                                <div
                                    class="radius-8 py-24 px-24 text-start d-flex align-items-center gap-12 bg-primary-100">
                                    <span
                                        class="w-48-px h-48-px d-inline-flex justify-content-center align-items-center rounded-circle border border-primary-300 bg-primary-200">
                                        {{-- <img src="{{ asset('assets/') }}images/icons/teacher-widget-icon3.png"
                                            alt="User Icon"> --}}
                                    </span>
                                    <div class="">
                                        <span class="text-secondary-light fw-medium d-block">Attendance</span>
                                        <h5 class="text-primary-light">90%</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dashboard widgets end -->





            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>


    <script>
        // ================================ Users Overview Donut chart Start ================================ 
        var options = {
            series: [200, 200, 200, 200],
            colors: ['#487FFF', '#9935FE', '#FF9F29', "#45B369"],
            labels: ['Total Visitors', 'Registrations', 'Total Page Views', 'Registrations'],
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
                width: 0,
            },
            dataLabels: {
                enabled: false
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 300
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
        };

        var chart = new ApexCharts(document.querySelector("#userOverviewDonutChart"), options);
        chart.render();
        // ================================ Users Overview Donut chart End ================================ 

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


        let table = new DataTable('#dataTable');

        //============================= ✅ Data Table start =============================
        $('.data-table').each(function() {
            const $table = $(this);
            const tableInstance = new DataTable(this);

            // Handle search input (inside same wrapper)
            $table.closest('.dataTable-wrapper').find('.dt-search .dt-input').on('keyup', function() {
                tableInstance.search(this.value).draw();
            });

            // Handle page length change (inside same wrapper)
            $table.closest('.dataTable-wrapper').find('.dt-length .dt-input').on('change', function() {
                const value = $(this).val();
                tableInstance.page.len(value).draw();
            });
        });
        //============================= ✅ Data Table end =============================
    </script>

@endsection
