<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\Apiresponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all clients in the database
        return Apiresponse::success(Client::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients',
            'phone' => 'required'
        ]);

        // add new client
        $client = Client::create($request->all());

        return Apiresponse::success($client);
            
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //show clients details
        $client = Client::find($id);
        //return a response
        if($client)
        {
            return Apiresponse::success($client);
        }else {
            return Apiresponse::error('Client not found.');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' .$id,
            'phone' => 'required'
        ]);

        //update the cliente data in database

        $client = Client::find($id);
        if($client){
            $client->update($request->all());
            return Apiresponse::success($client);
        }else{
            return Apiresponse::error('Client not Found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete the client
        $client = Client::find($id);
        if($client){
            $client->delete();
            return Apiresponse::success('Client deleted sucessfully');

        }else{
            return Apiresponse::error('Client not found');
        }
    }
    
}
