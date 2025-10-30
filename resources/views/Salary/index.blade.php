@extends('master')
@section('title', 'Daftar Salary')
@section('content')

    <div class="relative flex items-center mb-6 mt-3">
        <div class="absolute left-1/2 transform -translate-x-1/2">
            @include('component.searchbar')
        </div>

        <div class="ml-auto me-4">
            <a href="{{ route('salary.create') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-700 to-purple-700 text-white text-sm font-semibold rounded-xl shadow-md hover:from-indigo-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                Tambah Data
            </a>
        </div>
    </div>

    <div class="container mx-auto mt-10 px-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-blue-700 to-blue-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Employee Name</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Bulan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Total Gaji</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($salaries as $salary)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #{{ $salary->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $salary->employee->nama_lengkap ?? 'Unknown' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $salary->bulan }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ number_format($salary->total_gaji, 2, ',', '.') }} 
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <!-- Lihat -->
                                <a href="{{ route('salary.show', $salary->id) }}"
                                    class="inline-flex items-center px-2 py-1 text-blue-500 hover:text-blue-700 transition-colors duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>

                                <!-- Edit -->
                                <a href="{{ route('salary.edit', $salary->id) }}"
                                    class="inline-flex items-center px-2 py-1 text-amber-500 hover:text-amber-700 transition-colors duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <!-- Hapus -->
                                <form action="{{ route('salary.destroy', $salary->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="inline-flex items-center px-2 py-1 text-red-500 hover:text-red-700 transition-colors duration-200">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M10 3h4a1 1 0 011 1v1H9V4a1 1 0 011-1z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                No salaries records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection