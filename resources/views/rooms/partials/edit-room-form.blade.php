<section>
    <header>
        <h2 class="text-2xl font-medium text-gray-900 text-center mb-4">
            {{ __('Edit Room') }}
        </h2>
    </header>

    <form method="POST" action="{{ route('room.update', ['id' => $room->id]) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        
        <!-- Name -->
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Room') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name', $room->name)}}" autocomplete="email" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Price -->
        <div class="row mb-3">
            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

            <div class="col-md-6">
                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{old('price', $room->price)}}" autocomplete="price" autofocus>

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Short derscription -->
        <div class="row mb-3">
            <label for="short_description" class="col-md-4 col-form-label text-md-end">{{ __('Short description') }}</label>
            
            <div class="col-md-6">
                <textarea id="short_description"class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="{{old('short_description', $room->short_description)}}" autofocus autocomplete="short_description"> </textarea>
                @error('short_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <!-- Long derscription -->
        <div class="row mb-3">
            <label for="long_description" class="col-md-4 col-form-label text-md-end">{{ __('Long description') }}</label>
            
            <div class="col-md-6">
                <textarea id="long_description"class="form-control @error('long_description') is-invalid @enderror" name="long_description" value="{{old('long_description', $room->long_description)}}" autofocus autocomplete="long_description"> </textarea>
                @error('long_description')
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