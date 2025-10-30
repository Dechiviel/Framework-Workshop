<div class="flex relative items-center max-w-sm mx-auto ">
    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        <svg class="w-4 h-4 ms-1 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
    </div>
    <input id="default-search"
        class="search block w-full p-3 ps-12 pr-12 text-sm text-gray-900 border border-gray-500 rounded-full bg-blue-0 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-blue-300"
        autofocus
        placeholder="Search..."
        style="-webkit-appearance: none; -moz-appearance: none; appearance: none;"
        oninput="toggleClearButton()"/>
    <!-- Custom Clear Button -->
    <button type="button" id="clear-search" 
        class="absolute inset-y-0 end-0 flex items-center pe-4 text-gray-400 hover:text-gray-600 transition-colors duration-200"
        style="display: none;"
        onclick="clearSearch()">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>
</div>

<script>
function toggleClearButton() {
    const searchInput = document.getElementById('default-search');
    const clearButton = document.getElementById('clear-search');
    
    if (searchInput.value.length > 0) {
        clearButton.style.display = 'flex';
    } else {
        clearButton.style.display = 'none';
    }
}

function clearSearch() {
    const searchInput = document.getElementById('default-search');
    const clearButton = document.getElementById('clear-search');
    
    searchInput.value = '';
    clearButton.style.display = 'none';
    searchInput.focus();
    
    // Trigger any search events if needed
    searchInput.dispatchEvent(new Event('input'));
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    toggleClearButton();
});
</script>