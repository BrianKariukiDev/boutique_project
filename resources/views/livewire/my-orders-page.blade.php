<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-slate-500">My Orders</h1>
    <div class="flex flex-col bg-white p-5 rounded mt-4 shadow-lg">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
              <thead>
                <tr>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Date</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order Status</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Payment Status</th>
                  <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order Amount</th>
                  <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($my_orders as $my_order)
                <tr wire:key='{{$my_order->id}}' class="odd:bg-white even:bg-gray-100">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$my_order->id}}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$my_order->created_at}}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><span class="bg-orange-500 py-1 px-3 rounded text-white shadow">{{$my_order->status}}</span></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><span class="bg-green-500 py-1 px-3 rounded text-white shadow">{{$my_order->payment_status}}</span></td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$my_order->grand_total}}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                    <a href="/my-orders/{{$my_order->id}}" class="bg-slate-600 text-white py-2 px-4 rounded-md hover:bg-slate-500">View Details</a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
              <div class="flex justify-end mt-6">{{$my_orders->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>