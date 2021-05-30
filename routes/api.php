<?php

use App\Http\Resources\UpcomingResource;
use App\Models\Today;
use App\Models\Upcoming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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

Route::get('/upcoming', function () {
    $upcoming = Upcoming::all();
    return UpcomingResource::collection($upcoming);
});

Route::post('/upcoming', function (Request $request) {
    return Upcoming::create([
        'title' => $request->title,
        'taskId' => $request->taskId,
        'waiting' => $request->waiting
    ]);
});

Route::delete('/upcoming/{taskId}', function ($taskId) {
    DB::table('upcomings')->where('taskId', $taskId)->delete();
    return 204;
});

Route::post('/dailytask', function (Request $request) {
    return Today::create([
        'id' => $request->id,
        'title' => $request->title,
        'taskId' => $request->taskId
    ]);
});

Route::delete('/dailytask/{taskId}', function ($taskId) {
    DB::table('todays')->where('taskId', $taskId)->delete();
    return 204;
});
