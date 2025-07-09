
<button
    x-data="{ dark: localStorage.getItem('theme') === 'dark' }"
    @click="dark = !dark; localStorage.setItem('theme', dark ? 'dark' : 'light'); if(dark){ document.documentElement.classList.add('dark'); } else { document.documentElement.classList.remove('dark'); }"
    x-init="if(localStorage.getItem('theme') === 'dark'){ document.documentElement.classList.add('dark'); dark = true; } else { document.documentElement.classList.remove('dark'); dark = false; }"
    type="button"
    class="inline-flex items-center px-2 py-2 rounded-md text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none transition duration-150"
    aria-label="Toggle dark mode"
>
    <template x-if="!dark">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m8.66-13.66l-.71.71M4.05 19.95l-.71.71M21 12h-1M4 12H3m16.66 5.66l-.71-.71M4.05 4.05l-.71-.71M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
    </template>
    <template x-if="dark">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/></svg>
    </template>
</button> 