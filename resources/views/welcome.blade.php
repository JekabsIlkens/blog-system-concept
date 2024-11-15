<x-app-layout>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="relative isolate px-6 pt-14 lg:px-8 bg-[url('https://i.postimg.cc/ZqsfdpgT/bsc-welcome.jpg')] bg-cover bg-center shadow-md rounded-md">
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">

                    <h1 class="text-balance text-5xl font-semibold tracking-tight text-neutral-800 sm:text-6xl">
                        Blog System Concept
                    </h1>

                    <p class="mt-8 pl-8 pr-8 text-pretty text-lg font-medium text-neutral-600 sm:text-lg/6">
                        Share your ideas and knowledge with the world by creating your own blog posts 
                        and indulge in interesting conversations with other like-minded people!
                    </p>

                    <div class="mt-10 flex items-center justify-center gap-x-6">

                        <x-nav-link href="{{ route('posts.index') }}" class="rounded-md shadow-md text-white bg-amber-600 hover:bg-amber-500">
                            Discover new ideas
                        </x-nav-link>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
