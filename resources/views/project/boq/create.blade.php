@extends('layouts.main')
@section('content')
<div class="grid grid-cols-8 gap-4 p-5">
    <div class="col-span-4 mt-2">
        <h1 class="text-3xl font-bold">
            CREATE NEW BOQ
        </h1>
    </div>
    <div class="col-span-4">

    </div>
</div>
<div class="bg-white p-5 rounded shadow-sm">
    <form action="{{ route('boq.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-5">
            <label for="code">Boq Code</label>
            <input type="text" class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded-full
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              {{-- " name="boq_code" value="{{ old('boq_code') }}" required> --}}
              " name="boq_code" value="{{ old('project_code_id')&&"_"&&old('part_dwg_no') }}" required>

            <!-- error message untuk title -->
            @error('boq_code')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="project_code_id">Project Code</label>
            <input type="text" class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded-full
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              " name="project_code_id" value="{{ old('project_code_id') }}" required>

            <!-- error message untuk title -->
            @error('project_code_id')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="part_dwg_no">Part DWG. No./Part No.</label>
            <input type="text" class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded-full
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              " name="part_dwg_no" value="{{ old('part_dwg_no') }}">

            <!-- error message untuk title -->
            @error('part_dwg_no')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="desctiption">Description / Item Name</label>
            <textarea name="description" id="textarea1" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " cols="30" rows="10">
                  {{ old('description') }}
                </textarea>

            <!-- error message untuk title -->
            @error('desctiption')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="detail_description">Detail Description</label>
            <textarea name="detail_description" id="textarea2" class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                  " cols="30" rows="10">{{ old('detail_description') }}</textarea>

            <!-- error message untuk content -->
            @error('detail_description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="dimension">Dimension</label>
            <input type="text" class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded-full
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              " name="dimension" value="{{ old('dimension') }}">

            <!-- error message untuk title -->
            @error('dimension')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="material">Material</label>
            <input type="text" class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded-full
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              " name="material" value="{{ old('material') }}">

            <!-- error message untuk title -->
            @error('material')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="qty">QTY</label>
            <input type="number" class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded-full
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              " name="qty" value="{{ old('qty') }}">

            <!-- error message untuk title -->
            @error('qty')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="unit">Unit</label>
            <input type="text" class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded-full
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              " name="unit" value="{{ old('unit') }}">

            <!-- error message untuk title -->
            @error('unit')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mt-3">
            <button type="submit"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Save
            </button>
            <a href="{{ route('customer.index') }}"
                class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out">back</a>
        </div>

    </form>

</div>
@endsection
