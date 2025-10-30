<!-- Modal Status -->
<div id="statusModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 animate-fadeIn">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md transform transition-all scale-95 opacity-0 modal-content">
        <!-- Header -->
        <div class="px-6 pt-6 pb-4 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-900">Pilih Status</h3>
                <button type="button" id="closeModalStatusX" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <p class="text-sm text-gray-500 mt-1">Pilih status untuk item ini</p>
        </div>

        <!-- Options -->
        <div class="p-6 space-y-3 max-h-[400px] overflow-y-auto">
            @foreach(['hadir' => 'Hadir', 'izin' => 'Izin', 'sakit' => 'Sakit', 'alpha' => 'Alpha'] as $value => $label)
                <button type="button" data-value="{{ $value }}"
                    class="status-option group w-full text-left px-5 py-4 rounded-2xl border-2 border-gray-200 hover:border-green-500 hover:bg-green-50 transition-all duration-100 transform hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div>
                                <span class="font-semibold text-gray-800 group-hover:text-green-700 transition-colors duration-300">{{ $label }}</span>
                                <p class="text-xs text-gray-500 group-hover:text-green-600">Status {{ strtolower($label) }}</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-gray-300 group-hover:text-green-500 transition-colors duration-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </button>
            @endforeach
        </div>

        <!-- Footer -->
        <div class="px-6 pb-6">
            <button type="button" id="closeModalStatus"
                class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3.5 rounded-2xl transition-all duration-200 hover:shadow-md">
                Tutup
            </button>
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    @keyframes slideUp { from { transform: translateY(20px) scale(0.95); opacity: 0; } to { transform: translateY(0) scale(1); opacity: 1; } }
    .animate-fadeIn { animation: fadeIn 0.2s ease-out; }
    #statusModal:not(.hidden) .modal-content { animation: slideUp 0.3s ease-out forwards; }
</style>

<script>
    const statusButton = document.getElementById('statusButton');
    const statusModal = document.getElementById('statusModal');
    const closeModalStatus = document.getElementById('closeModalStatus');
    const closeModalStatusX = document.getElementById('closeModalStatusX');
    const selectedStatus = document.getElementById('selectedStatus');
    const statusInput = document.getElementById('status');
    const statusOptions = document.querySelectorAll('.status-option');

    statusButton.addEventListener('click', () => {
        statusModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    });

    const closeModalStatusFunc = () => {
        statusModal.classList.add('hidden');
        document.body.style.overflow = '';
    };

    closeModalStatus.addEventListener('click', closeModalStatusFunc);
    closeModalStatusX.addEventListener('click', closeModalStatusFunc);

    statusModal.addEventListener('click', e => {
        if (e.target === statusModal) closeModalStatusFunc();
    });

    statusOptions.forEach(option => {
        option.addEventListener('click', () => {
            const value = option.getAttribute('data-value');
            const text = option.textContent.trim().split('\n')[0].trim();
            selectedStatus.textContent = text;
            statusInput.value = value;
            closeModalStatusFunc();
        });
    });

    document.addEventListener('keydown', e => {
        if(e.key === 'Escape' && !statusModal.classList.contains('hidden')) closeModalStatusFunc();
    });
</script>
