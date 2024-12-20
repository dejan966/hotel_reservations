<x-mail::layout>

<x-slot:header>
<x-mail::header url="{{config('app.url')}}">
Hotel reservations
</x-mail::header>
</x-slot:header>

Hello

The user with email {{ $email }} has made a reservation for room {{ $name }}
and is staying from {{ $arrival_date }} to {{ $departure_date }}.


<x-mail::table>
| Room name       | Arrival date         | Departure date           | Price per night      | Total price       |
| ---------------:| --------------------:| ------------------------:| -------------------: | -----------------:|
| {{ $name }}     | {{$arrival_date}}    |  {{$departure_date}}     | {{$price }} €        | {{$full_price}} € |
</x-mail::table>

<x-mail::footer>
    <a href="{{config('app.url')}}">Hotel reservations</a>
</x-mail::footer>

</x-mail::layout>