@extends('layouts.app')

@section('title', 'Users - FlexSMS Admin')

@section('breadcrumbs')
<span class="text-gray-500">
    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-primary-500">Dashboard</a>
    / <span class="text-gray-700">Users</span>
</span>
@endsection

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Users</h1>
        <p class="text-gray-600 mt-1">Gérer les utilisateurs et les autorisations du système</p>
    </div>
    <a href="{{ route('users.create') }}" class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-700 focus:outline-none focus:border-primary-700 focus:ring ring-primary-300 disabled:opacity-25 transition ease-in-out duration-150">
        <i class="bx bx-plus mr-2"></i> Ajouter un User
    </a>
</div>

<!-- Users Table -->
<x-table :headers="['FullName', 'Email', 'Role', 'Status', 'Créé à']" :rows="$users" :pagination="$users->links()" search actions>
    @foreach($users as $user)
    <tr>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                    {{ strtoupper(substr($user->username, 0, 2)) }}
                </div>
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">{{ $user->username }}</div>
                </div>
            </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ $user->email }}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">{{ ucfirst($user->role) }}</div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <x-status-badge :status="$user->active ? 'Active' : 'Inactive'" />
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            {{ $user->created_at->format('M d, Y') }}
        </td>
        <td >
            <div class="flex flex-row items-center space-x-3">
                <a href="{{ route('users.edit', $user->id) }}" class="text-primary-600 hover:text-primary-900">
                    <i class="bx bx-edit text-xl"></i>
                </a>
                <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-blue-900">
                    <i class="bx bx-show text-xl"></i>
                </a>
                <button type="button"
                        class="text-red-600 hover:text-red-900"
                        onclick="showDeleteConfirmation('{{ $user->id }}')">
                    <i class="bx bx-trash text-xl"></i>
                </button>
            </div>
        </td>
    </tr>
    @endforeach
</x-table>

<!-- Hidden delete form for POST request -->
<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
    function showDeleteConfirmation(userId) {
        showConfirmModal(
            'Delete User',
            'Are you sure you want to delete this user? This action cannot be undone.',
            function() {
                const form = document.getElementById('delete-form');
                form.action = `/admin/users/${userId}`;
                form.submit();
            }
        );
    }
</script>
@endpush
