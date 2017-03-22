<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Zahlungsverlauf</h4>
    </div>
    <div class="panel-body">
        <form @submit.prevent>
            <!-- Art der Zahlung Form Input -->
            <div class="form-group">
                <label for="payment_description">Art der Zahlung <br>
                    <small v-show="payment.errors.description" class="text-danger">Bitte geben Sie eine Art der Zahlung an.</small>
                </label><br>
                <input class="form-control" v-model="payment.description" placeholder="Manueller eintrag,..." name="description" type="text" id="payment_description">
            </div>
            <div class="form-group">
                <label for="payment">Euro <br>
                    <small v-if="payment.errors.value" class="text-danger">@{{ payment.errors.value }}</small>
                </label><br>
                <div class="input-group">
                    <input class="form-control" v-model="payment.value" name="payment" id="payment" type="text">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" @click="addToDoPayment(booking, payment.value, payment.description)">Speichern</button>
                                </span>
                </div>
            </div>
        </form>
        <table class="table table-hover table-striped">
            <tr>
                <th><span class="pull-right">Betrag</span></th>
                <th>Von</th>
                <th><span class="pull-right">Eingang</span></th>
                <th></th>
            </tr>
            <tr transition="fade" v-for="payment in booking.payment">
                <td nowrap><span class="pull-right">@{{ payment.value | euro }} &euro;</span></td>
                <td>@{{ payment.description }}</td>
                <td><span class="pull-right">@{{ payment.created_at | de_date }}</span></td>
                <td><span class="pull-right text-danger clickable" @click="removePayment(booking, payment)"><i class="fa fa-remove"></i></span></td>
            </tr>
            <tr>
                <td><span class="pull-right">@{{ paymentSum(booking.payment) | euro }} &euro;</span></td>
                <td colspan="2"><span class="pull-right"><strong>Gesamt</strong></span></td>
                <td></td>
            </tr>
        </table>
    </div>
</div>


