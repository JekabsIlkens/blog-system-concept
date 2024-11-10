<x-app-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="group relative flex items-center px-4 py-4 bg-white shadow-md rounded-md">
                <x-page-header header="Edit your blog post" />
            </div>

            <div class="group relative flex items-center">
                <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST" class="w-full mt-4 px-4 py-4 bg-white shadow-md rounded-md">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="title" value="Title" />
                        <x-input-field id="title" name="title" type="text" value="{{ $post->title }}" />

                        <x-input-error for="title" />
                    </div>
                          
                    <div class="mt-4">
                        <x-input-label for="body" value="Body" />
                        <x-input-area id="body" name="body" type="text">{{ $post->body }}</x-input-area>

                        <x-input-error for="body" />
                        <x-server-error for="error" />
                    </div>

                    <div class="mt-2">
                        <x-input-label for="categories" value="Categories" />

                        <div class="mt-2 h-48 overflow-auto border border-neutral-300 rounded-md p-2">
                            @foreach($categories as $category)
                                <div class="flex items-center mb-2">
                                    <input id="category_{{ $category->id }}" name="categories[]" type="checkbox" value="{{ $category->id }}" 
                                    class="mr-2 rounded border-neutral-600 checked:bg-amber-600 checked:border-amber-600 hover:bg-neutral-100" 
                                    @if($activeCategories->contains($category->id)) checked @endif>

                                    <x-input-label for="category_{{ $category->id }}" value="{{ $category->name }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                        
                    <div class="group relative flex items-center mt-4">
                        <x-nav-link href="{{ url()->previous() }}" class="mr-4 rounded-md shadow-md text-white bg-neutral-600 hover:bg-neutral-500">
                            Cancel
                        </x-nav-link>

                        <x-primary-button>Save</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>     
</x-app-layout>
