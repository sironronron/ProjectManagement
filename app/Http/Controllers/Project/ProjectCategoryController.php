<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

use Auth;
use Str;

// Inertia
use Inertia\Inertia;

// User
use App\Models\User;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
            'name' => 'required|max:255|unique:project_categories,name',
            'description' => 'max:1000',
        ]);


        try {
            $project_category = new ProjectCategory;
            
            $project_category->unique_id = Str::uuid();
            $project_category->user_id = Auth::user()->id;
            $project_category->name = $request->name;
            $project_category->description = $request->description;
            $project_category->status = $request->status;

            $project_category->save();

            return redirect()->back()->with('success', "Successfully created new project category $project_category->name!");
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
     * @param  \App\Models\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectCategory $projectCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectCategory $project_category)
    {
        $project_categories = ProjectCategory::where('user_id', Auth::user()->id)
            ->where('unique_id', '!=', $project_category->unique_id)
            ->get(['id', 'user_id', 'name', 'unique_id', 'status']);

        return Inertia::render('Project/Category/Show', [
            'project_category' => $project_category,
            'project_categories' => $project_categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectCategory $project_category)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:project_categories,name,' . $project_category->id,
            'description' => 'max:1000'
        ]);

        try {
            $project_category->name = $request->name;
            $project_category->description = $request->description;
            $project_category->status = $request->status;

            $project_category->save();
            
            return redirect()->back()->with('success', "Updated project category: $project_category->name");
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
     * @param  \App\Models\ProjectCategory  $projectCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectCategory $project_category)
    {
        try {
            ProjectCategory::destroy($project_category->id);
            return redirect()->back()->with('success', 'Project Category successfully deleted!');
        } catch (\Exception $e) {
            if (env('APP_DEBUG') == true) {
                dd($e);
            }

            \Log::error($e);
            return redirect()->back()->with('failed', 'Something went wrong!');
        }
    }
}
