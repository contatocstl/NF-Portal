<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FuncionarioWebController;
use App\Http\Controllers\RelatorioController;
use App\Exports\RelatorioNotasExport;
use App\Models\Funcionario;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD ADMINISTRATIVO
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});


/*
|--------------------------------------------------------------------------
| ÁREA DO FUNCIONÁRIO
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/funcionario', function () {

        $funcionario = Funcionario::with('notas')
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $minhasNotas = $funcionario->notas()->count();

        $notasHoje = $funcionario->notas()
            ->whereDate('data_cadastro', today())
            ->count();

        $notasComErro = $funcionario->notas()
            ->where('status', 'erro')
            ->count();

        $historico = $funcionario->notas()
            ->orderByDesc('data_cadastro')
            ->get();

        return view(
            'funcionarios.funcionario.dashboard',
            compact(
                'funcionario',
                'minhasNotas',
                'notasHoje',
                'notasComErro',
                'historico'
            )
        );

    })->name('funcionario.dashboard');

});


/*
|--------------------------------------------------------------------------
| RELATÓRIOS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/relatorios', [RelatorioController::class, 'index'])
        ->name('relatorios.index');


    /*
    |--------------------------------------------------------------------------
    | EXPORTAÇÃO DOS RELATÓRIOS
    |--------------------------------------------------------------------------
    */

    Route::get('/relatorios/exportar', function () {

        return Excel::download(
            new RelatorioNotasExport(request()),
            'relatorio-notas.xlsx'
        );

    })->name('relatorios.exportar');

});


/*
|--------------------------------------------------------------------------
| GERENCIAMENTO DE FUNCIONÁRIOS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/funcionarios', [FuncionarioWebController::class, 'index'])
        ->name('funcionarios.index');

    Route::get('/funcionarios/create', [FuncionarioWebController::class, 'create'])
        ->name('funcionarios.create');

    Route::post('/funcionarios', [FuncionarioWebController::class, 'store'])
        ->name('funcionarios.store');

    Route::get('/funcionarios/{funcionario}/edit', [FuncionarioWebController::class, 'edit'])
        ->name('funcionarios.edit');

    Route::put('/funcionarios/{funcionario}', [FuncionarioWebController::class, 'update'])
        ->name('funcionarios.update');

    Route::delete('/funcionarios/{funcionario}', [FuncionarioWebController::class, 'destroy'])
        ->name('funcionarios.destroy');

});