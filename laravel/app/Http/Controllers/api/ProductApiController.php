<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ProductCollection
     */
    public function index()
    {
        return new ProductCollection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return ProductResource
     * @throws ValidationException
     */
    public function store(StoreProductRequest $request)
    {
        return new ProductResource(Product::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(["data" => [
            "success" => true
        ]]);
    }

    public function recommended($city)
    {
        // weather data
        $response = Http::get('https://api.meteo.lt/v1/places/' . $city .'/forecasts/long-term');
        $jsonData = $response->json();
        // city name
        $name = $jsonData['place']['name'];
        // acquires 3 weather dates
        $dayNum = 3;
        $uniqDateArr = array();
        $checkUpCount = count($jsonData['forecastTimestamps']);
        for ($x = 0; $x < $checkUpCount; $x++){
            $time = $jsonData['forecastTimestamps'][$x]['forecastTimeUtc'];
            $date = date('Y-m-d', strtotime($time));
            if (!in_array($date, $uniqDateArr)){
                $uniqDateArr[] = $date;
            }
            if (sizeof($uniqDateArr) == $dayNum)
                break;
        }
        // gets most occurring weather condition of the day
        $weatherCondition = array();
        $dayCondition = array();
        $countas = 0;
        for ($x = 0; $x < $checkUpCount; $x++){
            //  gets date from datetime
            $time = $jsonData['forecastTimestamps'][$x]['forecastTimeUtc'];
            $date = date('Y-m-d', strtotime($time));
            // if before date is not equal to current date get weather condition on current date
            if ($uniqDateArr[$countas] != $date){
                $count=array_count_values($weatherCondition);
                arsort($count);
                $keys=array_keys($count);
                $dayCondition[] = $keys[0];
                $countas++;
                $weatherCondition = array();
            }
            // if date is not in 3 day array we break the cycle
            if (!in_array($date, $uniqDateArr)){
                break;
            }
            $weatherCondition[] = $jsonData['forecastTimestamps'][$x]['conditionCode'];
        }
        // chooses products by weather forecasts
        $dbProduct = new ProductCollection(Product::all());
        $prodArr = array();
        $recommendations = array();
        for ($x = 0; $x < sizeof($uniqDateArr); $x++){
            for ($z = 0; $z < sizeof($dbProduct); $z++) {
                $cond = explode(',',$dbProduct[$z]["for_weather_forecasts"]);
                for ($c = 0; $c < sizeof($cond); $c++){
                    if ($cond[$c] == $dayCondition[$x]){
                        if (!in_array($dbProduct[$z],$prodArr)){
                            if (sizeof($prodArr) == 2)
                                break;
                            $prodArr[] = collect($dbProduct[$z])->only(['sku','name','price']);
                        }

                    }
                }
            }
            $recommendations[] =
                array(
                    'weather_forecast' => $dayCondition[$x],
                    'date' => $uniqDateArr[$x],
                    'products' => $prodArr,
                );
            json_encode($recommendations);
            $prodArr = array();
        }

        return response()->json(['city'=>$name, 'recommendations' => $recommendations]);
    }
}
