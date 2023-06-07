<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('orders.update', $order) }}">
            @csrf
            @method('patch')
            <label class="text-gray-400 text-sm">Product name
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                    placeholder="{{ __('Name the product') }}"
                    class="text-gray-900 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </label>
            <label class="mt-2 text-gray-400 text-sm">Amount
            <input type="number" name="amount" value="{{ old('amount', $order->amount) }}"
                placeholder="{{ __('Select an amount') }}"
                class="text-gray-900 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </label>
            <label class="mt-2 text-gray-400 text-sm">Invoice
            <textarea name="description" placeholder="{{ __('Invoice goes here') }}"
                class="text-gray-900 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('description', $order->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </label>
            <label class="mt-2 text-gray-400 text-sm">Date
                <input type="number" name="date" value="{{ old('date', $order->date) }}"
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
