<x-mail::message>
# Order Shipped

Your order {{ $order->id }} has been shipped.
We will notify you once the delivery is done.

<x-mail::button :url="$url">
View Order
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
