<div wire:listen='refreshComponent' class="bg-slate-400">
    <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="md:w-3/4">
                    <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
                        @forelse($cartItems as $item)
                            <table class="w-full" wire:key="{{$item['product_id']}}">
                                <thead>
                                    <tr>
                                        <th class="text-left font-semibold">Product</th>
                                        <th class="text-left font-semibold">Price</th>
                                        <th class="text-left font-semibold">Quantity</th>
                                        <th class="text-left font-semibold">Total</th>
                                        <th class="text-left font-semibold">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <img class="h-16 w-16 mr-4" src="{{url('storage/',$item['image'])}}"
                                                    alt="Product image">
                                                <span class="font-semibold truncate">{{$item['name']}}</span>
                                            </div>
                                        </td>
                                        <td class="py-4">{{Number::currency($item['unit_amount'],'KSHS')}}</td>
                                        <td class="py-4">
                                            <div class="flex items-center">
                                                <button wire:click='decreaseQty({{$item['product_id']}})' class="border rounded-md py-2 px-4 mr-2 hover:cursor-pointer">-</button>
                                                <span class="text-center w-8">{{$item['quantity']}}</span>
                                                <button wire:click='increaseQty({{$item['product_id']}})' class="border rounded-md py-2 px-4 ml-2 cursor-pointer">+</button>
                                            </div>
                                        </td>
                                        <td class="py-4">{{Number::currency($item['total_amount'],'KSHS')}}</td>
                                        <td><a wire:click="removeFromCart({{$item['product_id']}})"
                                                class="hover:cursor-pointer bg-slate-300 border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white hover:border-red-700">Remove</a>
                                        </td>
                                    </tr>
                                    <!-- More product rows -->
                                </tbody>
                            </table>
                        @empty
                            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
                                <h2 class=" text-2xl m-auto font-bold mb-4">Your cart is empty</h2>
                                <a href="/"
                                    class="w-fit-content bg-blue-500 text-white py-2 px-4 rounded-lg">Continue
                                    shopping</a>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="md:w-1/4">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-lg font-semibold mb-4">Summary</h2>
                        <div class="flex justify-between mb-2">
                            <span>Subtotal</span>
                            <span>{{Number::currency($grandTotal,'KSHS')}}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>Taxes</span>
                            <span>{{Number::currency(0,'KSHS')}}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span>Shipping</span>
                            <span>{{Number::currency(0,'KSHS')}}</span>
                        </div>
                        <hr class="my-2">
                        <div class="flex justify-between mb-2">
                            <span class="font-semibold">Total</span>
                            <span class="font-semibold">{{Number::currency($grandTotal,'KSHS')}}</span>
                        </div>
                        @if($grandTotal>0)
                        <button wire:navigate href="/checkout" class="hover:cursor-pointer bg-blue-500 text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
