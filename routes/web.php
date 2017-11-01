<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Apidoc;

use Illuminate\Http\Response;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/swagger/{apiKey}', function ($apiKey) {
	$doc = Apidoc::where("api_key",$apiKey)->first();
	if($doc){
		return view( "swagger", [
			"apiKey" => $apiKey,
			"doc" => $doc
		]);
	}
	abort(404);
});
Route::get('/swagger/{apiKey}/json', function ($apiKey) {
	$doc = Apidoc::where("api_key",$apiKey)->first();
	if($doc){
		return Response::create($doc->doc,200,[
			"Content-type" => "application/json"
		]);
	}
	abort(404);
});

Route::get('/swagger/{apiKey}/doc', function ($apiKey) {
	$doc = Apidoc::where("api_key",$apiKey)->first();
	if($doc) {
		return view( "swaggerdoc", [
			"apiKey" => $apiKey
		]);
	}
	abort(404);
});
