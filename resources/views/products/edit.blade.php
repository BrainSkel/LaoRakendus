<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('products.update', $product) }}">
            @csrf
            @method('patch')
            <label class="text-gray-400 text-sm">Name
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                    placeholder="{{ __('Name the product') }}"
                    class="text-gray-900 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </label>
            <label class="mt-2 text-gray-400 text-sm">Base Price (cents)
            <input type="number" step="0.01" name="procurementPrice_cents" value="{{ old('procurementPrice_cents', $product->procurementPrice_cents) }}"
                placeholder="{{ __('Base price in cents') }}"
                class="text-gray-900 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('procurementPrice_cents')" class="mt-2" />
            </label>
            <label class="mt-2 text-gray-400 text-sm">Description
            <textarea name="description" placeholder="{{ __('Add a description for the product.') }}"
                class="text-gray-900 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </label>
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('products.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
