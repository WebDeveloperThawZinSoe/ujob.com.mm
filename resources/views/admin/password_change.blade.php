@extends('admin.layouts.app')
@section('style')

@endsection

@section('breadcrumb')

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h4>Change Password</h4>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('change_password') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="old_password" class="form-label">Old Password</label>
                        <div class="input-group">
                            <input type="password" id="old_password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" required>
                            <button class="btn btn-outline-secondary toggle-password" type="button" data-target="old_password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('old_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <div class="input-group">
                            <input type="password" id="new_password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                            <button class="btn btn-outline-secondary toggle-password" type="button" data-target="new_password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('new_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <div class="input-group">
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" required>
                            <button class="btn btn-outline-secondary toggle-password" type="button" data-target="new_password_confirmation">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('new_password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Password Toggle Script --}}
<script>
    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', function () {
            let targetInput = document.getElementById(this.getAttribute('data-target'));
            if (targetInput.type === 'password') {
                targetInput.type = 'text';
                this.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                targetInput.type = 'password';
                this.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    });
</script>

{{-- FontAwesome for icons (if not included in your template) --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection

@section('script')

@endsection
