
<x-app-layout>
    <div class="pt-3">
        <x-slot name="header">
            <div class="grid grid-cols-3 gap-4">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('List of records:') }} 
                </h2>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight col-end-6">
                    <a href="{{route('product.create')}}">Create a Product</a>
                </h2>
            </div>
        </x-slot>

        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 ">
                <form method="GET" action="{{ route('product.index') }}" class="mb-4">
                    <div class="flex items-center space-x-4">
                        <input 
                            type="text" 
                            name="search" 
                            class="p-2 border border-gray-300 rounded" 
                            value="{{ request()->input('search') }}" 
                            placeholder="Search products...">
                        <select name="category" class="p-2 border border-gray-300 rounded">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->category }}" 
                                    {{ request()->input('category') == $cat->category ? 'selected' : '' }}>
                                    {{ $cat->category }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Search</button>
                    </div>
                </form>
                <table class="border-collapse border table-auto">
                    <tr>
                        <th class="p-5">ID</th>
                        <th class="p-5">Name</th>
                        <th class="p-5">Category</th>
                        <th class="p-5">Description</th>
                        <th class="p-5">Created Date</th>
                        <th class="p-5">Created Time</th>
                        <th class="p-5">Encoded Date</th>
                        <th class="p-5">Edit</th>
                        <th class="p-5">Delete</th>
                    </tr>
                    @forelse($products as $product )
                        <tr >
                            <td class="p-5">{{$product->id}}</td>
                            <td class="p-5">{{$product->name}}</td>
                            <td class="p-5">{{$product->category}}</td>
                            <td class="p-5">{{$product->description}}</td>
                            <td class="p-5">{{$product->created_date}}</td>
                            <td class="p-5">{{$product->created_time}}</td>
                            <td class="p-5">{{$product->created_at}}</td>
                            <td class="p-5">
                                <a href="{{route('product.edit', ['product' => $product])}}">Edit</a>
                            </td>
                            <td class="p-5">
                                <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
                                    @csrf 
                                    @method('delete')
                                    <input type="submit" value="Delete" />
                                </form>
                            </td>
                        </tr>
                    @empty:
                        <tr>
                            <td class="p-5">No data found</td>
                        </tr>
                    @endforelse
                </table>
                 <!-- Pagination Links -->
                 <div class="pt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
