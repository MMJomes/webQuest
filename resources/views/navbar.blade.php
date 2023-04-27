<nav class="bg-blue-500 text-black p-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-50 flex items-baseline space-x-4">
                        <a href="{{ url('/product') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Add
                            New Product</a>
                        <a href="{{ url('/category') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Add
                            New Category</a>
                        <a href="{{ url('/tag') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Add
                            New Tag</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
