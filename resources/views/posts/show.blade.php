<x-layout>
    <section class="container mx-auto p-6">
        <div class=" p-4 rounded my-4 ">

            <h1 class="text-2xl font-bold">
                {{ $post->title }}
            </h1>

            <x-user :user="$post->user" />

            <p>
                {{ $post->content }}
            </p>

        </div>

        <div class="flex items-center space-x-4 mt-4">
            @if (auth()->id() == $post->user_id)
                <x-delete-button :route="route('posts.destroy', $post)" text="Delete" />

                <a href="/posts/{{ $post->id }}/edit">
                    <button class="btn btn-info">
                        Edit
                    </button>
                </a>
            @endif

        </div>
    </section>

    <section class="container mx-auto p-6">
        <h1 class="text-2xl font-bold">
            Comments
        </h1>
        <ul class=" p-4 rounded my-4 list">
            @foreach ($post->comments as $comment)
                <li class=" p-4 rounded my-4 flex flex-col list-row">
                    <article>
                        <a href="/users/{{ $comment->user->id }}" class="text-blue-500">
                            <x-user :user="$comment->user" />
                        </a>
                        <p>
                            {{ $comment->comment }}

                        </p>

                        <p>
                            {{ $comment->created_at->diffForHumans() }}

                        </p>
                        <div x-data="{ show: false }">
                            <button x-on:click="show = !show" class="btn btn-sm">Reply</button>
                            <x-text-input :route="route('reply.store', $comment->id)" name="reply" />

                        </div>
                    </article>

                    <div x-data="{ expanded: $persist(false) }">
                        <button @click="expanded = ! expanded" class="btn btn-sm btn-link">
                            {{ $comment->replies->count() }} replies
                        </button>

                        <ul x-show="expanded" x-collapse class="list flex flex-col">
                            @foreach ($comment->replies as $reply)
                                <li class=" p-4 rounded my-4 list-row flex flex-col">
                                    <article>
                                        <a href="/users/{{ $reply->user->id }}" class="text-blue-500">
                                            <x-user :user="$reply->user" />
                                        </a>
                                        <p>{{ $reply->reply }}</p>

                                        <p>
                                            {{ $reply->created_at->diffForHumans() }}
                                        </p>
                                    </article>
                            @endforeach
                        </ul>
                    </div>


                </li>
            @endforeach
        </ul>


        <x-text-input :route="route('comment.store', $post->id)" name="comment" />

        <x-error />

    </section>


</x-layout>
