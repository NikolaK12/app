<x-layout>
    <form action={{ route('posts.update', $post) }} method="POST" class="flex flex-col items-center lg:items-start">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Enter title" class="input" autocomplete="off"
            value="{{ $post->title }}">
        <label for="content">Content</label>
        <textarea name="content" id="content" placeholder="Enter content" class="textarea textarea-primary" autocomplete="off">{{ $post->content }}</textarea>
        <button type="submit" class="btn btn-primary w-xs mt-4">
            Edit
        </button>
        <x-error />
    </form>

</x-layout>
