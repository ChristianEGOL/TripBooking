<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Reisende</h4>
    </div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <tr>
                <th><i class="fa fa-user"></i></th>
                <th><i class="fa fa-plane"></i></th>
                <th><i class="fa fa-euro pull-right"></i></th>
                <th><span class="pull-right">Bezahlt</span></th>
            </tr>
            <tr v-for="cbooking in booking.customer_booking">
                <td>
                    @{{ cbooking.customers.firstname }} @{{ cbooking.customers.firstname }}
                </td>
                <td>@{{ cbooking.price.date.start_date }}</td>
                <td><span class="pull-right">@{{ cbooking.price.accommodation }} / @{{ cbooking.price.price }} €</span></td>
                <td v-if="!cbooking.payed"><span class="pull-right"><input type="checkbox" name="" id="" @click="customerPay(booking, cbooking)"></span></td>
                <td v-if="cbooking.payed"><span class="pull-right label label-success">Bezahlt</span></td>
            </tr>
        </table>
    </div>
</div>

