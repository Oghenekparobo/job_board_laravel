<div {{ $attributes->merge(['class' => 'bg-white shadow-md rounded-lg overflow-hidden']) }}>
    <div class="p-4">

        <!-- Card Body -->
        <div class="text-gray-600 mb-4">
            {{ $slot }}
        </div>

    </div>
</div>