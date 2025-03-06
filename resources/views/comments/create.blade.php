<x-layout>

    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</x-layout>