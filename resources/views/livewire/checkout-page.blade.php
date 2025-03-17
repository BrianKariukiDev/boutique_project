<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    @if(session('payment_error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('payment_error') }}</span>
        </div>
    @endif
    <h1 class="text-2xl font-bold text-gray-800  mb-4">
        Checkout
    </h1>
    <div class="grid grid-cols-12 gap-4">
        <div class="md:col-span-12 lg:col-span-8 col-span-12">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 ">
                <!-- Shipping Address -->
                <div class="mb-6">
                    <h2 class="text-xl font-bold underline text-gray-700  mb-2">
                        Shipping Address
                    </h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700  mb-1" for="name">
                                Customer Name
                            </label>
                            <input disabled class="w-full rounded-lg border py-2 px-3" id="name"
                                value="{{ $user->name }}" type="text"/>
                        </div>

                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700  mb-1" for="phone">
                            Phone
                        </label>
                        @if ($user->phone == null)
                            <input wire:model='phone' class="w-full rounded-lg border py-2 px-3 @error('phone') border-red-700 @enderror" id="phone"
                                type="text" />
                            @error('phone')
                                <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        @else
                            <input disabled value='{{ $user->phone }}' class="w-full rounded-lg border py-2 px-3"
                                id="phone" type="text" />
                        @endif
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700  mb-1" for="email">
                            Email
                        </label>
                        <input disabled value='{{ $user->email }}' class="w-full rounded-lg border py-2 px-3"
                            id="email" type="text" />
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700  mb-1" for="city">
                            City
                        </label>
                        @if ($user->city == null)
                            <input wire:model='city' class="w-full rounded-lg border py-2 px-3 @error('city') border-red-700 @enderror" id="city"
                                type="text" />
                            @error('city')
                            <span class="text-red-700">{{ $message }}</span>
                            @enderror
                        @else
                            <input disabled value='{{ $user->city }}' class="w-full rounded-lg border py-2 px-3"
                                id="city" type="text" />
                        @endif
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 mb-1" for="address">Pickup Point</label>
                        <select id="address" wire:model='selected_pickup_point' class="w-full rounded-lg border py-2 px-3">
                            <option value="">Select Pickup Point</option>
                            @foreach ($pickup_points as $pickup_point)
                                <option value="{{ $pickup_point->id }}">{{ $pickup_point->name }}</option>
                            @endforeach
                        </select>
                        @error('selected_pickup_point')
                            <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
                <div class="text-lg font-semibold mb-4">
                    Select Payment Method
                </div>
                <ul class="grid w-full gap-6 md:grid-cols-2">
                    <li>
                        <input class="hidden peer" id="hosting-small" wire:model='payment_method' required=""
                            type="radio" value="cod" />
                        <label
                            class="peer-checked:bg-blue-400 peer-checked:text-white inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer "
                            for="hosting-small">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">
                                    Cash on Delivery
                                </div>
                            </div>
                            <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2">
                                </path>
                            </svg>
                        </label>
                    </li>
                    <li>
                        <input wire:model='payment_method' class="hidden peer" id="hosting-big" type="radio"
                            value="mobile_money" />
                        <label
                            class="peer-checked:bg-blue-400 peer-checked:text-white inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer"
                            for="hosting-big">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">
                                    Mobile Money
                                </div>
                            </div>
                            <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2">
                                </path>
                            </svg>
                        </label>
                    </li>
                </ul>
                @error('payment_method')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <!-- End Card -->
        </div>
        <div class="md:col-span-12 lg:col-span-4 col-span-12 text-gray-700 ">
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 ">
                <div class="text-xl font-bold underline text-gray-700  mb-2">
                    ORDER SUMMARY
                </div>
                <div class="flex justify-between mb-2 font-bold">
                    <span>
                        Subtotal
                    </span>
                    <span>
                        {{ Number::currency($grandTotal, 'KSHS') }}
                    </span>
                </div>
                <div class="flex justify-between mb-2 font-bold">
                    <span>
                        Taxes
                    </span>
                    <span>
                        0.00
                    </span>
                </div>
                <div class="flex justify-between mb-2 font-bold">
                    <span>
                        Shipping Cost
                    </span>
                    <span>
                        0.00
                    </span>
                </div>
                <hr class="bg-slate-400 my-4 h-1 rounded">
                <div class="flex justify-between mb-2 font-bold">
                    <span>
                        Grand Total
                    </span>
                    <span>
                        {{ Number::currency($grandTotal, 'KSHS') }}
                    </span>
                </div>
                </hr>
            </div>
            <button wire:click='placeOrder' type='submit'
                class="bg-green-500 mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-green-600">
                <span wire:loading.remove wire:target='placeOrder'>Place Order</span><span wire:loading wire:target='placeOrder'>Placing...</span>
            </button>
            <div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7 ">
                <div class="text-xl font-bold underline text-gray-700  mb-2">
                    BASKET SUMMARY
                </div>
                <ul class="divide-y divide-gray-200" role="list">
                    @foreach ($cartItems as $cartItem)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <img alt="{{ $cartItem['name'] }}" class="w-12 h-12 rounded-full"
                                        src="{{ url('storage', $cartItem['image']) }}" />
                                </div>
                                <div class="flex-1 min-w-0 ms-4">
                                    <p class="text-sm font-medium text-gray-900 truncate ">
                                        {{ $cartItem['name'] }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate">
                                        Quantity: {{ $cartItem['quantity'] }}
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                    {{ Number::currency($cartItem['total_amount'], 'KSHS') }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
