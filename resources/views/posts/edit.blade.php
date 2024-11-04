<x-head />
    <main>
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="group relative flex items-center mx-4 my-4">
                    <img src="https://i.postimg.cc/bNnmBR2n/logo.png" alt="Blog Logo" class="h-12 w-12 rounded-full mr-4">
                    <h2 class="text-pretty text-4xl font-semibold tracking-tight text-neutral-900 sm:text-5xl">
                        Edit your blog post
                    </h2>
                </div>

                <div class="group relative flex items-center mx-4 my-4 border-t border-neutral-200">
                    <form action="{{ route('posts.edit.put', ['id' => $post->id]) }}" method="POST" class="w-full mt-4 px-4 py-4 border-solid border-0 border-neutral-200 rounded-md bg-neutral-100">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="title" class="block text-sm/6 font-medium text-neutral-900">Title</label>
                            <div class="mt-2">
                                <input id="title" name="title" type="text" value="{{ $post->title }}" class="block w-full rounded-md border-0 px-1.5 py-1.5 text-neutral-900 shadow-sm ring-1 ring-inset ring-neutral-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm/6">
                            </div>
                            @error('title')
                                <div class="block text-sm/6 font-medium text-amber-600">{{ $message }}</div>
                            @enderror
                        </div>
                          
                        <div>
                            <div class="flex items-center justify-between mt-4">
                                <label for="body" class="block text-sm/6 font-medium text-neutral-900">Content</label>
                            </div>
                            <div class="mt-2">
                                <textarea id="body" name="body" type="text" class="block w-full rounded-md border-0 px-1.5 py-1.5 text-neutral-900 shadow-sm ring-1 ring-inset ring-neutral-300 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm/6">
                                    {{ $post->body }}
                                </textarea>
                            </div>
                            @error('body')
                                <div class="block text-sm/6 font-medium text-amber-600">{{ $message }}</div>
                            @enderror
                            @if ($errors->has('error'))
                                <div class="block text-sm/6 font-medium text-amber-600">{{ $errors->first('error') }}</div>
                            @endif
                        </div>
                          
                        <div class="group relative flex items-center mt-4">
                            <a href="{{ route('posts.index') }}" class="mr-4 rounded-md bg-neutral-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-neutral-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-neutral-600"> 
                                Cancel 
                            </a>
                            <button type="submit" class="rounded-md bg-amber-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>     
    </main>
<x-foot />