<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                     fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input wire:model.live="search"
                                type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                    placeholder="{{ trans('globals.search') }}" required="">
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <label class="w-40 text-sm font-medium text-gray-900">{{ trans('globals.manufacturer') }} :</label>
                            <select wire:model.live="manufacturer"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="">{{ trans('globals.all') }}</option>
                                @foreach($manufacturers as $key => $manufacturer)
                                <option value={{ $key }}>{{ $manufacturer }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <label class="w-40 text-sm font-medium text-gray-900">{{ trans('globals.balance') }} :</label>
                            <select wire:model.live="available"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="">{{ trans('globals.all') }}</option>
                                <option value="1">{{ trans('globals.exists') }}</option>
                                <option value="0">{{ trans('globals.does_not_exist') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3" wire:click="setSortBy('name')"><button>{{ strtoupper(trans('globals.product_title')) }}</button></th>
                            <th scope="col" class="px-4 py-3" wire:click="setSortBy('manufacturer_id')"><button>{{ strtoupper(trans('globals.manufacturer')) }}</button></th>
                            <th scope="col" class="px-4 py-3" wire:click="setSortBy('price')"><button>{{ strtoupper(trans('globals.price')) }}</button></th>
                            <th scope="col" class="px-4 py-3" wire:click="setSortBy('available')"><button>{{ trans('globals.available') }}</button></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3">{{ $product->name }}</td>
                            <td class="px-4 py-3">{{ $product->manufacturer->name }}</td>
                            <td class="px-4 py-3">{{ $product->price }}</td>
                            <td class="px-4 py-3 {{ $product->available ? 'text-green-500' : 'text-red-600' }}">{{ $product->available ? trans('globals.yes') : trans('globals.no') }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select wire:model.live="perPage"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
