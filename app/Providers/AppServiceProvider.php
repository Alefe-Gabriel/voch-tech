<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Adapters\AtualizarColaborador;
use App\Core\Adapters\CadastroColaboradores;
use App\Core\Adapters\CadastroUnidades;
use App\Core\Adapters\ListarCargos;
use App\Core\Adapters\ListarColaboradores;
use App\Core\Adapters\ListarColaboradoresPorPerformance;
use App\Core\Adapters\ListarColaboradoresPorUnidade;
use App\Core\Adapters\NotaColaborador;
use App\Core\Usecases\AtualizarColaboradorImpl;
use App\Core\Usecases\CadastroColaboradoresImpl;
use App\Core\Usecases\CadastroUnidadesImpl;
use App\Core\Usecases\ListarCargosImpl;
use App\Core\Usecases\ListarColaboradoresImpl;
use App\Core\Usecases\ListarColaboradoresPorPerformanceImpl;
use App\Core\Usecases\ListarColaboradoresPorUnidadeImpl;
use App\Core\Usecases\NotaColaboradorImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            AtualizarColaborador::class,
            function ($app) {
                return new AtualizarColaboradorImpl();
            }
        );

        $this->app->bind(
            CadastroColaboradores::class,
            function ($app) {
                return new CadastroColaboradoresImpl();
            }
        );

        $this->app->bind(
            CadastroUnidades::class,
            function ($app) {
                return new CadastroUnidadesImpl();
            }
        );

        $this->app->bind(
            ListarCargos::class,
            function ($app) {
                return new ListarCargosImpl();
            }
        );

        $this->app->bind(
            ListarColaboradores::class,
            function ($app) {
                return new ListarColaboradoresImpl();
            }
        );

        $this->app->bind(
            ListarColaboradoresPorPerformance::class,
            function ($app) {
                return new ListarColaboradoresPorPerformanceImpl();
            }
        );

        $this->app->bind(
            ListarColaboradoresPorUnidade::class,
            function ($app) {
                return new ListarColaboradoresPorUnidadeImpl();
            }
        );

        $this->app->bind(
            NotaColaborador::class,
            function ($app) {
                return new NotaColaboradorImpl();
            }
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
