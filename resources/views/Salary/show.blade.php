@extends('master')
@section('title', 'Detail Gaji Karyawan')

@section('content')

    <div class="flex justify-center mt-8">
        <div class="w-full max-w-3xl bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-700 to-blue-700 px-6 py-4">
                <h2 class="text-lg font-semibold text-white">Detail Gaji Karyawan</h2>
            </div>

            <!-- Table -->
            <table class="min-w-full text-sm text-gray-700">
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <th class="w-1/3 px-6 py-3 text-left font-medium bg-gray-50">Nama Karyawan</th>
                        <td class="px-6 py-3">{{ $salary->employee->nama_lengkap }}</td>
                    </tr>

                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Bulan</th>
                        <td class="px-6 py-3">{{ $salary->bulan }}</td>
                    </tr>

                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Gaji Pokok</th>
                        <td class="px-6 py-3 text-green-700 font-semibold">
                            Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}
                        </td>
                    </tr>

                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Tunjangan</th>
                        <td class="px-6 py-3 text-green-600">
                            Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}
                        </td>
                    </tr>

                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Potongan</th>
                        <td class="px-6 py-3 text-red-600">
                            Rp {{ number_format($salary->potongan, 0, ',', '.') }}
                        </td>
                    </tr>

                    <tr class="bg-indigo-50">
                        <th class="px-6 py-3 text-left font-semibold text-indigo-700">Total Gaji</th>
                        <td class="px-6 py-3 text-right font-bold text-indigo-800 text-lg">
                            Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Footer -->
            <div class="flex justify-end gap-3 px-6 py-4 bg-gray-50">
                <a href="{{ route('salary.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md transition-colors">
                    Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
