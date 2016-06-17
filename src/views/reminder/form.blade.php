{!! Form::open(['action' => '\EGOL\ReisenLizenzPayment\Controllers\PaymentDefaultReminderController@store', 'method' => 'post']) !!}
<div class="row">
    <div class="div col-md-2">
        <!-- Tage Form Input -->
        <div class="form-group">
            {!! Form::label('days', 'Tage') !!}
            {!! Form::text('days', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-10">
        <!-- Empfänger Form Input -->
        <div class="form-group">
            {!! Form::label('email', 'Empfänger') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<!-- Betreff Form Input -->
<div class="form-group">
    {!! Form::label('title', 'Titel') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<!-- Titel Form Input -->
<div class="form-group">
    {!! Form::label('message', 'Nachricht') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Speichern', ['class' => 'btn btn-primary']) !!}
<hr>
{!! Form::close() !!}
