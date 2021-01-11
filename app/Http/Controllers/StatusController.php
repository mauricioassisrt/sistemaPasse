<?php

namespace App\Http\Controllers;

use App\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $status = Status::paginate(10);

            return view('status.index', compact('status'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function create()
    {
        return view('status.formulario');
    }


    public function store(Request $request)
    {
        try {
            $objeto_status = $request->all();
            Status::create($objeto_status);
            return redirect()->route('status');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function edit(Status $status)
    {
        return view('status.formulario', compact('status'));
    }


    public function update(Request $request, Status $status)
    {
        try {
            $objeto_status = $request->all();
            $status->update($objeto_status);

            return redirect('status');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function destroy(Status $status)
    {
        try {
            $status->delete();
            return redirect('status');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function search(Request $request)
    {

        $status = new Status();
        $search = $request->get('table_search');
        $status = Status::where('nome', 'like', '%' . $search . '%')->paginate(10);
        return view('status.index', compact( 'status'));
    }
}
