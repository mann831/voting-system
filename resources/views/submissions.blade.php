@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-6">
            <h2 class="text-2xl font-bold text-white">Voter Submissions</h2>
            <p class="text-indigo-100 mt-1 text-sm">Names and ages of people who have submitted a vote.</p>
        </div>

        @if($votes->isEmpty())
            <div class="px-8 py-12 text-center">
                <p class="text-gray-600">No submissions yet.</p>
            </div>
        @else
            <div class="px-4 sm:px-8 py-6">
                <p class="text-sm text-gray-500 mb-4">{{ $votes->count() }} {{ \Illuminate\Support\Str::plural('submission', $votes->count()) }}</p>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b border-gray-200 text-sm text-gray-500">
                                <th scope="col" class="px-4 py-3 font-semibold">Name</th>
                                <th scope="col" class="px-4 py-3 font-semibold">Age</th>
                                <th scope="col" class="px-4 py-3 font-semibold">Voted For</th>
                                <th scope="col" class="px-4 py-3 font-semibold">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($votes as $vote)
                                <tr>
                                    <td class="px-4 py-4 font-medium text-gray-800">{{ $vote->voter_name }}</td>
                                    <td class="px-4 py-4 text-gray-600">{{ $vote->age }}</td>
                                    <td class="px-4 py-4 text-gray-600">{{ $vote->candidate }}</td>
                                    <td class="px-4 py-4">
                                        <form method="POST" action="{{ route('submissions.destroy', $vote) }}" onsubmit="return confirm('Delete this submission?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
