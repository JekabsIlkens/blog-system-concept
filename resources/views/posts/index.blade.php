<x-app-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="group relative flex items-center justify-between px-4 py-4 bg-white shadow-md rounded-md">
                
                <x-page-header header="Discover new ideas" />

                <form action="{{ route('posts.search') }}" method="GET" class="flex items-center">

                    <div><x-input-error for="query" class="mr-2" /></div>

                    <div class="flex">
                        <x-input-field name="query" type="text" placeholder="Search for keywords..." value="{{ old('query') }}" />
                        <x-primary-button class="ml-2">
                            Search
                        </x-primary-button>
                    </div>

                </form>
            </div>

            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-8 pt-10 sm:pt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @if (!$posts->isEmpty())
                    @foreach ($posts as $post)
                        <article class="flex max-w-xl flex-col items-start justify-between bg-white shadow-md rounded-md">

                            <x-post-header :header="$post->title" />

                            <p class="line-clamp-3 text-sm text-neutral-600 mx-4 my-4">
                                {{ $post->body }}
                            </p>

                            <div class="relative flex items-center mx-4 my-4">
                                <x-nav-link href="{{ route('posts.show', $post) }}" class="mr-2 rounded-md shadow-md text-white bg-amber-600 hover:bg-amber-500">
                                    Read
                                </x-nav-link>

                                <x-post-footer :author="$post->author->full_name" :date="$post->created_at->format('F j, Y, g:i a')" />
                            </div>

                        </article>
                    @endforeach
                @else
                    <h3 class="mt-3 text-lg/6 font-semibold text-neutral-600">
                        Nothing has been posted yet...
                    </h3>  
                @endif
            </div>

            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        </div>
    </div>     
</x-app-layout>
