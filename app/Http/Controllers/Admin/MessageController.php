<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $query = Message::with('merchant');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('merchant')) {
            $query->where('merchant_id', $request->merchant);
        }

        if ($request->filled('date_range')) {
            $date = $request->date_range;
            $query->when($date === 'today', function ($q) {
                return $q->whereDate('created_at', today());
            })->when($date === 'week', function ($q) {
                return $q->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            })->when($date === 'month', function ($q) {
                return $q->whereMonth('created_at', now()->month);
            });
        }

        $messages = $query->latest()->paginate(15);
        $merchants = Merchant::all();

        $stats = [
            'total' => Message::count(),
            'delivered' => Message::where('delivered', true)->count(),
            'failed' => Message::where('delivered', false)->count(),
            'pending' => Message::where('delivered', 3)->count(),
        ];

        return view('admin.messages.index', compact('messages', 'merchants', 'stats'));
    }

    public function show(Message $message)
    {
        $message->load(['merchant', 'history']);
        return view('admin.messages.show', compact('message'));
    }

    public function retry(Message $message)
    {
        // Add your message retry logic here
        // This is just a placeholder implementation
        $message->update(['status' => 'pending']);

        // You would typically queue the message for resending here

        return redirect()->route('admin.messages.show', $message)
            ->with('success', 'Message queued for retry.');
    }
}
