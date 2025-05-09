<div class="group flex flex-col items-center modal-trigger-button">
    <button @click="$dispatch('resetErrors'); $dispatch('open-modal', 'add-user-modal');"
        class="p-2 rounded-full bg-[#2e5e91] hover:text-white transition">
        <div class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="size-12 text-white transition">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
            </svg>
        </div>
    </button>

    @include('components.mis.add-user-modal')

    <div class="tooltip text-[#2e5e91] w-auto whitespace-nowrap">Add User</div>
</div>