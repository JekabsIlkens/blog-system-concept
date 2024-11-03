<x-head />
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img class="mx-auto h-16 w-auto" src="https://i.postimg.cc/bNnmBR2n/logo.png" alt="Blog Logo">
                    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-neutral-900">Sign up for a new account</h2>
                </div>
                      
                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="{{ route('register.post') }}" method="POST">
                        @csrf
                        <div>
                            <label for="full-name" class="block text-sm/6 font-medium text-neutral-900">Full name</label>
                            <div class="mt-2">
                                <input id="full-name" name="full-name" type="text" value="{{ old('full-name') }}" class="block w-full rounded-md border-0 px-1.5 py-1.5 text-neutral-900 shadow-sm ring-1 ring-inset ring-neutral-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm/6">
                            </div>
                            @error('full-name')
                                <div class="block text-sm/6 font-medium text-amber-600">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="email" class="block text-sm/6 font-medium text-neutral-900">Email address</label>
                            </div>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" value="{{ old('email') }}" class="block w-full rounded-md border-0 px-1.5 py-1.5 text-neutral-900 shadow-sm ring-1 ring-inset ring-neutral-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm/6">
                            </div>
                            @error('email')
                                <div class="block text-sm/6 font-medium text-amber-600">{{ $message }}</div>
                            @enderror
                        </div>
                      
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm/6 font-medium text-neutral-900">Password</label>
                            </div>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" value="{{ old('password') }}" class="block w-full rounded-md border-0 px-1.5 py-1.5 text-neutral-900 shadow-sm ring-1 ring-inset ring-neutral-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm/6">
                            </div>
                            @error('password')
                                <div class="block text-sm/6 font-medium text-amber-600">{{ $message }}</div>
                            @enderror
                        </div>
                      
                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-amber-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">
                                Sign up
                            </button>
                        </div>
                    </form>
                      
                    <p class="mt-10 text-center text-sm/6 text-neutral-500"> Already have an account?
                        <a href="{{ route('login.get') }}" class="font-semibold text-amber-600 hover:text-amber-500">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </main>
<x-foot />