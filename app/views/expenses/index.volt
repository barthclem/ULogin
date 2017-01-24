{{ content() }}

{{ form("expenses/index", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
<div class="page-header">
    <h1>
       Expenses Page
    </h1>

</div>


<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("record/new", "Go Back") }}</li>
        </ul>
    </nav>
</div>




<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        {% for expense in page %}
        <tr>
            <td>{{ expense.id }}</td>
            <td>{{ expense.title }}</td>

            <td>{{ link_to("expenses/delete/"~expense.id, "Delete") }}</td>
        </tr>
        {% endfor %}

        </tbody>
    </table>
</div>




<div class="row">

        {{ form.render('expenses') }}
        {{ form.render('Add New Expenses')}}


</div>
</form>
