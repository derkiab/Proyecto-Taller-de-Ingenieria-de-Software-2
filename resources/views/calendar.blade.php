@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('dashboard')}}</div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.js" rel="stylesheet">
<<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                initialView: 'timeGridWeek',
                events: @JSON($evets)
            });
            calendar.render();
        });
    </script>
    @endpush