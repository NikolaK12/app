<div class="alert {{$type}}" x-show="show" x-init="setTimeout(() => show = false, 5000)">
    <span>{{session($message)}}</span>
    <button x-on:click="show = false">X</button>
</div>