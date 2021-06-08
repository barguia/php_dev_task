@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('New Album') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('albums.update', [$album->id]) }}">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{ $album->id }}">

                    <div class="form-group row">
                        <label for="album" class="col-md-4 col-form-label text-md-right">{{ __('Album') }}</label>

                        <div class="col-md-6">
                            <input id="album" type="text" class="form-control @error('album') is-invalid @enderror" name="album" value="{{ old('album') ?? $album->album }}"  autocomplete="album">

                            @error('album')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                        <div class="col-md-6">
                            <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') ?? $album->year }}"  autocomplete="year">

                            @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="artist" class="col-md-4 col-form-label text-md-right">{{ __('Artist') }}</label>

                        <div class="col-md-6">
                            <select id="artist" class="form-control @error('artist') is-invalid @enderror" name="artist" >
                                <option value="">Select a artist</option>

                                @foreach($artists as $artist)
                                    <option value="{{ $artist['name'] }}"
                                        {{ (old('artist') ?? $album->artist) == $artist['name'] ? 'selected' : ''}}
                                        >{{ $artist['name'] }}</option>
                                @endforeach
                            </select>

                            @error('artist')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @if(Auth::user()?->isAdmin())
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Edit') }}
                            </button>
                        </div>
                    </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
