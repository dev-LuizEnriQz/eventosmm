<x-guest-layout>
    <div class="card mt-5">
        <div class="card-header">
            Inicio de sesión
        </div>
        <div class="card-body">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{--Imagen del Logo--}}
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{asset('storage/images/logo_mm.svg')}}" alt="Logo" width="300" height="280" class=" img-fluid me-2"/>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" class="form-label" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" class="form-label" :value="__('Password')" />

                    <x-text-input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="form-check mt-4">
                    <label for="remember_me" class="form-check-label">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <span class="ms-2 text-sm">{{ __('Recuerdame') }}</span>
                    </label>
                </div>

                <div class="row justify-content-md-center mt-4">
                    <x-primary-button class="btn btn-primary col-md-2">
                        {{ __('Ingresar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <div class="card-footer">
            Cualquier inconsistencia favor de Notificarla.
        </div>
    </div>
</x-guest-layout>
