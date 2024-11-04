<x-head />
    <main>
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">

                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-pretty text-4xl font-semibold tracking-tight text-neutral-900 sm:text-5xl">Discover new ideas</h2>
                </div>

                <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-8 border-t border-neutral-200 pt-10 sm:mt-8 sm:pt-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
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
                                    <a href="{{ route('posts.show.get', ['id' => $post->id]) }}" class="mr-2 rounded-md bg-amber-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">
                                        Read more
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
    </main>
<x-foot />