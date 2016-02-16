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
                                <input class="form-control datepicker" placeholder="01.01.2016" v-model="reminder.send_at" v-class="reminder.date" name="send_at" type="text" id="send_at">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- Empfänger Form Input -->
                            <div class="form-group">
                                <label for="email">Empfänger <br>
                                    <small v-if="reminder.errors.email" class="text-danger">@{{ reminder.errors.email }}</small>
                                </label>
                                <input class="form-control" v-model="reminder.email" placeholder="mail1@example.de;mail2@example.de" name="email" type="text" id="email">
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
                                <input class="form-control" name="message" v-model="reminder.message" type="text" id="message">
                            </div>
                            <button class="btn btn-primary" @click="postReminder(booking)">Neue Erinnerung</button>
                        </div>
                    </div>
                </form>
                <hr>
                <table class="table table-hover table-striped">
                    <tr>
                        <th>Datum</th>
                        <th>Empfänger</th>
                        <th>Titel</th>
                        <th>Nachricht</th>
                        <th></th>
                    </tr>
                    <tr v-for="reminder in booking.reminder | visible">
                        <td>@{{ reminder.send_at | de_date }}</td>
                        <td>@{{ reminder.email }}</td>
                        <td>@{{ reminder.title }}</td>
                        <td>@{{ reminder.message }}</td>
                        <td><i @click="removeReminder(reminder)" class="fa fa-remove text-danger pull-right"></i></td>
                    </tr>
                </table>
                <hr>
            </div>
        </div>
    </div>
</div>
