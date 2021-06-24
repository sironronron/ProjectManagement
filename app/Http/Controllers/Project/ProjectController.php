<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;

// Project Models
use App\Models\Project;
use App\Models\ProjectCategory;

use Illuminate\Http\Request;

use Str;
use Auth;
use Carbon\Carbon;

// Jetstream
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('user_id', Auth::user()->id)
            ->get()
            ->map(function ($query) {
                if ($query->unscheduled != true) {
                    $end = Carbon::parse($query->end_date);

                    $current = Carbon::now();
                    $length = $end->diffInDays($current);
                    $query->remaining_days = $length;

                    return $query;
                }
            }); 

        return Inertia::render('Project/Index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_category_lists = ProjectCategory::where('user_id', Auth::user()->id)
            ->get(['id', 'name', 'status', 'unique_id', 'user_id']);

        $project_categories = ProjectCategory::where('user_id', Auth::user()->id)
            ->get(['name', 'status', 'unique_id', 'user_id']);

        return Inertia::render('Project/Create', [
            'project_categories' => $project_categories,
            'project_category_lists' => $project_category_lists
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
        $message = [
            'category_id.required' => 'The category field is required'
        ];

        if ($request->unscheduled != false) {
            $this->validate($request, [
                'name' => 'required|max:255|min:4|string|unique:projects,name',
                'description' => 'required|max:255',
                'category_id' => 'required'
            ], $message);
        }
        
        else {
            $this->validate($request, [
                'name' => 'required|max:255|min:4|string|unique:projects,name',
                'description' => 'required|max:255',
                'start_date' => 'required|date|max:25',
                'end_date' => 'required|date|max:25',
                'category_id' => 'required'
            ], $message);
        }

        $project = new Project;

        // Get Category
        $project_category = ProjectCategory::where('unique_id', $request->category_id)
            ->first(['id']);

        try {
            $project->unique_id = Str::uuid();
            $project->user_id = Auth::user()->id;
            $project->name = $request->name;
            $project->category_id = $project_category->id;
            $project->description = $request->description;
            $project->start_date = $request->start_date;
            $project->end_date = $request->end_date;
            $project->visibility = 'everyone';
            $project->unscheduled = $request->unscheduled;
            $project->team_id = Auth::user()->currentTeam->id;

            $project->save();

            return redirect()->route('projects.index')->with('success', 'Successfully created a new project!');
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
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
