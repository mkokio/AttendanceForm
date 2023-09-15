<section>
    <header>
        <h2 class="text-lg font-weight-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{  __('Once your account is deleted, all of its resources and data will be permanently deleted. Please download any data or information that you wish to retain before deleting your account.') }}
        </p>
    </header>
            <div class="mt-3 space-y-3">
                <x-danger-button data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">{{ __('Delete Account') }}</x-danger-button>
            </div>


    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Are you sure you want to delete your account?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="card-text">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p>

                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>

                        <div class="d-flex justify-content-between">
                            <x-secondary-button data-bs-dismiss="modal">{{ __('Cancel') }}</x-secondary-button>
                            <x-danger-button>{{ __('Delete Account') }}</x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
