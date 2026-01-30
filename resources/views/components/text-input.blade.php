@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'border-[#313131] bg-[#212121] text-gray-300 focus:border-yellow-100 focus:ring-yellow-800 rounded-md shadow-sm']) }}>
