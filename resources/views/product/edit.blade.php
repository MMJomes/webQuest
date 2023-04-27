@extends('welcome')
@section('content')
    <div class="container mx-auto">
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <form action="{{ route('product.update', [$product_updated->id]) }}" method="POST">
                @csrf
                @method('PUT')
                @if ($errors->any())
                    <p style="color: red">{{ $errors->first() }}</p>
                @endif
                <label for="name" class="block text-sm font-medium text-gray-700 ">Product Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        placeholder="Enter Product  Name" value="{{ old('name', $product_updated->name) }}">
                </div>
                <label for="name" class="block text-sm font-medium text-gray-700 mt-4"> Select Category Name</label>
                <div class="mt-1">
                    <select name="categories_id" id="categories"
                        class="block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option class="bg-gray-200 hover:bg-gray-300" value="Please Select Category Name" disabled selected>
                            Please Select Category Name</option>
                        @foreach ($categories as $category)
                            <option class="bg-gray-500 hover:bg-gray-200" value="{{ $category->id }}"
                                {{ $category->id == $product_updated->categories_id }} ?? selected : ''>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <label for="name" class="block text-sm font-medium text-gray-700 mt-4">Select Tag Name </label>
                <div class="mt-1">
                    @php
                        $tag_id = explode(',', $product_updated->tags_id);
                    @endphp
                    @foreach ($tags as $tag)
                        <input type="checkbox" name="tags_id[]" value="{{ $tag->id }}"
                            class="my-1 mx-2 form-checkbox h-5 w-5 text-indigo-600" {{ $tag->id == $tag_id }}
                            @checked(true) : ''>{{ $tag->name }}
                    @endforeach
                </div>
                <input type="submit" value="Update"
                    class="mt-5 w-full inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
            </form>

        </div>
        <hr class="mt-5 mb-4">
        @if (count($products) > 0)
            <h3 class="text-center mb-4" style="font-size: 24px">Product Lists</h3>
            <hr>

            <div class="flex flex-wrap">
                @foreach ($products as $product)
                    <div class="col lg:w-1/3 lg:pr-4">
                        <div class="bg-white shadow-md rounded-md p-4 m-2 max-w-xs">
                            <h2 class="text-lg font-medium">{{ $product->name }}</h2>
                            <p class="text-gray-500">{{ $product->category->name }}</p>
                            @php
                                $tag_id = explode(',', $product->tags_id);
                                $tag_name = '';
                                $datas = DB::table('tags')
                                    ->whereIn('id', $tag_id)
                                    ->get();
                                foreach ($datas as $data) {
                                    $tag_name .= $data->name . ', ';
                                }
                            @endphp
                            <p class="text-gray-500 bg-amber-200">{{ $tag_name }}</p>
                            <div class="flex justify-end">
                                <a href="{{ route('product.edit', $product->id) }}"
                                    class="text-indigo-600  hover:text-indigo-900 mx-3">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="text-indigo-600 hover:text-indigo-900 mx-3">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
