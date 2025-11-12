@extends('tabler::layouts.auth')

@section('content')
    <form action="{{ route('password.email') }}" method="POST" autocomplete="off" novalidate>
        @csrf

        <x-tabler::cards.card class="card-md">
            <x-tabler::cards.body>
                <h2 class="card-title mb-4 text-center">Forgot password</h2>

                @if (session('status'))
                    <x-tabler::alert color="success" class="mb-4">
                        {{ session('status') }}
                    </x-tabler::alert>
                @endif

                <p class="text-secondary mb-4">Enter your email address and we will send you a password reset link that will
                    allow you to choose a new one.</p>

                <x-tabler::forms.input type="email" name="email" label="Email address" placeholder="Enter email"
                    :value="old('email')" autofocus required />

                <div class="form-footer">
                    <x-tabler::button type="submit" color="primary" fullWidth icon="mail">
                        Send Password Reset Link
                    </x-tabler::button>
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </form>
@endsection

@section('footer')
    <div class="text-secondary mt-3 text-center">
        Forget it, <a href="{{ route('login') }}">send me back</a> to the sign in screen.
    </div>
@endsection
