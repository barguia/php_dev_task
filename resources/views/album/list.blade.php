@extends('layouts.app')

@section('content')

    <h3 class="mb-2">Albums</h3>
    @if(count($albums))
        <div>
            <table class="table table-sm table-bordered">
                <thead>
                    <tr class="text-center bg-secondary text-white">
                        <th class="align-middle">ID</th>
                        <th class="align-middle">Album</th>
                        <th class="align-middle">Year</th>
                        <th class="align-middle">Artist</th>
                        <th class="align-middle">Registered by</th>
                        @if(Auth::user()?->isAdmin())
                        <th class="align-middle">Delete</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($albums as $a)
                    <tr>
                        <td class="align-middle">
                            <a href="{{ route('albums.show', [$a->id]) }}"
                                class="btn btn-primary"
                                >{{ $a->id }}</a>
                        </td>
                        <td class="align-middle">{{ $a->album }}</td>
                        <td class="align-middle">{{ $a->year }}</td>
                        <td class="align-middle">{{ $a->artist }}</td>
                        <td class="align-middle">{{ $a->registeredBy->name ?? '-' }}</td>
                        @if(Auth::user()?->isAdmin())
                        <td class="align-middle p-0">
                            <form action="{{ route('albums.destroy', [$a->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    @else
    <div class="alert alert-info">
        List of albums not found.
    </div>
    @endif

@endsection
