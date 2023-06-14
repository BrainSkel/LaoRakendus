<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <label for="name">Name
                <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('Name the product') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </label>
            <label for="procurementPrice_cents">Price
                <input type="number" step="0.01" name="procurementPrice_cents" value="{{ old('procurementPrice_cents') }}"
                    placeholder="{{ __('Enter the price') }}"
                    class="mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <x-input-error :messages="$errors->get('procurementPrice_cents')" class="mt-2" />
            </label>
            <label for="description">Description
                <textarea name="description" placeholder="{{ __('Add a description for the product.') }}"
                    class="mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />

            </label>
            <x-primary-button class="mt-4">{{ __('Add Product') }}</x-primary-button>
        </form>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($products as $product)
                <div class="flex-1">
                    <div>
                        <div class="flex justify-between items-center">
                            <div class="ml-2 text-sm text-gray-600">
                                Name:<span class="text-lg text-gray-800"> {{ $product->name }}</span>

                                {{-- <small class="ml-2 text-sm text-gray-600">{{ $service->created_at->format('j M Y, g:i a') }}</small> --}}
                                @unless ($product->created_at->eq($product->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            <x-dropdown>
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
                                    <x-dropdown-link :href="route('products.edit', $product)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    {{-- <form method="POST" action="{{ route('products.destroy', $product) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('products.destroy', $product)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form> --}}
                                </x-slot>

                            </x-dropdown>
                        </div>
                        <div>

                            <small class="ml-2 text-sm text-gray-600">Description: {{ $product->description }}.</small>
                        </div>
                        <div class="ml-2 text-sm text-gray-600">
                            Base Price:<span class="text-lg text-gray-800">
                                {{ $product->procurementPrice_cents }}€</span>
                        </div>
                        <p class="ml-2 my-4 text-gray-900">{{ $product->description }}</p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
