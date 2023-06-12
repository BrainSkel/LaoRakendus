<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($orders as $order)
                <div class="flex-1">
                    <div>
                        <div class="flex justify-between items-center">
                            <div class="ml-2 text-sm text-gray-600">
                                Product Name:<span class="text-lg text-gray-800"> {{$order->product->name}}</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="ml-2 text-sm text-gray-600">
                                Date:<span class="text-lg text-gray-800"> {{$order->date}}</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="ml-2 text-sm text-gray-600">
                                Invoice:<span class="text-lg text-gray-800"> {{$order->invoice}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>






    </div>
</x-app-layout>
