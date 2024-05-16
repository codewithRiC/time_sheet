@push('title')
    <title>Create Plan</title>
@endpush


@if (session()->get('designation') == 'EMPLOYEE')
    @include('layouts.employeeheader')
@endif


<div id="layoutSidenav_content">


    <main class="bg-white">
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


        <div id='calendar'></div>

        {{-- <form id="eventForm">
            <label for="eventName">Event Name:</label>
            <input type="text" id="eventName" name="eventName" required>
            <label for="eventDate">Event Date:</label>
            <input type="date" id="eventDate" name="eventDate" required>
            <button type="submit">Add Event</button>
        </form> --}}

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
                            text: 'Add Event...',
                            click: function() {
                                // Show the form when the button is clicked
                                document.getElementById('eventForm').style.display = 'block';
                            }
                        }
                    },
                    // Fetch events from the database
                    events: '/events' // Replace '/events' with your endpoint to fetch events from the database
                });
        
                calendar.render();
        
                // Handle form submission
                document.getElementById('eventForm').addEventListener('submit', function(event) {
                    event.preventDefault();
        
                    var formData = new FormData(event.target);
                    var eventData = {
                        title: formData.get('eventName'),
                        start: formData.get('eventDate'),
                        allDay: true // Assuming all events are all-day events
                    };
        
                    // Send event data to the server to store in the database
                    fetch('/addEvent', {
                        method: 'POST',
                        body: JSON.stringify(eventData),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    }).then(function(response) {
                        if (response.ok) {
                            return response.json();
                        }
                        throw new Error('Network response was not ok.');
                    }).then(function(data) {
                        // If event added successfully, refresh the calendar to show the new event
                        calendar.refetchEvents();
                        alert('Event added successfully.');
                    }).catch(function(error) {
                        console.error('Error adding event:', error);
                        alert('Error adding event. Please try again.');
                    });
        
                    // Clear form fields after submission
                    document.getElementById('eventName').value = '';
                    document.getElementById('eventDate').value = '';
                });
            });
        </script>
        
        


    </main>


</div>
</div>



@include('layouts.footer')
