<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="p-5 bg-white border rounded">
                                
                <header>
                    <h2 class="h4 font-weight-bold text-black">
                        {{ __('Event Created') }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600">
                    <a href="{{ env('GOOGLE_CALENDAR_PUBLIC_URL') }}" class="custom-link" target="_blank">{{ __('You added your event on the Google Calendar.') }}</a>
                    </p>
                    <br />
                    <hr />
                    <br />
                    <p class="mt-1 text-sm text-gray-600">
                        <a href='/attendanceforms' class="custom-link">{{ __('Would you like to create another event?') }}</a>
                    </p>

                </header>

            </div>
        </div>
    </div>
</x-app-layout>
