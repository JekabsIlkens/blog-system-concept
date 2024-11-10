<nav class="bg-white shadow-md">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">

                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://i.postimg.cc/bNnmBR2n/logo.png" alt="Blog Logo">
                </div>

                <div class="hidden md:block ml-10">
                    <div class="flex items-baseline space-x-4">

                        <x-nav-link href="{{ route('welcome') }}" class="{{ Request::is('/') ? 'text-neutral-800 border-b-2 border-amber-600' : 'text-neutral-800 hover:border-b-2 hover:border-neutral-600' }} ">
                            Welcome
                        </x-nav-link>

                        <x-nav-link href="{{ route('posts.index') }}" class="{{ Request::is('posts') ? 'text-neutral-800 border-b-2 border-amber-600' : 'text-neutral-800 hover:border-b-2 hover:border-neutral-600' }} ">
                            Discover
                        </x-nav-link>

                        @if(Auth::check())
                            <x-nav-link href="{{ route('posts.create') }}" class="{{ Request::is('posts/create') ? 'text-neutral-800 border-b-2 border-amber-600' : 'text-neutral-800 hover:border-b-2 hover:border-neutral-600' }} ">
                                Write
                            </x-nav-link>
                        @endif

                    </div>
                </div>
            </div>

            <div class="hidden md:block ml-auto">
                <div class="flex items-baseline space-x-4">

                    @if(Auth::check())
                        <p class="px-4 py-2 text-sm font-medium text-amber-600 border-b-2 border-amber-600">
                            {{ Auth::user()->full_name }}
                        </p>

                        <form action="{{ route('logout.post') }}" method="POST">
                            @csrf
                            <button type="submit" class='px-4 py-2 text-sm font-medium text-neutral-800 hover:border-b-2 hover:border-neutral-600'>
                                Logout
                            </button>
                        </form>
                    @else
                        <x-nav-link href="{{ route('login') }}" class="{{ Request::is('login') ? 'text-neutral-800 border-b-2 border-amber-600' : 'text-neutral-800 hover:border-b-2 hover:border-neutral-600' }} ">
                            Login
                        </x-nav-link>

                        <x-nav-link href="{{ route('register') }}" class="{{ Request::is('register') ? 'text-neutral-800 border-b-2 border-amber-600' : 'text-neutral-800 hover:border-b-2 hover:border-neutral-600' }} ">
                            Register
                        </x-nav-link>
                    @endif

                </div>
            </div>
        </div>
    </div>
</nav>
