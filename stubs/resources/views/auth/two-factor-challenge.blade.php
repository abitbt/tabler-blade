@extends('tabler::layouts.auth')

@section('content')
    <form action="{{ url('/two-factor-challenge') }}" method="POST" autocomplete="off" novalidate x-data="{ recovery: false }">
        @csrf

        <x-tabler::cards.card class="card-md">
            <x-tabler::cards.body>
                <h2 class="card-title card-title-lg mb-4 text-center">Authenticate Your Account</h2>

                <div x-show="! recovery">
                    <p class="my-4 text-center">Please confirm access to your account by entering the authentication code
                        provided by your authenticator application.</p>

                    <div class="my-5">
                        <div class="row g-4">
                            <div class="col">
                                <div class="row g-2">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-lg px-3 py-3 text-center"
                                            maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input autofocus>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control form-control-lg px-3 py-3 text-center"
                                            maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control form-control-lg px-3 py-3 text-center"
                                            maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row g-2">
                                    <div class="col">
                                        <input type="text" class="form-control form-control-lg px-3 py-3 text-center"
                                            maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control form-control-lg px-3 py-3 text-center"
                                            maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control form-control-lg px-3 py-3 text-center"
                                            maxlength="1" inputmode="numeric" pattern="[0-9]*" data-code-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="code" x-ref="code">
                </div>

                <div x-show="recovery" style="display: none;">
                    <p class="my-4 text-center">Please confirm access to your account by entering one of your emergency
                        recovery codes.</p>

                    <x-tabler::forms.input type="text" name="recovery_code" label="Recovery Code"
                        placeholder="Enter recovery code" x-ref="recovery_code" />
                </div>

                @error('code')
                    <x-tabler::alert color="danger" class="mb-3">
                        {{ $message }}
                    </x-tabler::alert>
                @enderror

                <div class="form-footer">
                    <div class="btn-list flex-nowrap">
                        <x-tabler::button type="button" fullWidth @click="recovery = ! recovery"
                            x-text="recovery ? 'Use authentication code' : 'Use recovery code'">
                            Use recovery code
                        </x-tabler::button>
                        <x-tabler::button type="submit" color="primary" fullWidth>
                            Verify
                        </x-tabler::button>
                    </div>
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </form>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var inputs = document.querySelectorAll('[data-code-input]');

                // Attach an event listener to each input element
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener('input', function(e) {
                        // If the input field has a character, and there is a next input field, focus it
                        if (e.target.value.length === e.target.maxLength && i + 1 < inputs.length) {
                            inputs[i + 1].focus();
                        }

                        // Update hidden field
                        updateCode();
                    });

                    inputs[i].addEventListener('keydown', function(e) {
                        // If the input field is empty and the keyCode for Backspace (8) is detected, and there is a previous input field, focus it
                        if (e.target.value.length === 0 && e.keyCode === 8 && i > 0) {
                            inputs[i - 1].focus();
                        }
                    });
                }

                function updateCode() {
                    let code = '';
                    inputs.forEach(input => code += input.value);
                    document.querySelector('[name="code"]').value = code;
                }
            });
        </script>
    @endpush
@endsection
