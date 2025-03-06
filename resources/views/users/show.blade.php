<x-layout>

    <section>

        <h1>{{ $user->name }}'s profile </h1>
        @if ($user->image == null)
            <img src="/images/default.jpg" alt="img">
        @else
            <img src="{{ asset('storage/' . $user->image->path) }}" alt="img" class="size-48">
        @endif

        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Created at:</strong> {{ $user->created_at }}</p>
        <p><strong>Updated at:</strong> {{ $user->updated_at }}</p>
        <div class="flex flex-col ">
            @if (auth()->user()->id == $user->id)
                <a href="{{ route('users.edit', $user->id) }}" class="text-info">Edit profile</a>

                @if ($user->image != null)
                    <form action="{{ route('image.update', auth()->user()->image) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="image" id="image" class="file-input file-input-xs">
                        <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                    </form>
                @else
                    <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" id="image" class="file-input file-input-xs">
                        <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                    </form>
                @endif

            @endif
        </div>
    </section>

    <section>
        <h1>{{ $user->name }}'s posts</h1>
        <ul class="list">
            @foreach ($user->posts as $post)
                <li class="list-row">
                    <article>
                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    </article>
                </li>
            @endforeach
        </ul>
    </section>

</x-layout>
