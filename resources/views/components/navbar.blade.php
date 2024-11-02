<nav class="bg-neutral-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 justify-around">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://i.postimg.cc/bNnmBR2n/logo.png" alt="Blog Logo">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'bg-neutral-900 text-white' : 'text-neutral-300 hover:bg-neutral-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Welcome</a>
                        <a href="{{ url('/register') }}" class="{{ Request::is('register') ? 'bg-neutral-900 text-white' : 'text-neutral-300 hover:bg-neutral-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Register</a>
                        <a href="{{ url('/login') }}" class="{{ Request::is('login') ? 'bg-neutral-900 text-white' : 'text-neutral-300 hover:bg-neutral-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>