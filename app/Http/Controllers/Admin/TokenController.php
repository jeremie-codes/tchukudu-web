<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthToken;
use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TokenController extends Controller
{
    public function index(Request $request)
    {
        $query = AuthToken::with('auth');

        if ($request->filled('auth')) {
            $query->where('auth_id', $request->auth);
        }

        $tokens = $query->latest()->paginate(10);
        $auths = Auth::all();

        return view('admin.tokens.index', compact('tokens', 'auths'));
    }

    public function create()
    {
        $auths = Auth::where('active', true)->get();
        return view('admin.tokens.create', compact('auths'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'auth_id' => ['required', 'exists:auths,id'],
            'name' => ['required', 'string', 'max:255'],
            'expires_at' => ['nullable', 'date', 'after:today'],
            'permissions' => ['required', 'array'],
            'permissions.*' => ['in:send,read,balance'],
            'rate_limit' => ['required', 'integer', 'min:1'],
            'is_active' => ['boolean'],
        ]);

        $token = AuthToken::create([
            'auth_id' => $validated['auth_id'],
            'name' => $validated['name'],
            'token' => Str::random(64),
            'expires_at' => $validated['expires_at'],
            'permissions' => $validated['permissions'],
            'rate_limit' => $validated['rate_limit'],
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.tokens.index')
            ->with('success', 'API token generated successfully.');
    }

    public function regenerate(AuthToken $token)
    {
        $token->update([
            'token' => Str::random(64),
            'last_used_at' => null,
        ]);

        return redirect()->route('admin.tokens.index')
            ->with('success', 'API token regenerated successfully.');
    }

    public function toggle(AuthToken $token)
    {
        $token->update(['is_active' => !$token->is_active]);

        return redirect()->route('admin.tokens.index')
            ->with('success', 'Token status updated successfully.');
    }

    public function destroy(AuthToken $token)
    {
        $token->delete();

        return redirect()->route('admin.tokens.index')
            ->with('success', 'API token deleted successfully.');
    }
}
