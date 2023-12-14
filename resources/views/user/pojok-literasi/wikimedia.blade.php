@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="py-3">
            <h4 class="font-weight-bolder py-3"><i class="bi bi-translate"></i> Cari Kata</h4>
            <form action="{{ route('wikimedia-search') }}" method="GET">
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <input class="form-control col-6" type="text" id="query" name="query"
                        placeholder="Cari sesuatu disini" required>
                    <button class="btn btn-sm btn-danger" type="submit" onclick="lastSearch()">Search</button>
                </div>
            </form>

            @if (isset($results))
                <p class="pt-3 fs-5 border-bottom">Hasil Pencarian</p>
                @forelse ($results as $result)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $result['title'] }}</h5>
                            <p class="card-text">{!! $result['snippet'] !!}</p>
                            <a href="{{ url('https://id.wikipedia.org/wiki/' . $result['title']) }}" class="btn btn-primary"
                                target="_blank">Read More</a>
                        </div>
                    </div>
                @empty
                    <p>No results found.</p>
                @endforelse
            @endif
        </div>
    @endsection