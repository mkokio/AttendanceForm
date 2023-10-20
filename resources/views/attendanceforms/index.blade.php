<x-app-layout>
    <div>
        <form method="POST" action="{{ route('attendanceforms.store') }}">
            @csrf

            <x-input-date name="日付" for="日付" label="{{ __('Date') }}" type="date"></x-input-date>

            <x-dropdown-list name="種別" placeholder="{{  __('Please select') }}" for="種別" label="{{ __('Type:') }}">
                <option value="休暇">{{ __('Day Off') }}</option>
                <option value="遅刻">{{ __('Arrive Late') }}</option>
                <option value="早退">{{ __('Leave Early') }}</option>
                <option value="その他">{{ __('Other') }}</option>
            </x-dropdown-list>

            <x-input-field name="その他備考" for="その他備考" label="{{  __('Other Remarks:') }}" type="text" rows="4" maxlength="1000"></x-input-field>

            <div class="mb-3 text-muted">
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
            <hr />
            <br />

            @auth
                <x-input-label for="入力者" value="{{  __('Created by:') }}" />
                <x-text-input placeholder="{{ Auth::user()->name }}" id="入力者" name="入力者" type="text" value="{{ Auth::user()->name }}"/>
            @endauth

            <x-input-date name="入力日" for="入力日" label="{{  __('Created on:') }}" type="date" value="{{ now()->format('Y-m-d') }}" required></x-input-date>

            <x-primary-button>{{ __('Submit') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
