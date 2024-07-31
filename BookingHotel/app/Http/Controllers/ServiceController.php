<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'small_dec' => 'nullable|string|max:100',
            'big_dec' => 'nullable|string',
            'photo' => 'nullable|image',
        ]);

        $service = Service::create($validated);

        if ($request->hasFile('photo')) {
            $service->photo = $request->file('photo')->store('service_photos', 'public');
            $service->save();
        }

        return redirect()->route('services.index');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'small_dec' => 'nullable|string|max:100',
            'big_dec' => 'nullable|string',
            'photo' => 'nullable|image',
        ]);

        $service->update($validated);

        if ($request->hasFile('photo')) {
            $service->photo = $request->file('photo')->store('service_photos', 'public');
            $service->save();
        }

        return redirect()->route('services.index');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index');
    }
}
