<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("record", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        {{ recordName }}
    </h1>
</div>

{{ content() }}

{{ form("record/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

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
        {% set index=0 %}
        {% for page in expenditures %}
        {% set index=index+1 %}
        <tr>
            <td>{{ index }}</td>
            <td>{{ page.type }}</td>
            <td>{{ page.totalAmount }}</td>


            <td>{{ link_to("record/expendituredel/"~page.id, "Delete") }}</td>
        </tr>
        {% endfor %}

        </tbody>
    </table>
</div>
<div class="row">
{{ form.render('expenses') }}
{{ form.render('amount') }}
{{ form.render('Add New Entry') }}
</div>
<div class="row">
    {{ link_to("expenses/"," Add new Category")}}
</div>
</form>
