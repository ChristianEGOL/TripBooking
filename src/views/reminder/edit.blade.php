@extends('app')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Erinnerungsmail</h4>
                </div>
                <div class="panel-body">
                    {!! Form::model($reminder, ['action' => ['\EGOL\ReisenLizenzPayment\Controllers\PaymentDefaultReminderController@update', $reminder], 'method' => 'patch']) !!}

                    @include('booking::reminder.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @include('booking::include.delete', ['action' => '\EGOL\ReisenLizenzPayment\Controllers\PaymentDefaultReminderController@destroy', 'model' => $reminder])
    </div>

@endsection
