<x-mail::message>
# Order Delivered
Your order {{ $order->id }} has been delivered.
Kindly collect it at {{ $order->pickupPoint->name }}.
@if($order->payment_status == 'pending')
You will be required to make paayment before you can collect your order.
@endif
We hope you enjoy your purchase! If you have any questions or concerns, please feel free to reach out to our customer service team.

<x-mail::button :url="$url">
View Order
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
