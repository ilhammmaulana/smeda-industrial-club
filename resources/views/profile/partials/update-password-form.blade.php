<section class="mb-8">
    <div class="card">
        <div class="card-header mt-8">
            <div>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Update Password') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </p>
            </div>
        </div>
        <div class="card-body">
            <form id="modalFormPassword" method="POST" action="{{ route('profile.update-password') }}">
                @method('PATCH')
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="current_password" class="form-label required">Current Password</label>
                            <input type="password" name="current_password" class="form-control" required
                                value='{{ old('current_password') }}'>
                            @error('current_password')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="new_password" class="form-label required">New Password</label>
                            <input type="password" name="new_password" class="form-control" required
                                value='{{ old('new_password') }}'>
                            @error('new_password')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="confirm_new_password" class="form-label required">Confirm Password</label>
                            <input type="password" name="confirm_new_password" class="form-control" required
                                value='{{ old('confirm_new_password') }}'>
                            @error('confirm_new_password')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary mt-3" form="modalFormPassword">Update</button>
            </form>
        </div>
    </div>
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
            });
        })
    </script>
    @endif
</section>