<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Client Category
use App\Models\Client\ClientCategory;

// Dependencies
use Auth;
use Str;

// Inertia
use Inertia\Inertia;

class ClientCategoryController extends Controller
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
            'name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        try {
            $category = new ClientCategory;
        
            $category->unique_id = Str::uuid();
            $category->user_id = Auth::user()->id;
            $category->name = $request->name;
            $category->description = $request->description;
            $category->status = 1;
    
            $category->save();

            return redirect()->back()->with('success', 'Successfully saved client category!');
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
    public function edit(ClientCategory $client_category)
    {
        $user = Auth::user();

        $client_categories = ClientCategory::where('user_id', $user->id)
            ->where('id', '!=', $client_category->id)
            ->get(['unique_id', 'name']);
        
        return Inertia::render('Client/Category/Edit', [
            'client_category' => $client_category,
            'client_categories' => $client_categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientCategory $client_category)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'max:255',
        ]);

        try {
            $client_category->name = $request->name;
            $client_category->description = $request->description;
            $client_category->status = 1;
    
            $client_category->save();

            return redirect()->back()->with('success', 'Successfully saved client category!');
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
    public function destroy(ClientCategory $client_category)
    {
        try {
            ClientCategory::destroy($client_category->id);

            return redirect()->back()->with('success', 'Client category successfully deleted!');

        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true ) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }
}
