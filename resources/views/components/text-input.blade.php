<form action="{{ $route }}" method="POST" class="container mx-auto p-6 flex flex-row" x-show="show">
    @csrf

    <input type="text" name="{{ $name }}" class="input input-primary input-xs mr-2" placeholder="">
    <br>
    <br>
    <button type="submit" class="btn btn-primary btn-xs" >
        Post
    </button>
</form>
