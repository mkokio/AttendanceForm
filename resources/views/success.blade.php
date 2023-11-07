<x-app-layout>
    <div class="py-12">
        <div class="container">    
                    <h2 class="h4 font-weight-bold text-black">
                        {{ __('Event Created') }}
                    </h2>
                    <br />
                    <p class="mt-1 text-sm">
                        <a href="{{ env('GOOGLE_CALENDAR_PUBLIC_URL') }}" class="link-success" target="_blank">{{ __('You added your event on the Google Calendar.') }}</a>
                    </p>
                    <br />
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="border border-warning rounded" src="{{ asset('calendarQRcode.png') }}" alt="Calendar QR Code" style="width: 50%;" >
                    </div>
                    <br />
                    <p class="mt-1 text-sm">
                        <a href='/attendanceforms' class="link-info">{{ __('Would you like to create another event?') }}</a>
                    </p>
                    <br />
                    <hr />
                    <br />
                    <div class="d-flex justify-content-center">
                        <iframe src="{{ env('GOOGLE_CALENDAR_PUBLIC_URL') }}" style="border-width:0" width="600" height="600" frameborder="0" scrolling="no"></iframe>
                    </div>
            
        </div>
    </div>
</x-app-layout>
