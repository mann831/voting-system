@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-lg">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-green-500 to-teal-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white text-center">Cast Your Vote</h2>
                <p class="text-green-100 text-center mt-1 text-sm">
                    Welcome, <span class="font-semibold">{{ $name }}</span>! You are eligible to vote.
                </p>
            </div>

            <!-- Card Body -->
            <div class="px-8 py-8">
                <form method="POST" action="{{ route('vote.submit') }}">
                    @csrf

                    <p class="text-gray-600 mb-6 text-center">Select your preferred candidate:</p>

                    <!-- Candidate Options -->
                    <div class="space-y-4 mb-8">
                        <!-- Candidate A -->
                        <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition-all duration-200 group">
                            <input
                                type="radio"
                                name="candidate"
                                value="Candidate A"
                                class="w-5 h-5 text-indigo-600 focus:ring-indigo-500 border-gray-300"
                                required
                            >
                            <div class="ml-4">
                                <span class="text-gray-800 font-semibold group-hover:text-indigo-700 transition-colors">Candidate A</span>
                            </div>
                        </label>

                        <!-- Candidate B -->
                        <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition-all duration-200 group">
                            <input
                                type="radio"
                                name="candidate"
                                value="Candidate B"
                                class="w-5 h-5 text-indigo-600 focus:ring-indigo-500 border-gray-300"
                            >
                            <div class="ml-4">
                                <span class="text-gray-800 font-semibold group-hover:text-indigo-700 transition-colors">Candidate B</span>
                            </div>
                        </label>

                        <!-- Candidate C -->
                        <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-indigo-400 hover:bg-indigo-50 transition-all duration-200 group">
                            <input
                                type="radio"
                                name="candidate"
                                value="Candidate C"
                                class="w-5 h-5 text-indigo-600 focus:ring-indigo-500 border-gray-300"
                            >
                            <div class="ml-4">
                                <span class="text-gray-800 font-semibold group-hover:text-indigo-700 transition-colors">Candidate C</span>
                            </div>
                        </label>
                    </div>

                    @error('candidate')
                        <p class="mb-4 text-sm text-red-600 text-center">{{ $message }}</p>
                    @enderror

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 shadow-md hover:shadow-lg"
                    >
                        Cast Your Vote
                    </button>
                </form>
            </div>

            <!-- Card Footer -->
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-100">
                <p class="text-xs text-gray-500 text-center">
                    Your vote is confidential and will be securely recorded.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
