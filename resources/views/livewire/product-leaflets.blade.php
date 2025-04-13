<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-lg font-semibold text-gray-800 mb-3">Product Leaflets</h2>
    <p class="text-gray-700 mb-4">Download leaflets to share with customers:</p>

    @foreach ($categories as $category)
        @if ($category->products->isNotEmpty())
            <h3 class="text-md font-bold text-blue-700 mt-4 mb-2">{{ $category->name }}</h3>
            <ul class="list-none pl-0 text-gray-700 mb-4">
                @foreach ($category->products as $product)
                    <li class="py-2 border-b last:border-b-0 flex items-center justify-between">
                        <span class="font-medium">{{ $product->name }} Leaflet</span>
                        <a href="{{ url('/leaflets/' . $product->id) }}" target="_blank"
                           class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12"></path>
                            </svg>
                            Download
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    @endforeach
</div>
