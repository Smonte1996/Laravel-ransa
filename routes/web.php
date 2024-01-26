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
use App\Http\Controllers\Aql_defectoController;
use App\Http\Controllers\AsignarCuadrillaController;
use App\Http\Controllers\CalificacioneController;
use App\Http\Controllers\Causal_generalController;
use App\Http\Controllers\CheckPasilloController;
use App\Http\Controllers\confirmaraccionesController;
use App\Http\Controllers\ConfirmarActividades;
use App\Http\Controllers\Data_logisticaController;
use App\Http\Controllers\DefectosController;
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
use App\Http\Controllers\Matriz_defectoController;
use App\Http\Controllers\MuestreoClientController;
use App\Http\Controllers\MuestreoContenedorController;
use App\Http\Controllers\Niveles_estandarController;
use App\Http\Controllers\PasilloController;
use App\Http\Controllers\PasilloVistaController;
use App\Http\Controllers\PracticahgController;
use App\Http\Controllers\ProvedoresEstibas;
use App\Http\Controllers\Tamano_muestraController;
use App\Http\Controllers\User_clientController;
use App\Http\Livewire\Checklist\FormularioChecklit;
use App\Http\Livewire\Guest\Consultas;
use App\Http\Livewire\Guest\EncuestaCliente;
use App\Http\Livewire\Guest\Muestreos;
use App\Http\Livewire\Higiene\FormularioHigiene;
use App\Http\Livewire\Higiene\FormularioHigieneMaquila;
use App\Http\Livewire\Higiene\FormularioHigieneProveedor;
use App\Http\Livewire\Maquila\OrdenesMaquila;
use App\Http\Livewire\Reclamo\Clasificaciones as ReclamoClasificaciones;
use App\Http\Livewire\Reclamo\Confirmaracciones;
use App\Http\Livewire\Reclamo\Correciones;
use App\Http\Livewire\Reclamo\InfnoProcede;
use App\Http\Livewire\Reclamo\InfoAcciones;
use App\Http\Livewire\Reclamo\Investigaciones;
use App\Http\Livewire\Reclamo\InvestigacionNoProcede;
use App\Http\Livewire\Reclamo\MuestreoContenedor;
use App\Http\Livewire\Reclamo\ReclamoController as ReclamoReclamoController;
use App\Models\Defecto;

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
Route::get('Muestreo-cliente', Muestreos::class)->name('muestreo.cliente');
Route::get('prueba-correo', function(){
    return view('mail.notificacionInformecopy');
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
          Route::resource('General/causal', Causal_generalController::class)->except(['show'])->parameters(['Causal_general' => 'Causal_general'])->names('General');
          Route::resource('Detalles', Detalle_causalController::class)->except(['show'])->parameters(['Detalle_casual' => 'Detalle_causal'])->names('Detalle');

          //url para administar los datos de la tabla data-logisticas.
          Route::resource('Nivel estandar', Niveles_estandarController::class)->except(['show'])->parameters(['nivel' => 'nivel_estandar'])->names('Niveles');
          Route::resource('Tamaño-niveles', Tamano_muestraController::class)->except(['show'])->parameters(['tamano_muestra'=>'tamaño_muestra'])->names('Tamaño_muestra');
          Route::resource('data-logistica', Data_logisticaController::class)->except(['show'])->parameters(['dato_logistico' => 'Data_logistica'])->names('data_logisticas');
          Route::resource('Matriz-defecto', Matriz_defectoController::class)->except(['show'])->parameters(['Matrices_defectos'=>'Matriz_defecto'])->names('Matriz');
          Route::resource('Aql-Defectos', Aql_defectoController::class)->except(['show'])->parameters(['Aql_defectos'=>'Aql_defecto'])->names('Aql');
          Route::resource('Defectos', DefectosController::class)->except(['show'])->parameters(['Defecto'=>'Defectos'])->names('Defectos');
          Route::resource('Muestreos contenedor', MuestreoContenedorController::class)->except(['show'])->parameters(['Muestreo'=>'Muestreos'])->names('Muestreos.container');
          Route::get('pdf Muestreos /{id}',[MuestreoContenedorController::class, 'GenerarpdfHorizontal'])->name('pdf.muestreo');
          // Url para cliente del muestreos
          Route::resource('user-cliente', User_clientController::class)->except(['show'])->parameters(['Users-clintes'=>'User-cliente'])->names('usuario_clientes');
          Route::resource('clientes-Muestreos', MuestreoClientController::class)->except(['show'])->parameters(['cliente_muestreo'=>'Muestreo'])->names('clients.muestreo');
          Route::get('Muestreos-contenedor', MuestreoContenedor::class)->name('Muestreo.contenedor');
          Route::get('pdf/{id}',[MuestreoContenedor::class, 'Generarpdf'])->name('view.pdf');
          Route::get('pdf-horizontal/{id}',[MuestreoContenedor::class, 'GenerarpdfHorizontal'])->name('view.pdf.horizonntal');
          Route::get('Reporte pdf transporte/ {id}',[MuestreoContenedorController::class, 'Generarpdf'])->name('view.reporte');
          Route::get('Muestreo Excel/{id}', [MuestreoContenedorController::class, 'ExportarExcel'])->name('muestreo.download');

          // url para el check de pasillo calidad
          Route::resource('ChecksPasillos', PasilloController::class)->except(['show'])->parameters(['checkPasillos', 'checkPasillo'])->names('check.pasillos');
          Route::get('Eliminar/{id}',[PasilloController::class, 'Eliminar'])->name('ChecksPasillos.Eliminar');
          Route::get('Check Pasillo/ Crear', FormularioChecklit::class)->name('Check.list');
          Route::resource('Resulta Checklist', PasilloVistaController::class)->except(['show'])->parameters(['Pasillos'=>'Pasillovista'])->names('pasillos.vista');
          Route::get('Informe /pdf /{id}',[PasilloVistaController::class, 'Informepdf'])->name('Checklist.pdf');


          // url para las practivas de higiene.
          Route::get('Practicas-higiene', FormularioHigiene::class)->name('practica.higiene');
          Route::resource('Practicas/higienes', PracticahgController::class)->except(['show'])->parameters(['Practicashg'=>'Practicashg'])->names('p.h&g');
          Route::get('Higiene/Pdf/{id}',[PracticahgController::class, 'Generarpdfs'])->name('pdf.hgs');
          Route::get('Practicas-higiene-Proveedor', FormularioHigieneProveedor::class)->name('practica.Proveedor');
          Route::get('Higienes/Pdf-Proveedors/{id}',[PracticahgController::class, 'PdfProveedor'])->name('pdf.Proveedor');
          Route::get('Practicas-higiene-Maquila', FormularioHigieneMaquila::class)->name('Practica.Maquila');
          Route::get('Praticas/pdf-Maquila/{id}', [PracticahgController::class, 'PdfMaquila'])->name('Pdf.maquila');

          // rutas para el update de las tareas tanto como maquila y proveedor y personal ransa.
          Route::get('Practicas/tarea/{id}', [PracticahgController::class, 'PersonalRansa'])->name('Tarea.ransa');
          Route::get('Practicas/Tarea-Maquila/{id}', [PracticahgController::class, 'VistaMaquila'])->name('Tarea.Maquila');
          Route::put('Confirmar/{resultado}/{ids}',[PracticahgController::class, 'ConfirmartaskMaquila'])->name('Tasks.Maquila');
          Route::put('Praticas/pdf-Maquila/{id}/{ids}',[PracticahgController::class, 'update'])->name('Tasks.Proveedor');
          Route::put('PersonalRansa/{id}',[PracticahgController::class, 'ConfirmarTarea'])->name('Tareas.Ransas');

          //urles para administrar la parte de los estibas.
          Route::resource('Proveedores-estibas', ProvedoresEstibas::class)->except(['show'])->parameters(['Provedor' => 'Proveedores'])->names('Estibas');
          Route::resource('Asgnacion-estibas', AsignarCuadrillaController::class)->except(['show'])->parameters(['Asignar-estibas'=>'Asignacion-estibas'])->names('Asignar-estibas');
          Route::resource('Confirmacion-estibas', ConfirmarActividades::class)->except(['show'])->parameters(['Confirmar-estibas'=>'Confirmacion-estibas'])->names('Confirmar-estibas');

          //url para el apartado de maquila.
          Route::get('Trabajo Maquila', OrdenesMaquila::class)->name('Maquila.trabajo');

        Route::get('/Solicitudes', ReclamoReclamoController::class)->name('reclamo');
        Route::get('download/{id}',[ReclamoReclamoController::class, 'download'])->name('download.Archivo');
        Route::get('Reclamo-pdf/{id}',[ReclamoReclamoController::class, 'ReclamoPdf'])->name('pdf.Reclamo');
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
