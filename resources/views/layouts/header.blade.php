<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title","Maille Working Order Site")</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="h-full bg-gray-900">

    <header class="bg-gray-900">
        <nav aria-label="Global" class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">
            <div class="flex flex-1">
                <div class="hidden lg:flex lg:gap-x-12">
                    <a href="/ordering" class="text-sm/6 font-semibold text-white">Ordering</a>
                    <a href="/service-details" class="text-sm/6 font-semibold text-white">Service Details</a>
                    <a href="/" class="text-sm/6 font-semibold text-white">Welcome</a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button" command="show-modal" commandfor="mobile-menu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400 hover:text-white">
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
            <a href="/" class="-m-1.5 p-1.5">
                <span class="sr-only">Vona Crafts Logo</span>
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" class="h-8 w-auto" />
            </a>
            <div class="flex flex-1 justify-end">
                @auth
                    <form action="/logout" method="POST" style="display:inline">
                        @csrf
                        <button class="text-sm/6 font-semibold text-white">
                            Logout <span aria-hidden="true">&rarr;</span>
                        </button>
                    </form>
                @else
                    <a href="/login" class="text-sm/6 font-semibold text-white">
                        Log in <span aria-hidden="true">&rarr;</span>
                    </a>
                @endauth
            </div>
        </nav>
        <el-dialog>
            <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
                <div tabindex="0" class="fixed inset-0 focus:outline-none">
                    <el-dialog-panel class="fixed inset-y-0 left-0 z-10 w-full overflow-y-auto bg-gray-900 px-6 py-6">
                        <div class="flex items-center justify-between">
                            <div class="flex flex-1">
                                <button type="button" command="close" commandfor="mobile-menu" class="-m-2.5 rounded-md p-2.5 text-gray-400 hover:text-white">
                                    <span class="sr-only">Close menu</span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                                        <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <a href="/" class="-m-1.5 p-1.5">
                                <span class="sr-only">Vona Crafts</span>
                                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="" class="h-8 w-auto" />
                            </a>
                            <div class="flex flex-1 justify-end">
                                @auth
                                    <form action="/logout" method="POST" style="display:inline">
                                        @csrf
                                        <button class="text-sm/6 font-semibold text-white">
                                            Logout <span aria-hidden="true">&rarr;</span>
                                        </button>
                                    </form>
                                @else
                                    <a href="/login" class="text-sm/6 font-semibold text-white">
                                        Log in <span aria-hidden="true">&rarr;</span>
                                    </a>
                                @endauth
                            </div>
                        </div>
                        <div class="mt-6 space-y-2">
                            <a href="/ordering" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Ordering</a>
                            <a href="/service-details" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Service Details</a>
                            <a href="/" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Welcome</a>
                        </div>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>
    </header>

    <main class="mx-auto max-w-7xl p-6">
        @yield('content')
    </main>

</body>
</html>