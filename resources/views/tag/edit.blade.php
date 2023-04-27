@extends('welcome')
@section('content')
    <div class="container mx-auto">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <form action="{{ route('tag.update', [$tag_updated->id]) }}" method="POST">
                @csrf
                @method('PUT')
                @if ($errors->any())
                    <p style="color: red">{{ $errors->first() }}</p>
                @endif
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Name" value="{{old('name',$tag_updated->name)}}">
                </div>
                <input type="submit" value="Update"
                    class="mt-5 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
            </form>

        </div>
        <hr class="mt-5 mb-4">
        @if (count($tags) > 0)
            <h3 class="text-center mb-4" style="font-size: 24px">Tags List</h3>

            <hr>
            <div class="flex flex-wrap">
                @foreach ($tags as $tag)
                    <div class="col lg:w-1/3 lg:pr-4">
                        <div class="bg-white shadow-md rounded-md p-4 m-2 max-w-xs">
                            <h2 class="text-lg font-medium">Tag Name</h2>
                            <p class="text-gray-500">{{ $tag->name }}</p>
                            <div class="flex justify-end">
                                <a href="{{ route('tag.edit', $tag->id) }}"
                                    class="text-indigo-600  hover:text-indigo-900 mx-3">Edit</a>

                                    <form action="{{ route('tag.destroy', $tag->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete"
                                            class="text-indigo-600 btn hover:text-indigo-500">
                                    </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
