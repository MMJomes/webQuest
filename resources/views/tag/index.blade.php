@extends('welcome')
@section('content')
    <div class="container mx-auto">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <form action="{{ route('tag.store') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <p style="color: red">{{ $errors->first() }}</p>
                @endif
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Name">
                </div>
                <input type="submit" value="Save"
                    class="mt-5 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
            </form>

        </div>
        <hr class="mt-5 mb-4">
        @if (count($tags) > 0)
            <h3 class="text-center mb-4" style="font-size: 24px">Tags List</h3>

            <hr>
            <div class="row">
                @foreach ($tags as $tag)
                    <div class="col lg:w-1/3 lg:pr-4">
                        <div class="max-w-7xl mx-auto py-4 sm:px-3 lg:px-4">
                            <div class="bg-white rounded-lg shadow-lg mb-3">
                                <div class="p-4">
                                    <h3 class="text-xl font-bold mb-2">Tag Name</h4>
                                        <p class="text-gray-700 text-base">{{ $tag->name }}</p>
                                </div>
                                <a href="{{ route('tag.edit', $tag->id) }}"
                                    class="btn btn-blue rounded ">Edit</a>

                                <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="text-indigo-600 btn hover:text-indigo-500">
                                </form>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
