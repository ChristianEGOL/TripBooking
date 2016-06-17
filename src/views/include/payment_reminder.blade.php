<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Erinnerungen zu dieser Buchung</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <!-- <button class="btn btn-sm btn-success">Neue Erinnerung</button> -->
                <form @submit.prevent>
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Datum Form Input -->
                            <div class="form-group">
                                <label for="send_at">Datum <br>
                                    <small v-if="reminder.errors.send_at" class="text-danger">@{{ reminder.errors.send_at }}</small>
                                </label>
                                <input class="form-control datepicker" v-model="reminder.send_at" type="text">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- Empfänger Form Input -->
                            <div class="form-group">
                                <label for="email">Empfänger <br>
                                    <small v-if="reminder.errors.email" class="text-danger">@{{ reminder.errors.email }}</small>
                                </label>
                                <input class="form-control" v-model="reminder.email" placeholder="mail@example.de" name="email" type="text" id="email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Titel Form Input -->
                            <div class="form-group">
                                <label for="title">Titel <br>
                                    <small v-if="reminder.errors.title" class="text-danger">@{{ reminder.errors.title }}</small>
                                </label>
                                <input class="form-control" v-model="reminder.title" name="title" type="text" id="title">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Nachricht Form Input -->
                            <div class="form-group">
                                <label for="message">Nachricht <br>
                                    <small v-if="reminder.errors.message" class="text-danger">@{{ reminder.errors.message }}</small>
                                </label>
                                <textarea v-model="reminder.message" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <button class="btn btn-primary" @click="postReminder()">Neue Erinnerung</button>
                        </div>
                    </div>
                </form>
                <hr>
                <h4>Bestehende Erinnerungen <button class="btn btn-default btn-xs" @click="importReminder()">Erinnerungen importieren</button></h4>
                <table class="table table-hover table-striped">
                    <tr transition="fade" v-for="reminder in booking.reminder | orderBy 'send_at'">
                        <td>
                            <span v-if="shipment(reminder)" class="label label-success ">Versendet</span>
                            <p class="text-lowercase">@{{ reminder.email }}
                                <br>
                                <small>@{{ reminder.send_at | de_date }}</small>
                            </p>
                            <p><strong>@{{ reminder.title }}</strong></p>
                            <p>
                                @{{ reminder.message }}
                            </p>
                        </td>
                        <td>
                            <i @click="removeReminder(reminder)" class="fa fa-remove text-danger pull-right clickable"></i>
                        </td>
                    </tr>
                </table>
                <div v-if="!booking.reminder.length" class="alert alert-info">Keine Erinnerungen vorhanden.</div>
            </div>
        </div>
    </div>
</div>
