<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BilletController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\FoundAndLostController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\WallController;
use App\Http\Controllers\WarningController;
use GuzzleHttp\Middleware;

Route::get('/ping', function(){
    return['pong'=>true];
});

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function(){

    //Usuários
    Route::post('auth/validate', [AuthController::class, 'validateToken']);
    Route::post('auth/logout', [AuthController::class, 'logout']);
    Route::get('/myUser',[AuthController::class, 'getMyUser']);

    //Mural de avisos
    Route::get('/walls', [WallController::class, 'getAll']);
    Route::post('/wall/{id}/like', [WallController::class, 'like']);

    //Documentos
    Route::get('/docs',[DocController::class, 'getAll']);

    // Livro de ocorrências
    Route::get('/warnings', [WarningController::class, 'getMyWarnings']);
    Route::post('/warning', [WarningController::class, 'setWarning']);
    Route::post('/warning/file', [WarningController::class, 'addWarningFile']);

    //Boletos
    Route::get('/billets',[BilletController::class, 'getAll']);

    //Achados e perdidos
    Route::get('/foundAndLost',[FoundAndLostController::class,'getAll']);
    Route::post('/foundAndLost',[FoundAndLostController::class, 'insert']);
    Route::put('/foundAndLost/{id}',[FoundAndLostController::class, 'update']);

    //Unidade
    Route::get('/unit/{id}',[UnitController::class, 'getInfo']);
    Route::post('/unit/{id}/addPerson', [UnitController::class, 'addPerson']);
    Route::post('/unit/{id}/addVehicle', [UnitController::class, 'addVehicle']);
    Route::post('/unit/{id}/addPet', [UnitController::class, 'addPet']);
    Route::post('/unit/{id}/removePerson', [UnitController::class, 'removePerson']);
    Route::post('/unit/{id}/removeVehicle', [UnitController::class, 'removeVehcicle']);
    Route::post('/unit/{id}/removePet', [UnitController::class, 'removePet']);

    //Reservas
    Route::get('/reservations',[ReservationController::class, 'getReservations']);
    Route::post('reservation/{id}',[ReservationController::class, 'setReservation']);

    Route::get('/reservation/{id}/disabledDates',[ReservationController::class, 'getDisabledDates']);
    Route::get('/reservation/{id}/times', [ReservationController::class, 'getTimes']);

    Route::get('/myReservations',[ReservationController::class, 'getMyReservations']);
    Route::delete('/myReservation/{id}',[ReservationController::class, 'delMyReservation']);
  

});


