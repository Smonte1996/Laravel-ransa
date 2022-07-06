<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Dissatisfaction_serviceController;
use App\Http\Controllers\NotificationserviceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PositionController;
use App\Http\Livewire\Guest\DissatisfiedServices;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Ruta de Visitantes
Route::get('servicio', DissatisfiedServices::class);


// Rutas para usuarios administrador
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->name('adm.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::post('dataacciones', [ActionController::class, 'getData'])->name('data');
        Route::resource('acciones', ActionController::class)->except(['show'])->parameters(['acciones' => 'action'])->names('actions');
        Route::post('dataservicios_insatisfaccion', [Dissatisfaction_serviceController::class, 'getData'])->name('data');
        Route::resource('listado-servicios', Dissatisfaction_serviceController::class)->except(['show'])->parameters(['listado-servicios' => 'dissatisfaction_service'])->names('dissatisfaction_services');
        Route::post('dataposiciones', [PositionController::class, 'getData'])->name('data');
        Route::resource('posiciones', PositionController::class)->except(['show'])->parameters(['posiciones' => 'position'])->names('positions');
        Route::post('dataactivities', [ActivityController::class, 'getData'])->name('data');
        Route::resource('actividades', ActivityController::class)->except(['show'])->parameters(['actividades' => 'activity'])->names('activities');
        Route::post('datausers', [UserController::class, 'getData'])->name('data');
        Route::resource('usuarios', UserController::class)->except(['show'])->parameters(['usuarios' => 'user'])->names('users');
        Route::post('datasuppliers', [SupplierController::class, 'getData'])->name('data');
        Route::resource('proveedores', SupplierController::class)->except(['show'])->parameters(['proveedores' => 'supplier'])->names('suppliers');
        Route::post('datapermissions', [PermissionController::class, 'getData'])->name('data');
        Route::post('import', [PermissionController::class, 'import'])->name('permissions.import');
        Route::resource('permisos', PermissionController::class)->except(['show'])->parameters(['permisos' => 'permission'])->names('permissions');        
        Route::post('dataroles', [RoleController::class, 'getData'])->name('data');
        Route::resource('roles', RoleController::class)->except(['show'])->parameters(['roles' => 'role'])->names('roles');
        Route::post('dataclients', [ClientController::class, 'getData'])->name('data');
        Route::resource('clientes', ClientController::class)->except(['show'])->parameters(['clientes' => 'client'])->names('clients');
        Route::post('dataemployees', [EmployeeController::class, 'getData'])->name('data');
        Route::resource('empleados', EmployeeController::class)->except(['show'])->parameters(['empleados' => 'employee'])->names('employees');
        Route::post('datadepartaments', [DepartamentController::class, 'getData'])->name('data');
        Route::resource('departamentos', DepartamentController::class)->except(['show'])->parameters(['departamentos' => 'departament'])->names('departaments');
        Route::post('datawarehouses', [WarehouseController::class, 'getData'])->name('data');
        Route::resource('almacenes', WarehouseController::class)->except(['show'])->parameters(['almacenes' => 'warehouse'])->names('warehouses');
        Route::post('datacities', [CityController::class, 'getData'])->name('data');
        Route::resource('ciudades', CityController::class)->except(['show'])->parameters(['ciudades' => 'city'])->names('cities');
        Route::post('datacountries', [CountryController::class, 'getData'])->name('data');
        Route::resource('paises', CountryController::class)->except(['show'])->parameters(['paises' => 'country'])->names('countries');
    });

    // Rutas para Usuarios que no son administradores
Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::post('datanotificationdissatisfactions', [NotificationserviceController::class,'getData'])->name('data');
    Route::post('downloadfile/{notification_service}', [NotificationserviceController::class,'download'])->name('notifications.download');
    Route::post('downloadnotificacion', [NotificationserviceController::class,'download_notificacion'])->name('notifications.downloadnotificacion');
    Route::resource('servicio-no-conforme', NotificationserviceController::class)->except(['create',])->parameters(['servicio-no-conforme' => 'notification_service'])->names('notifications');
    
});    
