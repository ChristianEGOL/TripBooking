@extends('app')

@section('content')
    <div id="payment">


        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Payment</h4>
            </div>
            <div class="panel-body">
                Lorem ipsu hm dolor sit amet, consectetur adipisicing elit. Aspernatur autem culpa dolorem ea eius, error fugit magnam minima, nobis non quas quidem quisquam quod ratione ullam! Iure natus sed tempora.
                <div class="row">
                    <div class="col-md-3">
                        <!-- Suche Form Input -->
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" v-model="searchTerm" class="form-control" placeholder="Buchungsnummer...">
                              <span class="input-group-btn">
                                <button class="btn btn-primary" type="button" @click="search">Suche</button>
                              </span>
                            </div><!-- /input-group -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info" v-show="noResult">
                            Buchungsnummer nicht gefunden.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-for="booking in bookings | booking filterKey">

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>
                                <span v-if="isBooking(booking)">Buchung</span><span v-if="!isBooking(booking)">Anfrage</span>
                                <span v-if="payStatus(booking)" class="label label-success">Bezahlt</span>
                                <span v-if="!payStatus(booking)" class="label label-warning">Austehend</span>
                                <button v-if="!isBooking(booking)" class="btn btn-xs btn-default pull-right" @click="transformToBooking(booking)">zur Buchung machen</span>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <!-- Suche Form Input -->
                            {{-- <span class="label label-danger">Überzogen</span>--}}
                            <br>
                            <small>Buchungsnummer: @{{ booking.id }}</small>
                            <h4>
                                @{{ booking.trip.header_1 }}
                            </h4>
                            <blockquote>
                                Gebucht am: @{{ booking.created_at }}
                                <small>@{{ bookingDiff(booking) }}</small>
                                <br>
                                Reiseantritt: @{{ booking.tripdate.start_date  }}
                                <small>@{{ tripDiff(booking) }}</small>
                                <br>
                                Gesamtwert: @{{ totalValue(booking.customer_booking) | euro }}
                                <small>Bezahlt @{{ paymentSum(booking.payment) | euro }}</small>
                                {{--  Buchung über: [Vertriebspartner] --}}
                            </blockquote>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="comment_"@{{ booking.id }}>Kommentar</label>
                                        <textarea v-model="booking.comment" rows="10" id="comment_@{{ booking.id }}" class="form-control"></textarea>
                                    </div>
                                    <button class="btn btn-primary" @click="updateComment(booking)">Kommentar speichern</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('booking::include.payment_reminder')

                </div>
                <div class="col-md-6">
                    @include('booking::include.payment_customer')

                    @include('booking::include.payment_history')

                </div>
            </div>
        </div>
    </div>

@endsection
