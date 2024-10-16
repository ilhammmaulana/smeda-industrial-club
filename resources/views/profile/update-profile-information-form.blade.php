<section class="mb-8">
    <div class="card">
        <div class="card-header mt-8">
            <div>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Profile Information') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Update your account's profile information and email address.") }}
                </p>
            </div>
        </div>
        <div class="card-body">
            <form id="modalForm" method="POST" action="{{ route('profile.update') }}">
                @method('PATCH')
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label required">Name</label>
                            <input type="text" name="name" class="form-control" required
                                value='{{ old('namep', $user->name) }}'>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label required">Email</label>
                            <input type="text" name="email" class="form-control mb-2" required
                                value='{{ old('email', $user->email) }}'>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="role" class="form-label required">Role</label>
                            <input type="text" name="role" class="form-control" disabled required
                                value='{{ old('role', $user->role) }}'>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-3" form="modalForm">Update</button>
            </form>
        </div>
    </div>
</section>