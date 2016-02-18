@extends('app')

@section('content')
    <div id="payment">
        <input type="hidden" name="id" id="booking_id" value="{{ $id }}">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Buchungen</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            <span v-if="isBooking">Buchung</span><span v-if="!isBooking">Anfrage</span>
                            <span v-if="payStatus" class="label label-success">Bezahlt</span>
                            <span v-if="!payStatus" class="label label-warning">Austehend</span>
                            <button v-if="!isBooking" class="btn btn-xs btn-default pull-right" @click="transformToBooking">zur Buchung machen</span>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <small>Buchungsnummer: @{{ booking.id }}</small>
                        <h4>
                            @{{ header }}
                        </h4>
                        <blockquote>
                            Gebucht am: @{{ booking.created_at }}
                            <small>@{{ bookingDiff() }}</small>
                            <br>
                            Reiseantritt: @{{ beginning }}
                            <small>@{{ tripDiff() }}</small>
                            <br>
                            Gesamtwert: @{{ totalValue() | euro }}
                            <small>Bezahlt @{{ paymentSum() | euro }}</small>
                        </blockquote>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment_"@{{ booking.id }}>Kommentar</label>
                                    <textarea v-model="booking.comment" rows="10" id="comment_@{{ booking.id }}" class="form-control"></textarea>
                                </div>
                                <button class="btn btn-primary" @click="updateComment">Kommentar speichern</button>
                            </div>
                        </div>
                    </div>
                </div>

                @include('booking::include.payment_reminder')

            </div>
            <div class="col-md-6">
                {{--
                @include('booking::include.payment_customer')
                --}}
                {{--
                @include('booking::include.payment_history')
                --}}
            </div>
        </div>
    </div>

@endsection
