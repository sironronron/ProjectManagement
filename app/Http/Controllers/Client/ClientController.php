<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Client Models
use App\Models\Client\Client;
use App\Models\Client\ClientCategory;
use App\Models\Client\ClientUser;
use App\Models\Client\ClientRecentActivity;
use App\Models\Client\ClientNote;

// Inertia
use Inertia\Inertia;

// Dependencies
use Str;
use Auth;
use Hash;

// User Models
use App\Models\User;

// Controller
use App\Http\Controllers\Client\ClientRecentActivityController;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $clients = Client::with(['owner', 'category'])
            ->get();

        return Inertia::render('Client/Index', [
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $categories = ClientCategory::where('user_id', $user->id)
            ->get(['unique_id', 'name', 'status']);

        return Inertia::render('Client/Create/Create',[
            'categories' => $categories
        ]);
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
            'company_name' => 'required|unique:clients,company_name|max:255',
            'company_phone_number' => 'required|max:24|string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users,email',
            'category_id' => 'required',
            'address' => 'string|max:255'
        ]);

        try {
            $client = new Client;

            $client->unique_id = Str::uuid();
            $client->user_id = Auth::user()->id;
            $client->company_name = $request->company_name;
            $client->company_phone_number = $request->company_phone_number;
            $client->address = $request->address;

            // Get client category
            $client_category = ClientCategory::where('unique_id', $request->category_id)
                ->first();

            if ($client_category != null) {
                $client->category_id = $client_category->id;
            }

            $client->save();

            // Create user for client 
            $user = User::create([
                'unique_id' => Str::uuid(),
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);

            $client->owner_id = $user->id;
            $client->save();

            if ($user != null) {
                $client_user = new ClientUser;

                $client_user->client_id = $client->id;
                $client_user->user_id = $user->id;

                $client_user->save();
            }

            // Create new activity
            $data = [];
            
            $data['client_id'] = $client->id;
            $data['activity'] = "Created new client: $client->company_name";
            $data['link_title'] = null;
            $data['link'] = null;

            $client_activity = new ClientRecentActivityController;
            $client_activity->store($data);

            return redirect()->route('clients.index')->with('success', 'Successfully added new client: ' . $client->company_name . '!');
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }

        // Notify user's email
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::where('unique_id', $id)
            ->with(['category', 'owner'])
            ->first();

        $recent_activities = ClientRecentActivity::where('client_id', $client->id)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Client/Show/Dashboard', [
            'client' => $client,
            'recent_activities' => $recent_activities
        ]);
    }

    /**
     * Display the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show_users ($id)
    {
        $client = Client::where('unique_id', $id)
            ->with(['category', 'owner'])
            ->first();

        $users = ClientUser::where('client_id', $client->id)
            ->with('user', function ($query) {
                $query->orderBy('created_at', 'desc');
            })->paginate(10);

        return Inertia::render('Client/Show/Users', [
            'client' => $client,
            'users' => $users
        ]);
    }

    /**
     * Display the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show_projects ($id)
    {
        $client = Client::where('unique_id', $id)
            ->with(['category', 'owner'])
            ->first();

        return Inertia::render('Client/Show/Projects', [
            'client' => $client
        ]);
    }

    /**
     * Display the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show_files ($id)
    {
        $client = Client::where('unique_id', $id)
            ->with(['category', 'owner'])
            ->first();

        return Inertia::render('Client/Show/Files', [
            'client' => $client
        ]);
    }

    /**
     * Display the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show_notes ($id)
    {
        $client = Client::where('unique_id', $id)
            ->with(['category', 'owner'])
            ->first();

        $notes = ClientNote::where('client_id', $client->id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return Inertia::render('Client/Show/Notes', [
            'client' => $client,
            'notes' => $notes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
