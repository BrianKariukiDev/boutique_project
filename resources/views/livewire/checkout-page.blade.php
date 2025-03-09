<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
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
                            <label class="block text-gray-700  mb-1" for="first_name">
                                First Name
                            </label>
                            <input class="w-full rounded-lg border py-2 px-3" id="first_name" type="text">
                            </input>
                        </div>
                        <div>
                            <label class="block text-gray-700  mb-1" for="last_name">
                                Last Name
                            </label>
                            <input class="w-full rounded-lg border py-2 px-3" id="last_name" type="text">
                            </input>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700  mb-1" for="phone">
                            Phone
                        </label>
                        <input class="w-full rounded-lg border py-2 px-3" id="phone" type="text">
                        </input>
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700  mb-1" for="address">
                            Address
                        </label>
                        <input class="w-full rounded-lg border py-2 px-3" id="address" type="text">
                        </input>
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700  mb-1" for="city">
                            City
                        </label>
                        <input class="w-full rounded-lg border py-2 px-3" id="city" type="text">
                        </input>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <label class="block text-gray-700  mb-1" for="state">
                                State
                            </label>
                            <input class="w-full rounded-lg border py-2 px-3" id="state" type="text">
                            </input>
                        </div>
                        <div>
                            <label class="block text-gray-700  mb-1" for="zip">
                                ZIP Code
                            </label>
                            <input class="w-full rounded-lg border py-2 px-3" id="zip" type="text">
                            </input>
                        </div>
                    </div>
                </div>
                <div class="text-lg font-semibold mb-4">
                    Select Payment Method
                </div>
                <ul class="grid w-full gap-6 md:grid-cols-2">
                    <li>
                        <input class="hidden peer" id="hosting-small" name="hosting" required="" type="radio" value="hosting-small" />
                        <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer " for="hosting-small">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">
                                    Cash on Delivery
                                </div>
                            </div>
                            <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                </path>
                            </svg>
                        </label>
                    </li>
                    <li>
                        <input class="hidden peer" id="hosting-big" name="hosting" type="radio" value="hosting-big">
                        <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer" for="hosting-big">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">
                                    Stripe
                                </div>
                            </div>
                            <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                </path>
                            </svg>
                        </label>
                        </input>
                    </li>
                </ul>
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
                        45,000.00
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
                        45,000.00
                    </span>
                </div>
                </hr>
            </div>
            <button class="bg-green-500 mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-green-600">
                Place Order
            </button>
            <div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7 ">
                <div class="text-xl font-bold underline text-gray-700  mb-2">
                    BASKET SUMMARY
                </div>
                <ul class="divide-y divide-gray-200" role="list">
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img alt="Neil image" class="w-12 h-12 rounded-full" src="https://iplanet.one/cdn/shop/files/iPhone_15_Pro_Max_Blue_Titanium_PDP_Image_Position-1__en-IN_1445x.jpg?v=1695435917">
                                </img>
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate ">
                                    Apple iPhone 15 Pro Max
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    Quantity: 1
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                $320
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img alt="Neil image" class="w-12 h-12 rounded-full" src="https://iplanet.one/cdn/shop/files/iPhone_15_Pro_Max_Blue_Titanium_PDP_Image_Position-1__en-IN_1445x.jpg?v=1695435917">
                                </img>
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate ">
                                    Apple iPhone 15 Pro Max
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    Quantity: 1
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                $320
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img alt="Neil image" class="w-12 h-12 rounded-full" src="https://iplanet.one/cdn/shop/files/iPhone_15_Pro_Max_Blue_Titanium_PDP_Image_Position-1__en-IN_1445x.jpg?v=1695435917">
                                </img>
                            </div>
                            <div class="flex-1 min-w-0 ms-4">
                                <p class="text-sm font-medium text-gray-900 truncate ">
                                    Apple iPhone 15 Pro Max
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    Quantity: 1
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 ">
                                $320
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>