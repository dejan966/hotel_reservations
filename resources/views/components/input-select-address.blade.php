@php
$addresses = App\Models\Address::all();
@endphp

<select {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
    @foreach ($addresses as $address)
        <option value="{{ $address->id }}">{{ $address->address }}, {{ $address->zip_code }}</option>
    @endforeach
</select>