<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Versions;
use App\Models\Branches;

class VersionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Index
     * 
     * index's all versions.
     */
    public function index()
    {
        $versions = Versions::all();
        // return $versions;
        return view('versions', compact('versions'));
    }

    /**
     * Create
     * 
     * Creates new version
     */
    public function create(Request $request) 
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'branch' => ['required']
        ]);

        $version = Versions::create($request->all());

        return redirect('/versions/edit/' . $version->id);
    }

    /**
     * Edit
     * 
     * Displays edit page.
     */
    public function edit($id)
    {
        $version = Versions::find($id);
        $branches = Branches::all();
        return view('versions-edit', compact('version', 'branches'));
    }

    /**
     * Store
     * 
     * Used to update exiting version data.
     */
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'branch' => ['required']
        ]);

        $version = Versions::findOrFail($id);
        $version->update($request->all());
        return redirect('/versions');
    }

    /**
     * Delete
     * 
     * This deletes an entery from the database.
     */
    public function delete(Request $request, $id)
    {
        $version = Versions::find($id);
        $version->delete();
        return redirect('/versions');
    }
}
