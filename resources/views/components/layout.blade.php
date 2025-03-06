<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'My Awesome Application' }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>

<body>
    <div class="drawer">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="navbar bg-base-300 w-full">
                <div class="flex-none lg:hidden">
                    <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block h-6 w-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </label>
                </div>
                <div class="mx-2 flex-1 px-2">Navbar Title</div>
                <div class="hidden flex-none lg:block">
                    <ul class="menu menu-horizontal">
                        <!-- Navbar menu content here -->
                        @auth
                            <li><a href="{{ route('users.index') }}">Users</a></li>
                            <li><a href="{{ route('posts.index') }}">Posts</a></li>
                        @endauth

                        <li>
                            <button class="" popovertarget="popover" style="anchor-name:anchor">
                                @auth
                                    <div class="avatar avatar-placeholder">
                                        <div class="bg-neutral text-neutral-content w-8 rounded-full">
                                            @if (auth()->user()->image == null)
                                                <img src="/images/default.jpg" alt="img">
                                            @else
                                                <img src="{{ asset('storage/' . auth()->user()->image->path) }}" alt="img">
                                            @endif
                                        </div>
                                    </div>
                                @endauth
                            </button>

                            <ul class="dropdown dropdown-bottom dropdown-end menu w-52 rounded-box bg-base-100 shadow-sm"
                                popover id="popover" style="position-anchor:anchor">
                                @auth
                                    <li><a href="{{ route('users.show', Auth::user()->id) }}">Profile</a></li>
                                    <li>
                                        <x-delete-button :route="route('logout')" text="Logout" />
                                    </li>
                                @endauth

                                @guest
                                    <li><a href="/login">Login</a></li>
                                    <li><a href="/register">Register</a></li>
                                @endguest
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page content here -->
        </div>

        <div class="drawer-side z-50 bg-base-200 ">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu bg-base-200 min-h-full w-80 p-4">
                <!-- Sidebar content here -->
                @auth
                    <li>
                        <a href="{{ route('users.show', Auth::user()->id) }}">
                            <div class="avatar avatar-placeholder">
                                <div class="bg-neutral text-neutral-content w-8 rounded-full">
                                    @if (auth()->user()->image == null)
                                        <img src="/images/default.jpg" alt="img">
                                    @else
                                        <img src="{{ asset('storage/' . auth()->user()->image->path) }}" alt="img">
                                    @endif
                                </div>
                            </div>
                            <p>{{ Auth::user()->name }}</p>
                        </a>
                    </li>

                    <li><a href="{{ route('users.index') }}">Users</a></li>
                    <li><a href="{{ route('posts.index') }}">Posts</a></li>
                    <li>
                        <x-delete-button :route="route('logout')" text="Logout" />
                    </li>
                @endauth

                @guest
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @endguest
            </ul>
        </div>
    </div>

    <main class="container mx-auto py-6">
        {{ $slot }}
        <x-toast />
    </main>

</body>

</html>