<div class="toast toast-start toast-bottom" x-data="{ show: true }" >
    @if (session('created'))
        <x-alert type="alert-success" message="created" />
    @elseif (session('deleted'))
        <x-alert type="alert-error" message="deleted" />
    @elseif(session('updated'))
        <x-alert type="alert-info" message="updated" />
    @endif
</div>