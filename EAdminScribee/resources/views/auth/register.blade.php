@extends('layouts.guest')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card mx-4">
            <div class="card-body p-4">

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h1 class="text-center" >{{ trans('panel.site_title') }}</h1>
                    <p class="text-muted" style="text-align: center;">{{ trans('global.register') }}</p>

                    <!-- Name Field -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user fa-fw"></i>
                            </span>
                        </div>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <!-- Email Field -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope fa-fw"></i>
                            </span>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <!-- Faculty Field -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-university fa-fw"></i>
                            </span>
                        </div>
                        <select name="faculty" id="faculty" class="form-control{{ $errors->has('faculty') ? ' is-invalid' : '' }}" required>
                            <option value="">Select Faculty</option>
                            <!-- Faculties will be loaded dynamically here -->
                        </select>
                        @if($errors->has('faculty'))
                            <div class="invalid-feedback">
                                {{ $errors->first('faculty') }}
                            </div>
                        @endif
                    </div>

                    <!-- Department Field -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-book fa-fw"></i>
                            </span>
                        </div>
                        <select name="department" id="department" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" required>
                            <option value="">Select Department</option>
                            <!-- Departments will be loaded dynamically here -->
                        </select>
                        @if($errors->has('department'))
                            <div class="invalid-feedback">
                                {{ $errors->first('department') }}
                            </div>
                        @endif
                    </div>

                    <!-- Password Field -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock fa-fw"></i>
                            </span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                <i class="fa fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <!-- Password Confirmation Field -->
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock fa-fw"></i>
                            </span>
                        </div>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" id="togglePasswordConfirmation">
                                <i class="fa fa-eye" id="eyeIconConfirmation"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Profile Picture Field -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-image fa-fw"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="profile_picture" id="profile_picture" class="custom-file-input{{ $errors->has('profile_picture') ? ' is-invalid' : '' }}" accept="image/*" required>
                            <label class="custom-file-label" for="profile_picture">Profile <i class="fas fa-image    "></i></label>
                        </div>
                        @if($errors->has('profile_picture'))
                            <div class="invalid-feedback">
                                {{ $errors->first('profile_picture') }}
                            </div>
                        @endif
                    </div>
                    <small class="form-text text-muted">
                        The image should be in JPEG, PNG, JPG, or GIF format and less 2 MB.
                    </small>

                    <!-- Signature Picture Field -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-file-signature"></i>
                            </span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="signature_picture" id="signature_picture" class="custom-file-input{{ $errors->has('signature_picture') ? ' is-invalid' : '' }}" accept="image/*" required>
                            <label class="custom-file-label" for="signature_picture">Signature          <i class="fas fa-file-signature"></i></label>
                        </div>
                        @if($errors->has('signature_picture'))
                            <div class="invalid-feedback">
                                {{ $errors->first('signature_picture') }}
                            </div>
                        @endif
                    </div>
                    <small class="form-text text-muted">
                        The image should be in JPEG, PNG, JPG, or GIF format and less then 2 MB.
                    </small>

                    <button class="btn btn-block btn-primary">
                        {{ trans('global.register') }}
                    </button>
                    <br>
                        {{-- <button class="btn btn-block btn-primary">
                            {{ trans('global.login') }}
                        </button> --}}

                </form>

            </div>
        </div>

    </div>
</div>


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Password toggle
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', function() {
        // Toggle the type attribute
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
        // Toggle the eye icon
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });

    // Password confirmation toggle
    const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
    const passwordConfirmation = document.getElementById('password_confirmation');
    const eyeIconConfirmation = document.getElementById('eyeIconConfirmation');

    togglePasswordConfirmation.addEventListener('click', function() {
        // Toggle the type attribute
        const type = passwordConfirmation.type === 'password' ? 'text' : 'password';
        passwordConfirmation.type = type;
        // Toggle the eye icon
        eyeIconConfirmation.classList.toggle('fa-eye');
        eyeIconConfirmation.classList.toggle('fa-eye-slash');
    });
});

</script>
<script>
    $(document).ready(function() {
        // Load faculties when the document is ready
        $.ajax({
            url: '{{ route('faculties.list') }}',
            method: 'GET',
            success: function(data) {
                var facultySelect = $('#faculty');
                facultySelect.empty();
                facultySelect.append('<option value="">Select Faculty</option>');
                $.each(data, function(index, faculty) {
                    facultySelect.append('<option value="' + faculty.id + '">' + faculty.name + '</option>');
                });
            }
        });

        // Load departments based on selected faculty
        $('#faculty').change(function() {
            var facultyId = $(this).val();
            if (facultyId) {
                $.ajax({
                    url: '{{ route('departments.list') }}',
                    method: 'GET',
                    data: { faculty_id: facultyId },
                    success: function(data) {
                        var departmentSelect = $('#department');
                        departmentSelect.empty();
                        departmentSelect.append('<option value="">Select Department</option>');
                        $.each(data, function(index, department) {
                            departmentSelect.append('<option value="' + department.id + '">' + department.name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.log('Error fetching departments:', xhr.responseText);
                    }
                });
            } else {
                $('#department').empty().append('<option value="">Select Department</option>');
            }
        });
    });
</script>

@endsection


@endsection
