<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Track Your Order</h1>

    <!-- Order Details -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <p class="text-lg font-semibold">Order ID: <span class="text-blue-500">#123456</span></p>
        <p class="text-gray-700 mt-2">Estimated Delivery: <span class="font-semibold">Feb 20, 2025</span></p>
        <p class="text-gray-700">Status: <span class="text-green-500 font-semibold">Out for Delivery</span></p>
    </div>

    <!-- Delivery Address -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-lg font-bold">Delivery Address</h2>
        <p class="text-gray-700">Jane Doe</p>
        <p class="text-gray-700">123 Street Name, Nairobi, Kenya</p>
        <p class="text-gray-700">Phone: +254 700 123 456</p>
    </div>

    <!-- Map -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <h2 class="text-lg font-bold p-4 border-b">Live Tracking</h2>
        <iframe class="w-full h-80"
            src="https://www.google.com/maps/embed/v1/place?key=YOUR_GOOGLE_MAPS_API_KEY&q=Nairobi,Kenya"
            allowfullscreen>
        </iframe>
    </div>

    <!-- Refresh & Help Buttons -->
    <div class="mt-6 flex justify-between">
        <button class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Refresh Location</button>
        <button class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Need Help?</button>
    </div>
</div>