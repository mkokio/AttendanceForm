<x-app-layout>
    <div>
        <form method="POST" action="{{ route('attendanceforms.store') }}">
            @csrf

            <x-input-date name="日付" for="日付" label="日付:" type="date"></x-input-date>

            <x-dropdown-list name="種別" placeholder="選択してください" for="種別" label="種別:">
                <option value="休暇">休暇</option>
                <option value="遅刻">遅刻</option>
                <option value="早退">早退</option>
                <option value="その他">その他</option>
            </x-dropdown-list>

            <x-input-field name="その他備考" for="その他備考" label="その他備考:" type="text" rows="4" maxlength="1000">
                有休を利用します。
◯◯の代休です。
            </x-input-field>
<!--
            <div class="mb-3">
                コピペ用:<br />
                有休を利用します。<br />
                ◯◯の代休です。
            </div>
-->
            <x-radio-button name="タイプ" id="radiotype1" value="有給">
                <label class="form-check-label" for="有給">
                    有給
                </label>
            </x-radio-button>

            <x-radio-button name="タイプ" id="radiotype2" value="残業">
                <label class="form-check-label" for="残業">
                    残業
                </label>
            </x-radio-button>


            <br />
            <hr />
            <br />

            @auth
                <x-input-label for="入力者" value="入力者:" />
                <x-text-input placeholder="{{ Auth::user()->name }}" id="入力者" name="入力者" type="text" value="{{ Auth::user()->name }}"/>
            @endauth

            <x-input-date name="入力日" for="入力日" label="入力日:" type="date" value="{{ now()->format('Y-m-d') }}" required></x-input-date>

            <x-primary-button>{{ __('登録') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
