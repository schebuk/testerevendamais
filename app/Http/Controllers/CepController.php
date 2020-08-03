<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cep;
use JansenFelipe\CepGratis\CepGratis;


class CepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cep = Cep::all();
        return view('cep.grid', compact('cep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        

        $url = 'https://viacep.com.br/ws/'.$request->cep.'/json/';
        $cepResponse = json_decode(file_get_contents($url), true);
        $insertcep = ['cep'=>  $cepResponse['cep'],
        'logradouro'=> $cepResponse['logradouro'],
        'bairro'=> $cepResponse['bairro'],
        'cidade'=> $cepResponse['localidade'],
        'uf'=> $cepResponse['uf']];

        $cep = Cep::create($insertcep);
        return view('cep.form')->with('cep', $cep);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cep = Cep::create($request->all());
           
        if($cep) {
            return redirect()->route('cep.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cep = Cep::findOrFail($id);
     
        if ($cep) {
            return view('cep.form', compact('cep'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Cep::where('id', $id)->update($request->except('_token', '_method'));
     
        if ($customer) {
            return redirect()->route('cep.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $customer = Cep::where('id', $id)->delete();
           
        if ($customer) {
            return redirect()->route('cep.index');
        }
    }

    public function search($cpf)
    {
        //
    }
}
