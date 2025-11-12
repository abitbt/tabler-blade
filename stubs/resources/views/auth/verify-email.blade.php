@extends('tabler::layouts.auth')

@section('content')
    <x-tabler::cards.card class="card-md">
        <x-tabler::cards.body class="text-center">
            <div class="mb-4">
                <x-tabler-mail-opened class="icon icon-lg text-primary mb-3" style="width: 5rem; height: 5rem;" />
                <h2 class="card-title">Verify your email address</h2>
            </div>

            @if (session('status') == 'verification-link-sent')
                <x-tabler::alert color="success" class="text-start">
                    A new verification link has been sent to the email address you provided during registration.
                </x-tabler::alert>
            @endif

            <p class="text-secondary mb-4">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the
                link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </p>

            <div class="d-flex justify-content-center gap-2">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-tabler::button type="submit" color="primary" icon="mail">
                        Resend Verification Email
                    </x-tabler::button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-tabler::button type="submit">
                        Log Out
                    </x-tabler::button>
                </form>
            </div>
        </x-tabler::cards.body>
    </x-tabler::cards.card>
@endsection
