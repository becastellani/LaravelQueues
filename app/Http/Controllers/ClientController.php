<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Util;
use Illuminate\Http\Request;


class ClientController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\View\View
     */
    public function create(){

        $breadcrumbs = [
            ['link' => "clients", 'name' => ucwords('clients')],
        ];

        return view('clients.create', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){



        $type = $request->input('type');

        if($type == 1){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|string|email|max:255|unique:clients',
                'cpfCnpj' => 'required|string|max:255|unique:clients',
                'phone' => 'required',
                'address' => 'required',
                'number' => 'required',
                'neighborhood' => 'required',
                'city_id' => 'required',
                'state_id' => 'required',
                'zipcode' => 'required'
            ]);
        }else{
            $this->validate($request,[
                'razaoSocial' => 'required',
                'email' => 'required|string|email|max:255|unique:clients',
                'cpfCnpj' => 'required|string|max:255|unique:clients',
                'phone' => 'required',
                'address' => 'required',
                'number' => 'required',
                'neighborhood' => 'required',
                'city_id' => 'required',
                'state_id' => 'required',
                'zipcode' => 'required'
            ]);
        }

        $requestData = $request->all();

        $requestData['cpfCnpj'] = Util::apenasNumeros($requestData['cpfCnpj']);
        $requestData['phone'] = Util::apenasNumeros($requestData['phone']);
        $requestData['zipcode'] = Util::apenasNumeros($requestData['zipcode']);


        Client::create($requestData);

        notify()->success('Cliente cadastrado com sucesso!', 'Sucesso', ['timeOut' => 5000]);


        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        return view('clients.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        return view('clients.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        return redirect()->route('clients.index');
    }

    

}
