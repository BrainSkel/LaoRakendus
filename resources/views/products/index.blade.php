<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <input type="text" name="name"
                    value="{{ old('name') }}"
                    placeholder="{{ __('Name the product') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <input type="number" name="procurementPrice_cents"
                    value="{{ old('procurementPrice_cents') }}"
                    placeholder="{{ __('Procurement price in cents') }}"
                    class="mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <x-input-error :messages="$errors->get('procurementPrice_cents')" class="mt-2" />
            <x-input-error :messages="$errors->get('duration_minutes')" class="mt-2" />
            <textarea name="description"
                    placeholder="{{ __('Add a description for the product.') }}"
                class="mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Add Product') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
