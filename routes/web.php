<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuditoriasController;
use App\Http\Controllers\BibliotecaDocumentosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ProspectosAcaController;
use App\Http\Controllers\ProspectosAcaImportadosController;
use App\Http\Controllers\ListadoDocumentosController;
use App\Http\Controllers\PlantasProveedorController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\VisitaInspectivaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//////USUARIOS////////
Route::match(['get','post'],'/usuarios/listado', [UsuariosController::class, 'usuarios_list'])->name('listUsuarios');
Route::get('/usuarios/edit/{id}', [UsuariosController::class, 'usuario_edit'])->name('editUsuario');
Route::patch('/usuarios/edit/guardar/{id}', [UsuariosController::class, 'guardar_usuario'])->name('guardarEditUsuario');


//////PRODUCTOS////////
Route::match(['get','post'],'/productos/listado', [ProductosController::class, 'productos_list'])->name('listProductos');
Route::get('/productos/edit/{id}', [ProductosController::class, 'producto_edit'])->name('editProducto');
Route::get('/productos/nuevo/', [ProductosController::class, 'producto_nuevo'])->name('nuevoProducto');

Route::post('/productos/nuevo/guardar', [ProductosController::class, 'guardar_producto'])->name('guardarNuevoProducto');
Route::patch('/productos/edit/guardar/{id}', [ProductosController::class, 'guardar_producto'])->name('guardarEditProducto');


//////PROVEEDORES////////
Route::match(['get','post'],'/proveedores/listado', [ProveedoresController::class, 'proveedores_list'])->name('listProveedores');
Route::get('/proveedores/edit/{id}', [ProveedoresController::class, 'proveedor_edit'])->name('editProveedor');
Route::get('/proveedores/nuevo/', [ProveedoresController::class, 'proveedor_nuevo'])->name('nuevoProveedor');
Route::post('/proveedores/nuevo/guardar', [ProveedoresController::class, 'guardar_proveedor'])->name('guardarNuevoProveedor');
Route::patch('/proveedores/edit/guardar/{id}', [ProveedoresController::class, 'guardar_proveedor'])->name('guardarEditProveedor');
Route::get('/proveedores/asignar_secciones/', [ProveedoresController::class, 'set_secciones_proveedor']);
Route::get('/proveedores/buscar', [ProveedoresController::class, 'buscar_proveedor'])->name('buscarProveedor');

//////////PROSPECTOS PRODUCTOS ACA///////////////
Route::get('prospectos/proceso',[ProspectosAcaController::class,'list_prospectos_proceso'])->name('prospectos.list.proceso');
Route::get('prospectos/cerrado',[ProspectosAcaController::class,'list_prospectos_cerrado'])->name('prospectos.list.cerrado');
Route::get('prospectos/pdf/{id}',[ProspectosAcaController::class,'prospecto_PDF'])->name('prospectos.pdf');
Route::post('prospectos/delete',[ProspectosAcaController::class,'delete'])->name('prospectos.delete');
Route::resource('prospectos', ProspectosAcaController::class);

//////////PROSPECTOS PRODUCTOS IMPORTADOS ACA///////////////
Route::match(['get','post'],'prospectos-importados/fichas-tecnicas',[ProspectosAcaImportadosController::class,'buscar_fichas_tecnicas'])->name('prospectos.importados.fichas-tecnicas');
Route::get('prospectos-importados/formato-masivo', [ProspectosAcaImportadosController::class, 'formato_masivo_productos_excel'])->name('prospectos.importados.excel.formato-masivo');
Route::get('prospectos-importados/proceso',[ProspectosAcaImportadosController::class,'list_prospectos_proceso'])->name('prospectos.importados.list.proceso');
Route::get('prospectos-importados/cerrado',[ProspectosAcaImportadosController::class,'list_prospectos_cerrado'])->name('prospectos.importados.list.cerrado');
Route::get('prospectos-importados/pdf/{id}',[ProspectosAcaImportadosController::class,'prospecto_PDF'])->name('prospectos.importados.pdf');
Route::post('prospectos-importados/delete',[ProspectosAcaImportadosController::class,'delete'])->name('prospectos-importados.delete');
Route::resource('prospectos-importados', ProspectosAcaImportadosController::class);
Route::get('prospectos-importados/planilla-solicitud/{id}', [ProspectosAcaImportadosController::class, 'planilla_solicitud_prospecto_excel'])->name('prospectos.importados.excel.planilla-solicitud');
Route::get('prospectos-importados/ficha-tecnica/{id}', [ProspectosAcaImportadosController::class, 'ficha_tecnica_excel'])->name('prospectos.importados.excel.ficha-tecnica');

