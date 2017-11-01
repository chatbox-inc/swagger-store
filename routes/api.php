<?php

use Illuminate\Http\Request;

use App\Apidoc;
use Illuminate\Http\JsonResponse;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put("/swagger/{API_KEY}",function($apiKey){
	$doc = Apidoc::where("api_key",$apiKey)->first();
	if($doc){
		return JsonResponse::create([
			"status" => "ERROR"
		],400);
	}else{
		Apidoc::create([
			"api_key" => $apiKey,
			"doc" => json_encode(\request()->all())
		]);
		return JsonResponse::create([
			"status" => "OK"
		],200);
	}
});

Route::patch("/swagger/{API_KEY}",function($apiKey){
	$doc = Apidoc::where("api_key",$apiKey)->first();
	if($doc){
		$doc->doc = json_encode(\request()->all());
		$doc->save();
		return JsonResponse::create([
			"status" => "OK"
		],200);
	}else{
		return JsonResponse::create([
			"status" => "ERROR"
		],400);
	}
});