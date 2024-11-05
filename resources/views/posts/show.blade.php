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

                <div class="group relative mx-4 my-4 border-t border-neutral-200">
                    <article class="w-full mt-4 border-solid border-0 border-neutral-200 rounded-md bg-neutral-100">
                        <p class="text-base text-neutral-600 mx-4 my-4 pt-4">
                            {{ $post->body }}
                        </p>
                        <div class="relative flex items-center mx-4 my-4 pb-4">
                            <div class="text-sm/6">
                                <p class="font-semibold text-amber-600">Author: <span class="font-normal text-neutral-600">{{ $post->author->full_name }}</span></p>
                                <p class="font-semibold text-amber-600">Posted: <span class="font-normal text-neutral-600">{{ $post->created_at->format('F j, Y, g:i a') }}</span></p>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="group relative mx-4 my-4">
                    @if(Auth::id() === $post->author->id)
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
                    @endif
                </div>

                <div class="group relative flex items-center mx-4 my-4 border-t border-neutral-200">
                    <form action="{{ route('posts.comment.post', ['id' => $post->id]) }}" method="POST" class="w-full mt-4 px-4 py-4 border-solid border-0 border-neutral-200 rounded-md bg-neutral-100">
                        @csrf                          
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="comment" class="block text-sm/6 font-medium text-neutral-900">Leave a comment:</label>
                            </div>
                            <div class="mt-2">
                                <textarea id="comment" name="comment" type="text" value="{{ old('comment') }}" class="block w-full rounded-md border-0 px-1.5 py-1.5 text-neutral-900 shadow-sm ring-1 ring-inset ring-neutral-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm/6"></textarea>
                            </div>
                            @error('comment')
                                <div class="block text-sm/6 font-medium text-amber-600">{{ $message }}</div>
                            @enderror
                            @if ($errors->has('error'))
                                <div class="block text-sm/6 font-medium text-amber-600">{{ $errors->first('error') }}</div>
                            @endif
                        </div>
                          
                        <div class="group relative flex items-center mt-4">
                            <button type="submit" class="rounded-md bg-amber-600 px-4 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">
                                Comment
                            </button>
                        </div>
                    </form>
                </div>

                <div class="group relative mx-4 my-4 border-t border-neutral-200">
                    @foreach ($comments as $comment)
                        <article class="w-full mt-4 border-solid border-0 border-neutral-200 rounded-md bg-neutral-100">
                            <p class="font-semibold text-amber-600 pt-4 pb-2 pl-4 pr-4">{{ $comment->user->full_name }}<span class="text-neutral-600"> commented:</span></p>
                            <p class="text-base text-neutral-600 pl-4 pr-4">{{ $comment->comment }}</p>
                            <p class="text-base text-neutral-600 pt-2 pb-4 pl-4 pr-4">{{ $comment->created_at->format('F j, Y, g:i a') }}</p>

                            @if(Auth::id() === $comment->user_id)
                            <form action="{{ route('posts.comment.delete', ['id' => $comment->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-4 mb-4 rounded-md bg-amber-700 px-4 py-1 text-sm font-semibold text-white shadow-sm hover:bg-amber-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-700">
                                    Delete
                                </button>
                            </form>
                            @endif
                        </article>
                    @endforeach
                </div>
            </div>
        </div>     
    </main>
<x-foot />