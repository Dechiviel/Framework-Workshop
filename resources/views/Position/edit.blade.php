@extends('master')
@section('title', 'Daftar Departemen')
@section('content')

    @include('component.back')
    <div class="relative flex items-center justify-center mx-20">
        <div class="shadow-lg rounded-3xl w-full bg-white p-10">
            <form action="{{ route('position.update', $position->id) }}" method="post" class="w-full">
                @csrf
                @method('PUT')

                <div class="flex flex-col justify-start">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6 mt-2">Edit Jabatan</h1>
                </div>


                <div>
                    <div class="relative input-container">
                        <input type="text" id="nama_jabatan" name="nama_jabatan" required class="input"
                            value="{{ $position->nama_jabatan }}">
                        <label for="nama_jabatan" class="placeholder">
                            Nama Jabatan
                        </label>
                    </div>
                    
                    <div class="relative input-container">
                        <input type="text" id="gaji_pokok_display" required class="input" oninput="formatNumber(this)"
                            value="{{ number_format($position->gaji_pokok, 0, '', '') }}">
                        <label for="gaji_pokok_display" class="placeholder">Gaji Pokok</label>

                        <input type="hidden" id="gaji_pokok" name="gaji_pokok" value="{{ number_format($position->gaji_pokok, 0, '', '') }}">
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

    <!-- script angka -->
    <script>
        function formatNumber(input) {
            let value = input.value.replace(/[^0-9]/g, '');

            document.getElementById('gaji_pokok').value = value;

            if (value) {
                input.value = new Intl.NumberFormat('id-ID').format(value);
            } else {
                input.value = '';
            }
        }
        document.addEventListener("DOMContentLoaded", function () {
            const input = document.getElementById('gaji_pokok_display');            

            if (input && input.value) {
                formatNumber(input);
            }
        });
    </script>

@endsection