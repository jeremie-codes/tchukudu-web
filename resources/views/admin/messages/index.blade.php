@extends('layouts.app')

@section('title', 'Messages - FlexSMS Admin')

@section('breadcrumbs')
<span class="text-gray-500">
    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-primary-500">Dashboard</a>
    / <span class="text-gray-700">Messages</span>
</span>
@endsection

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Messages</h1>
        <p class="text-gray-600 mt-1">Track and manage SMS messages in the system</p>
    </div>
</div>

<!-- Message Filters -->
<div class="mb-6 bg-white p-4 rounded-lg shadow-sm">
    <form action="{{ route('messages.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status" id="status" class="block w-full border border-gray-300 p-3 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                <option value="">All Statuses</option>
                <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
        </div>

        <div>
            <label for="merchant" class="block text-sm font-medium text-gray-700 mb-1">Merchant</label>
            <select name="merchant" id="merchant" class="block w-full border border-gray-300 p-3 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                <option value="">All Merchants</option>
                @foreach($merchants as $merchant)
                    <option value="{{ $merchant->id }}" {{ request('merchant') == $merchant->id ? 'selected' : '' }}>
                        {{ $merchant->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="date_range" class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
            <select name="date_range" id="date_range" class="block w-full border border-gray-300 p-3 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                <option value="">All Time</option>
                <option value="today" {{ request('date_range') == 'today' ? 'selected' : '' }}>Today</option>
                <option value="week" {{ request('date_range') == 'week' ? 'selected' : '' }}>This Week</option>
                <option value="month" {{ request('date_range') == 'month' ? 'selected' : '' }}>This Month</option>
            </select>
        </div>

        <div class="flex items-end">
            <button type="submit" class="inline-flex items-center bg-gray-400 cursor-pointer px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                <i class="bx bx-filter mr-2"></i> Filter
            </button>
            <a href="{{ route('messages.index') }}" class="ml-2 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                <i class="bx bx-reset mr-2"></i> Annuler
            </a>
        </div>
    </form>
</div>

<!-- Messages Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Total Messages</p>
                <p class="text-2xl font-semibold text-gray-800">{{ number_format($stats['total']) }}</p>
            </div>
            <div class="p-3 rounded-full bg-gray-100 text-gray-500">
                <i class="bx bx-envelope text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Delivered</p>
                <p class="text-2xl font-semibold text-green-600">{{ number_format($stats['delivered']) }}</p>
            </div>
            <div class="p-3 rounded-full bg-green-100 text-green-500">
                <i class="bx bx-check-circle text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Failed</p>
                <p class="text-2xl font-semibold text-red-600">{{ number_format($stats['failed']) }}</p>
            </div>
            <div class="p-3 rounded-full bg-red-100 text-red-500">
                <i class="bx bx-x-circle text-xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500">Pending</p>
                <p class="text-2xl font-semibold text-yellow-600">{{ number_format($stats['pending']) }}</p>
            </div>
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                <i class="bx bx-time text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Messages Table -->
<x-table :headers="['Recipient', 'Content', 'Merchant', 'Status', 'Sent At']" :rows="$messages" :pagination="$messages->links()" search>
    @foreach($messages as $message)
        <tr name="row">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-medium text-gray-900">{{ $message->recipient }}</div>
                <div class="text-xs text-gray-500">ID: {{ $message->id }}</div>
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-gray-900">{{ Str::limit($message->content, 50) }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $message->merchant->name }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <x-status-badge :status="ucfirst($message->status)" />
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $message->created_at->format('M d, Y H:i') }}
            </td>
            <td>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('messages.show', $message->id) }}" class="text-blue-600 cursor-pointer hover:text-blue-900">
                        <i class="bx bx-show text-xl"></i>
                    </a>
                    <button type="button"
                            class="text-primary-600 cursor-pointer hover:text-primary-900"
                            onclick="retryMessage('{{ $message->id }}')">
                        <i class="bx bx-refresh text-xl"></i>
                    </button>
                </div>
            <td>
        </tr>
    @endforeach
</x-table>

<!-- Hidden forms for POST requests -->
<form id="retry-form" method="POST" style="display: none;">
    @csrf
</form>
@endsection

@push('scripts')
<script>
    function retryMessage(messageId) {
        showConfirmModal(
            'Retry Message',
            'Are you sure you want to retry sending this message?',
            function() {
                const form = document.getElementById('retry-form');
                form.action = `/admin/messages/${messageId}/retry`;
                form.submit();
            }
        );
    }
</script>
@endpush
