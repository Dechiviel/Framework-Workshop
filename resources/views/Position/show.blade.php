@extends('master')
@section('title', 'Detail Departemen')
@section('content')
    <div class="relative flex items-center justify-center">
        <div class="w-full max-w-3xl bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
            <!-- Header -->
            <div class="bg-blue-800 px-6 py-4">
                <h2 class="text-lg font-semibold text-white">Detail Data Jabatan</h2>
            </div>

            <!-- Table -->
            <table class="min-w-full text-sm text-gray-700">
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <th class="w-1/3 px-6 py-3 text-left font-medium bg-gray-50">Nama Jabatan</th>
                        <td class="px-6 py-3">{{ $data['position']->nama_jabatan }}</td>
                    </tr>

                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Gaji Pokok</th>
                        <td class="px-6 py-3">{{ number_format($data['position']->gaji_pokok, 2, ',', '.') }}</td>
                    </tr>

                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Total Pegawai</th>
                        <td class="px-6 py-3">{{ $data['total_employee'] }}</td>
                    </tr>

                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50 align-top">Daftar Pegawai</th>
                        <td class="px-6 py-3">
                            @if (count($data['employee_names']) > 0)
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($data['employee_names'] as $name)
                                        <li>{{ $name }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-gray-500 italic">Belum ada pegawai di jabatan ini.</p>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Footer -->
            <div class="flex justify-end gap-2 px-6 py-4 bg-gray-50">
                <a href="{{ route('position.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md transition-colors">
                    Kembali
                </a>
            </div>
        </div>
    </div>
@endsection