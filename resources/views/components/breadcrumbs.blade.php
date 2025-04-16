@props(['job', 'links', 'active'])

<nav {{ $attributes }}>
    <ul class="flex space-x-2">
        @foreach ($links as $label => $link)
        <li>
            <a href="{{ $link }}" class="text-blue-600 hover:text-blue-800">{{ $label }}</a>
        </li>

        @if (!$loop->last) <!-- Ensure "→" is not added after the last link -->
        <li class="text-gray-500">→</li>
        @endif
        @endforeach
    </ul>
</nav>