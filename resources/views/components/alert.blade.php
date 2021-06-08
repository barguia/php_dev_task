@if(isset($message) &&  $message)
<p class="alert alert-{{ $style ?? 'info' }}">{{ $message ?? '' }}</p>
@endif
