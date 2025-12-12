@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Email Campaigns</h2>
                <p class="text-gray-500 mt-1">Manage and track all your email campaigns in one place.</p>
            </div>
            <a href="{{ route('email-campaigns.create') }}"
                class="btn-primary inline-flex items-center gap-2 text-white font-semibold py-3 px-6 rounded-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Campaign
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-xl p-5 border border-primary-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-primary-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-primary-700">{{ $campaigns->count() }}</p>
                    <p class="text-sm text-primary-600">Total Campaigns</p>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-5 border border-green-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-green-700">{{ $campaigns->where('status', 'sent')->count() }}</p>
                    <p class="text-sm text-green-600">Successfully Sent</p>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-amber-50 to-amber-100 rounded-xl p-5 border border-amber-200">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-amber-500 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-amber-700">
                        {{ $campaigns->sum(function ($c) {
        return count($c->recipients); }) }}</p>
                    <p class="text-sm text-amber-600">Total Recipients</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Campaigns Table -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Subject
                    </th>
                    <th class="px-4 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider w-24">
                        Recipients</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Emails Sent
                    </th>
                    <th class="px-4 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider w-28">
                        Status</th>
                    <th class="px-4 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-32">
                        Created</th>
                    <th class="px-4 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider w-24">
                        Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($campaigns as $campaign)
                    <tr class="table-row-hover transition-all duration-200 hover:shadow-sm">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-lg bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-sm font-semibold text-gray-900 truncate">
                                        {{ Str::limit($campaign->subject, 35) }}</p>
                                    <p class="text-xs text-gray-400">Campaign #{{ $campaign->id }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <span
                                class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-primary-100 text-primary-700 text-sm font-bold">
                                {{ count($campaign->recipients) }}
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex flex-wrap gap-1.5">
                                @foreach(array_slice($campaign->recipients, 0, 2) as $email)
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-lg bg-gray-100 text-xs text-gray-700 font-medium truncate max-w-[140px]">
                                        {{ $email }}
                                    </span>
                                @endforeach
                                @if(count($campaign->recipients) > 2)
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-lg bg-primary-100 text-xs text-primary-700 font-medium">
                                        +{{ count($campaign->recipients) - 2 }} more
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-4 py-4 text-center">
                            @php
                                $statusConfig = [
                                    'sent' => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'dot' => 'bg-green-500'],
                                    'failed' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'dot' => 'bg-red-500'],
                                    'sending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-700', 'dot' => 'bg-yellow-500'],
                                    'partially_sent' => ['bg' => 'bg-orange-100', 'text' => 'text-orange-700', 'dot' => 'bg-orange-500'],
                                    'pending' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'dot' => 'bg-gray-500'],
                                ];
                                $config = $statusConfig[$campaign->status] ?? $statusConfig['pending'];
                            @endphp
                            <span
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold {{ $config['bg'] }} {{ $config['text'] }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $config['dot'] }}"></span>
                                {{ ucfirst(str_replace('_', ' ', $campaign->status)) }}
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex flex-col">
                                <span
                                    class="text-sm font-medium text-gray-900">{{ $campaign->created_at->format('M d, Y') }}</span>
                                <span class="text-xs text-gray-400">{{ $campaign->created_at->format('h:i A') }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('email-campaigns.show', $campaign) }}"
                                    class="w-8 h-8 rounded-lg bg-primary-50 hover:bg-primary-100 flex items-center justify-center text-primary-600 hover:text-primary-700 transition-all duration-200"
                                    title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </a>
                                <form action="{{ route('email-campaigns.destroy', $campaign) }}" method="POST"
                                    class="inline-flex"
                                    onsubmit="return confirm('Are you sure you want to delete this campaign?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 flex items-center justify-center text-red-600 hover:text-red-700 transition-all duration-200"
                                        title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center">
                                <div
                                    class="w-20 h-20 rounded-full bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-primary-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">No campaigns yet</h3>
                                <p class="text-gray-500 mb-6 max-w-sm">Get started by creating your first email campaign. It
                                    only takes a few minutes!</p>
                                <a href="{{ route('email-campaigns.create') }}"
                                    class="btn-primary inline-flex items-center gap-2 text-white font-semibold py-3 px-6 rounded-xl">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Create Your First Campaign
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection