<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index(Request $request)
    {
        $query = Merchant::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date')) {
            $date = $request->date;
            $query->when($date === 'today', function ($q) {
                return $q->whereDate('created_at', today());
            })->when($date === 'week', function ($q) {
                return $q->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            })->when($date === 'month', function ($q) {
                return $q->whereMonth('created_at', now()->month);
            })->when($date === 'year', function ($q) {
                return $q->whereYear('created_at', now()->year);
            });
        }

        $merchants = $query->withCount('messages')->latest()->paginate(10);
        return view('admin.merchants.index', compact('merchants'));
    }

    public function show(Merchant $merchant)
    {
        $merchant->load(['messages' => function ($query) {
            $query->latest()->limit(5);
        }]);
        return view('admin.merchants.show', compact('merchant'));
    }

    public function edit(Merchant $merchant)
    {
        return view('admin.merchants.edit', compact('merchant'));
    }

    public function update(Request $request, Merchant $merchant)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:merchants,email,' . $merchant->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'status' => ['required', 'in:active,inactive,pending'],
        ]);

        $merchant->update($validated);

        return redirect()->route('admin.merchants.index')
            ->with('success', 'Merchant updated successfully.');
    }

    public function destroy(Merchant $merchant)
    {
        $merchant->delete();
        return redirect()->route('admin.merchants.index')
            ->with('success', 'Merchant deleted successfully.');
    }

    public function toggleStatus(Request $request, Merchant $merchant)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:active,inactive'],
        ]);

        $merchant->update(['status' => $validated['status']]);

        return redirect()->route('admin.merchants.index')
            ->with('success', 'Merchant status updated successfully.');
    }
}
