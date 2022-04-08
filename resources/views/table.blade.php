@extends('layouts.app')

@section('content')

    @forelse ($data as $user)
        @include('shared.user')
    @empty
        @include('shared.empty')
    @endforelse

    @php($loop = 1)
    @foreach($data as $user)
        <div class="{{$loop % 2 ? 'g-red-500':''}}">{{$user->name}}</div>
        @php($loop++)
    @endforeach
@endsection

