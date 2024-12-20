<x-mail::layout>

<x-slot:header>
<x-mail::header url="{{config('app.url')}}">
Hotel reservations
</x-mail::header>
</x-slot:header>

Greetings!

You have successfully made a reservation for room {{ $name }}
for your stay from {{ $arrival_date }} to {{ $departure_date }}.
Price per night is {{ $price }} €.

Best regards,
Hotel reservations team

<x-mail::footer>
<a href="{{config('app.url')}}">Hotel reservations</a>
</x-mail::footer>

</x-mail::layout>