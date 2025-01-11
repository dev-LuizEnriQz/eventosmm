<x-guest-layout>
    <div class="card mt-5">
        <div class="card-header">
            Registro de Usuario
        </div>
        <div class="card-body">
            {{--Imagen del Logo--}}
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{asset('storage/images/logo_mm.svg')}}" alt="Logo" width="300" height="280" class=" img-fluid me-2"/>
            </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" class="form-label" :value="__('Nombre')" />
                        <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" class="form-label" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" class="form-label" :value="__('Password')" />

                        <x-text-input id="password" class="form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" class="form-label" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="form-control"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="btn btn-primary ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
        </div>
        <div class="card-footer">
            Cualquier inconsistencia favor de Notificarla.
        </div>
    </div>
</x-guest-layout>
