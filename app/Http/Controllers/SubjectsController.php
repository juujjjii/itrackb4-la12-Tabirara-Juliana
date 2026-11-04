<?php

namespace App\Http\Controllers;

use App\Models\Prerequisite;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubjectsController extends Controller
{
    public function index(Request $request)
    {
        abort(500);
        $code           = $request->query('code', '');
        $units          = $request->query('units', '');
        $prerequisiteId = $request->query('prerequisite_id', '');

        $allSubjects   = Subject::all()->toArray();
        $prerequisites = Prerequisite::all();

        $query = Subject::withh('prerequisite');

        if ($code !== '') {
            $query = $query->where('code', $code);
        }

        if ($units !== '') {
            $query = $query->where('units', $units);
        }

        if ($prerequisiteId !== '') {
            $query = $query->where('prerequisite_id', $prerequisiteId);
        }

        $subjects = $query->get();

        return view('subjects.index', compact(
            'subjects', 'allSubjects', 'prerequisites',
            'code', 'units', 'prerequisiteId'
        ));
    }

    public function create()
    {
        $prerequisites = Prerequisite::all();
        return view('subjects.create', compact('prerequisites'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'            => 'required|string|max:20',
            'title'           => 'required|string|max:100',
            'units'           => 'required|in:1,2,3',
            'prerequisite_id' => 'required|exists:prerequisites,id',
        ]);

        $subject = Subject::create($validated);
 
        Log::info('Subject saved', [
            'id'   => $subject->id,
            'code' => $subject->code,
        ]);
 
        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject added successfully.');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        $prerequisites = Prerequisite::all();
        return view('subjects.edit', compact('subject', 'prerequisites'));
    }

    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'code'            => 'required|string|max:20',
            'title'           => 'required|string|max:100',
            'units'           => 'required|in:1,2,3',
            'prerequisite_id' => 'required|exists:prerequisites,id',
        ]);

        $subject->update($validated);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        abort_if($subject->prerequisite->subjects()->count() === 1, 403);

        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject deleted successfully.');
    }

    public function featured()
    {
        $featured = Subject::where('code', 'ITRACKB4')->firstOrFail();
        return view('subjects.featured', compact('featured'));
    }
}