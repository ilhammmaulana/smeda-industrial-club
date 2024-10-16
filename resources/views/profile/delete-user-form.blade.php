<section>
    <div class="card">
        <div class="card-header py-8">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Delete Account') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </p>
            <div>
                <x-danger-button x-data="" class="block"
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                    {{ __('Delete Account') }}</x-danger-button>
            </div>
        </div>

        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Are you sure you want to permanently delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Please note that deleting your account will erase all associated data and resources permanently. To proceed, please confirm your decision by entering your password below.') }}
                </p>

                <div class="mt-6">
                    <input type="password" name="password" placeholder="{{ __('Enter your password to confirm') }}"
                        class="form-control" required value='{{ old('password') }}'>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <button type="submit" class="ms-3 btn btn-sm btn-danger">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
</section>