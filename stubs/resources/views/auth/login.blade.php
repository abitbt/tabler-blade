@extends('tabler::layouts.auth')

@section('content')
    <x-tabler::cards.card class="card-md">
        <x-tabler::cards.body>
            <h2 class="h2 mb-4 text-center">Login to your account</h2>

            <form action="{{ route('login') }}" method="POST" autocomplete="off" novalidate>
                @csrf

                <x-tabler::forms.input type="email" name="email" label="Email address" placeholder="your@email.com"
                    :value="old('email')" autocomplete="email" autofocus required />

                <div class="mb-2">
                    <label class="form-label">
                        Password
                        <span class="form-label-description">
                            <a href="{{ route('password.request') }}">I forgot password</a>
                        </span>
                    </label>
                    <x-tabler::forms.input-group class="input-group-flat">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Your password" autocomplete="current-password">
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

                <x-tabler::forms.checkbox name="remember" :checked="old('remember')" :wrapper="false">
                    Remember me on this device
                </x-tabler::forms.checkbox>

                <div class="form-footer">
                    <x-tabler::button type="submit" color="primary" fullWidth>
                        Sign in
                    </x-tabler::button>
                </div>
            </form>
        </x-tabler::cards.body>
    </x-tabler::cards.card>
@endsection

@section('footer')
    <div class="text-secondary mt-3 text-center">
        Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
    </div>
@endsection
