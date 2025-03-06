<form action="{{ $route }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-error">
        {{$text}}
    </button>
</form>
