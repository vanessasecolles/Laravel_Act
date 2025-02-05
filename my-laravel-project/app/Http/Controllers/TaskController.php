<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Fetch tasks and sort by completion status (Pending first, Completed last)
    $tasks = \App\Models\Task::orderBy('is_completed', 'asc')->get();

    return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'is_completed' => 'required|boolean',
    ]);

    // Create the task
    \App\Models\Task::create($request->all());

    // Redirect to the tasks list
    return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = \App\Models\Task::findOrFail($id); // Retrieve the task by ID
        return view('tasks.edit', compact('task')); // Pass the task to the edit view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'required|boolean',
        ]);
    
        // Find the task and update it
        $task = \App\Models\Task::findOrFail($id);
        $task->update($request->all());
    
        // Redirect back to the task list with a success message
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Find the task and delete it
    $task = \App\Models\Task::findOrFail($id);
    $task->delete();

    // Redirect back to the task list with a success message
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    public function toggleCompletion(string $id)
{
    $task = \App\Models\Task::findOrFail($id);

    // Toggle the is_completed status
    $task->is_completed = !$task->is_completed;
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task status updated!');
}
    
}
