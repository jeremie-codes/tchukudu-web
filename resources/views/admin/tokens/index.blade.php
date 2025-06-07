@extends('layouts.app')

@section('title', 'API Tokens - FlexSMS Admin')

@section('breadcrumbs')
<span class="text-gray-500">
    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-primary-500">Dashboard</a>
    / <span class="text-gray-700">API Tokens</span>
</span>
@endsection

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">API Tokens</h1>
    <p class="text-gray-600 mt-1">Gérer les API tokens des commerçants pour l'envoi de SMS</p>
</div>

<!-- Merchant Filter -->
<div class="mb-6 bg-white p-4 rounded-lg shadow-sm">
    <form action="{{ route('tokens.index') }}" method="GET" class="flex flex-col md:flex-row items-center gap-4">
        <div class="w-full md:w-64">
            <label for="merchant" class="block text-sm font-medium text-gray-700 mb-1">Filtrer par marchand</label>
            <select name="merchant" id="merchant" class="block w-full p-4 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                <option value="">All Merchants</option>
                @foreach($auths as $merchant)
                    <option value="{{ $merchant->id }}" {{ request('merchant') == $merchant->id ? 'selected' : '' }}>
                        {{ $merchant->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white hover:text-black bg-gray-400 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                Filtrer
            </button>
            <a href="{{ route('tokens.index') }}" class="ml-2 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                Annuler
            </a>
        </div>

        {{-- <div class="ml-auto">
            <a href="{{ route('tokens.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                <i class="bx bx-plus mr-2"></i> Genérer un nouveau Token
            </a>
        </div> --}}
    </form>
</div>

<!-- Tokens Table -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Merchant
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Token
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Créé à
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Expire à
                    </th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($tokens as $token)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                                {{ strtoupper(substr($token->auth->merchant->name, 0, 2)) }}
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $token->auth->merchant->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div x-data="{ showToken: false }">
                            <div class="flex items-center">
                                <span x-show="!showToken" class="text-sm text-gray-500">••••••••••••••••</span>
                                <span x-show="showToken" class="text-sm text-gray-900 font-mono">{{ $token->token }}</span>
                                <button @click="showToken = !showToken" class="ml-2 text-gray-400 hover:text-gray-600 focus:outline-none">
                                    <i class="bx" :class="showToken ? 'bx-hide' : 'bx-show'"></i>
                                </button>
                                <button
                                    @click="navigator.clipboard.writeText('{{ $token->token }}'); $el.innerText = 'Copié!'; setTimeout(() => $el.innerText = 'Copier', 2000)"
                                    class="ml-2 text-xs text-primary-600 hover:text-primary-700 focus:outline-none">
                                    Copier
                                </button>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($token->is_active)
                            <x-status-badge status="Active" type="success" />
                        @else
                            <x-status-badge status="Inactive" type="error" />
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $token->created_at->format('M d, Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if($token->expires_at)
                            {{ \Carbon\Carbon::parse($token->expires_at)->format('M d, Y') }}
                            @if(\Carbon\Carbon::parse($token->expires_at)->isPast())
                                <span class="text-red-500 text-xs">(Expired)</span>
                            @elseif(\Carbon\Carbon::parse($token->expires_at)->diffInDays(now()) < 7)
                                <span class="text-yellow-500 text-xs">(Expiring soon)</span>
                            @endif
                        @else
                            <span class="text-gray-400">Never</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end space-x-3">
                            <form action="{{ route('tokens.regenerate', $token->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="text-primary-600 hover:text-primary-900" title="Regenerate Token">
                                    <i class="bx bx-refresh text-xl"></i>
                                </button>
                            </form>

                            <form action="{{ route('tokens.toggle', $token->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="{{ $token->is_active ? 'text-yellow-600 hover:text-yellow-900' : 'text-green-600 hover:text-green-900' }}"
                                    title="{{ $token->is_active ? 'Deactivate Token' : 'Activate Token' }}">
                                    <i class="bx {{ $token->is_active ? 'bx-toggle-right' : 'bx-toggle-left' }} text-xl"></i>
                                </button>
                            </form>

                            <button type="button"
                                class="text-red-600 hover:text-red-900"
                                onclick="showDeleteConfirmation('{{ $token->id }}')">
                                <i class="bx bx-trash text-xl"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <i class="bx bx-key text-4xl text-gray-300 mb-2"></i>
                            <p>No API tokens found</p>
                            <a href="{{ route('tokens.create') }}" class="mt-2 text-gray-600 hover:text-gray-700">
                                Genérer un nouveau token
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($tokens->hasPages())
    <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
        {{ $tokens->links() }}
    </div>
    @endif
</div>

<!-- Hidden delete form for POST request -->
<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script>
    function showDeleteConfirmation(tokenId) {
        showConfirmModal(
            'Delete API Token',
            'Are you sure you want to delete this token? This action cannot be undone and will revoke access to the API for this token.',
            function() {
                const form = document.getElementById('delete-form');
                form.action = `/admin/tokens/${tokenId}`;
                form.submit();
            }
        );
    }
</script>
@endpush
