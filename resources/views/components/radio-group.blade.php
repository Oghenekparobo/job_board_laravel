@props(['name', 'options'])

<div class="mb-4">
    <label class="block text-gray-700 font-medium mb-2">{{ ucfirst($name) }}</label>
    <div class="space-y-2">
        @foreach ($options as $option)
            <div class="flex items-center">
                <input 
                    type="radio" 
                    name="{{ $name }}" 
                    value="{{ $option }}" 
                    id="{{ $name }}_{{ $option }}" 
                    @checked($option === request($name))
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                />
                <label for="{{ $name }}_{{ $option }}" class="ml-2 block text-sm text-gray-700">
                    {{ ucfirst($option) }}
                </label>
            </div>
        @endforeach
    </div>
</div>