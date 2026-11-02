@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white text-center">Age Verification</h2>
                <p class="text-indigo-100 text-center mt-1 text-sm">Please verify your identity to proceed</p>
            </div>

            <!-- Card Body -->
            <div class="px-8 py-8">
                <form method="POST" action="{{ route('check.age') }}">
                    @csrf

                    <!-- Name Field -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Full Name
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            placeholder="Enter your full name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 text-gray-700 placeholder-gray-400"
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Age Field -->
                    <div class="mb-8">
                        <label for="age" class="block text-sm font-semibold text-gray-700 mb-2">
                            Age
                        </label>
                        <input
                            type="number"
                            id="age"
                            name="age"
                            value="{{ old('age') }}"
                            required
                            min="1"
                            max="150"
                            placeholder="Enter your age"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 text-gray-700 placeholder-gray-400"
                        >
                        @error('age')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-md hover:shadow-lg"
                    >
                        Verify Age
                    </button>
                </form>
            </div>

            <!-- Card Footer -->
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-100">
                <p class="text-xs text-gray-500 text-center">
                    You must be 18 years or older to participate in the voting process.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
