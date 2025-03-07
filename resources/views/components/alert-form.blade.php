<div>
    @if (session('fail'))
    <div class="alert alert-danger">
        {{ session('fail') }}
    </div>
@endif
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (session('info'))
<div class="alert alert-info">
    {{ session('info') }}
</div>
@endif
</div>
