<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Recommendations by forecast
            </h2>
        </header>

        <div class="max-w-sm mx-auto mt-10 p-6 bg-white shadow">
            @if (isset($data))
                <h1 class="text-3xl font-bold">{{ $data->city }}</h1>
                <p class="mb-4">API Response:</p>
                <ul class="list-none p-0">
                    @foreach ($data->recommendations as $recommendation)
                        <div class="px-4 py-2 border border-gray-400 mb-2">
                            <p class="text-sm font-bold mb-1">Date: {{ $recommendation->date }}</p>
                            <p class="text-sm font-bold mb-1">Weather Forecast: {{ $recommendation->weather_forecast }}</p>

                            <table class="rounded border-2 border-gray-200">
                                <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">SKU</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($recommendation->products as $product)
                                    <tr class="border-t border-gray-300">
                                        <td class="px-4 py-2">{{ $product->sku }}</td>
                                        <td class="px-4 py-2">{{ $product->name }}</td>
                                        <td class="px-4 py-2">{{ $product->price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </ul>
                <p class="text-xs text-gray-600 mt-2">Data sourced from LHMT</p>
            @else
                <form action="/recommended/submit" method="post">
                    @csrf
                    <div class="mb-4">
                        <h1 class="text-3xm font-bold"> Input Lithuanian city </h1>
                        <label>
                            <input type="text" name="city" class="border border-gray-400 p-2 w-full">
                        </label>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
                </form>
            @endif
        </div>

    </x-card>
</x-layout>
