@extends('layouts.dashboard-admin')
@section('content')
<!-- Main Content -->
<main class="flex-1 p-10">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold">Hi, Alyssa</h1>
            <p class="text-gray-600">Ready to start your day with some pitch decks?</p>
        </div>
        <div class="flex items-center space-x-4">
            <button class="p-2 bg-gray-200 rounded-full">✉️</button>
            <button class="p-2 bg-gray-200 rounded-full">🔔</button>
            <div class="bg-purple-500 text-white px-3 py-1 rounded-full">AJ</div>
        </div>
    </div>

    <!-- Overview Stats -->
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="p-4 bg-yellow-300 text-white rounded-lg">83% Open Rate</div>
        <div class="p-4 bg-purple-500 text-white rounded-lg">77% Complete</div>
        <div class="p-4 bg-pink-500 text-white rounded-lg">91 Unique Views</div>
        <div class="p-4 bg-gray-300 text-gray-700 rounded-lg">126 Total Views</div>
    </div>

    <!-- List Items -->
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Overview</h2>
        <div class="space-y-4">
            <!-- Item 1 -->
            <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg">
                <div>
                    <h3 class="text-lg font-bold">Next in Fashion</h3>
                    <p class="text-gray-600">Sint occaecat cupidatat non proident...</p>
                    <span class="text-sm text-gray-500">10 Slides</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="bg-green-500 text-white px-3 py-1 rounded-full">Public</span>
                    <button class="p-2 bg-gray-200 rounded">✏️</button>
                    <button class="p-2 bg-gray-200 rounded">🗑️</button>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="flex justify-between items-center bg-gray-100 p-4 rounded-lg">
                <div>
                    <h3 class="text-lg font-bold">Digital Marketing Today</h3>
                    <p class="text-gray-600">Sint occaecat cupidatat non proident...</p>
                    <span class="text-sm text-gray-500">10 Slides</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="bg-gray-500 text-white px-3 py-1 rounded-full">Private</span>
                    <button class="p-2 bg-gray-200 rounded">✏️</button>
                    <button class="p-2 bg-gray-200 rounded">🗑️</button>
                </div>
            </div>
        </div>
    </div>
</main>
    
@endsection
