<x-app-layout>
    <div>
        <form method="POST" action="{{ route('attendanceforms.store') }}">

            @csrf
            <x-input-date name="日付" for="日付" label="日付:" type="date"></x-input-date>
            
            <x-dropdown-list name="種別" placeholder="選択してください" for="種別" label="種別:" type="select">
                <option value="オプション１">オプション１</option>
                <option value="オプション２">オプション２</option>
                <option value="オプション３">オプション３</option>
            </x-dropdown-list>
            
            <x-input-field name="その他備考" for="その他備考" label="その他備考:" type="text" rows="4" maxlength="1000"></x-input-field>
            
            <x-input-field name="入力者" for="入力者" label="入力者:" type="text"></x-input-field>
            

            <x-input-date name="入力日" for="入力日" label="入力日:" type="date"></x-input-date>

            <x-primary-button>{{ __('登録') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>