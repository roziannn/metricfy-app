@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="row py-3">
            <h4 class="font-weight-bolder py-3">Wikimedia</h4>
            <form action="{{ route('wikimedia-search') }}" method="GET">
                <label for="query">Search Word:</label>
                <input type="text" id="query" name="query" required>
                <button type="submit">Search</button>
            </form>

            @if (isset($results))
                <h2>Search Results</h2>

                @forelse ($results as $result)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $result['title'] }}</h5>
                            <p class="card-text">{!! $result['snippet'] !!}</p>
                            <a href="{{ url('https://en.wikipedia.org/wiki/' . $result['title']) }}" class="btn btn-primary"
                                target="_blank">Read More</a>
                        </div>
                    </div>
                @empty
                    <p>No results found.</p>
                @endforelse
            @endif
        </div>
    </div>
@endsection
