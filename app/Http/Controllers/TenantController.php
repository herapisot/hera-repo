<?php

namespace App\Http\Controllers;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        return view('tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('tenants.create');
    }

    public function store(Request $request)
    {
        Tenant::create($request->all());
        return redirect()->route('tenants.index');
    }

    public function show(Tenant $tenant)
    {
        return view('tenants.show', compact('tenant'));
    }

    public function edit(Tenant $tenant)
    {
        return view('tenants.edit', compact('tenant'));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $tenant->update($request->all());
        return redirect()->route('tenants.index');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenants.index');
    }
}