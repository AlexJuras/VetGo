<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Consulta;
use App\Models\Estudante;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAnimais = Animal::count();
        $totalTutores = Tutor::count();
        $totalEstudantes = Estudante::count();
        $receitaMes = Consulta::whereMonth('data_consulta', now()->month)
            ->whereYear('data_consulta', now()->year)
            ->sum('valor');

        // Consultas do dia // Consultas nas próximsa 2 horas
        $consultasHoje = Consulta::whereDate('data_consulta', now()->toDateString())->count();
        $agora = now();
        $duasHorasDepois = now()->addHours(2)->toTimeString();
        $consultasProximas = Consulta::whereRaw("datetime(data_consulta) || ' ' || horario >= ?", [$agora])
            ->whereRaw("datetime(data_consulta) || ' ' || horario <= ?", [$duasHorasDepois])
            ->count();

        // Dados de ações recentes
        $novosAnimaisSemana = Animal::where('created_at', '>=', now()->subWeek())->count();
        $novosTutoresSemana = Tutor::where('created_at', '>=', now()->subWeek())->count();
        
        


        return Inertia::render('Home', [
            'totalAnimais' => $totalAnimais,
            'totalTutores' => $totalTutores,
            'totalEstudantes' => $totalEstudantes,
            'receitaMes' => $receitaMes,
            'consultasHoje' => $consultasHoje,
            'consultasProximas' => $consultasProximas,
            'novosAnimaisSemana' => $novosAnimaisSemana,
            'novosTutoresSemana' => $novosTutoresSemana,
        ]);
    }
}
