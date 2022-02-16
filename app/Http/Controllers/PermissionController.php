<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        abort_if(Gate::denies('permissions:access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::with('roles')->get();

        return view('blog.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create(): View
    {
        abort_if(Gate::denies('permissions:access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        return view('blog.permissions.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePermissionRequest $request
     * @return RedirectResponse
     */
    public function store(StorePermissionRequest $request): RedirectResponse
    {
        abort_if(!$request->validated(), Response::HTTP_BAD_REQUEST, '400 Bad Request');

        $permission = Permission::create([
            'title' => $request->input('title'),
            'created_at' => new Date(),
            'updated_at' => new Date()
        ]);

        $permission->roles()->sync($request->input('roles', []));

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return View
     */
    public function edit(Permission $permission): View
    {
        abort_if(Gate::denies('permissions:access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $permission->load('roles');

        return view('blog.permissions.edit', compact('permission', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePermissionRequest $request
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function update(UpdatePermissionRequest $request, Permission $permission): RedirectResponse
    {
        $permission->update([$request->validated(), 'updated_at' => Carbon::now()]);
        $permission->roles()->sync($request->input('roles', []));

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function destroy(Permission $permission): RedirectResponse
    {
        abort_if(Gate::denies('permissions:access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();

        return redirect()->route('permissions.index');
    }
}
