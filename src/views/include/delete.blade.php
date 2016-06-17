<div class="col-md-4">
    <div id="delete-container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Eintrag löschen</h4>
            </div>
            <div class="panel-body">
                {!! Form::open(['action' => [$action, $model], 'method' => 'DELETE']) !!}
                <div class="form-group">
                    {!! Form::label('delete_text', 'Bitte geben Sie hier das Wort "Löschen" ein.') !!}
                    <input type="text" placeholder="Löschen" name="delete_text" id="delete_text" class="form-control" v-model="delete_text" @keyup="validate">
                </div>
                <hr>
                <button type="button" class="btn btn-danger" :disabled="isDisabled">Löschen</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
