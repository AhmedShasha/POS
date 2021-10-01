<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ClientController extends Controller
{
    //
    public function index(Request $request)
    {
        $clients = Client::when($request->search, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');

        })->latest()->paginate(3);

        return view('dashboard.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('dashboard.clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:1|unique:clients,phone',
            'address' => 'required',
        ]);

        Client::create($data);

        toast()->success(Lang::get('site.added_successfully'));

        return redirect()->route('dashboard.clients.index');

    }

    public function edit($id)
    {
        $clients = Client::find($id);

        return view('dashboard.clients.edit', compact('clients'));

    }

    public function update(Client $client, Request $request)
    {
        $request_data = $request->validate([
            'name' => 'required',
            'phone' => 'required|array|min:11|unique:clients,phone',
            'address' => 'required',
        ]);

        // $request_data = $request->all();

        $client->update($request_data);

        toast()->success(Lang::get('site.updated_successfully'));

        return redirect()->route('dashboard.clients.index');
    }

    public function destroy($id)
    {
        $clients = Client::find($id);

        $clients->delete();

        toast()->success(Lang::get('site.deleted_successfully'));

        return redirect()->route('dashboard.clients.index');

    }
}
