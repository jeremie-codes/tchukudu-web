@extends('layouts.app')

@section('title', 'Merchants - FlexSMS Admin')

@section('breadcrumbs')
<span class="text-gray-500">
    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-primary-500">Dashboard</a>
    / <span class="text-gray-700">Merchants</span>
</span>
@endsection

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Merchants</h1>
        <p class="text-gray-600 mt-1">Manage system merchants and their access</p>
    </div>
</div>

<!-- Merchants Filters -->
<div x-data="{ filtersOpen: false }">
    <button @click="filtersOpen = !filtersOpen" class="mb-4 flex items-center text-sm text-gray-600 hover:text-primary-500 focus:outline-none">
        <i class="bx bx-filter mr-1"></i>
        <span>Filters</span>
        <i class="bx" :class="filtersOpen ? 'bx-chevron-up' : 'bx-chevron-down'" class="ml-1"></i>
    </button>

    <div x-show="filtersOpen" x-transition class="mb-6 bg-white p-4 rounded-lg shadow-sm">
        <form action="{{ route('merchants.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Registration Date</label>
                <select name="date" id="date" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                    <option value="">All Time</option>
                    <option value="today" {{ request('date') == 'today' ? 'selected' : '' }}>Today</option>
                    <option value="week" {{ request('date') == 'week' ? 'selected' : '' }}>This Week</option>
                    <option value="month" {{ request('date') == 'month' ? 'selected' : '' }}>This Month</option>
                    <option value="year" {{ request('date') == 'year' ? 'selected' : '' }}>This Year</option>
                </select>
            </div>

            <div class="flex items-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    Apply Filters
                </button>
                <a href="{{ route('merchants.index') }}" class="ml-2 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    Clear
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Merchants Table -->
<x-table :headers="['Merchant', 'Contact', 'Status', 'SMS Count', 'Registration Date']" :rows="$merchants" :pagination="$merchants->links()" search>
    @foreach($merchants as $merchant)
        <tr name="row">
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                        {{ strtoupper(substr($merchant->name, 0, 2)) }}
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">{{ $merchant->name }}</div>
                        <div class="text-xs text-gray-500">ID: {{ $merchant->id }}</div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $merchant->email }}</div>
                <div class="text-xs text-gray-500">{{ $merchant->phone ?? 'No phone' }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <x-status-badge :status="ucfirst($merchant->status)" />

                    @if($merchant->status === 'active')
                        <button type="button" onclick="toggleStatus('{{ $merchant->id }}', 'inactive')" class="ml-2 text-sm text-gray-600 hover:text-gray-900">
                            <i class="bx bx-toggle-right text-lg"></i>
                        </button>
                    @else
                        <button type="button" onclick="toggleStatus('{{ $merchant->id }}', 'active')" class="ml-2 text-sm text-gray-600 hover:text-gray-900">
                            <i class="bx bx-toggle-left text-lg"></i>
                        </button>
                    @endif
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ number_format($merchant->messages_count) }}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $merchant->created_at->format('M d, Y') }}
            </td>
            <td>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('merchants.edit', $merchant->id) }}" class="text-primary-600 hover:text-primary-900">
                        <i class="bx bx-edit text-xl"></i>
                    </a>
                    <a href="{{ route('merchants.show', $merchant->id) }}" class="text-blue-600 hover:text-blue-900">
                        <i class="bx bx-show text-xl"></i>
                    </a>
                    <button type="button"
                            class="text-red-600 hover:text-red-900"
                            onclick="showDeleteConfirmation('{{ $merchant->id }}')">
                        <i class="bx bx-trash text-xl"></i>
                    </button>
                </div>
            </td>
        </tr>

    @endforeach
</x-table>

<!-- Hidden forms for POST requests -->
<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<form id="status-form" method="POST" style="display: none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status" id="status-value">
</form>
@endsection

@push('scripts')
<script>
    function showDeleteConfirmation(merchantId) {
        showConfirmModal(
            'Delete Merchant',
            'Are you sure you want to delete this merchant? This action cannot be undone and all associated data will be lost.',
            function() {
                const form = document.getElementById('delete-form');
                form.action = `/admin/merchants/${merchantId}`;
                form.submit();
            }
        );
    }

    function toggleStatus(merchantId, status) {
        const statusForm = document.getElementById('status-form');
        const statusValue = document.getElementById('status-value');

        statusForm.action = `/admin/merchants/${merchantId}/status`;
        statusValue.value = status;
        statusForm.submit();
    }
</script>
@endpush
