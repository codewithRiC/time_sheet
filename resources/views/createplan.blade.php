@push('title')
    <title>Create Plan</title>
@endpush


@if (session()->get('designation') == 'EMPLOYEE')
    @include('layouts.employeeheader')
@endif


<div id="layoutSidenav_content">


    <main class="bg-white" >
        {{-- <div class="container m-3"">
            <div id="calendar" class="mt-3" style="height: 20vw; width: 50vw; align:center;"></div>
        </div> --}}

        <div class="container m-3 bg-white">
            <div id="calendar-container" class="d-flex justify-content-center mt-3">
                <div id="calendar" style="height: 20vw; width: 50vw;"></div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

        <!-- Include other necessary JS files for the calendar -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        center: 'addEventButton'
                    },
                    customButtons: {
                        addEventButton: {
                            text: 'add event...',
                            click: function() {
                                var dateStr = prompt('Enter a date in YYYY-MM-DD format');
                                var date = new Date(dateStr + 'T00:00:00'); // will be in local time

                                if (!isNaN(date.valueOf())) { // valid?
                                    calendar.addEvent({
                                        title: 'dynamic event',
                                        start: date,
                                        allDay: true
                                    });
                                    alert('Great. Now, update your database...');
                                } else {
                                    alert('Invalid date.');
                                }
                            }
                        }
                    }
                });

                calendar.render();
            });
        </script>


    </main>


</div>
</div>



@include('layouts.footer')
