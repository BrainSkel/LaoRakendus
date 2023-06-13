<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('orders.update', $order) }}">
            @csrf
            @method('patch')
            <p>User Name: {{$order->client->name}}</p>
            <p>Product Name: {{$order->product->name}}</p>

            <p>Price: {{$order->product->procurementPrice_cents * $order->amount}} €</p>

            <input type="hidden" name="product_id" value="{{ old('product_id', $order->product_id) }}">

            <label class="mt-2 text-gray-400 text-sm">Amount
            <input type="number" name="amount" value="{{ old('amount', $order->amount) }}"
                placeholder="{{ __('Select an amount') }}"
                class="text-gray-900 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </label>


            {{-- <label class="mt-2 text-gray-400 text-sm">Invoice
            <input type="text" name="invoice" value="{{ old('amount', $order->invoice) }}"
                placeholder="{{ __('Invoice goes here') }}"
                class="text-gray-900 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('description', $order->description) }}</input>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </label> --}}


            <label class="mt-2 text-gray-400 text-sm">Date
                <input type="date" name="date" value="{{ old('date', \Carbon\Carbon::createFromTimeString($order->date)->toDateString()) }}"
                    placeholder="{{ __('Select a date') }}"
                    class="text-gray-900 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </label>



            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('orders.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
