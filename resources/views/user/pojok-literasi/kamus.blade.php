@extends('layouts.main')
@include('partials.navbar')
@section('container')
    <div class="pb-5">
        <div class="py-3">
            <h4 class="font-weight-bolder py-3"><i class="bi bi-journal-text"></i> Kamus Bahasa Indonesia</h4>
            <form action="{{ route('kamus-search') }}" method="GET">
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <input class="form-control col-sm-12 col-lg-6" type="text" id="query" name="query"
                        placeholder="Cari kata disini" required>
                    <button class="btn btn-sm btn-danger" type="submit">Search</button>
                </div>
            </form>
            @if (!empty($results))
                <p class="border-bottom fs-5">Hasil Pencarian:</p>
                <p class="font-weight-bolder fs-4">{{ $results[0]['title'] }}</p>
                <p>{!! $results[0]['snippet'] !!}</p>
            @else
                <p>No results found.</p>
            @endif

        </div>
    </div>
@endsection
