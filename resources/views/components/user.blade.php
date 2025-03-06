<div class="flex flex-row">
    <div class="avatar avatar-placeholder">
        <div class="bg-neutral text-neutral-content w-8 rounded-full">
            @if ($user->image == null)
                <img src="/images/default.jpg" alt="img">
            @else
            <img src="{{ asset('storage/' . $user->image->path) }}" alt="img">

            @endif

        </div>
    </div>

    <p class="ml-2">
        {{ $user->name }}
    </p>
</div>
