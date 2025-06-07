@extends('layouts.app')

@section('title', 'System Configurations - FlexSMS Admin')

@section('breadcrumbs')
<span class="text-gray-500">
    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-primary-500">Dashboard</a>
    / <span class="text-gray-700">Configurations</span>
</span>
@endsection

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Configurations du système</h1>
    <p class="text-gray-600 mt-1">Gérer les paramètres et les réglages globaux du système</p>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden" x-data="{ activeTab: 'general' }">
    <!-- Tabs -->
    <div class="border-b border-gray-200">
        <nav class="flex -mb-px overflow-x-auto">
            <button @click="activeTab = 'general'"
                    :class="{ 'border-primary-500 text-primary-600': activeTab === 'general', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'general' }"
                    class="whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm focus:outline-none">
                Général
            </button>
            <button @click="activeTab = 'sms'"
                    :class="{ 'border-primary-500 text-primary-600': activeTab === 'sms', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'sms' }"
                    class="whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm focus:outline-none">
                SMS Providers
            </button>
            <button @click="activeTab = 'security'"
                    :class="{ 'border-primary-500 text-primary-600': activeTab === 'security', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'security' }"
                    class="whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm focus:outline-none">
                Security
            </button>
            <button @click="activeTab = 'notifications'"
                    :class="{ 'border-primary-500 text-primary-600': activeTab === 'notifications', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'notifications' }"
                    class="whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm focus:outline-none">
                Notifications
            </button>
        </nav>
    </div>

    <!-- Tab Content -->
    <div class="p-6">
        <!-- General Settings -->
        <div x-show="activeTab === 'general'">
            <form action="{{ route('configurations.update') }}" method="POST">
                @csrf
                <input type="hidden" name="section" value="general">

                <div class="space-y-6">
                    <div>
                        <label for="app_name" class="block text-sm font-medium text-gray-700">Application Name</label>
                        <input type="text" name="app_name" id="app_name" value="{{ $configurations['app_name'] ?? 'FlexSMS' }}"
                            class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                        <p class="mt-1 text-xs text-gray-500">The name of your SMS application</p>
                    </div>

                    <div>
                        <label for="admin_email" class="block text-sm font-medium text-gray-700">Admin Email</label>
                        <input type="email" name="admin_email" id="admin_email" value="{{ $configurations['admin_email'] ?? '' }}"
                            class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                        <p class="mt-1 text-xs text-gray-500">Primary contact email for system notifications</p>
                    </div>

                    <div>
                        <label for="default_timezone" class="block text-sm font-medium text-gray-700">Default Timezone</label>
                        <select name="default_timezone" id="default_timezone"
                            class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                            <option value="UTC" {{ ($configurations['default_timezone'] ?? '') == 'UTC' ? 'selected' : '' }}>UTC</option>
                            <option value="America/New_York" {{ ($configurations['default_timezone'] ?? '') == 'America/New_York' ? 'selected' : '' }}>Eastern Time (US & Canada)</option>
                            <option value="America/Chicago" {{ ($configurations['default_timezone'] ?? '') == 'America/Chicago' ? 'selected' : '' }}>Central Time (US & Canada)</option>
                            <option value="America/Denver" {{ ($configurations['default_timezone'] ?? '') == 'America/Denver' ? 'selected' : '' }}>Mountain Time (US & Canada)</option>
                            <option value="America/Los_Angeles" {{ ($configurations['default_timezone'] ?? '') == 'America/Los_Angeles' ? 'selected' : '' }}>Pacific Time (US & Canada)</option>
                            <option value="Europe/London" {{ ($configurations['default_timezone'] ?? '') == 'Europe/London' ? 'selected' : '' }}>London</option>
                            <option value="Europe/Paris" {{ ($configurations['default_timezone'] ?? '') == 'Europe/Paris' ? 'selected' : '' }}>Paris</option>
                            <option value="Asia/Tokyo" {{ ($configurations['default_timezone'] ?? '') == 'Asia/Tokyo' ? 'selected' : '' }}>Tokyo</option>
                            <option value="Asia/Shanghai" {{ ($configurations['default_timezone'] ?? '') == 'Asia/Shanghai' ? 'selected' : '' }}>Shanghai</option>
                        </select>
                    </div>

                    <div>
                        <label for="maintenance_mode" class="flex items-center">
                            <input type="checkbox" name="maintenance_mode" id="maintenance_mode" value="1"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                {{ ($configurations['maintenance_mode'] ?? false) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Maintenance Mode</span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500 ml-6">When enabled, the application will be in maintenance mode</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- SMS Provider Settings -->
        <div x-show="activeTab === 'sms'">
            <form action="{{ route('configurations.update') }}" method="POST">
                @csrf
                <input type="hidden" name="section" value="sms">

                <div class="space-y-6">
                    <div>
                        <label for="default_provider" class="block text-sm font-medium text-gray-700">Default SMS Provider</label>
                        <select name="default_provider" id="default_provider"
                            class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                            <option value="twilio" {{ ($configurations['default_provider'] ?? '') == 'twilio' ? 'selected' : '' }}>Twilio</option>
                            <option value="vonage" {{ ($configurations['default_provider'] ?? '') == 'vonage' ? 'selected' : '' }}>Vonage (Nexmo)</option>
                            <option value="messagebird" {{ ($configurations['default_provider'] ?? '') == 'messagebird' ? 'selected' : '' }}>MessageBird</option>
                            <option value="africastalking" {{ ($configurations['default_provider'] ?? '') == 'africastalking' ? 'selected' : '' }}>Africa's Talking</option>
                        </select>
                    </div>

                    <!-- Twilio Settings -->
                    <div class="p-4 border border-gray-200 rounded-md">
                        <h3 class="text-lg font-medium text-gray-800 mb-4">Twilio Settings</h3>

                        <div class="space-y-4">
                            <div>
                                <label for="twilio_account_sid" class="block text-sm font-medium text-gray-700">Account SID</label>
                                <input type="text" name="twilio_account_sid" id="twilio_account_sid" value="{{ $configurations['twilio_account_sid'] ?? '' }}"
                                    class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="twilio_auth_token" class="block text-sm font-medium text-gray-700">Auth Token</label>
                                <input type="password" name="twilio_auth_token" id="twilio_auth_token" value="{{ $configurations['twilio_auth_token'] ?? '' }}"
                                    class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="twilio_from_number" class="block text-sm font-medium text-gray-700">From Number</label>
                                <input type="text" name="twilio_from_number" id="twilio_from_number" value="{{ $configurations['twilio_from_number'] ?? '' }}"
                                    class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                <p class="mt-1 text-xs text-gray-500">Default sender number in E.164 format</p>
                            </div>
                        </div>
                    </div>

                    <!-- Vonage Settings -->
                    <div class="p-4 border border-gray-200 rounded-md">
                        <h3 class="text-lg font-medium text-gray-800 mb-4">Vonage (Nexmo) Settings</h3>

                        <div class="space-y-4">
                            <div>
                                <label for="vonage_api_key" class="block text-sm font-medium text-gray-700">API Key</label>
                                <input type="text" name="vonage_api_key" id="vonage_api_key" value="{{ $configurations['vonage_api_key'] ?? '' }}"
                                    class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="vonage_api_secret" class="block text-sm font-medium text-gray-700">API Secret</label>
                                <input type="password" name="vonage_api_secret" id="vonage_api_secret" value="{{ $configurations['vonage_api_secret'] ?? '' }}"
                                    class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="vonage_from" class="block text-sm font-medium text-gray-700">From</label>
                                <input type="text" name="vonage_from" id="vonage_from" value="{{ $configurations['vonage_from'] ?? '' }}"
                                    class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                <p class="mt-1 text-xs text-gray-500">Default sender ID or number</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="sms_fallback_enabled" class="flex items-center">
                            <input type="checkbox" name="sms_fallback_enabled" id="sms_fallback_enabled" value="1"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                {{ ($configurations['sms_fallback_enabled'] ?? false) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Enable Provider Fallback</span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500 ml-6">Automatically try alternative providers if the primary provider fails</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Security Settings -->
        <div x-show="activeTab === 'security'">
            <form action="{{ route('configurations.update') }}" method="POST">
                @csrf
                <input type="hidden" name="section" value="security">

                <div class="space-y-6">
                    <div>
                        <label for="token_expiry_days" class="block text-sm font-medium text-gray-700">API Token Expiry (Days)</label>
                        <input type="number" name="token_expiry_days" id="token_expiry_days" value="{{ $configurations['token_expiry_days'] ?? 30 }}"
                            class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                        <p class="mt-1 text-xs text-gray-500">Number of days before API tokens expire (0 for no expiration)</p>
                    </div>

                    <div>
                        <label for="max_login_attempts" class="block text-sm font-medium text-gray-700">Max Login Attempts</label>
                        <input type="number" name="max_login_attempts" id="max_login_attempts" value="{{ $configurations['max_login_attempts'] ?? 5 }}"
                            class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                        <p class="mt-1 text-xs text-gray-500">Maximum number of failed login attempts before account lockout</p>
                    </div>

                    <div>
                        <label for="lockout_time" class="block text-sm font-medium text-gray-700">Lockout Time (Minutes)</label>
                        <input type="number" name="lockout_time" id="lockout_time" value="{{ $configurations['lockout_time'] ?? 15 }}"
                            class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                        <p class="mt-1 text-xs text-gray-500">Minutes to lock account after exceeding max login attempts</p>
                    </div>

                    <div>
                        <label for="two_factor_enabled" class="flex items-center">
                            <input type="checkbox" name="two_factor_enabled" id="two_factor_enabled" value="1"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                {{ ($configurations['two_factor_enabled'] ?? false) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Enable Two-Factor Authentication</span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500 ml-6">Require two-factor authentication for all admin users</p>
                    </div>

                    <div>
                        <label for="require_password_change" class="flex items-center">
                            <input type="checkbox" name="require_password_change" id="require_password_change" value="1"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                {{ ($configurations['require_password_change'] ?? false) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Require Password Change</span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500 ml-6">Require users to change password on first login</p>
                    </div>

                    <div>
                        <label for="password_expiry_days" class="block text-sm font-medium text-gray-700">Password Expiry (Days)</label>
                        <input type="number" name="password_expiry_days" id="password_expiry_days" value="{{ $configurations['password_expiry_days'] ?? 90 }}"
                            class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                        <p class="mt-1 text-xs text-gray-500">Number of days before passwords expire (0 for no expiration)</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Notification Settings -->
        <div x-show="activeTab === 'notifications'">
            <form action="{{ route('configurations.update') }}" method="POST">
                @csrf
                <input type="hidden" name="section" value="notifications">

                <div class="space-y-6">
                    <div>
                        <label for="email_notifications" class="flex items-center">
                            <input type="checkbox" name="email_notifications" id="email_notifications" value="1"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                {{ ($configurations['email_notifications'] ?? true) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Email Notifications</span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500 ml-6">Send email notifications for important system events</p>
                    </div>

                    <div>
                        <label for="notify_on_failed_messages" class="flex items-center">
                            <input type="checkbox" name="notify_on_failed_messages" id="notify_on_failed_messages" value="1"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                {{ ($configurations['notify_on_failed_messages'] ?? true) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Failed Message Notifications</span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500 ml-6">Notify administrators when messages fail to send</p>
                    </div>

                    <div>
                        <label for="notify_on_low_balance" class="flex items-center">
                            <input type="checkbox" name="notify_on_low_balance" id="notify_on_low_balance" value="1"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                                {{ ($configurations['notify_on_low_balance'] ?? true) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Low Balance Notifications</span>
                        </label>
                        <p class="mt-1 text-xs text-gray-500 ml-6">Notify administrators when account balance is low</p>
                    </div>

                    <div>
                        <label for="low_balance_threshold" class="block text-sm font-medium text-gray-700">Low Balance Threshold</label>
                        <input type="number" name="low_balance_threshold" id="low_balance_threshold" value="{{ $configurations['low_balance_threshold'] ?? 10 }}"
                            class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                        <p class="mt-1 text-xs text-gray-500">Amount that triggers low balance notifications</p>
                    </div>

                    <div>
                        <label for="notification_emails" class="block text-sm font-medium text-gray-700">Notification Emails</label>
                        <textarea name="notification_emails" id="notification_emails" rows="3"
                            class="mt-1 block p-3 w-full border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 sm:text-sm">{{ $configurations['notification_emails'] ?? '' }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">Email addresses to receive notifications (comma separated)</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
