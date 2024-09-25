@extends('layouts.app')

@section('content')

    <div class="label top">
        <h2>NUOVO PROGETTO</h2>
    </div>

    <div>

        <form action="{{route('admin.projects.store')}}" method="POST">
            @csrf

            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
              @error('title')
                <small class="invalid-feedback">{{$message}}</small>
              @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <select class="form-select" aria-label="Default select example" name="type_id" id="type">
                    <option value="">Seleziona una tipologia</option>

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach

                  </select>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Data inizio</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{old('start_date')}}">
                @error('start_date')
                  <small class="invalid-feedback">{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">Data fine</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{old('end_date')}}">
                @error('end_date')
                  <small class="invalid-feedback">{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{old('description')}}</textarea>
                @error('description')
                    <small class="invalid-feedback">{{$message}}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>

        </form>

    </div>


@endsection
