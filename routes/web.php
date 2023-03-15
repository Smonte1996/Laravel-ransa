<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ReclamoController;
use App\Http\Livewire\Guest\ReclamoCliente;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CalificacioneController;
use App\Http\Controllers\Causal_generalController;
use App\Http\Controllers\confirmaraccionesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\Detalle_causalController;
use App\Http\Livewire\Guest\DissatisfiedServices;
use App\Http\Controllers\NotificationserviceController;
use App\Http\Controllers\Dissatisfaction_serviceController;
use App\Http\Livewire\Guest\Consultas;
use App\Http\Livewire\Guest\EncuestaCliente;
use App\Http\Livewire\Reclamo\Clasificaciones as ReclamoClasificaciones;
use App\Http\Livewire\Reclamo\Confirmaracciones;
use App\Http\Livewire\Reclamo\Correciones;
use App\Http\Livewire\Reclamo\InfnoProcede;
use App\Http\Livewire\Reclamo\InfoAcciones;
use App\Http\Livewire\Reclamo\Investigaciones;
use App\Http\Livewire\Reclamo\InvestigacionNoProcede;
use App\Http\Livewire\Reclamo\ReclamoController as ReclamoReclamoController;

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
Route::get('Reclamo', ReclamoCliente::class)->name('reclamo.visita');
Route::get('Consulta-cliente', Consultas::class)->name('consulta-qr');
Route::get('Encuesta/cliente/{solicitude}', EncuestaCliente::class)->name('encuesta.cliente');
Route::get('prueba-correo', function(){
    return view('mail.notificacionregistrocopia');
});


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
        
        //Rutas de gestion de reclamos.
        //   Route::post('datasolicitudes',[ReclamoController::class, 'getData'])->name('data');
          //Route::resource('Solicitudes', ReclamoController::class)->except(['show'])->parameters(['solicitud_reclamo'=> 'solicitud_reclamo'])->names('reclamo');
          Route::resource('General/causal', Causal_generalController::class)->except(['show'])->parameters(['Causal_general' => 'Causal_general'])->names('General');
          Route::resource('Detalles', Detalle_causalController::class)->except(['show'])->parameters(['Detalle_casual' => 'Detalle_causal'])->names('Detalle');

          
        Route::get('/Solicitudes', ReclamoReclamoController::class)->name('reclamo');
        Route::get('download/{id}',[ReclamoReclamoController::class, 'download'])->name('download.Archivo');
        Route::get('/Investigacion/{solicitud}', Investigaciones::class)->name('Investigador');
        Route::get('/Investigacion/{clasificacion}/Noprocede', InvestigacionNoProcede::class)->name('Investigacion.noProcede');
        Route::get('/Clasificaciones/{solicitude}', ReclamoClasificaciones::class)->name('Clasificacion');
        Route::get('/inf/reclamos/{solicitude}', InfoAcciones::class)->name('Infor.reclamo');
        Route::get('/editar/reclamo/{solicitude}', Confirmaracciones::class)->name('confirmar.acciones');
        Route::get('/solicitud/Info/no-procede/{solicitude}', InfnoProcede::class)->name('inf.no-procede');
        Route::get('/Investigacion/{solicitud}/Correccion', Correciones::class)->name('Investigacion.correccion');
        Route::get('/solicitudes/{solicitude}/edit', [confirmaraccionesController::class, 'index'])->name('solicitud.accion');
        Route::post('/solicitudes/{solicitude}/edit',[confirmaraccionesController::class, 'update'])->name('solicitud.update');

        });
        

    // Rutas para Usuarios que no son administradores
        Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::post('datanotificationdissatisfactions', [NotificationserviceController::class,'getData'])->name('data');
    Route::post('downloadfile/{notification_service}', [NotificationserviceController::class,'download'])->name('notifications.download');
    Route::post('downloadnotificacion', [NotificationserviceController::class,'download_notificacion'])->name('notifications.downloadnotificacion');
    Route::resource('servicio-no-conforme', NotificationserviceController::class)->except(['create',])->parameters(['servicio-no-conforme' => 'notification_service'])->names('notifications');
    
});    
