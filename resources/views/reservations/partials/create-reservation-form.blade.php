<section>
    <header>
        <h2 class="text-2xl font-medium text-gray-900 text-center">
            {{ __('Create Reservation') }}
        </h2>
    </header>

   <!-- Session Status -->
   <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('reservations.create') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <!-- Arrival date -->
        <div>
            <x-input-label for="arrival_date" :value="__('Arrival Date')" />
            <input id="arrival_date" class="block mt-1 w-full" type="datetime-local" name="arrival_date" required autofocus autocomplete="establishment_date" />
            <x-input-error :messages="$errors->get('arrivalt_date')" class="mt-2" />
        </div>

        <!-- Departure date -->
        <div>
            <x-input-label for="departure_date" :value="__('Departure Date')" />
            <input id="departure_date" class="block mt-1 w-full" type="date" name="departure_date" required autofocus autocomplete="departure_date" />
            <x-input-error :messages="$errors->get('departure_date')" class="mt-2" />
        </div>

        <!-- First name, last name -->
        <div>
            <x-input-label for="name_surname" :value="__('First Name and Last Name')" />
            <x-text-input id="name_surname" class="block mt-1 w-full" type="text" name="name_surname" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name_surname')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Notes -->
        <div>
            <x-input-label for="notes" :value="__('Notes')" />
            <textarea id="notes" class="block mt-1 w-full" name="notes" autofocus autocomplete="notes"> </textarea>
            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
        </div>

        <x-primary-button class="mt-3 w-full justify-center">
            {{ __('Save') }}
        </x-primary-button>
    </form>
</section>