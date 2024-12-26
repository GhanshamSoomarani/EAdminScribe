@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    {{-- <a href="{{ url('/') }}" class="text-decoration-none text-dark"> --}}
                        <a href="/admin/remuneration-forms/create" class="text-decoration-none text-dark">
                        <img src="{{ asset('images/remuneration.png') }}" alt="Button 1" class="img-fluid img-thumbnail" style="height: 200px; object-fit: cover;">
                        <div class="text-center mt-2">
                            <h3 style="color: #0c0707; font-size: 1.5rem;">Remuneration</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-4">
                    <a href="{{ url('/') }}" class="text-decoration-none text-dark">
                        <img src="{{ asset('images/proper_chanel.png') }}" alt="Button 2" class="img-fluid img-thumbnail" style="height: 200px; object-fit: cover;">
                        <div class="text-center mt-2">
                            <h3 style="color: #0c0707; font-size: 1.5rem;">Through Proper Channel</h3>
                        </div>
                    </a>
                </div>
            </div>

            <a href="{{ url('/') }}" class="text-decoration-none">
                <div class="text-center mt-4 p-3" style="background-color: rgba(0, 0, 0, 0.5);">
                    <h3 style="color: #0159dc; font-size: 1.8rem;">See More</h3>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
