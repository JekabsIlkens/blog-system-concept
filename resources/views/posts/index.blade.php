<x-app-layout>
    <div class="bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-pretty text-4xl font-semibold tracking-tight text-neutral-900 sm:text-5xl">Discover new ideas</h2>
            </div>
            <div class="inline-block mt-4">
                <form action="{{ route('posts.search') }}" method="GET">
                    <div class="flex">
                        <input name="query" type="text" placeholder="Search for keywords..." value="{{ old('query') }}" class="block w-full rounded-md border-0 px-1.5 py-1.5 mr-2 text-neutral-900 shadow-sm ring-1 ring-inset ring-neutral-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm/6">
                        <button type="submit" class="rounded-md bg-amber-600 px-4 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">
                            Search
                        </button>
                    </div>
                    <div>
                        @error('query')
                            <div class="block text-sm/6 font-medium text-amber-600">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>

            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-8 border-t border-neutral-200 pt-10 sm:mt-4 sm:pt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @if (!$posts->isEmpty())
                    @foreach ($posts as $post)
                        <article class="flex max-w-xl flex-col items-start justify-between border-solid border-2 border-neutral-200 rounded-md bg-neutral-100">
                            <div class="group relative flex items-center mx-4 my-4">
                                <img src="https://i.postimg.cc/bNnmBR2n/logo.png" alt="Blog Logo" class="h-8 w-8 rounded-full mr-2">
                                <h3 class="mt-3 text-lg/6 font-semibold text-neutral-900">
                                    {{ $post->title }}
                                </h3>
                            </div>
                            <p class="line-clamp-3 text-sm/6 text-neutral-600 mx-4 my-4">
                                {{ $post->body }}
                            </p>
                            <div class="relative flex items-center mx-4 my-4">
                                <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="mr-2 rounded-md bg-amber-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">
                                    Read
                                </a>
                                <div class="text-sm/6">
                                    <p class="font-semibold text-amber-600">Author: <span class="font-normal text-neutral-600">{{ $post->author_name }}</span></p>
                                    <p class="font-semibold text-amber-600">Posted: <span class="font-normal text-neutral-600">{{ $post->created_at->format('F j, Y, g:i a') }}</span></p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                @else
                    <h3 class="mt-3 text-lg/6 font-semibold text-neutral-600">
                        Nothing has been posted yet...
                    </h3>  
                @endif
            </div>
        </div>
    </div>     
</x-app-layout>
