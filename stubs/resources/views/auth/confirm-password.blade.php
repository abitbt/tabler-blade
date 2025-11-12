@extends('tabler::layouts.auth')

@section('content')
    <form action="{{ route('password.confirm') }}" method="POST" autocomplete="off" novalidate>
        @csrf

        <x-tabler::cards.card class="card-md">
            <x-tabler::cards.body>
                <h2 class="card-title mb-4 text-center">Confirm Password</h2>

                <p class="text-secondary mb-4">This is a secure area of the application. Please confirm your password
                    before continuing.</p>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <x-tabler::forms.input-group class="input-group-flat">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Your password" autofocus>
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

                <div class="form-footer">
                    <x-tabler::button type="submit" color="primary" fullWidth icon="lock">
                        Confirm
                    </x-tabler::button>
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </form>
@endsection
