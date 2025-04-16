
@props(['name', 'options'])

<div>
    <label class="block text-gray-700 font-medium mb-1">{{ ucfirst($name) }}</label>

    @foreach ($options as $option)
        <div>
            <input type="radio" name="{{ $name }}" value="{{ $option }}" id="{{ $name }}_{{ $option }}" @checked($option === request($name)) />
            <label for="{{ $name }}_{{ $option }}" class="ml-2">{{ ucfirst($option) }}</label>
        </div>
    @endforeach
</div>
