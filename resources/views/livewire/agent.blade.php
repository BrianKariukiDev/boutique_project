    <div class="container mx-auto p-8">
        <header class="mb-8 flex items-center justify-between">
            <h1 class="text-2xl font-semibold text-indigo-700">Agent Dashboard</h1>
            <span class="text-gray-600">Welcome, [Agent Name]</span>
        </header>

        <div class="space-y-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">My Pickup Stations</h2>
                <ul class="list-none pl-0 text-gray-700">
                    <li class="py-2 border-b last:border-b-0">
                        <span class="font-medium">Chuka Main Station</span> <span class="text-sm text-gray-500">(Chuka Town)</span>
                    </li>
                    <li class="py-2 border-b last:border-b-0">
                        <span class="font-medium">Kathwana Annex</span> <span class="text-sm text-gray-500">(Kathwana Market)</span>
                    </li>
                    <li class="py-2 border-b last:border-b-0">
                        <span class="font-medium">Marimanti Hub</span> <span class="text-sm text-gray-500">(Marimanti Center)</span>
                    </li>
                    <li class="py-2 text-gray-400">...</li>
                </ul>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Total Orders</h2>
                <p class="text-3xl font-bold text-blue-600">125</p>
                <p class="text-sm text-gray-500">Total orders associated with your stations.</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Orders for My Stations</h2>
                <div class="overflow-x-auto rounded-md border">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-gray-800 font-medium">#ORD001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">John Doe</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">Pending</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">COD</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-gray-700">$55.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <button class="text-indigo-600 hover:text-indigo-800 font-medium">View</button>
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-3 rounded-md text-xs">STK</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                    <div class="mt-4 flex justify-between items-center">
                        <p class="text-sm text-gray-500">Showing 1 to 1 of 1 orders</p>
                        <nav aria-label="Pagination">
                            <ul class="inline-flex items-center -space-x-px">
                                <li>
                                    <a href="#" class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-md border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                        <span class="sr-only">Previous</span>
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </li>
                                <li><a href="#" class="py-2 px-3 leading-tight text-indigo-600 bg-indigo-50 border border-gray-300 hover:bg-indigo-100 hover:text-indigo-700">1</a></li>
                                <li>
                                    <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-md border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                                        <span class="sr-only">Next</span>
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">Product Leaflets</h2>
                <p class="text-gray-700 mb-4">Download leaflets to share with customers:</p>
                <ul class="list-none pl-0 text-gray-700">
                    <li class="py-2 border-b last:border-b-0 flex items-center justify-between">
                        <span class="font-medium">Product X Leaflet</span>
                        <a href="/download/product-x-leaflet.pdf" target="_blank" class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12"></path></svg>
                            Download
                        </a>
                    </li>
                    <li class="py-2 border-b last:border-b-0 flex items-center justify-between">
                        <span class="font-medium">Product Y Leaflet</span>
                        <a href="/download/product-y-leaflet.pdf" target="_blank" class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12"></path></svg>
                            Download
                        </a>
                    </li>
                    <li class="py-2 flex items-center justify-between">
                        <span class="font-medium">Product Z Leaflet</span>
                        <a href="/download/product-z-leaflet.pdf" target="_blank" class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12"></path></svg>
                            Download
                        </a>
                    </li>
                    </ul>
            </div>
        </div>

        <div id="orderProductsModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-6 py-6 sm:px-8 sm:py-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4" id="modal-title-order-products">
                            Order Products (<span id="modal-order-id">#ORD001</span>)
                        </h3>
                        <div class="mt-2" id="orderProductsContent">
                            <ul class="list-none pl-0 text-gray-700">
                                <li class="py-2 border-b last:border-b-0">
                                    <span class="font-medium">Product A</span> - Quantity: 2 - Price: $25.00
                                </li>
                                <li class="py-2 border-b last:border-b-0">
                                    <span class="font-medium">Product B</span> - Quantity: 1 - Price: $5.00
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-gray-100 px-6 py-4 sm:px-8 sm:py-6 flex justify-end space-x-2">
                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400" onclick="document.getElementById('orderProductsModal').classList.add('hidden');">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openOrderProductsModal(orderId) {
                console.log('Opening modal for order:', orderId);
                document.getElementById('orderProductsModal').classList.remove('hidden');
                document.getElementById('modal-order-id').textContent = '#' + orderId;
                // In a real scenario, you'd fetch and display product data here
            }

            function initiateStkPush(orderId) {
                console.log('Initiating STK for order:', orderId);
                alert('STK Push initiated for order: ' + orderId + ' (No actual backend call in this design)');
                // In a real scenario, you'd make an AJAX request to your backend
            }

            document.addEventListener('DOMContentLoaded', () => {
                const orderTableBody = document.querySelector('.divide-y > tbody');
                if (orderTableBody) {
                    orderTableBody.addEventListener('click', (event) => {
                        if (event.target.innerText === 'View') {
                            const orderId = event.target.closest('tr').querySelector('.font-medium').innerText;
                            openOrderProductsModal(orderId);
                        } else if (event.target.innerText === 'STK') {
                            const orderId = event.target.closest('tr').querySelector('.font-medium').innerText;
                            initiateStkPush(orderId);
                        }
                    });
                }
            });
        </script>
    </div>