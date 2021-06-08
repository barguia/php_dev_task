@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-2">Artists</h3>
    @if(count($artists))
        <div class="w-50">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th class="align-middle">ID</th>
                        <th class="align-middle">Twitter</th>
                        <th class="align-middle">Artist</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artists as $a)
                    <tr>
                        <td class="align-middle">{{ $a['id'] ?? '-' }}</td>
                        <td class="align-middle">{{ $a['twitter'] ?? '-' }}</td>
                        <td class="align-middle">{{ $a['name'] ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    @else
    <div class="alert alert-info">
        List of artists not found.
    </div>
    @endif
</div>
@endsection
