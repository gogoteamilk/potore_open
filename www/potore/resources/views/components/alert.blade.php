@if (session('message_alert'))
<div class="alert alert-{{ session('type_alert') ? session('type_alert') : 'success' }}">
    <div class="container">
        {{ session('message_alert') ?? '' }}
    </div>
</div>
@endif