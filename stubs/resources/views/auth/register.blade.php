@extends('tabler::layouts.auth')

@section('content')
    <form action="{{ route('register') }}" method="POST" autocomplete="off" novalidate>
        @csrf

        <x-tabler::cards.card class="card-md">
            <x-tabler::cards.body>
                <h2 class="card-title mb-4 text-center">Create new account</h2>

                <x-tabler::forms.input type="text" name="name" label="Name" placeholder="Enter name" :value="old('name')"
                    autofocus required />

                <x-tabler::forms.input type="email" name="email" label="Email address" placeholder="Enter email"
                    :value="old('email')" autocomplete="email" required />

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <x-tabler::forms.input-group class="input-group-flat">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" autocomplete="new-password">
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

                <div class="mb-3">
                    <label class="form-check @error('terms') is-invalid @enderror">
                        <input type="checkbox" name="terms" class="form-check-input" {{ old('terms') ? 'checked' : '' }}>
                        <span class="form-check-label">
                            Agree the <a href="{{ url('/terms') }}" tabindex="-1">terms and policy</a>.
                        </span>
                    </label>
                    @error('terms')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-footer">
                    <x-tabler::button type="submit" color="primary" fullWidth>
                        Create new account
                    </x-tabler::button>
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </form>
@endsection

@section('footer')
    <div class="text-secondary mt-3 text-center">
        Already have account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
    </div>
@endsection
