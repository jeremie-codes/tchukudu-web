@extends('layouts.app')

@section('title', 'Generate API Token - FlexSMS Admin')

@section('breadcrumbs')
<span class="text-gray-500">
    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-primary-500">Dashboard</a> /
    <a href="{{ route('tokens.index') }}" class="text-gray-500 hover:text-primary-500">API Tokens</a> /
    <span class="text-gray-700">Generate</span>
</span>
@endsection

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Generate API Token</h1>
    <p class="text-gray-600 mt-1">Create a new API token for merchant access</p>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    <form action="{{ route('tokens.store') }}" method="POST">
        @csrf

        <div class="p-6 space-y-6">
            <!-- Merchant Selection -->
            <div>
                <label for="merchant_id" class="block text-sm font-medium text-gray-700">Merchant</label>
                <select name="merchant_id" id="merchant_id" required
                    class="mt-1 block w-full border p-3 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('merchant_id') border-red-300 @enderror">
                    <option value="">Select a Merchant</option>
                    @foreach($auths as $merchant)
                    <option value="{{ $merchant->id }}" {{ old('merchant_id') == $merchant->id ? 'selected' : '' }}>
                        {{ $merchant->name }}
                    </option>
                    @endforeach
                </select>
                @error('merchant_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Token Name/Description -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Token Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="mt-1 block w-full border p-3 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('name') border-red-300 @enderror"
                    placeholder="e.g. Production API Token">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Expiration Date -->
            <div>
                <label for="expires_at" class="block text-sm font-medium text-gray-700">Expiration Date</label>
                <input type="date" name="expires_at" id="expires_at" value="{{ old('expires_at') }}"
                    class="mt-1 block w-full border p-3 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('expires_at') border-red-300 @enderror">
                <p class="mt-1 text-xs text-gray-500">Leave empty for non-expiring token</p>
                @error('expires_at')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Scopes/Permissions -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Permissions</label>

                <div class="space-y-3">
                    <div class="flex items-center">
                        <input type="checkbox" name="permissions[]" id="permission_send" value="send"
                            class="h-4 w-4 text-primary-600 focus:ring-primary-500 border p-3 border-gray-300 rounded"
                            {{ is_array(old('permissions')) && in_array('send', old('permissions')) ? 'checked' : '' }}>
                        <label for="permission_send" class="ml-2 block text-sm text-gray-700">
                            Send Messages
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="permissions[]" id="permission_read" value="read"
                            class="h-4 w-4 text-primary-600 focus:ring-primary-500 border p-3 border-gray-300 rounded"
                            {{ is_array(old('permissions')) && in_array('read', old('permissions')) ? 'checked' : '' }}>
                        <label for="permission_read" class="ml-2 block text-sm text-gray-700">
                            Read Message Status
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="permissions[]" id="permission_balance" value="balance"
                            class="h-4 w-4 text-primary-600 focus:ring-primary-500 border p-3 border-gray-300 rounded"
                            {{ is_array(old('permissions')) && in_array('balance', old('permissions')) ? 'checked' : '' }}>
                        <label for="permission_balance" class="ml-2 block text-sm text-gray-700">
                            Check Balance
                        </label>
                    </div>
                </div>
                @error('permissions')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Rate Limits -->
            <div>
                <label for="rate_limit" class="block text-sm font-medium text-gray-700">Rate Limit (Requests per Minute)</label>
                <input type="number" name="rate_limit" id="rate_limit" value="{{ old('rate_limit', 60) }}"
                    class="mt-1 block w-full border p-3 border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm @error('rate_limit') border-red-300 @enderror"
                    min="1">
                @error('rate_limit')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1"
                        class="h-4 w-4 text-primary-600 focus:ring-primary-500 border p-3 border-gray-300 rounded"
                        {{ old('is_active', '1') === '1' ? 'checked' : '' }}>
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">
                        Active
                    </label>
                </div>
                <p class="mt-1 text-xs text-gray-500">Inactive tokens cannot be used for API requests</p>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-end space-x-3">
            <a href="{{ route('tokens.index') }}" class="inline-flex items-center px-4 py-2 border border p-3 border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                Cancel
            </a>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                Generate Token
            </button>
        </div>
    </form>
</div>
@endsection
