@extends('layouts.app')

@section('title', 'Message Details - FlexSMS Admin')

@section('breadcrumbs')
<span class="text-gray-500">
    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-primary-500">Dashboard</a> / 
    <a href="{{ route('admin.messages.index') }}" class="text-gray-500 hover:text-primary-500">Messages</a> / 
    <span class="text-gray-700">Details</span>
</span>
@endsection

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Message Details</h1>
        <p class="text-gray-600 mt-1">Detailed information about message #{{ $message->id }}</p>
    </div>
    <div class="mt-4 md:mt-0 flex space-x-3">
        <a href="{{ route('admin.messages.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
            <i class="bx bx-arrow-back mr-2"></i> Back to List
        </a>

        @if($message->status !== 'delivered')
        <form action="{{ route('admin.messages.retry', $message->id) }}" method="POST">
            @csrf
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                <i class="bx bx-refresh mr-2"></i> Retry Sending
            </button>
        </form>
        @endif
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Message Content Card -->
    <div class="md:col-span-2 bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-medium text-gray-800">Message Content</h3>
        </div>
        
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <span class="text-gray-500 text-sm">Sent:</span>
                    <span class="ml-2 text-gray-700">{{ $message->created_at->format('M d, Y H:i:s') }}</span>
                </div>
                <x-status-badge :status="ucfirst($message->status)" />
            </div>
            
            <div class="mb-4">
                <span class="text-gray-500 text-sm">To:</span>
                <span class="ml-2 text-gray-900 font-medium">{{ $message->recipient }}</span>
            </div>
            
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                <p class="text-gray-800 whitespace-pre-line">{{ $message->content }}</p>
            </div>
            
            <div class="mt-4 text-xs text-gray-500">
                <div class="flex justify-between">
                    <span>Length: {{ strlen($message->content) }} characters</span>
                    <span>Segments: {{ ceil(strlen($message->content) / 160) }}</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Message Details Card -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-medium text-gray-800">Details</h3>
        </div>
        
        <div class="p-6">
            <dl class="space-y-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Message ID</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $message->id }}</dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-gray-500">Merchant</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        <a href="{{ route('admin.merchants.show', $message->merchant_id) }}" class="text-primary-600 hover:text-primary-700">
                            {{ $message->merchant->name }}
                        </a>
                    </dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        <x-status-badge :status="ucfirst($message->status)" />
                        
                        @if($message->status == 'failed')
                            <p class="mt-1 text-sm text-red-600">{{ $message->error_message }}</p>
                        @endif
                    </dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-gray-500">Created At</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $message->created_at->format('M d, Y H:i:s') }}</dd>
                </div>
                
                <div>
                    <dt class="text-sm font-medium text-gray-500">Updated At</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $message->updated_at->format('M d, Y H:i:s') }}</dd>
                </div>
                
                @if($message->delivered_at)
                <div>
                    <dt class="text-sm font-medium text-gray-500">Delivered At</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $message->delivered_at->format('M d, Y H:i:s') }}</dd>
                </div>
                @endif
                
                <div>
                    <dt class="text-sm font-medium text-gray-500">Provider</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $message->provider ?? 'Default Provider' }}</dd>
                </div>
                
                @if($message->provider_message_id)
                <div>
                    <dt class="text-sm font-medium text-gray-500">Provider Message ID</dt>
                    <dd class="mt-1 text-sm text-gray-900 break-all">{{ $message->provider_message_id }}</dd>
                </div>
                @endif
            </dl>
        </div>
    </div>
    
    <!-- Message History Card -->
    <div class="md:col-span-3 bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-medium text-gray-800">Message History</h3>
        </div>
        
        <div class="p-6">
            <div class="relative">
                <div class="absolute h-full w-0.5 bg-gray-200 left-6 top-0"></div>
                
                <ul class="space-y-4">
                    @foreach($message->history as $historyItem)
                    <li class="flex items-start">
                        <div class="relative flex items-center justify-center flex-shrink-0 w-12 h-12">
                            @if($historyItem->status == 'delivered')
                                <div class="absolute w-8 h-8 bg-green-100 rounded-full"></div>
                                <i class="bx bx-check-circle relative text-green-500 text-xl"></i>
                            @elseif($historyItem->status == 'failed')
                                <div class="absolute w-8 h-8 bg-red-100 rounded-full"></div>
                                <i class="bx bx-x-circle relative text-red-500 text-xl"></i>
                            @else
                                <div class="absolute w-8 h-8 bg-gray-100 rounded-full"></div>
                                <i class="bx bx-time relative text-gray-500 text-xl"></i>
                            @endif
                        </div>
                        
                        <div class="ml-4 min-w-0 flex-1">
                            <div class="flex items-center justify-between">
                                <h4 class="text-sm font-medium text-gray-900">
                                    Status changed to {{ ucfirst($historyItem->status) }}
                                </h4>
                                <p class="text-xs text-gray-500">{{ $historyItem->created_at->format('M d, H:i') }}</p>
                            </div>
                            
                            @if($historyItem->notes)
                                <p class="mt-1 text-sm text-gray-600">{{ $historyItem->notes }}</p>
                            @endif
                            
                            @if($historyItem->error_message)
                                <p class="mt-1 text-sm text-red-600">{{ $historyItem->error_message }}</p>
                            @endif
                        </div>
                    </li>
                    @endforeach
                    
                    <li class="flex items-start">
                        <div class="relative flex items-center justify-center flex-shrink-0 w-12 h-12">
                            <div class="absolute w-8 h-8 bg-blue-100 rounded-full"></div>
                            <i class="bx bx-plus relative text-blue-500 text-xl"></i>
                        </div>
                        
                        <div class="ml-4 min-w-0 flex-1">
                            <div class="flex items-center justify-between">
                                <h4 class="text-sm font-medium text-gray-900">Message created</h4>
                                <p class="text-xs text-gray-500">{{ $message->created_at->format('M d, H:i') }}</p>
                            </div>
                            <p class="mt-1 text-sm text-gray-600">Message created by {{ $message->merchant->name }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection