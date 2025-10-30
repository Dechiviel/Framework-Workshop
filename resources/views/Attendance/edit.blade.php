@extends('master')
@section('title', 'Edit Attendance')
@section('content')

    @include('component.back')

    <div class="relative flex items-center justify-center mx-20">
        <div class="shadow-lg rounded-3xl w-full bg-white p-10">
            <form action="{{ route('attendance.store') }}" method="post" class="w-full">
                @csrf

                <div class="flex flex-col justify-start">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6 mt-2">Edit Attendance</h1>
                </div>

                <!-- Pilih Employee -->
                <div class="max-w-full mb-4">
                    <button type="button" id="karyawanButton"
                    class="w-full rounded-xl border border-gray-500 focus:border-blue-500 bg-white px-4 py-3 text-gray-700 font-medium transition-all duration-200 cursor-pointer flex items-center justify-between focus:outline-none">
                    <span id="selectedKaryawan">{{ $attendance->employee->nama_lengkap }}</span>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    
                    <input type="hidden" id="karyawan" name="karyawan_id" value="{{ $attendance->employee->id }}">
                </div>
                @include('component.modalKaryawan')
                
                <!-- Tanggal -->
                <div class="relative input-container mb-4">
                    <input type="date" id="tanggal" name="tanggal" required class="input" value="{{ $attendance->tanggal }}">
                    <label for="tanggal" class="placeholder">Tanggal</label>
                </div>

                <!-- Waktu Masuk -->
                <div class="relative input-container mb-4">
                    <input type="time" id="waktu_masuk" name="waktu_masuk" class="input" value="{{ $attendance->waktu_masuk }}">
                    <label for="waktu_masuk" class="placeholder">Waktu Masuk</label>
                </div>

                <!-- Waktu Keluar -->
                <div class="relative input-container mb-4">
                    <input type="time" id="waktu_keluar" name="waktu_keluar" class="input" value="{{ $attendance->waktu_keluar }}">
                    <label for="waktu_keluar" class="placeholder">Waktu Keluar</label>
                </div>

                <!-- Status Absensi -->
                <div class="max-w-full mb-4">
                    <button type="button" id="statusButton"
                    class="w-full rounded-xl border border-gray-500 focus:border-blue-500 bg-white px-4 py-3 text-gray-700 font-medium transition-all duration-200 cursor-pointer flex items-center justify-between focus:outline-none">
                    <span id="selectedStatus">{{ $attendance->status_absensi }}</span>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <input type="hidden" id="status" name="status_absensi" value="{{ $attendance->status_absensi }}">
                </div>
                @include('component.modalStatusAbsensi')

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
            </form>
        </div>
    </div>

@endsection