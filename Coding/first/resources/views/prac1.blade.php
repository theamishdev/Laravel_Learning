@php
    $name = "raj";
@endphp

{{-- Html tags used alongside variables --}}
<h1>{{ $name }}</h1>

{{-- FIX: Use double quotes to allow PHP variable interpolation inside the string --}}
{!! "<h1>$name</h1>" !!}

{{-- Blade loop built-in variable --}}
@php
    $colors = ['red', 'green', 'blue'];
@endphp

<ul> 
    @foreach ($colors as $color)
        {{-- $loop->index starts at 0, $loop->iteration starts at 1 --}}
        <li>{{ $loop->index }} - {{ $color }}</li> 
        <li>{{ $loop->iteration }} - {{ $color }}</li>
    @endforeach
</ul>




