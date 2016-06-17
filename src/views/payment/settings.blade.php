@extends('app')

@section('content')

    @include('include.errors')

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default" id="todo-settings">
                <div class="panel-heading">
                    <h4>Todos</h4>
                </div>
                <div class="panel-body">
                    <div class="well">Welche Todo's sollen bei der Erstellung einer Buchung erstellt werden?</div>
                    <form @submit.prevent>
                        <!-- Neuer Todo Form Input -->
                        <div class="form-group">
                            {!! Form::label('name', 'Neues Todo') !!}
                            <div class="input-group">
                                <input class="form-control" name="name" v-model="name" type="text" id="name">
                        <span class="input-group-btn">
                            <button type="submit" @click="addItem()" class="btn btn-primary">Speichern</button>
                        </span>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table class="table table-hover table striped">
                        <tr>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        <tr v-for="todo in todos">
                            <td>@{{ todo.name }}</td>
                            <td><span class="pull-right text-danger clickable" @click="removeItem(todo)"><i class="fa fa-remove"></i></span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4></h4>
                </div>
                <div class="panel-body">
                    @include('booking::reminder.form')
                    <hr>
                    <table class="table-hover table striped">
                        <tr>
                            <th>Titel</th>
                            <th></th>
                        </tr>
                        @foreach($reminders as $reminder)
                            <tr>
                                <td>{{ $reminder->title }}</td>
                                <td><a class="pull-right" href="/payment/reminder/{{ $reminder->id }}/edit"><i class="fa fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
