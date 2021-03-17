<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branches;

class BranchesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index
     * 
     * Index's all branches, plus provides a way to create them.
     */
    public function index() 
    {
        $branches = Branches::all();
        return view('branches', compact('branches'));
    }

    /**
     * Create
     * 
     * Creates new branch
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required']
        ]);

        Branches::create($request->all());

        return redirect('/branches');
    }

    /**
     * Edit
     * 
     * Edit existing branch data
     */
    public function edit($id) 
    {
        $branch = Branches::Find($id);
        return view('branches-edit', compact('branch'));
    }

    /**
     * Store
     * 
     * Replaces any stored data with new information.
     */
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
        ]);

        $branch = Branches::findOrFail($id);
        $branch->update($request->all());
        return redirect('/branches');
    }

    /**
     * Delete
     * 
     * This deletes an entery from the database
     */
    public function delete(Request $request, $id)
    {
        $version = Branches::find($id);
        $version->delete();
        return redirect('/branches');
    }
}
