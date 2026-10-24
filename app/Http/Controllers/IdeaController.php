<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\IdeaStatus;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $status = request('status');                            // Entire thing could be inlined, as shown below

        // if (! in_array($status, IdeaStatus::values())) {
        //     $status = null;
        // }

        $ideas = Auth::user()->ideas()
            ->when(in_array(request('status'), IdeaStatus::values()), fn ($query) => $query->where('status', request('status')))
            ->latest()
            ->get();

        $counts = Idea::getStatusCounts(Auth::user());

        return view('idea.index', [
            'ideas' => $ideas,
            'statuses' => $counts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdeaRequest $request)
    {

        // dd($request->all());
        Auth::user()->ideas()->create($request->validated());

        return to_route('idea.index')->with('success', 'Your Idea is now Fabricated!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {

        return view('idea.show', [
            'idea' => $idea
            // 'description' => $idea->description,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        // Authorize that this is allowed
        return view('idea.edit', [
            'idea' => $idea
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        // Authorize that this is allowed

        $idea->delete();

        return redirect(route('idea.index')); // also available `return to_route('idea.index')
    }
}
