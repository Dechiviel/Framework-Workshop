@extends('master')
@section('title', 'Daftar Departemen')
@section('content')

    @include('component.back')
    <div class="relative flex items-center justify-center mx-20">
        <div class="shadow-lg rounded-3xl w-full bg-white p-10">
            <form action="{{ route('department.store') }}" method="post" class="w-full">
                @csrf


                <div class="flex flex-col justify-start">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6 mt-2">Form Departemen</h1>
                </div>


                <div>
                    <div class="relative input-container">
                        <input type="text" id="nama_departemen" name="nama_departemen" required class="input">
                        <label for="nama_departemen" class="placeholder">
                            Nama Departemen
                        </label>
                    </div>

                    <div class="flex justify-end w-full">
                        <button type="submit"
                            class="inline-flex items-center justify-center gap-2 w-32 py-3 px-5 mt-7 bg-gradient-to-r from-indigo-600 to-purple-600
                                                 text-white font-semibold rounded-2xl shadow-lg hover:from-indigo-500 hover:to-purple-500
                                                 active:translate-y-0.5 transform transition-all focus:outline-none focus:ring-4 focus:ring-indigo-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Kirim
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection