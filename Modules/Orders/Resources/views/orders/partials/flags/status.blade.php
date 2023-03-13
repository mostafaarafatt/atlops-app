@if($order->status == 1)
    <i class="fas fa-check fa-lg text-success"></i> {{ __("Completed") }}
@else
    <i class="fas fa-times fa-lg text-danger"></i> {{ __("Active") }}
@endif
