<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Merchant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get message statistics
        $totalMessages = Message::count();
        $deliveredMessages = Message::where('delivered', true)->count();
        $failedMessages = Message::where('delivered', false)->count();
        $pendingMessages = Message::where('delivered', 2)->count();

        // Get top merchants
        $topMerchants = Merchant::withCount('messages')
            ->orderByDesc('messages_count')
            ->limit(5)
            ->get();

        // Get recent messages
        $recentMessages = Message::with('merchant')
            ->latest()
            ->limit(5)
            ->get();

        // Get messages chart data for the last 7 days
        $messagesChartData = [
            'labels' => [],
            'all' => [],
            'delivered' => []
        ];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $messagesChartData['labels'][] = $date->format('M d');

            $allCount = Message::whereDate('created_at', $date)->count();
            $deliveredCount = Message::whereDate('created_at', $date)
                ->where('delivered', true)
                ->count();

            $messagesChartData['all'][] = $allCount;
            $messagesChartData['delivered'][] = $deliveredCount;
        }

        return view('admin.dashboard.index', compact(
            'totalMessages',
            'deliveredMessages',
            'failedMessages',
            'pendingMessages',
            'topMerchants',
            'recentMessages',
            'messagesChartData'
        ));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('error', 'Invalid credentials')->withInput();
    }
}