#Route::match(['get','post'],'prospectos/cerrado',[ProspectosAcaController::class,'list_prospectos_cerrado'])->name('prospectos.list.cerrado');

//////////CONTACTOS PROVEEDOR///////////////
Route::resource('contactos-proveedor', ProspectosAcaController::class);
//////////LISTADO DOCUMENTOS///////////////
Route::resource('documentos', ListadoDocumentosController::class);
//////////TAGS///////////////
Route::resource('tags', TagsController::class);

/////////AUDITORIAS/////////
Route::match(['get','post'],'/auditorias/buscar-proveedor',[AuditoriasController::class,'pre_create'])->name('auditorias.pre_create');
Route::get('/auditorias/nueva/{id}', [AuditoriasController::class, 'new'])->name('auditorias.new');
Route::post('/auditorias', [AuditoriasController::class, 'store'])->name('auditorias.store');
Route::get('/auditorias/{id}/edit', [AuditoriasController::class, 'edit'])->name('auditorias.edit');
Route::patch('/auditorias/{id}', [AuditoriasController::class, 'update'])->name('auditorias.update');
Route::get('/auditorias', [AuditoriasController::class, 'index'])->name('auditorias.index');
Route::post('auditorias/delete',[AuditoriasController::class,'delete'])->name('auditorias.delete');

/////////VISITAS INSPECTIVAS/////////
Route::match(['get','post'],'/visita-inspectiva/buscar-proveedor',[VisitaInspectivaController::class,'pre_create'])->name('visita.inspectiva.pre_create');
Route::get('/visita-inspectiva/nueva/{id}', [VisitaInspectivaController::class, 'new'])->name('visita.inspectiva.new');
Route::post('/visita-inspectiva', [VisitaInspectivaController::class, 'store'])->name('visita.inspectiva.store');
Route::get('/visita-inspectiva/{id}/edit', [VisitaInspectivaController::class, 'edit'])->name('visita.inspectiva.edit');
Route::patch('/visita-inspectiva/{id}', [VisitaInspectivaController::class, 'update'])->name('visita.inspectiva.update');
Route::get('/visita-inspectiva', [VisitaInspectivaController::class, 'index'])->name('visita.inspectiva.index');
Route::post('visita-inspectiva/delete',[VisitaInspectivaController::class,'delete'])->name('visita.inspectiva.delete');


/////////BIBLIOTECA/////////
Route::match(['get','post'],'/biblioteca',[BibliotecaDocumentosController::class,'index'])->name('biblioteca.index');
Route::get('/biblioteca/cargar-documento', [BibliotecaDocumentosController::class, 'create'])->name('biblioteca.create');
Route::post('/biblioteca/cargar-documento', [BibliotecaDocumentosController::class, 'store'])->name('biblioteca.store');
Route::get('/biblioteca/cargar-documento/{$id}/edit', [BibliotecaDocumentosController::class, 'edit'])->name('biblioteca.edit');
Route::patch('/biblioteca/cargar-documento/{$id}', [BibliotecaDocumentosController::class, 'update'])->name('biblioteca.update');
Route::post('/biblioteca/cargar-documento/delete', [BibliotecaDocumentosController::class, 'delete'])->name('biblioteca.delete');
Route::post('/biblioteca/media/delete', [BibliotecaDocumentosController::class, 'delete_media'])->name('biblioteca.delete.media');
Route::post('/biblioteca/cargar-documento/buscar-proveedor', [BibliotecaDocumentosController::class, 'buscar_proveedor'])->name('biblioteca.buscar.proveedor');
Route::post('/biblioteca/cargar-documento/buscar-producto-proveedor', [BibliotecaDocumentosController::class, 'buscar_producto_proveedor'])->name('biblioteca.buscar.producto.proveedor');


///////////////PLANTAS////////////////////
#Route::match(['get','post'],'/plantas-proveedor/listado', [PlantasProveedorController::class, 'plantas_list'])->name('plantas-proveedor.list')->middleware(['auth', 'verified']);
Route::match(['get','post'],'/plantas-proveedor/pre-create', [PlantasProveedorController::class, 'pre_create'])->name('plantas-proveedor.pre-create')->middleware(['auth', 'verified']);
Route::resource('/plantas-proveedor', PlantasProveedorController::class)->middleware(['auth', 'verified']);