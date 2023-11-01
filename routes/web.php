<?php

use Illuminate\Support\Facades\Route;
use App\Models\Products;
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
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //CORTES
    Route::get('/functions/cortes', function () {
        return view('functions/show');
    })->name('cortes');

    Route::get('/lookup', function () {
        $query = request('query');
    
        $products = Product::where('EAN', 'like', "%$query%")
            ->orderBy('Nome')
            ->get(['EAN', 'Nome']);
    
        return $products->pluck('name');
    })->name('lookup');

    Route::get('/registros/pef', function () {
        return view('registros/show');
    })->name('cortesview');

    Route::get('/auth_section', function () {
        return view('section/auth_section');
    })->name('auth_section');

    Route::get('/functions/products', function () {
        return view('services/products/show');
    })->name('losses_product');

    //ATIVIDADES
    Route::get('/task/setores', function () {
        return view('section/show');
    })->name('tasks');

    //TICKETS
    Route::get('/tickets/chamado', function () {
        return view('tickets/show');
    })->name('chamado');

    Route::get('/tickets/compradores/produtos', function () {
        return view('tickets/settings/show');
    })->name('produtsChamados');

    Route::get('/pagamentos/guias', function () {
        return view('payments/show');
    })->name('payments');
    
    //LICITAÇÕES
    Route::get('/licitacao/processos', function () {
        return view('licitacao/show');
    })->name('licitacao');

    Route::get('/licitacao/OEF', function () {
        return view('licitacao/oef/show');
    })->name('OEF');

    //PAINEL DE ATIVIDADES DIÁRIAS
    Route::get('/dashboard/tasks', function () {
        return view('dashboard/tasks/show');
    })->name('dashboardTask');

    //REGISTROS DE PRODUTOS PROXIMO DA VALIDADE
    Route::get('/registros/validate', function () {
        return view('products/show');
    })->name('productsVal');

    Route::get('/registros/nfe', function () {
        return view('NFe/show');
    })->name('nfe');

    //CALCULADORA
    Route::get('/calculator/ean', function () {
        return view('ean/show');
    })->name('calculatorEAN');

    //CESTA BASICA
    Route::get('/functions/home', function () {
        return view('cesta/cesta-basica-controller');
    })->name('cesta');

    //PRODUTOS
    Route::get('/functions/products/add', function () {
        return view('functions/products/show');
    })->name('Addproducts');

    //RH
    Route::get('/rh/dashboard', function () {
        return view('rh/show');
    })->name('rh');
});
