@extends('layouts.app')

@section('title', 'Dashboard - FlexSMS Admin')

@section('breadcrumbs')
<span class="text-gray-500">Dashboard</span>
@endsection

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600 mt-1">Overview of your SMS messaging system</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Total Messages -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-gray-100 text-primary-600">
                <i class="bx bx-message text-2xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-sm font-medium text-gray-600">Total Messages</h2>
                <p class="text-2xl font-semibold text-gray-800">{{ number_format($totalMessages) }}</p>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-green-500 flex items-center">
                <i class="bx bx-up-arrow-alt"></i>
                <span>12.5%</span>
            </span>
            <span class="text-gray-500 ml-2">vs last month</span>
        </div>
    </div>

    <!-- Delivered Messages -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600">
                <i class="bx bx-check-circle text-2xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-sm font-medium text-gray-600">Delivered</h2>
                <p class="text-2xl font-semibold text-gray-800">{{ number_format($deliveredMessages) }}</p>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-green-500 flex items-center">
                <i class="bx bx-up-arrow-alt"></i>
                <span>8.2%</span>
            </span>
            <span class="text-gray-500 ml-2">vs last month</span>
        </div>
    </div>

    <!-- Failed Messages -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-red-100 text-red-600">
                <i class="bx bx-x-circle text-2xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-sm font-medium text-gray-600">Failed</h2>
                <p class="text-2xl font-semibold text-gray-800">{{ number_format($failedMessages) }}</p>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-red-500 flex items-center">
                <i class="bx bx-down-arrow-alt"></i>
                <span>3.1%</span>
            </span>
            <span class="text-gray-500 ml-2">vs last month</span>
        </div>
    </div>

    <!-- Pending Messages -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                <i class="bx bx-time text-2xl"></i>
            </div>
            <div class="ml-4">
                <h2 class="text-sm font-medium text-gray-600">Pending</h2>
                <p class="text-2xl font-semibold text-gray-800">{{ number_format($pendingMessages) }}</p>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="text-yellow-500 flex items-center">
                <i class="bx bx-right-arrow-alt"></i>
                <span>0.5%</span>
            </span>
            <span class="text-gray-500 ml-2">vs last month</span>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Messages by Status Chart -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Messages by Status</h2>
        <div class="h-80">
            <canvas id="messagesByStatusChart"></canvas>
        </div>
    </div>

    <!-- Messages by Date Chart -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Messages Over Time</h2>
        <div class="h-80">
            <canvas id="messagesOverTimeChart"></canvas>
        </div>
    </div>
</div>

<!-- Merchants & Messages Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Top Merchants -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Top Merchants</h2>
        </div>
        <div class="divide-y divide-gray-200">
            @foreach($topMerchants as $merchant)
            <div class="px-6 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                        {{ strtoupper(substr($merchant->name, 0, 2)) }}
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium text-gray-800">{{ $merchant->name }}</h3>
                        <p class="text-xs text-gray-500">{{ $merchant->email }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-sm font-semibold text-gray-800">{{ number_format($merchant->total_messages) }}</p>
                    <p class="text-xs text-gray-500">messages</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
            <a href="{{ route('merchants.index') }}" class="text-sm text-primary-600 hover:text-primary-700">View all merchants &rarr;</a>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Recent Messages</h2>
        </div>
        <div class="divide-y divide-gray-200">
            @foreach($recentMessages as $message)
            <div class="px-6 py-4">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-sm font-medium text-gray-800">{{ $message->recipient }}</h3>
                        <p class="text-xs text-gray-500 mt-1">{{ Str::limit($message->content, 50) }}</p>
                    </div>
                    <x-status-badge :status="$message->status" />
                </div>
                <div class="mt-2 flex items-center justify-between text-xs text-gray-500">
                    <span>{{ $message->created_at->diffForHumans() }}</span>
                    <span>{{ $message->merchant->name }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
            <a href="{{ route('messages.index') }}" class="text-sm text-primary-600 hover:text-primary-700">View all messages &rarr;</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Messages by Status Chart
    const statusCtx = document.getElementById('messagesByStatusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Delivered', 'Failed', 'Pending'],
            datasets: [{
                data: [{{ $deliveredMessages }}, {{ $failedMessages }}, {{ $pendingMessages }}],
                backgroundColor: [
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(239, 68, 68, 0.8)',
                    'rgba(234, 179, 8, 0.8)'
                ],
                borderColor: [
                    'rgba(34, 197, 94, 1)',
                    'rgba(239, 68, 68, 1)',
                    'rgba(234, 179, 8, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Messages Over Time Chart
    const timeCtx = document.getElementById('messagesOverTimeChart').getContext('2d');
    const timeChart = new Chart(timeCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($messagesChartData['labels']) !!},
            datasets: [
                {
                    label: 'All Messages',
                    data: {!! json_encode($messagesChartData['all']) !!},
                    borderColor: 'rgba(59, 130, 246, 1)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                },
                {
                    label: 'Delivered',
                    data: {!! json_encode($messagesChartData['delivered']) !!},
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderDash: [5, 5],
                    tension: 0.4,
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
