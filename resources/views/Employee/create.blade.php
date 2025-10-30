@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')

    @include('component.back')
    <div class="relative flex items-center">
        <div class="shadow-lg rounded-3xl w-full bg-white">
            <form action="{{ route('employee.store') }}" method="post" class="p-6 md:px-10">
                @csrf
                <h1 class="text-2xl font-bold mb-5 text-center tracking-wider text-gray-700">Form Pegawai</h1>
                <div class="relative input-container">
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required class="input">
                    <label for="nama_lengkap" class="placeholder">
                        Nama Lengkap
                    </label>
                </div>

                <div class="relative input-container">
                    <input type="text" id="email" name="email" required class="input">
                    <label for="email" class="placeholder">
                        Email
                    </label>
                </div>

                <div class="relative input-container">
                    <input type="text" id="nomor_telepon" name="nomor_telepon" required class="input" placeholder=""
                        oninput="this.value = this.value.replace(/[^0-9+\-\s.]/g, '')">
                    <label for="nomor_telepon" class="placeholder">
                        Nomor Telepon
                    </label>
                </div>

                <div class="relative input-container">
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="input">
                    <label for="tanggal_lahir" class="placeholder">
                        Tanggal Lahir
                    </label>
                </div>

                <div class="relative input-container">
                    <input type="text" id="alamat" name="alamat" required class="input">
                    <label for="alamat" class="placeholder">
                        Alamat
                    </label>
                </div>

                <div class="relative input-container">
                    <input type="date" id="tanggal_masuk" name="tanggal_masuk" required class="input">
                    <label for="tanggal_masuk" class="placeholder">
                        Tanggal Masuk
                    </label>
                </div>
                <div class="flex flex-wrap gap-4 my-4 w-full">
                    <!-- Departemen (kiri) -->
                    <div class="flex-1 min-w-[200px]">
                        <button type="button" id="departemenButton"
                            class="w-full rounded-xl border border-gray-300 focus:border-blue-500 bg-white px-4 py-3 text-gray-700 font-medium transition-all duration-200 cursor-pointer flex items-center justify-between focus:outline-none">
                            <span id="selectedDepartemen">Pilih Departemen</span>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <input type="hidden" id="departemen" name="departemen_id" value="Pilih Departemen">
                    </div>
                    <!-- Jabatan (kanan) -->
                    <div class="flex-1 min-w-[200px]">
                        <button type="button" id="jabatanButton"
                            class="w-full rounded-xl border border-gray-300 focus:border-blue-500 bg-white px-4 py-3 text-gray-700 font-medium transition-all duration-200 cursor-pointer flex items-center justify-between focus:outline-none">
                            <span id="selectedJabatan">Pilih Jabatan</span>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <input type="hidden" id="jabatan" name="jabatan_id" value="Pilih Jabatan">
                    </div>

                </div>
                <!-- Status -->
                <div class="max-w-48">
                    <button type="button" id="statusButton"
                        class="w-full rounded-xl border border-gray-300 focus:border-blue-500 bg-white px-4 py-3 text-gray-700 font-medium transition-all duration-200 cursor-pointer flex items-center justify-between focus:outline-none">
                        <span id="selectedStatus">Pilih Status</span>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <input type="hidden" id="status" name="status" value="aktif">
                </div>


                @include('component.modalStatusEmployee')
                @include('component.modalDepartemen')
                @include('component.modalJabatan')

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 w-32 py-3 px-5 mt-7 mb-3 bg-gradient-to-r from-indigo-600 to-purple-600
                                                             text-white font-semibold rounded-2xl shadow-lg hover:from-indigo-500 hover:to-purple-500
                                                             active:translate-y-0.5 transform transition-all focus:outline-none focus:ring-4 focus:ring-indigo-200">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Kirim
                    </button>

                </div>

            </form>
        </div>
    </div>

@endsection