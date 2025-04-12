<x-mail::message>
# Order Placed Successfully

Thank you for shopping with us! Your order has been placed successfully.
The order number is {{ $order->id }} and the total amount is {{ $order->grand_total }}.
We are currently processing your order and will send you a confirmation email once it has been shipped.
If you have any questions or concerns regarding your order, please feel free to reach out to our customer service team.
We appreciate your business and look forward to serving you again.

<x-mail::button :url="$url">
View Order Details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
