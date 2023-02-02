<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit product</h2>
            <p class="mb-4">Edit: {{$product->name}}</p>
        </header>

        <form method="POST" action="/products/{{$product->sku}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Product name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                       value="{{$product->name}}" />

                @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">Price</label>
                <input type="number" min="0.01" value="0.01" step=".01" class="border border-gray-200 rounded p-2 w-full" name="price"
                       placeholder="12.34" value="{{$product->price}}" />

                @error('price')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="for_weather_forecasts" class="inline-block text-lg">Suitable for weather conditions </label>
                <p class="text-xs text-gray-600">separate values with a single comma only</p>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="for_weather_forecasts"
                       placeholder="sunny,cloudy,rainy" value="{{$product->for_weather_forecasts}}" />

                @error('for_weather_forecasts')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button class="text-black ml-4">
                    Update Product
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
