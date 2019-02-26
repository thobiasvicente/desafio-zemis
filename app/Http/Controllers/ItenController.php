<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Iten;

class ItenController extends Controller
{
    public function index() {
       $itens = Auth::user()->itens()->orderBy('created_at', 'desc')->paginate(10);
        //return view('list_itens')->with('itens', $itens)->with('total', $total);
        return view('iten.list-itens', ['itens' => $itens])-> with ('warnBool', false);
    }

    public function create(){
        $itens = Iten::orderBy('created_at', 'desc');
        return view ('iten.include-iten', ['itens' => $itens]);
        // return with ('warnBool', false);
    }

    public function store(Request $request){
        
        $iten = Auth::user();
        $iten = new Iten;
        $iten->name = $request->name;
        $iten->description = $request->description;
        $iten->quantity = $request->quantity;
        if($request->has('imagem')){
        $path = $request-> file('imagem')-> store('public/upload');
        $iten->imagem = str_replace('public', 'storage', $path);
        }
        
        $iten->user_id = Auth::user()->id;

        $iten->save();
        
        return redirect()->route('iten.index')->with('message', 'Item criado com sucesso!')-> with ('warnBool', true);
    }

    public function show($id){
        //
    }

    public function edit($id){
        $iten = Iten::findOrFail($id);
        return view('iten.alter-iten', compact('iten'));
    }

    public function update(Request $request, $id){
        $iten = Iten::findOrFail($id);
        $iten->name = $request->name;
        $iten->description = $request->description;
        $iten->quantity = $request->quantity;
        if($request->has('imagem')){
        $path = $request-> file('imagem')-> store('public/upload');
        $iten->imagem = str_replace('public', 'storage', $path);
        }
        $iten->save();

        return redirect()->route('iten.index')->with('message', 'Item alterado com sucesso');
    }

    public function destroy($id){
        $iten = Iten::findOrFail($id);
        $iten->delete();

        return redirect()->back()->with('message','Item excluído com sucesso');
    }

    
}


