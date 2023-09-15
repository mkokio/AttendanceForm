<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->name }}{{ __('のプロファイル') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="p-4 p-4 bg-white shadow-sm rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="p-4 p-4 bg-white shadow-sm rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="p-4 p-4 bg-white shadow-sm rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
