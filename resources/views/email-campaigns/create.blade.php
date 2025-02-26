@extends('layouts.app')

@section('content')
<div class="bg-blue-900 shadow-lg rounded-lg">
    <div class="px-4 py-5 sm:p-">

        <h2 class="text-2xl font-bold text-white mb-4">New Email Campaign</h2>

        <form action="{{ route('email-campaigns.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

<!-- Subject Field -->
<div class="mb-6">
    <label for="subject" class="block text-white text-sm font-bold mb-2">Subject</label>
    <div class="relative">
        <input 
            type="text" 
            name="subject" 
            id="subject" 
            class="w-full bg-gray-300 border border-gray-700 rounded-lg py-3 px-4 text-black placeholder-gray-500 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-200" 
            value="Candidature pour un Stage en Développement Web Full Stack" 
            placeholder="Enter subject" 
            required
        >
    </div>
</div>

<!-- Recipients Field -->
<div class="mb-6">
    <label for="recipients" class="block text-white text-sm font-bold mb-2">Recipients (comma-separated)</label>
    <div class="relative">
        <input 
            type="text" 
            name="recipients" 
            id="recipients" 
            class="w-full bg-gray-300 border border-gray-700 rounded-lg py-3 px-4 text-black placeholder-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition duration-200" 
            value="{{ old('recipients') }}" 
            placeholder="Enter recipients, separated by commas" 
            required
        >
    </div>
</div>

            <!-- Message Field -->
            <div class="mb-4">
                <label for="message" class="block text-white text-sm font-bold mb-2">Message</label>
                <textarea name="message" id="message" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-200 text-black leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('message', "

Actuellement en formation en développement web full stack, je souhaite mettre en pratique mes compétences techniques et approfondir mon expertise au sein de votre entreprise à travers un stage enrichissant.

Passionné par le développement web, je maîtrise les technologies front-end et back-end et aspire à contribuer activement à des projets concrets tout en acquérant de nouvelles compétences. Intégrer votre équipe serait une opportunité précieuse pour évoluer dans un environnement dynamique et innovant.

Je reste à votre disposition pour toute information complémentaire et me tiens prêt à vous rencontrer afin d'échanger sur ma motivation et mes compétences.

Dans l'attente de votre retour, veuillez agréer, Madame, Monsieur, l'expression de mes salutations distinguées.") }}</textarea>
            </div>

            <!-- Attachments Field -->
            <div class="mb-6">
    <label for="attachments" class="block text-white text-sm font-bold mb-2">Attachments</label>
    <div class="relative">
        <input 
            type="file" 
            name="attachments[]" 
            id="attachments" 
            class="opacity-0 absolute inset-0 w-full h-full cursor-pointer" 
            multiple
        >
        <div class="flex items-center justify-between bg-gray-300 border border-gray-700 rounded-lg p-3 hover:bg-gray-700 transition duration-200">
            <span class="text-black text-sm">Choose files...</span>
            <span class="bg-gray-700 text-white px-3 py-1 rounded-md text-sm">Browse</span>
        </div>
    </div>
    <p class="text-gray-400 text-xs mt-2">You can upload multiple files.</p>
</div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-800 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    Send Campaign
                </button>
            </div>
        </form>
    </div>
</div>
@endsection