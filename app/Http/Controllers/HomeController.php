<?php

namespace App\Http\Controllers;

use App\Estudante;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //aguardando liberação
        $aguardando_liberacao =Estudante::where([['gratuidade', '=', null ]])->count();
        //consulta para retornar 50% passe
        $meia =Estudante::where([['gratuidade', '=', false ]])->count();
        //consulta 100% free
        $inteira =Estudante::where([['gratuidade', '=', true ]])->count();
        //retirou o cartão
        $retirou_cartao =Estudante::where([['cartao_entregue', '=', true ]])->count();
        //total de solicitações
        $total_cadastros =Estudante::all()->count();


        return view('admin.home', compact('aguardando_liberacao', 'meia', 'inteira', 'retirou_cartao', 'total_cadastros'));
    }
}
