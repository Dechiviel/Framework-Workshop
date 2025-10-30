@extends('master')
@section('title', 'Detail Attendance')
@section('content')
    <div class="relative flex items-center justify-center">
        <div class="w-full max-w-3xl bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
            <!-- Header -->
            <div class="bg-blue-800 px-6 py-4">
                <h2 class="text-lg font-semibold text-white">Detail Data Attendance</h2>
            </div>

            <!-- Table -->
            <table class="min-w-full text-sm text-gray-700">
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <th class="w-1/3 px-6 py-3 text-left font-medium bg-gray-50">Nama Karyawan</th>
                        <td class="px-6 py-3">{{ $attendance->employee->nama_lengkap }}</td>
                    </tr>

                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Tanggal</th>
                        <td class="px-6 py-3">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d F Y') }}</td>
                    </tr>

                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50 align-top">Jam Masuk</th>
                        <td class="px-6 py-3">
                            {{ $attendance->waktu_masuk ?? "-" }}
                        </td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50 align-top">Jam Keluar</th>
                        <td class="px-6 py-3">
                            {{ $attendance->waktu_keluar ?? "-" }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Footer -->
            <div class="flex justify-end gap-2 px-6 py-4 bg-gray-50">
                <a href="{{ route('attendance.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md transition-colors">
                    Kembali
                </a>
            </div>
        </div>
    </div>
@endsection