<x-layout>
    <section>
        <a href="/posts/create" class="mx-4">
            <button class="btn btn-primary">
                Create post
            </button>
        </a>

        <ul class="list">
            @foreach ($posts as $post)
                <a href="/posts/{{ $post->id }}">
                    <li class="container mx-auto p-6  mt-1 list-row flex flex-col">
                        <article>
                            <h1 class="text-2xl font-bold">
                                {{ $post->title }}
                            </h1>
                            <p>
                                {{ $post->created_at->diffForHumans() }}
                            </p>
                            <p>{{ $post->created_at }}</p>

                            <x-user :user="$post->user" />
                            <p>
                                {{ $post->comments->count() }} comments
                            </p>

                        </article>

                    </li>
                </a>
            @endforeach
        </ul>
    </section>





</x-layout>
