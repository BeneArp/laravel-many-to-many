@extends('layouts.app')

@section('content')

    <div class="card" style="width: 18rem;">

        <div class="card-body">
            <img src="{{asset('storage/' . $project->img_path)}}" class="card-img-top" alt="{{$project->img_original_name}}"
            onerror="this.src='/img/placeholder.jpg'"
            >
            <h5 class="card-title">Titolo progetto: {{$project->title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Data inizio: {{($project->start_date)->format('d/m/Y')}}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Data fine: {{($project->end_date)->format('d/m/Y')}}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Tipo: {{$project->type ? $project->type->name : 'nessuna tipologia'}}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Teconologie:
                @forelse ($project->technologies as $technology)

                    {{$technology->name}}

                @empty

                    -

                @endforelse
                </h6>

            <p class="card-text">{{$project->description}}</p>
            <a href="{{route('admin.projects.index')}}" class="card-link">Lista Progetti</a>
            <a href="#" class="card-link">Modifica</a>
        </div>

  </div>

@endsection
