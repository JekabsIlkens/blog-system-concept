<x-app>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex min-h-full flex-col justify-center px-6 py-6 lg:px-8 bg-white shadow-sm sm:rounded-lg">

            <x-auth-header header="Sign up for a new account" />
                      
            <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div>
                        <x-input-label for="full_name" value="Full name" />
                        <x-input-field id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" />

                        <x-input-error for="full_name" />
                    </div>
    
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-input-field id="email" name="email" type="email" value="{{ old('email') }}" />

                        <x-input-error for="email" />
                    </div>
                      
                    <div>
                        <x-input-label for="password" value="Password" />
                        <x-input-field id="password" name="password" type="password" value="{{ old('password') }}" />

                        <x-input-error for="password" />
                        <x-server-error for="error" />
                    </div>
                      
                    <div>
                        <x-primary-button class="flex w-full justify-center">
                            Sign up
                        </x-primary-button>
                    </div>
                </form>
                      
                <div class="mt-4 text-center">
                    <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-amber-600 hover:text-amber-500">
                        Access an existing account
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</x-app>
