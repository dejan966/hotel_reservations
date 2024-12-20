<section>
    <header>
        <h2 class="text-2xl font-medium text-gray-900 text-center">
            {{ __('Create Reservation') }}
        </h2>
    </header>

    <form method="POST" action="{{ route('reservations.create') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <!-- Arrival date -->
        <div class="row mb-3">
            <label for="arrival_date" class="col-md-4 col-form-label text-md-end">{{ __('Arrival Date') }}</label>

            <div class="col-md-6">
                <input id="arrival_date" type="datetime-local" class="form-control @error('arrival_date') is-invalid @enderror" name="arrival_date" autocomplete="email" autofocus>

                @error('arrival_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <!-- Departure date -->
        <div class="row mb-3">
            <label for="departure_date" class="col-md-4 col-form-label text-md-end">{{ __('Departure Date') }}</label>

            <div class="col-md-6">
                <input id="departure_date" type="datetime-local" class="form-control @error('departure_date') is-invalid @enderror" name="departure_date" autocomplete="email" autofocus>

                @error('departure_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Room -->
        <div class="row mb-3">
            <label for="room" class="col-md-4 col-form-label text-md-end">{{ __('First and last name') }}</label>
            
            <div class="col-md-6">
                <x-input-select-room class="form-control" name="room_id" />
            </div>
        </div>
        
        <!-- First name, last name -->
        <div class="row mb-3">
            <label for="name_surname" class="col-md-4 col-form-label text-md-end">{{ __('First and last name') }}</label>

            <div class="col-md-6">
                <input id="name_surname" type="text" class="form-control @error('name_surname') is-invalid @enderror" name="name_surname" autocomplete="email" autofocus>

                @error('name_surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Email -->
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <!-- Phone -->
        <div class="row mb-3">
            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" autocomplete="phone" autofocus>

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Notes -->
        <div class="row mb-3">
            <label for="notes" class="col-md-4 col-form-label text-md-end">{{ __('Notes') }}</label>
            
            <div class="col-md-6">
                <textarea id="notes"class="form-control @error('notes') is-invalid @enderror" name="notes" autofocus autocomplete="notes"> </textarea>
                @error('notes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Session Status -->
        <div class="row mb-0">
            <div class="text-success">
                {{ session('status') }}
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </form>
</section>