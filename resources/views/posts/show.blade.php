<x-app-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="group relative flex items-center px-4 py-4 bg-white shadow-md rounded-md">
                <x-page-header :header="$post->title" />
            </div>

            <div class="group relative">
                @foreach ($categories as $category)
                    <div class="inline-block rounded-md bg-neutral-500 px-2 py-1 mt-4 text-sm font-semibold text-white shadow-md">
                        {{$category->name}}
                    </div>
                @endforeach

                <article class="w-full mt-4 bg-white shadow-md rounded-md">
                    <p class="text-base text-neutral-800 mx-4 my-4 pt-4">
                        {{ $post->body }}
                    </p>

                    <div class="relative flex items-center mx-4 my-4">
                        <x-post-footer :author="$post->author->full_name" :date="$post->created_at->format('F j, Y, g:i a')" />
                    </div>

                    <div class="relative flex items-center mx-4 my-4 pb-4">
                        @if(Auth::id() === $post->author->id)
                            <x-nav-link href="{{ route('posts.edit', $post) }}" class="rounded-md shadow-md text-white bg-amber-600 hover:bg-amber-500">
                                Edit
                            </x-nav-link>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-flex">
                                @csrf
                                @method('DELETE')
                                <x-danger-button class="ml-4">Delete</x-danger-button>
                            </form>
                        @endif
                    </div>
                </article>
            </div>

            <div class="group relative flex items-center">
                <form action="{{ route('comments.store', $post) }}" method="POST" class="w-full px-4 py-4 bg-white shadow-md rounded-md">
                    @csrf                          
                    <div>
                        <x-input-label for="comment" value="Leave a comment:" />
                        <x-input-area id="comment" name="comment" type="text" value="{{ old('comment') }}"></x-input-area>

                        <x-input-error for="comment" />
                    </div>
                          
                    <div class="group relative flex items-center mt-2">
                        <x-primary-button>Comment</x-primary-button>
                    </div>
                </form>
            </div>

            <div class="group relative">
                @foreach ($comments as $comment)
                    <article class="w-full mt-4 bg-white shadow-md rounded-md">
                        <p class="font-semibold text-amber-600 pt-4 pb-2 pl-4 pr-4">{{ $comment->user->full_name }}<span class="text-neutral-600"> commented:</span></p>
                        <p class="text-base text-neutral-600 pl-4 pr-4">{{ $comment->comment }}</p>
                        <p class="text-base text-neutral-600 pt-2 pb-4 pl-4 pr-4">{{ $comment->created_at->format('F j, Y, g:i a') }}</p>

                        @if(Auth::id() === $comment->user_id)
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-danger-button class="ml-4 mb-4">Delete</x-danger-button>
                            </form>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </div>     
</x-app-layout>
