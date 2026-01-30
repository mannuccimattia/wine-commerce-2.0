<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-[#212121] border border-[#313131] rounded-md font-semibold text-xs text-gray-300 uppercase tracking-widest shadow-sm hover:bg-[#414141] hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-yellow-600/70 focus:ring-offset-2 focus:ring-offset-[#313131] disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
