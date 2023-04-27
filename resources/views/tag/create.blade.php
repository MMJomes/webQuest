@extends('welcome')
@section('content')
    <div class="container mx-auto">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <form action="{{ route('tag.store') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <p>{{ $errors->first() }}</p>
                @endif
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Name" value="{{old('name')}}">
                </div>
                <input type="submit" value="Save"
                    class="mt-5 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
            </form>
        </div>
    </div>
@endsection
