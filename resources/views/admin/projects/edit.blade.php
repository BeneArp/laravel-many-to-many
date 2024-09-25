@extends('layouts.app')

@section('content')

    <div class="label top">
        <h2>{{$project->title}}</h2>
    </div>

    <div>

        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf

            @method('PUT')

            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $project->title)}}">
              @error('title')
                <small class="invalid-feedback">{{$message}}</small>
              @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipologia</label>
                <select class="form-select" aria-label="Default select example" name="type_id" id="type">
                    <option value="">Seleziona una tipologia</option>

                    @foreach ($types as $type)
                       <option value="{{ $type->id }}" @if(old('type_id') === $type->id) selected @endif>
                            {{ $type->name }}
                        </option>
                    @endforeach

                  </select>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Titolo</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{old('start_date', $project->start_date)}}">
                @error('start_date')
                  <small class="invalid-feedback">{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">Titolo</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{old('end_date', $project->end_date)}}">
                @error('end_date')
                  <small class="invalid-feedback">{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{old('description', $project->description)}}</textarea>
                @error('description')
                    <small class="invalid-feedback">{{$message}}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>


@endsection
