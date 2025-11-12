@extends('tabler::layouts.auth')

@section('content')
    <form action="{{ route('password.update') }}" method="POST" autocomplete="off" novalidate>
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <x-tabler::cards.card class="card-md">
            <x-tabler::cards.body>
                <h2 class="card-title mb-4 text-center">Reset password</h2>

                <p class="text-secondary mb-4">Enter your email address and your new password.</p>

                <x-tabler::forms.input type="email" name="email" label="Email address" placeholder="Enter email"
                    :value="old('email', $email ?? '')" autofocus required />

                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <x-tabler::forms.input-group class="input-group-flat">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="New password" autocomplete="new-password">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"
                                aria-label="Show password">
                                <x-tabler-eye class="icon" />
                            </a>
                        </span>
                    </x-tabler::forms.input-group>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <x-tabler::forms.input-group class="input-group-flat">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirm password" autocomplete="new-password">
                        <span class="input-group-text">
                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"
                                aria-label="Show password">
                                <x-tabler-eye class="icon" />
                            </a>
                        </span>
                    </x-tabler::forms.input-group>
                </div>

                <div class="form-footer">
                    <x-tabler::button type="submit" color="primary" fullWidth icon="lock">
                        Reset password
                    </x-tabler::button>
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </form>
@endsection

@section('footer')
    <div class="text-secondary mt-3 text-center">
        Remember your password? <a href="{{ route('login') }}">Sign in</a>
    </div>
@endsection
