<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Inertia
use Inertia\Inertia;

// Dependencies
use Str;
use Hash;

// Model Relationships
use App\Models\Client\ClientUser;
use App\Models\User;
use App\Models\Client\Client;

// Controller
use App\Http\Controllers\Client\ClientRecentActivityController;

class ClientUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email'
        ]);

        try {
            $user = User::create([
                'unique_id' => Str::uuid(),
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
                'phone_number' => $request->phone,
                'position' => $request->position
            ]);

            // Get Client ID
            $client = Client::where('unique_id', $request->client_id)
                ->first();

            $client_user = new ClientUser;
            
            $client_user->client_id = $client->id;
            $client_user->user_id = $user->id;
            
            $client_user->save();

            // Create new activity
            $data = [];
            
            $data['client_id'] = $client->id;
            $data['activity'] = "Added new user: $user->name";
            $data['link_title'] = null;
            $data['link'] = null;

            $client_activity = new ClientRecentActivityController;
            $client_activity->store($data);

            return redirect()->back()->with('success', 'Successfully added new client user: ' . $user->name . '!');
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
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
    public function edit($client_id, $client_user_id)
    {
        $client = Client::where('unique_id', $client_id)
            ->with(['category', 'owner'])
            ->first();
        
        $client_user = User::where('unique_id', $client_user_id)
            ->first();

        return Inertia::render('Client/Edit/EditClientUser', [
            'client' => $client,
            'client_user' => $client_user
        ]);
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
        $client_user = User::where('unique_id', $id)
            ->first();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users,email,' . $client_user->id,
            'position' => 'nullable|string|max:25',
            'phone' => 'nullable|string|max:25'
        ]);

        try {
            $client_user->name = $request->name;
            $client_user->email = $request->email;
            $client_user->phone_number = $request->phone;
            $client_user->position = $request->position;

            $client_user->save();

            // Create new activity
            $client_id = Client::where('unique_id', $request->client_id)
                ->first()->id;

            $data = [];
            
            $data['client_id'] = $client_id;
            $data['activity'] = "Updated user: $client_user->name";
            $data['link_title'] = null;
            $data['link'] = null;

            $client_activity = new ClientRecentActivityController;
            $client_activity->store($data);

            return redirect()->route('clients.show.users', $request->client_id)->with('success', 'Successfully updated client user: ' . $client_user->name . '!');
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientUser $client_user)
    {
        try {
            $data = [];

            $user_name = $client_user->user->name;
            
            $data['client_id'] = $client_user->client_id;
            $data['activity'] = "Deleted user: $user_name from the list!";
            $data['link_title'] = null;
            $data['link'] = null;

            $client_activity = new ClientRecentActivityController;
            $client_activity->store($data);
            
            ClientUser::destroy($client_user->id);

            return redirect()->back()->with('success', 'Deleted client user!');
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }
}
