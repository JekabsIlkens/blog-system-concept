<nav class="bg-neutral-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://i.postimg.cc/bNnmBR2n/logo.png" alt="Blog Logo">
                </div>
                <div class="hidden md:block ml-10">
                    <div class="flex items-baseline space-x-4">
                        <a href="{{ route('welcome.get') }}" class="{{ Request::is('/') ? 'bg-neutral-900 text-white' : 'text-neutral-300 hover:bg-neutral-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Welcome</a>
                        <a href="{{ route('posts.index.get') }}" class="{{ Request::is('posts') ? 'bg-neutral-900 text-white' : 'text-neutral-300 hover:bg-neutral-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Posts</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block ml-auto">
                <div class="flex items-baseline space-x-4">
                    @if(Auth::check())
                        <form action="{{ route('logout.post') }}" method="POST">
                            @csrf
                            <button type="submit" class='text-neutral-300 hover:bg-neutral-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium'>
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('register.get') }}" class="{{ Request::is('register') ? 'bg-neutral-900 text-white' : 'text-neutral-300 hover:bg-neutral-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Register</a>
                        <a href="{{ route('login.get') }}" class="{{ Request::is('login') ? 'bg-neutral-900 text-white' : 'text-neutral-300 hover:bg-neutral-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Login</a>
                    @endif
                </div>
            </div>
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <a href="{{ route('welcome.get') }}" class="{{ Request::is('/') ? 'bg-neutral-900 text-white' : 'text-neutral-300 hover:bg-neutral-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Welcome</a>
                    <a href="{{ route('posts.index.get') }}" class="{{ Request::is('posts') ? 'bg-neutral-900 text-white' : 'text-neutral-300 hover:bg-neutral-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Posts</a>
                    @if(Auth::check())
                        <form action="{{ route('logout.post') }}" method="POST">
                            @csrf
                            <button type="submit" class='text-neutral-300 hover:bg-neutral-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium'>
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('register.get') }}" class="{{ Request::is('register') ? 'bg-neutral-900 text-white' : 'text-neutral-300 hover:bg-neutral-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Register</a>
                        <a href="{{ route('login.get') }}" class="{{ Request::is('login') ? 'bg-neutral-900 text-white' : 'text-neutral-300 hover:bg-neutral-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>