@extends('master')
@section('title', 'Form Salary')
@section('content')

    @include('component.back')

    <div class="relative flex items-center justify-center mx-20">
        <div class="shadow-lg rounded-3xl w-full bg-white p-10">
            <form action="{{ route('salary.store') }}" method="post" class="w-full">
                @csrf

                <div class="flex flex-col justify-start">
                    <h1 class="text-3xl font-bold text-gray-700 mb-6 mt-2">Form Salary</h1>
                </div>

                <!-- Pilih Employee -->
                <div class="max-w-full mb-4">
                    <button type="button" id="karyawanButton"
                        class="w-full rounded-xl border border-gray-500 focus:border-blue-500 bg-white px-4 py-3 text-gray-700 font-medium transition-all duration-200 cursor-pointer flex items-center justify-between focus:outline-none">
                        <span id="selectedKaryawan">Pilih Karyawan</span>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <input type="hidden" id="karyawan" name="karyawan_id" value="">
                </div>
                @include('component.modalKaryawan')

                <!-- Bulan -->
                <div class="relative input-container mb-4">
                    <input type="text" id="bulan" name="bulan" required class="input">
                    <label for="bulan" class="placeholder">Bulan</label>
                </div>

                <div class="relative input-container mb-4">
                    <input type="text" id="gaji_pokok_display" required class="input" oninput="formatNumber(this)"
                        onloadstart="formatNumber(this)">
                    <label for="gaji_pokok_display" class="placeholder">Gaji Pokok</label>

                    <input type="hidden" id="gaji_pokok" name="gaji_pokok">
                </div>

                <div class="relative input-container mb-4">
                    <input type="text" id="tunjangan_display" required class="input" oninput="formatNumber(this)"
                        onloadstart="formatNumber(this)">
                    <label for="tunjangan_display" class="placeholder">Tunjangan</label>

                    <input type="hidden" id="tunjangan" name="tunjangan">
                </div>

                <div class="relative input-container mb-4">
                    <input type="text" id="potongan_display" required class="input" oninput="formatNumber(this)"
                        onloadstart="formatNumber(this)">
                    <label for="potongan_display" class="placeholder">Potongan</label>

                    <input type="hidden" id="potongan" name="potongan">
                </div>

                <div class="flex items-center justify-between w-full px-4 py-3 mb-4 border rounded-xl bg-gray-50 shadow-sm hover:shadow-md transition-all duration-300 ease-in-out">
                    <label for="total_gaji_display" class="text-gray-600 font-medium text-sm">
                        Gaji Total
                    </label>

                    <input class="text-right text-lg font-semibold text-indigo-700 tracking-wide" id="total_gaji_display" readonly>
                        

                    <input type="hidden" id="total_gaji" name="total_gaji">
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
            </form>
        </div>
    </div>

    <script>
        const gajiPokokInput = document.getElementById('gaji_pokok');
        const gajiPokokDisplay = document.getElementById('gaji_pokok_display');
        const tunjanganInput = document.getElementById('tunjangan');
        const tunjanganDisplay = document.getElementById('tunjangan_display');
        const potonganInput = document.getElementById('potongan');
        const potonganDisplay = document.getElementById('potongan_display');
        const totalInput = document.getElementById('total_gaji');
        const totalDisplay = document.getElementById('total_gaji_display');
        const hiddenKaryawan = document.getElementById('karyawan');

        // Event listener untuk tombol di modal
        document.querySelectorAll('.karyawan-option').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                const gaji = parseInt(this.dataset.gaji);

                hiddenKaryawan.value = id;
                selectedKaryawan.textContent = nama;

                // Set gaji pokok otomatis
                gajiPokokInput.value = gaji;
                gajiPokokDisplay.value = new Intl.NumberFormat('id-ID').format(gaji);

                hitungTotal();

                // Tutup modal (kalau kamu punya modal close function)
                document.getElementById('modalKaryawan').classList.add('hidden');
            });
        });

        // Fungsi format dan hitung
        function formatNumber(input) {
            let value = input.value.replace(/[^0-9]/g, '');
            const targetHidden = document.getElementById(input.id.replace('_display', ''));

            targetHidden.value = value;
            input.value = value ? new Intl.NumberFormat('id-ID').format(value) : '';

            hitungTotal();
        }

        function hitungTotal() {
            const gajiPokok = parseInt(gajiPokokInput.value || 0);
            const tunjangan = parseInt(tunjanganInput.value || 0);
            const potongan = parseInt(potonganInput.value || 0);

            const total = gajiPokok + tunjangan - potongan;

            totalInput.value = total;
            totalDisplay.value = new Intl.NumberFormat('id-ID').format(total);
        }
    </script>



@endsection