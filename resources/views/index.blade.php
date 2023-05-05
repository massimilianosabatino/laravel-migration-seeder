@extends('layouts.app')

@section('app.main')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Train code</th>
            <th scope="col">Company</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Departure time</th>
            <th scope="col">Arrival time</th>
            <th scope="col">Date</th>
            <th scope="col">Train code</th>
            <th scope="col">Cars</th>
            <th scope="col">On time</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($trains as $train)
            <tr>
                <th scope="row">{{ $train->id }}</th>
                <td>{{ $train->vendor }}</td>
                <td>{{ $train->departure }}</td>
                <td>{{ $train->arrival }}</td>
                <td>{{ $train->departure_time }}</td>
                <td>{{ $train->arrival_time }}</td>
                <td>{{ $train->departure_date }}</td>
                <td>{{ $train->train_code }}</td>
                <td>{{ $train->car }}</td>
                <td>{{ $train->on_time }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
