@extends('app')

@section('content')

    <div class="container">

        @if($showError)
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    Diese Buchungsnummer existiert nicht.
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Buchungen</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                {!! Form::open(['action' => '\EGOL\ReisenLizenzPayment\Controllers\PaymentController@postSearch', 'method' => 'post']) !!}
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="booking_id" placeholder="Suche nach Buchungsnummer">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">Suchen</button>
                                        </span>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Buchungen</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table striped">
                            <tr>
                                <th>Bgnr.</th>
                                <th>Reisedatum</th>
                                <th>Buchungsdatum</th>
                                <th></th>
                            </tr>
                            @foreach($doneBookings as $done)
                                <tr>
                                    <td><a href="/payment/{{ $done->id }}/edit">{{ $done->id }}</a></td>
                                    <td>{{ $done->tripdate->start_date }}</td>
                                    <td>{{ $done->created_at }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Ausstehende Restzahlungen</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table striped">
                            <tr>
                                <th>Bgnr.</th>
                                <th>Reisedatum</th>
                                <th>Buchungsdatum</th>
                                <th></th>
                            </tr>
                            @foreach($openBookings as $open)
                                <tr>
                                    <td><a href="/payment/{{ $open->id }}/edit">{{ $open->id }}</a></td>
                                    <td>{{ $open->tripdate->start_date }}</td>
                                    <td>{{ $open->created_at }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Ausstehende 1. Anzahlung</h4>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover table striped">
                            <tr>
                                <th>Bgnr.</th>
                                <th>Reisedatum</th>
                                <th>Buchungsdatum</th>
                                <th></th>
                            </tr>
                            @foreach($unpayedBookings as $unpayed)
                                <tr>
                                    <td><a href="/payment/{{ $unpayed->id }}/edit">{{ $unpayed->id }}</a></td>
                                    <td>{{ $unpayed->tripdate->start_date }}</td>
                                    <td>{{ $unpayed->created_at }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
