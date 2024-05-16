<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\User;
use App\Models\produto;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $usuarios = User::all()->count();

        //grafico 1 - usuarios
        $userData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total'),
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        //preparar arrays
        foreach ($userData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        //formatar chartjs
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        //grafico 2 - categorias
        $catData = Categoria::with('produtos')->get();

        //preparar array categoria 
        foreach ($catData as $cat) {
            $catNome[] = "'".$cat->nome."'"; 
            $catTotal[] = $cat->produtos->count(); 
        }

        //formatar chartjs
        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        

        
        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}
