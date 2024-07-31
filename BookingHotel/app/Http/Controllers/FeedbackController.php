<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('customer', 'service')->get();
        return view('feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        $services = Service::all();
        $customers = Customer::all();
        return view('feedbacks.create', compact('services', 'customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'nullable|exists:services,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Feedback::create($validated);

        return redirect()->route('feedbacks.index');
    }

    public function show(Feedback $feedback)
    {
        return view('feedbacks.show', compact('feedback'));
    }

    public function edit(Feedback $feedback)
    {
        $services = Service::all();
        $customers = Customer::all();
        return view('feedbacks.edit', compact('feedback', 'services', 'customers'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'nullable|exists:services,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $feedback->update($validated);

        return redirect()->route('feedbacks.index');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->route('feedbacks.index');
    }
}
