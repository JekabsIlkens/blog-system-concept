<x-app-layout>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex min-h-full flex-col justify-center px-6 py-6 lg:px-8 bg-white shadow-md rounded-md">

            <x-auth-header header="Sign in to your account" />
                      
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
                    @csrf
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
                            Sign in
                        </x-primary-button>
                    </div>
                </form>
                      
                <div class="mt-4 text-center">
                    <x-nav-link href="{{ route('posts.index') }}" class="text-amber-600 hover:text-amber-500">
                        Create a new account
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
