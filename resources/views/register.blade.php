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

                    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                            <img class="mx-auto h-16 w-auto" src="https://i.postimg.cc/bNnmBR2n/logo.png" alt="Blog Logo">
                            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-neutral-900">Sign up for a new account</h2>
                        </div>
                      
                        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                            <form class="space-y-6" action="#" method="POST">
                                @csrf
                                <div>
                                    <label for="full-name" class="block text-sm/6 font-medium text-neutral-900">Full name</label>
                                    <div class="mt-2">
                                        <input id="full-name" name="full-name" type="text" autocomplete="full-name" required class="block w-full rounded-md border-0 py-1.5 text-neutral-900 shadow-sm ring-1 ring-inset ring-neutral-300 placeholder:text-neutral-400 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm/6">
                                    </div>
                                </div>
    
                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="email" class="block text-sm/6 font-medium text-neutral-900">Email address</label>
                                    </div>
                                    <div class="mt-2">
                                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-neutral-900 shadow-sm ring-1 ring-inset ring-neutral-300 placeholder:text-neutral-400 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm/6">
                                    </div>
                                </div>
                      
                                <div>
                                    <div class="flex items-center justify-between">
                                        <label for="password" class="block text-sm/6 font-medium text-neutral-900">Password</label>
                                    </div>
                                    <div class="mt-2">
                                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-neutral-900 shadow-sm ring-1 ring-inset ring-neutral-300 placeholder:text-neutral-400 focus:ring-2 focus:ring-inset focus:ring-amber-600 sm:text-sm/6">
                                    </div>
                                </div>
                      
                                <div>
                                    <button type="submit" class="flex w-full justify-center rounded-md bg-amber-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-amber-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-600">Sign in</button>
                                </div>
                            </form>
                      
                            <p class="mt-10 text-center text-sm/6 text-neutral-500"> Already have an account?
                                <a href="#" class="font-semibold text-amber-600 hover:text-amber-500">Sign up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </body>
</html>