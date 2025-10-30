@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')
    <div class="relative flex items-center">
        <div class="w-full mx-auto bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
            <div class="bg-blue-800 px-6 py-4">
                <h2 class="text-lg font-semibold text-white">Detail Data Employee</h2>
            </div>

            <table class="min-w-full text-sm text-gray-700">
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <th class="w-1/3 px-6 py-3 text-left font-medium bg-gray-50">Nama Lengkap</th>
                        <td class="px-6 py-3">{{ $employee->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Email</th>
                        <td class="px-6 py-3">{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Nomor Telepon</th>
                        <td class="px-6 py-3">{{ $employee->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Tanggal Lahir</th>
                        <td class="px-6 py-3">
                            {{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d M Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Alamat</th>
                        <td class="px-6 py-3">{{ $employee->alamat }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Tanggal Masuk</th>
                        <td class="px-6 py-3">
                            {{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d M Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th class="px-6 py-3 text-left font-medium bg-gray-50">Status</th>
                        <td class="px-6 py-3">
                            <span
                                class="px-3 py-1 rounded-md text-xs font-semibold
                            {{ $employee->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ ucfirst($employee->status) }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-end gap-2 px-6 py-4 bg-gray-50">
                <a href="{{ route('employee.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md transition-colors">
                    Kembali
                </a>
            </div>

        </div>
    </div>
@endsection