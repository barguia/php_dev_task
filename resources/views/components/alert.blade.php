@if(isset($mensage) &&  $mensage)
<p class="alert alert-{{ $style ?? 'info' }}">{{ $mensage ?? '' }}</p>
@endif
