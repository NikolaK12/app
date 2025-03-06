<x-layout>
    <form action={{ route('posts.store') }} method="POST" class="flex flex-col container mx-auto p-6">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Enter title" class="input input-primary"
            autocomplete="off">
        <label for="content">Content</label>
        <textarea name="content" id="content" placeholder="Enter content" class="textarea textarea-primary"
            autocomplete="off"></textarea>
        <button type="submit" class="btn btn-primary w-xs mt-4">
            Create
        </button>
        <x-error />
    </form>
</x-layout>
