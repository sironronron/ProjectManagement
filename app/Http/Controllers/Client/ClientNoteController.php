<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Dependencies
use Str;
use Auth;

// Models
use App\Models\Client\Client;
use App\Models\Client\ClientNote;

// Inertia
use Inertia\Inertia;

// Controllers
use App\Http\Controllers\Client\ClientRecentActivityController;

class ClientNoteController extends Controller
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
            'title' => 'required|max:25',
            'subtitle' => 'required|max:150',
            'body' => 'required'
        ]);

        try {
            $client = Client::where('unique_id', $request->client_id)
                ->first()->id;

            $client_note = ClientNote::create([
                'unique_id' => Str::uuid(),
                'client_id' => $client,
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'body' => $request->body,
                'visibility' => 'visible_to_everyone'
            ]);

            // Create new recent activity log
            $data = [];
            $data['client_id'] = $client;
            $data['activity'] = 'Added a new note!';
            $data['link_title'] = $client_note->title;
            $data['link'] = `'client_notes.show', { client_id: $client, client_note_id: $client_note->unique_id }`;

            $client_recent_activity = new ClientRecentActivityController;
            $client_recent_activity->store($data);
            
            return redirect()->back()->with('success', 'Added new note!');
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
    public function show($client_id, $client_note_id)
    {
        $client = Client::where('unique_id', $client_id)
            ->with(['category', 'owner'])
            ->first();

        $client_note = ClientNote::where('unique_id', $client_note_id)
            ->first();

        return Inertia::render('Client/View/ShowNote', [
            'client' => $client,
            'note' => $client_note
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($client_id, $client_note_id)
    {
        $client = Client::where('unique_id', $client_id)
            ->with(['category', 'owner'])
            ->first();

        $client_note = ClientNote::where('unique_id', $client_note_id)
            ->first();

        return Inertia::render('Client/Edit/EditClientNote', [
            'client' => $client,
            'note' => $client_note
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $client_id, $client_note_id)
    {
        $this->validate($request, [
            'title' => 'required|max:25',
            'subtitle' => 'required|max:150',
            'body' => 'required'
        ]);

        try {
            $note = ClientNote::where('unique_id', $client_note_id)
                ->first();

            $note->title = $request->title;
            $note->subtitle = $request->subtitle;
            $note->body = $request->body;

            $note->update();

            $client = Client::where('unique_id', $client_id)
                ->first()->id;

            // Create new recent activity log
            $data = [];
            $data['client_id'] = $client;
            $data['activity'] = 'Updated a note!';
            $data['link_title'] = $note->title;
            $data['link'] = "'client_notes.show', { client_id: $client, client_note_id: $note->unique_id }";

            $client_recent_activity = new ClientRecentActivityController;
            $client_recent_activity->store($data);

            return redirect()->route('clients.show.notes', $client_id)->with('success', "Updated note with title: $note->title!");
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
    public function destroy($id)
    {
        //
    }
}
