<!-- Modal Jabatan -->
<div id="jabatanModal"
    class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 animate-fadeIn">
    <div
        class="bg-white rounded-3xl shadow-2xl w-full max-w-md transform transition-all scale-95 opacity-0 modal-content">
        <!-- Header -->
        <div class="px-6 pt-6 pb-4 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-900">Pilih Jabatan</h3>
                <button type="button" id="closeModalJabatanX" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <p class="text-sm text-gray-500 mt-1">Pilih status untuk item ini</p>
        </div>

        <!-- Options -->
        <div class="p-6 space-y-3 max-h-[400px] overflow-y-auto">
            @forelse($positions as $position)
                <button type="button" data-value="{{ $position->id }}"
                    class="jabatan-option group w-full text-left px-5 py-4 rounded-2xl border-2 border-gray-200 hover:border-green-500 hover:bg-green-50 transition-all duration-100 transform hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div>
                                <span
                                    class="font-semibold text-gray-800 group-hover:text-green-700 transition-colors duration-300">{{ $position->nama_jabatan }}</span>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-300 group-hover:text-green-500 transition-colors duration-100"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                </button>

            @empty
                <div class="w-full text-center py-10 border-2 border-dashed border-gray-200 rounded-2xl bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 mx-auto text-gray-400 mb-3" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 13h6m2 0a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v4a2 2 0 002 2m0 0v4a2 2 0 002 2h6a2 2 0 002-2v-4" />
                    </svg>
                    <p class="text-gray-500 font-medium">Belum ada jabatan yang terdaftar.</p>
                    <p class="text-sm text-gray-400">Silakan tambahkan jabatan baru terlebih dahulu.</p>
                </div>
            @endforelse

        </div>

        <!-- Footer -->
        <div class="px-6 pb-6">
            <button type="button" id="closeModalJabatan"
                class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3.5 rounded-2xl transition-all duration-200 hover:shadow-md">
                Tutup
            </button>
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            transform: translateY(20px) scale(0.95);
            opacity: 0;
        }

        to {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
    }

    .animate-fadeIn {
        animation: fadeIn 0.2s ease-out;
    }

    #jabatanModal:not(.hidden) .modal-content {
        animation: slideUp 0.3s ease-out forwards;
    }
</style>

<script>
    const jabatanButton = document.getElementById('jabatanButton');
    const jabatanModal = document.getElementById('jabatanModal');
    const closeModalJabatan = document.getElementById('closeModalJabatan');
    const closeModalJabatanX = document.getElementById('closeModalJabatanX');
    const selectedJabatan = document.getElementById('selectedJabatan');
    const jabatanInput = document.getElementById('jabatan');
    const jabatanOptions = document.querySelectorAll('.jabatan-option');

    jabatanButton.addEventListener('click', () => {
        jabatanModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    });

    const closeModalJabatanFunc = () => {
        jabatanModal.classList.add('hidden');
        document.body.style.overflow = ''; // Restore scrolling
    };

    closeModalJabatan.addEventListener('click', closeModalJabatanFunc);
    closeModalJabatanX.addEventListener('click', closeModalJabatanFunc);

    jabatanModal.addEventListener('click', (e) => {
        if (e.target === jabatanModal) {
            closeModalJabatanFunc();
        }
    });

    jabatanOptions.forEach(option => {
        option.addEventListener('click', () => {
            const value = option.getAttribute('data-value');
            const text = option.textContent.trim().split('\n')[0].trim();

            selectedJabatan.textContent = text;
            jabatanInput.value = value;
            closeModalJabatanFunc();
        });
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !jabatanModal.classList.contains('hidden')) {
            closeModalJabatanFunc();
        }
    });

    form.addEventListener('submit', function (e) {
        let valid = true;
        let message = "";

        if (!jabatanInput.value || selectedJabatan.textContent.trim() === "Pilih Jabatan") {
            valid = false;
            message += "Silakan pilih Jabatan terlebih dahulu.\n";
            jabatanButton.classList.add('border-red-500', 'bg-red-50');
        } else {
            jabatanButton.classList.remove('border-red-500', 'bg-red-50');
        }

        if (!valid) {
            e.preventDefault(); // Batalkan pengiriman form
            alert(message);
        }
    })
</script>