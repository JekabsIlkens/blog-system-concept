<!DOCTYPE html>
<html class="h-full bg-neutral-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog System</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="h-full">
        <div class="min-h-full">

            <x-navbar />

            <main>
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <div class="relative isolate px-6 pt-14 lg:px-8">
                        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                            <div class="text-center">

                                <h1 class="text-balance text-5xl font-semibold tracking-tight text-neutral-900 sm:text-7xl">Blog System Concept</h1>

                                <p class="mt-8 text-pretty text-lg font-medium text-neutral-500 sm:text-xl/8">
                                    Share your ideas and knowledge with the world by creating your own blog posts and indulge in interesting conversations with other like-minded people!
                                </p>

                                <div class="mt-10 flex items-center justify-center gap-x-6">
                                    <a href="#" class="rounded-md bg-amber-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">
                                        Discover new ideas
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </body>
</html>