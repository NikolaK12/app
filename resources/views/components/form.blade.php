@php
    $routeName = Route::currentRouteName();
@endphp

<form action="{{ $action }}" method="POST" class="flex flex-col items-center lg:items-start">
    @csrf

    @if (isset($method))
        @method($method)
    @endif

    @if ($routeName == 'register')
        <h1 class="text-2xl font-bold">Register</h1>
    @elseif ($routeName == 'login')
        <h1 class="text-2xl font-bold">Login</h1>
    @elseif ($routeName == 'users.update')
        <h1 class="text-2xl font-bold">Update</h1>
    @endif



    @if ($routeName == 'register' || $routeName == 'users.edit')
        <label for="name">Username</label>
        <input type="text" name="name" id="name" placeholder="Enter username" class="input" autocomplete="off">
    @endif



    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Enter email" autocomplete="off" class="input ">

    <label for="password">Password</label>


    <input type="password" name="password" id="password" placeholder="Enter password" autocomplete="off"
        class="input">


    <button type="submit" class="btn btn-primary w-xs mt-4">
        @if ($routeName == 'register')
            Register
        @elseif ($routeName == 'login')
            Login
        @elseif ($routeName == 'users.edit')
            Update
        @endif
    </button>


    <x-error />
</form>
