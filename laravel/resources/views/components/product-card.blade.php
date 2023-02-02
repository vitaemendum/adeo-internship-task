@props(['product'])

<x-card>
    <div class="flex">
        <div>
            <h3 class="text-2xl">
                <a href="/products/{{$product->sku}}">{{$product->name}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$product->price}}</div>
            <div class="text-lg mt-4">
                {{$product->for_weather_forecasts}}
            </div>
        </div>
    </div>
</x-card>
