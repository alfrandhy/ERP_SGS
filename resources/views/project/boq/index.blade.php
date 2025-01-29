@extends('layouts.main')
@section('content')
<div class="grid grid-cols-8 gap-4 mb-4 p-5">
    <div class="col-span-4 mt-2">
        <h1 class="text-3xl font-bold">
            Daftar Boq
        </h1>
    </div>
    <div class="col-span-4">
        <div class="flex justify-end">
            <a href="{{ route('boq.create') }}"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                id="add-post-btn">Add New Boq</a>
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
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">BOQ Code</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Part Drawing No. / Part No.</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Description</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Detail Description</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Dimension</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Material</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">QTY</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Unit</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Created at</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Updated at</th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($boqs as $boq)
            <tr class="border-b">
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $boq->boq_code }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $boq->part_dwg_no }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $boq->description }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $boq->detail_desciption }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $boq->dimension }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $boq->material }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $boq->qty }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $boq->unit }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $boq->created_at }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                    {{ $boq->updated_at }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">

                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('boq.destroy', $boq->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <a href="{{ route('boq.edit', $boq->id) }}" id="{{ $boq->id }}-edit-btn"
                            class="inline-block px-6 py-2.5 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
                            Edit
                        </a>
                        <button type="submit"
                            class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                            id="{{ $boq->id }}-delete-btn">
                            Delete
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
        {{ $boqs->links() }}
    </div>
</div>
@endsection
