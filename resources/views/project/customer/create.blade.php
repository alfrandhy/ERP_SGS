@extends('layouts.main')
@section('content')
<div class="grid grid-cols-8 gap-4 p-5">
    <div class="col-span-4 mt-2">
        <h1 class="text-3xl font-bold">
            CREATE NEW POST
        </h1>
    </div>
    <div class="col-span-4">

    </div>
</div>
<div class="bg-white p-5 rounded shadow-sm">
    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-5">
            <label for="code">code</label>
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
              " name="code" value="{{ old('code') }}" required>

            <!-- error message untuk title -->
            @error('code')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="customer">customer</label>
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
              " name="customer" value="{{ old('customer') }}" required>

            <!-- error message untuk title -->
            @error('customer')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="attention">attention</label>
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
              " name="attention" value="{{ old('attention') }}">

            <!-- error message untuk title -->
            @error('attention')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="logo">logo</label>
            <input type="file" class="
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
              " name="logo" value="{{ old('logo') }}">

            <!-- error message untuk title -->
            @error('logo')
            <div class="bg-red-400 p-2 shadow-sm rounded mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="location">location</label>
            <textarea
                name="location" id="textarea1"
                class="
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
                  "
                cols="30" rows="10">{{ old('location') }}</textarea>

            <!-- error message untuk content -->
            @error('location')
            <div class="invalid-feedback">
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