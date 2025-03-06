
    <form action="{{ route($route, $image) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($route === 'image.update')
            @method('PUT')
        @endif
        <input type="file" name="image" id="image" class="file-input file-input-xs">
        <button type="submit" class="btn btn-primary btn-xs">Submit</button>
    </form>

