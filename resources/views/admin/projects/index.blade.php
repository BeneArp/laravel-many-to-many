@extends('layouts.app')

@section('content')

<table class="table">

    <thead>
      <tr>
        <th scope="col">#Id</th>
        <th scope="col">Titolo</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Data Inizio</th>
        <th scope="col">Data fine</th>
        <th scope="col">Tipo</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>

    <tbody>

        @foreach ($projects as $project)
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->title}}</td>
                <td>{{$project->description}}</td>
                <td>{{ ($project->start_date )->format('d/m/Y') }}</td>
                <td>{{ ($project->end_date)->format('d/m/Y') }}</td>
                <td>{{ ($project->type ? $project->type->name : '-') }}</td>
                <td>
                    <a href="{{route('admin.projects.show', $project)}}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>

                    <form action="{{route('admin.projects.destroy', $project)}}" method="POST" onsubmit=" return confirm('Sei sicuro di voler eliminare il progetto {{$project->title}}?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>

                    </form>

                </td>
            </tr>
        @endforeach

    </tbody>

  </table>

@endsection
