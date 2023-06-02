<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">


        <form method="POST" action="{{ route('orders.store') }}">

            <select name="productId" required class="js-example-basic-single" style="width:100%;" >
                <option disabled selected>Vali toode</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
           </select>

            @csrf

            <input type="number" name="amount" value="{{ old('amount') }}"required
                placeholder="{{ __('amount') }}"
                class="mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <input type="text" required name="invoice" value="placeholderInvoice" placeholder="{{ __('invoice') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                <input type="text" required name="name" value="{{ Auth::user()->name }}" placeholder="{{ Auth::user()->name }}" readonly
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                <input type="date" required name="date" value="{{ old('date') }}" placeholder="{{ __('date') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Add order') }}</x-primary-button>
        </form>


        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($orders as $order)
                <div class="flex-1">

                    <div>
                        <div class="flex justify-between items-center">
                            <div class="ml-2 text-sm text-gray-600">
                                Id: <span class="text-lg text-gray-800"> {{ $order->id }}</span>
                                Product Name:<span class="text-lg text-gray-800"> Add product name here somehow</span>
                                {{-- <small class="ml-2 text-sm text-gray-600">{{ $service->created_at->format('j M Y, g:i a') }}</small> --}}
                                @unless ($order->created_at->eq($order->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>

                            {{-- <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4 text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('orders.edit', $order)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown> --}}
                        </div>

                        <div>

                            <small class="ml-2 text-sm text-gray-600">Name: {{ $order->name }}</small>
                        </div>
                        <div class="ml-2 text-sm text-gray-600">
                            amount:<span class="text-lg text-gray-800">
                                {{ $order->amount }}</span>
                        </div>
                        {{-- <p class="ml-2 my-4 text-gray-900">{{ $order->description }}</p> --}}

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>