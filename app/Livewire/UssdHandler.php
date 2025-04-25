<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Services\AfricasTalkingService;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UssdHandler extends Component
{
    public function __invoke()
    {
        $sessionId   = request('sessionId');
        $serviceCode = request('serviceCode');
        $phoneNumber = request('phoneNumber');
        $text        = request('text');

        $explodedText = explode("*", $text);
        $level = count($explodedText);
        $response = "";

        // MAIN MENU
        if ($text == "") {
            $response  = "CON Hello! Welcome to Karis Boutique:\n";
            $response .= "1. View Products\n";
            $response .= "2. Place Order by Product ID\n";
            $response .= "3. My Orders\n";
            $response .= "4. Your Details\n";
            $response .= "5. Rate Our Services\n";
            $response .= "6. Help";
        }

        /** 
         * OPTION 1: View Products
         */
        else if ($explodedText[0] == "1") {
            $response = $this->handleProductBrowsing($explodedText, $level, $phoneNumber);
        }

        /**
         * OPTION 2: Place Order by Product ID
         */
        else if ($explodedText[0] == "2") {
            $response = $this->handleOrderByProductId($explodedText, $level, $phoneNumber);
        }

        /**
         * OPTION 3: My Orders
         */
        else if ($explodedText[0] == "3") {
            $trimmedPhone = ltrim($phoneNumber, '+');
            $user = DB::table('users')->where('phone', 'LIKE', '%' . $trimmedPhone)->first();
            if ($user) {
                $orders = DB::table('orders')->where('user_id', $user->id)->latest()->take(3)->get();
                if ($orders->isEmpty()) {
                    $response = "END You have no orders yet.";
                } else {
                    $response = "END Your Recent Orders:\n";
                    foreach ($orders as $order) {
                        $response .= "ID: {$order->id}, Amount: Ksh {$order->grand_total}, Status: {$order->status}\n";
                    }
                }
            } else {
                $response = "END Your number is not registered.";
            }
        }

        /**
         * OPTION 4: Your Details
         */
        else if ($explodedText[0] == "4") {
            $trimmedPhone = ltrim($phoneNumber, '+');
            $user = DB::table('users')->where('phone', 'LIKE', '%' . $trimmedPhone)->first();
            if ($user) {
                $response = "END Your Details:\nName: {$user->name}\nPhone: {$user->phone}";
            } else {
                $response = "END Your number is not registered.";
            }
        }

        /**
         * OPTION 5: Rate Our Services
         */
        else if ($explodedText[0] == "5") {
            $response = "END Thank you for your feedback!";
        }

        /**
         * OPTION 6: Help
         */
        else if ($explodedText[0] == "6") {
            $response = "END For help, call +254700000000 or visit our agent.";
        }

        /**
         * INVALID ENTRY
         */
        else {
            $response = "END Invalid input. Try again.";
        }

        return response($response)->header('Content-Type', 'text/plain');
    }

    private function handleProductBrowsing($input, $level, $phoneNumber)
    {
        if ($level == 1) {
            $categories = DB::table('categories')->limit(9)->get();
            $response = "CON Choose a Product Category:\n";
            foreach ($categories as $index => $category) {
                $response .= ($index + 1) . ". " . $category->name . "\n";
            }
            return $response;
        }

        if ($level == 2) {
            $category = DB::table('categories')->offset((int) $input[1] - 1)->first();
            if (!$category) return "END Invalid category selected.";

            $products = DB::table('products')->where('category_id', $category->id)->limit(9)->get();
            if ($products->isEmpty()) return "END No products found in {$category->name}.";

            $response = "CON {$category->name} Products:\n";
            foreach ($products as $index => $product) {
                $response .= ($index + 1) . ". {$product->name} - Ksh {$product->sale_price} PID {$product->id}\n";
            }
            return $response;
        }

        if ($level == 3) {
            $category = DB::table('categories')->offset((int) $input[1] - 1)->first();
            $product = DB::table('products')->where('category_id', $category->id)->skip((int) $input[2] - 1)->first();
            return $product ? "CON Enter quantity for {$product->name}:" : "END Invalid product.";
        }

        if ($level == 4) {
            $stations = DB::table('pickup_points')->limit(5)->get();
            $response = "CON Choose pickup location:\n";
            foreach ($stations as $index => $station) {
                $response .= ($index + 1) . ". {$station->name} - {$station->city}\n";
            }
            return $response;
        }

        if ($level == 5) {
            $category = DB::table('categories')->offset((int) $input[1] - 1)->first();
            $product = DB::table('products')->where('category_id', $category->id)->skip((int) $input[2] - 1)->first();
            $quantity = (int) $input[3];
            $station = DB::table('pickup_points')->offset((int) $input[4] - 1)->first();
            $trimmedPhone = ltrim($phoneNumber, '+');
            $user = DB::table('users')->where('phone', 'LIKE', '%' . $trimmedPhone)->first();

            if (!$user) return "END Your phone number is not registered.";
            if (!$product || $quantity <= 0 || !$station) return "END Invalid order input.";

            $total = $product->sale_price * $quantity;
            $order = Order::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'pickup_point_id' => $station->id,
                'grand_total' => $total,
                'payment_method' => 'COD',
                'payment_status' => 'pending',
                'status' => 'new',
                'shipping_amount' => 0,
                'shipping_discount' => 0
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'unit_amount' => $product->sale_price,
                'total_amount' => $total
            ]);

            // Send an SMS for "Order Received"
        $sms = new AfricasTalkingService();
        $message = "Hello {$user->name}, your order (#{$order->id}) was placed successfully. Total: KES {$total}. Thank you!";
        $sms->sendSmsWithSubject('0'.$trimmedPhone, 'Order Received', $message);

            return "END Order placed: {$product->name} x{$quantity}\nOrder ID: {$order->id}\nDelivery To: {$station->name}\nPay Ksh {$total} on delivery.\nThank you!";
        }

        return "END Invalid selection.";
    }

    private function handleOrderByProductId($input, $level, $phoneNumber)
    {
        if ($level == 1) {
            return "CON Enter Product ID:";
        }

        if ($level == 2) {
            return "CON Enter quantity:";
        }

        if ($level == 3) {
            $stations = DB::table('pickup_points')->limit(5)->get();
            $response = "CON Choose pickup location:\n";
            foreach ($stations as $index => $station) {
                $response .= ($index + 1) . ". {$station->name} - {$station->city}\n";
            }
            return $response;
        }

        if ($level == 4) {
            $productId = (int) $input[1];
            $quantity = (int) $input[2];
            $stationIndex = (int) $input[3] - 1;

            $product = DB::table('products')->where('id', $productId)->first();
            $station = DB::table('pickup_points')->offset($stationIndex)->first();
            $trimmedPhone = ltrim($phoneNumber, '+254');
            $user = DB::table('users')->where('phone', 'LIKE', '%' . $trimmedPhone)->first();

            if (!$user) return "END Your phone number is not registered.";
            if (!$product || $quantity <= 0 || !$station) return "END Invalid order details.";

            $total = $product->sale_price * $quantity;
            $order = Order::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'pickup_point_id' => $station->id,
                'grand_total' => $total,
                'payment_method' => 'COD',
                'payment_status' => 'pending',
                'status' => 'new',
                'shipping_amount' => 0,
                'shipping_discount' => 0
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'unit_amount' => $product->sale_price,
                'total_amount' => $total
            ]);

            
        // Send an SMS for "Order Received"
        $sms = new AfricasTalkingService();
        $message = "Hello {$user->name}, your order (#{$order->id}) was placed successfully. Total: KES {$total}. Thank you!";
        $sms->sendSmsWithSubject('0'.$trimmedPhone, 'Order Received', $message);

            return "END Order placed: {$product->name} x{$quantity}\nOrder ID: {$order->id}\nDelivery To: {$station->name}\nPay Ksh {$total} on delivery.";
        }

        return "END Invalid input.";
    }

    public function render()
    {
        return view('livewire.ussd-handler');
    }
}
