@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <a href="{{ route('email-campaigns.index') }}"
                class="text-primary-600 hover:text-primary-700 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
            </a>
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight">New Campaign</h2>
        </div>
        <p class="text-gray-500">Create a new email campaign and reach your audience instantly.</p>
    </div>

    <form action="{{ route('email-campaigns.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Form Section -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Subject Field -->
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <label for="subject" class="block text-sm font-semibold text-gray-700 mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                </path>
                            </svg>
                            Email Subject
                        </div>
                    </label>
                    <input type="text" name="subject" id="subject"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3.5 px-4 text-gray-900 placeholder-gray-400 focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 transition-all duration-200"
                        value="{{ old('subject', 'Candidature pour un Stage en Développement Web Full Stack') }}"
                        placeholder="Enter a compelling subject line..." required>
                    <p class="text-xs text-gray-400 mt-2">A catchy subject line increases open rates significantly.</p>
                </div>

                <!-- Recipients Field -->
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <label for="recipients" class="block text-sm font-semibold text-gray-700 mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Recipients
                        </div>
                    </label>
                    <input type="text" name="recipients" id="recipients"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3.5 px-4 text-gray-900 placeholder-gray-400 focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 transition-all duration-200"
                        value="{{ old('recipients') }}" placeholder="email1@example.com, email2@example.com, ..." required>
                    <p class="text-xs text-gray-400 mt-2">Separate multiple email addresses with commas.</p>
                </div>

                <!-- Message Field -->
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <label for="message" class="block text-sm font-semibold text-gray-700 mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            Message Content
                        </div>
                    </label>
                    <textarea name="message" id="message" rows="12"
                        class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3.5 px-4 text-gray-900 placeholder-gray-400 focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 transition-all duration-200 resize-none"
                        required>{{ old('message', "Actuellement en formation en développement web full stack, je souhaite mettre en pratique mes compétences techniques et approfondir mon expertise au sein de votre entreprise à travers un stage enrichissant.

    Passionné par le développement web, je maîtrise les technologies front-end et back-end et aspire à contribuer activement à des projets concrets tout en acquérant de nouvelles compétences. Intégrer votre équipe serait une opportunité précieuse pour évoluer dans un environnement dynamique et innovant.

    Je reste à votre disposition pour toute information complémentaire et me tiens prêt à vous rencontrer afin d'échanger sur ma motivation et mes compétences.

    Dans l'attente de votre retour, veuillez agréer, Madame, Monsieur, l'expression de mes salutations distinguées.") }}</textarea>
                    <p class="text-xs text-gray-400 mt-2">Write your email message. Line breaks will be preserved.</p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Attachments Field -->
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                </path>
                            </svg>
                            Attachments
                        </div>
                    </label>
                    <div class="relative group">
                        <input type="file" name="attachments[]" id="attachments"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" multiple>
                        <div
                            class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center group-hover:border-primary-400 group-hover:bg-primary-50/50 transition-all duration-200">
                            <div
                                class="w-12 h-12 mx-auto rounded-full bg-primary-100 flex items-center justify-center mb-3">
                                <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-700">Drop files here or click to upload</p>
                            <p class="text-xs text-gray-400 mt-1">PDF, DOC, DOCX, JPG, PNG up to 10MB</p>
                        </div>
                    </div>
                </div>

                <!-- Tips Card -->
                <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-xl border border-primary-200 p-6">
                    <h3 class="font-semibold text-primary-800 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                            </path>
                        </svg>
                        Pro Tips
                    </h3>
                    <ul class="space-y-2 text-sm text-primary-700">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Keep subject lines under 50 characters
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Personalize your message
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            Include a clear call-to-action
                        </li>
                    </ul>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full btn-primary text-white font-semibold py-4 px-6 rounded-xl flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                    </svg>
                    Send Campaign
                </button>

                <p class="text-xs text-gray-400 text-center">
                    Your emails will be sent immediately after submission.
                </p>
            </div>
        </div>
    </form>
@endsection