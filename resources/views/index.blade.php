@extends('layouts.app')

@section('app.main')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr class="text-center">
                <th scope="col">Train code</th>
                <th scope="col">Company</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Departure time</th>
                <th scope="col">Arrival time</th>
                <th scope="col">Date</th>
                <th scope="col">Cars</th>
                <th scope="col">On time</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                <tr class="{{ $train->on_time === 'yes' ? '' : 'danger' }}">
                    <th scope="row">{{ $train->train_code }}</th>
                    <td>{{ $train->vendor }}</td>
                    <td>{{ $train->departure }}</td>
                    <td>{{ $train->arrival }}</td>
                    <td>{{ $train->departure_time }}</td>
                    <td>{{ $train->arrival_time }}</td>
                    <td>{{ $train->departure_date }}</td>
                    <td>{{ $train->car }}</td>
                    <td>{{ $train->on_time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
