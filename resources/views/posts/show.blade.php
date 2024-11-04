<x-head />
    <main>
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="group relative flex items-center mx-4 my-4">
                    <img src="https://i.postimg.cc/bNnmBR2n/logo.png" alt="Blog Logo" class="h-12 w-12 rounded-full mr-4">
                    <h2 class="text-pretty text-4xl font-semibold tracking-tight text-neutral-900 sm:text-5xl">
                        {{ $post->title }}
                    </h2>
                </div>

                <div class="group relative flex items-center mx-4 my-4 border-t border-neutral-200">
                    <article class="w-full mt-4 border-solid border-0 border-neutral-200 rounded-md bg-neutral-100">
                        <p class="text-base text-neutral-600 mx-4 my-4">
                            {{ $post->body }}
                        </p>
                        <div class="relative flex items-center mx-4 my-4">
                            <div class="text-sm/6">
                                <p class="font-semibold text-amber-600">Author: <span class="font-normal text-neutral-600">{{ $post->author->full_name }}</span></p>
                                <p class="font-semibold text-amber-600">Posted: <span class="font-normal text-neutral-600">{{ $post->created_at->format('F j, Y, g:i a') }}</span></p>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="group relative flex items-center mx-4 my-4">
                    <a href="{{ route('posts.index') }}" class="mr-4 rounded-md bg-neutral-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-neutral-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-600"> 
                        Go back 
                    </a>
                    <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="mr-4 rounded-md bg-amber-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600"> 
                        Edit 
                    </a>
                    <form action="{{ route('posts.delete', ['id' => $post->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-md bg-amber-700 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-amber-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-700">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>     
    </main>
<x-foot />