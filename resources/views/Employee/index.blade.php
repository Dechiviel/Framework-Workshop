@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')

    <div class="relative flex items-center mb-6 mt-3">
        <div class="absolute left-1/2 transform -translate-x-1/2">
            @include('component.searchbar')
        </div>

        <div class="ml-auto me-4">
            <a href="{{ route('employee.create') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-700 to-purple-700 
                              text-white text-sm font-semibold rounded-xl shadow-md hover:from-indigo-600 
                              hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 
                              focus:ring-indigo-500 transition duration-300 ease-in-out">
                Tambah Data
            </a>
        </div>
    </div>


    <div class="container mx-auto mt-10 px-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-blue-700 to-blue-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            ID</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Account</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Email</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Phone Number</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">
                            Status</th>
                        <th class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($employees as $employee)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #{{ $employee->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 bg-blue-500 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-sm">
                                            {{ strtoupper(substr($employee->nama_lengkap, 0, 2)) }}
                                        </span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $employee->nama_lengkap }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $employee->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $employee->nomor_telepon }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                                                        {{ $employee->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <!-- Lihat -->
                                <a href="{{ route('employee.show', $employee->id) }}"
                                    class="inline-flex items-center px-2 py-1 text-blue-500 hover:text-blue-700 transition-colors duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>

                                <!-- Edit -->
                                <a href="{{ route('employee.edit', $employee->id) }}"
                                    class="inline-flex items-center px-2 py-1 text-amber-500 hover:text-amber-700 transition-colors duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <!-- Hapus -->
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="inline">
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
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                    <p class="text-gray-500 text-lg font-medium">No employees found</p>
                                    <p class="text-gray-400 text-sm mt-1">Start by adding your first employee</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script>

        const changeTable = (table) => {
            let html = '';
            if (table.length === 0) {
                html = `<tr>
              <td colspan='5' class='text-center'>No Data Found</td>
            </tr>`;
                document.querySelector('.main-table-body').innerHTML = html;
                return;
            }
            table.forEach(row => {
                html += `<tr>
            <td class='align-middle'>${row.id_row}</td>
            <td class='align-middle'>${row.title}</td>
            <td class='align-middle'>${row.author}</td>
            <td class='align-middle'>${row.publication_year}</td>
            <td class='align-middle'>
              <div class='d-flex justify-content-center align-items-center' style='height: 100%;'>
                <i class='bi bi-pencil-square pencil mx-2' 
                   data-bs-toggle='modal' 
                   data-bs-target='#exampleModal' 
                   data-id='${row.id_row}' 
                   data-title='${row.title}' 
                   data-author='${row.author}' 
                   data-publication_year='${row.publication_year}' 
                   onclick='document.querySelector(".update-btn").click(); editHandler(this.dataset.id, this.dataset.title, this.dataset.author, this.dataset.publication_year);'></i>
                <i class='bi bi-trash-fill trash mx-2' 
                   data-bs-toggle='modal' 
                   data-bs-target='#exampleModal' 
                   data-id='${row.id_row}' 
                   data-title='${row.title}' 
                   data-author='${row.author}' 
                   data-publication_year='${row.publication_year}' 
                   onclick='document.querySelector(".delete-btn").click(); deleteHandler(this.dataset.id, this.dataset.title, this.dataset.author, this.dataset.publication_year);'></i>
              </div>
            </td>
          </tr>`
            });
            document.querySelector('.main-table-body').innerHTML = html;
        }

        const filtertable = (searchInput) => {
            return table.filter(row => {
                return row.id_row.toLowerCase().includes(searchInput.toLowerCase()) ||
                    row.title.toLowerCase().includes(searchInput.toLowerCase()) ||
                    row.author.toLowerCase().includes(searchInput.toLowerCase()) ||
                    row.publication_year.toString().includes(searchInput);
            });
        }

        let table;
        (async function searchHandler() {
            table = @json($employees)
            changeTable(table);
            const searchInput = document.querySelector('.search');
            searchInput.addEventListener('input', () => {
                const filteredtable = filtertable(searchInput.value);
                changeTable(filteredtable);
            });
        })();

    </script>

@endsection