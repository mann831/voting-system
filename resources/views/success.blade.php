@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-emerald-500 to-green-600 px-8 py-8">
                <div class="flex justify-center mb-4">
                    <div class="bg-white bg-opacity-20 rounded-full p-4">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <h2 class="text-2xl font-bold text-white text-center">Vote Recorded!</h2>
                <p class="text-green-100 text-center mt-1 text-sm">Your vote has been successfully recorded</p>
            </div>

            <!-- Card Body -->
            <div class="px-8 py-8">
                <div class="bg-gray-50 rounded-xl p-6 mb-6">
                    <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Vote Details</h3>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Voter Name</span>
                            <span class="font-semibold text-gray-800">{{ $voterName }}</span>
                        </div>
                        <hr class="border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Voted For</span>
                            <span class="font-semibold text-indigo-600">{{ $candidate }}</span>
                        </div>
                    </div>
                </div>

                <!-- Back to Home Link -->
                <a
                    href="{{ route('home') }}"
                    class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md hover:shadow-lg"
                >
                    Back to Home
                </a>
            </div>

            <!-- Card Footer -->
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-100">
                <p class="text-xs text-gray-500 text-center">
                    Thank you for participating in the democratic process.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
