<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->name }}{{ __('\'s Attendance Form') }}
        </h2>
    </x-slot>
    <div>
        <form method="POST" action="{{ route('attendanceforms.store') }}">
            @csrf
            
            <x-input-date name="日付" for="日付" label="{{ __('Date') }}" type="date"></x-input-date>
            <x-input-error class="t-0" :messages="$errors->get('日付')" />
            


            <x-dropdown-list name="種別" placeholder="{{  __('Please select') }}" for="種別" label="{{ __('Type:') }}">
                <option value="休暇">{{ __('Day Off') }}</option>
                <option value="遅刻">{{ __('Arrive Late') }}</option>
                <option value="早退">{{ __('Leave Early') }}</option>
                <option value="その他">{{ __('Other') }}</option>
            </x-dropdown-list>
            <x-input-error class="t-0" :messages="$errors->get('種別')" />

            <!-- "遅刻タイム" clock is hidden unless 'Arrive Late' is selected -->
            <!-- Start time will be automatically 0:00 -->
            <div id="lateTimeContainer" style="display: none;">
                <label for="遅刻タイム" class="form-label">{{ __('Arrive Late:') }}</label>
                <x-input-time for="遅刻タイム" />
                <x-input-error class="mt-2" :messages="$errors->get('遅刻タイム')" /> //Can't trigger this error because nullable
            </div>

            <!-- "早退タイム" clock is hidden unless 'Leave Early' is selected -->
            <!-- End time will be automatically 0:00 -->
            <div id="earlyTimeContainer" style="display: none;">
                <label for="早退タイム" class="form-label">{{ __('Leave Early:') }}</label>
                <x-input-time for="早退タイム" />
                <x-input-error class="mt-2" :messages="$errors->get('早退タイム')" /> //Can't trigger this error because nullable
            </div>


            <!-- "Free text" input field hidden unless 'Other' is selected -->
            <div id="フリーテキスト" style="display: none;">
                <x-input-field name="フリーテキスト" for="フリーテキスト" label="{{ __('Free Text:') }}" type="text" rows="4" maxlength="1000"></x-input-field>
            </div>

            <x-input-field name="その他備考" for="その他備考" label="{{  __('Other Remarks:') }}" type="text" rows="4" maxlength="1000"></x-input-field>
            <x-input-error class="t-0" :messages="$errors->get('その他備考')" />


            <div class="mb-3 text-secondary">
                <br />
                {{ __('For Copy-Pasting:') }}<br />
                {{ __('Use Paid Leave') }}<br />
                {{ __('Compensatory Day for...') }}
            </div>

            <br />
            <hr />
            <br />

            <x-radio-button name="タイプ" id="radiotype1" value="有給" checked>
                <label class="form-check-label" for="有給">
                    {{ __('Paid Leave') }}
                </label>
            </x-radio-button>

            <x-radio-button name="タイプ" id="radiotype2" value="残業">
                <label class="form-check-label" for="残業">
                    {{ __('Overtime') }}
                </label>
            </x-radio-button>

            <br />

            @auth
                <x-input-label for="入力者" value="{{  __('Created by:') }}" />
                <x-text-input placeholder="{{ Auth::user()->name }}" id="入力者" name="入力者" type="text" value="{{ Auth::user()->name }}"/>
            @endauth
            <x-input-error class="t-0" :messages="$errors->get('入力者')" />
                

            <x-input-date name="入力日" for="入力日" label="{{  __('Created on:') }}" type="date" value="{{ now()->format('Y-m-d') }}" ></x-input-date>
            <x-input-error class="t-0" :messages="$errors->get('入力日')" />
            
            <br />
            <x-primary-button>{{ __('Submit') }}</x-primary-button>
        </form>
    </div>
    <script>
        // Get the dropdown element and "free text" input container
        const reasonDropdown = document.getElementById('種別');
        const otherReasonContainer = document.getElementById('フリーテキスト');

        // Add change event listener to the dropdown
        reasonDropdown.addEventListener('change', function() {
            // If "Other" is selected, show the "free text" input container; otherwise, hide it
            if (reasonDropdown.value === 'その他') {
                otherReasonContainer.style.display = 'block';
            } else {
                otherReasonContainer.style.display = 'none';
            }
        });

        // Get the containers for "遅刻タイム" and "早退タイム"
        const lateTimeContainer = document.getElementById('lateTimeContainer');
        const earlyTimeContainer = document.getElementById('earlyTimeContainer');

        // Add change event listener to the dropdown
        reasonDropdown.addEventListener('change', function() {
            // Hide both time containers by default
            lateTimeContainer.style.display = 'none';
            earlyTimeContainer.style.display = 'none';

            // Check which option is selected and show the corresponding time container
            if (reasonDropdown.value === '遅刻') {
                lateTimeContainer.style.display = 'block';
            } else if (reasonDropdown.value === '早退') {
                earlyTimeContainer.style.display = 'block';
            }
        });
    </script>
    
</x-app-layout>