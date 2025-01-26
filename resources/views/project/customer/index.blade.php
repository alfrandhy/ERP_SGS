@extends('layouts.main')
@section('content')
<div class="grid grid-cols-8 gap-4 mb-4 p-5">
    <div class="col-span-4 mt-2">
        <h1 class="text-3xl font-bold">
            Daftar Customer
        </h1>
    </div>
    <div class="col-span-4">
        <div class="flex justify-end">
            <a href="{{ route('customer.create') }}"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                id="add-post-btn">Add New Customer</a>
        </div>
    </div>
</div>
<div class="bg-white p-5 rounded shadow-sm">
    <!-- Notifikasi menggunakan flash session data -->
    @if (session('success'))
    <div class="p-3 rounded bg-green-500 text-green-100 mb-4">
        {{ session('success') }}
    </div>
    @endif

    <table class="min-w-full table-auto border">
        <thead class="border-b">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Logo</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Code</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Customer</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Location</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Attention</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Created At</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $cust)
            <tr class="border-b">
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    @empty($cust->logo)
                    <img src="{{url('image/nophoto.jpg')}}" alt="project-image" class="rounded"
                        style="width: 100%; max-width: 100px; height: auto;">
                    @else
                    <img src="{{url('image')}}/{{$cust->logo}}" alt="project-image" class="rounded"
                        style="width: 100%; max-width: 100px; height: auto;">
                    @endempty
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">{{ $cust->code }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $cust->customer }}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $cust->location }}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $cust->attention }}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $cust->created_at }}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">

                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('customer.destroy', $cust->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <a href="{{ route('customer.edit', $cust->id) }}" id="{{ $cust->id }}-edit-btn"
                            class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">Edit</a>

                        <button type="submit"
                            class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                            id="{{ $cust->id }}-delete-btn">Delete
                        </button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center text-sm text-gray-900 px-6 py-4 whitespace-nowrap" colspan="4">Data post tidak
                    tersedia</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $customers->links() }}
    </div>
</div>
@endsection
