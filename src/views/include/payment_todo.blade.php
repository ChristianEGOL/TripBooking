<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Todos <button @click="importTodos()" class="btn btn-default btn-xs pull-right">Todos importieren</button></h4>
    </div>
    <div class="panel-body">
        <div v-if="todo.errors.length" class="alert alert-danger">
            @{{{ todoErrors }}}
        </div>
        <form @submit.prevent>
            <!-- Todo Name Form Input -->
            <div class="form-group">
                <label for="name">Neues Todo</label>
                <div class="input-group">
                    <input type="text" name="name" v-model="todo.name" id="name" class="form-control">
                    <span class="input-group-btn">
                        <button type="submit" @click="postTodo()" class="btn btn-primary">Speichern</button>
                    </span>
                </div>
            </div>
        </form>
        <ul class="list-group">
            <li transition="fade" class="list-group-item todo" v-for="todo in booking.todo" :class="{complete: todo.done}">
                <input type="checkbox" @click="patchTodo(todo)" v-model="todo.done" name="todo[@{{ todo.id }}" id="todo_@{{ todo.id }}">
                <label for="todo_@{{ todo.id }}">@{{ todo.name }}</label>
                <i class="text-danger fa fa-remove pull-right clickable" @click="removeTodo(todo)"></i>
                <i class="fa fa-clock-o pull-right" data-toggle="tooltip" data-placement="top" title="Erstellt: @{{ todo.created_at | de_date 'true' }} Update: @{{ todo.updated_at | de_date 'true' }}"></i>
            </li>
        </ul>
        <div v-if="!booking.todo.length" class="alert alert-info">Keine Todos vorhanden.</div>
    </div>
</div>
