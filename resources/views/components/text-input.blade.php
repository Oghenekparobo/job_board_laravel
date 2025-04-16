@props(['name', 'id', 'type' => 'text', 'placeholder' => '', 'value' => ''])

<div class="relative w-full" x-data="{ showClear: '{{ $value }}' !== '' }">
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        value="{{ $value }}"
        class="border border-gray-300 rounded-md p-2 w-full placeholder:text-slate-400 focus:outline-none pr-8"
        x-on:input="showClear = $el.value !== ''"
        {{ $attributes }} />

    <button
        type="button"
        x-show="showClear"
        x-on:click="document.getElementById('{{ $name }}').value = ''; showClear = false"
        class="absolute top-1/2 right-2 transform -translate-y-1/2 p-0.5 rounded-full text-red-500 hover:text-red-700 focus:outline-none">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>