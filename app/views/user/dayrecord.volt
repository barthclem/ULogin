{{ content() }}

{{ form("record/dayrecord", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}
<div class="page-header">
    <h1>
        Expenses Page
    </h1>
</div>


<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("record/index", "Go Back") }}</li>

        </ul>
    </nav>
</div>


<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Expenses</th>
            <th>Amount</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        {% for expenses in page %}
        <tr>
            <td>{{ text_field() }}</td>


            <td>{{ link_to("record/delete/"~expense.id, "Delete") }}</td>
        </tr>
        {% endfor %}

        </tbody>
    </table>
</div>

<div class="row">

</div>
</form>
