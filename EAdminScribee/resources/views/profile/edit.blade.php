@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>

    <form id="profileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name', $user->name) }}" required>
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <!-- Profile Image Field -->
        <div class="form-group">
            <label for="profile_picture">Profile Image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="profile_picture" id="profile_picture" class="custom-file-input{{ $errors->has('profile_picture') ? ' is-invalid' : '' }}" accept="image/*">
                    <label class="custom-file-label" for="profile_picture">Update Profile Picture</label>
                </div>
            </div>
            @if ($errors->has('profile_picture'))
                <div class="invalid-feedback">
                    {{ $errors->first('profile_picture') }}
                </div>
            @endif

            <!-- Display current profile image -->
            @if ($user->profile_picture)
                <img src="{{ Storage::url('profile_pictures/' . $user->profile_picture) }}" alt="Profile Image" class="img-thumbnail mt-2" style="max-width: 150px;">
            @else
                <p>No profile image available.</p>
            @endif
        </div>

        <!-- Signature Image Field -->
        <div class="form-group">
            <label for="signature_picture">Signature Image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="signature_picture" id="signature_picture" class="custom-file-input{{ $errors->has('signature_picture') ? ' is-invalid' : '' }}" accept="image/*">
                    <label class="custom-file-label" for="signature_picture">Update Signature</label>
                </div>
            </div>
            @if ($errors->has('signature_picture'))
                <div class="invalid-feedback">
                    {{ $errors->first('signature_picture') }}
                </div>
            @endif

            <!-- Display current signature image -->
            @if ($user->signature_picture)
                <img src="{{ Storage::url('signature_pictures/' . $user->signature_picture) }}" alt="Signature Image" class="img-thumbnail mt-2" style="max-width: 150px;">
            @else
                <p>No signature image available.</p>
            @endif
        </div>

        <!-- Current Password Field -->
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <div class="input-group">
                <input type="password" name="current_password" id="current_password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" placeholder="Current Password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="toggleCurrentPassword"><i class="fa fa-eye"></i></button>
                </div>
            </div>
            @if ($errors->has('current_password'))
                <div class="invalid-feedback">
                    {{ $errors->first('current_password') }}
                </div>
            @endif
        </div>

        <!-- New Password Field -->
        <div class="form-group">
            <label for="new_password">New Password</label>
            <div class="input-group">
                <input type="password" name="new_password" id="new_password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" placeholder="New Password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword"><i class="fa fa-eye"></i></button>
                </div>
            </div>
            @if ($errors->has('new_password'))
                <div class="invalid-feedback">
                    {{ $errors->first('new_password') }}
                </div>
            @endif
        </div>

        <!-- Confirm New Password Field -->
        <div class="form-group">
            <label for="new_password_confirmation">Confirm New Password</label>
            <div class="input-group">
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Confirm New Password">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword"><i class="fa fa-eye"></i></button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePasswordVisibility = (toggleButtonId, passwordFieldId) => {
            const toggleButton = document.getElementById(toggleButtonId);
            const passwordField = document.getElementById(passwordFieldId);
            toggleButton.addEventListener('click', () => {
                const type = passwordField.type === 'password' ? 'text' : 'password';
                passwordField.type = type;
                const icon = toggleButton.querySelector('i');
                icon.classList.toggle('fa-eye', type === 'password');
                icon.classList.toggle('fa-eye-slash', type === 'text');
            });
        };

        togglePasswordVisibility('toggleCurrentPassword', 'current_password');
        togglePasswordVisibility('toggleNewPassword', 'new_password');
        togglePasswordVisibility('toggleConfirmPassword', 'new_password_confirmation');

        // Validate form before submission
        document.getElementById('profileForm').addEventListener('submit', function (event) {
            const currentPassword = document.getElementById('current_password').value;
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('new_password_confirmation').value;

            if (newPassword && (!currentPassword || newPassword !== confirmPassword)) {
                event.preventDefault(); // Stop form from submitting
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Current password is required if you are changing the password and new passwords must match.',
                    confirmButtonText: 'Ok'
                });
            }
        });

        // Show SweetAlert2 for session status
        @if (session('status'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('status') }}',
                confirmButtonText: 'Ok'
            });
        @endif

        // Show SweetAlert2 for form errors
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Error',
                html: `<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
                confirmButtonText: 'Ok'
            });
        @endif
    });
</script>
@endsection
@endsection
