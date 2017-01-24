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
        {%- set index = 0 %}
        {% for page in expenditures %}
        {%- set index = index + 1 %}
        <tr>
            <td>{{ index }}</td>
            <td>{{ page.type }}</td>
            <td>{{ page.totalAmount }}</td>


            <td>{{ link_to("record/expendituredel/"~page.id, "Delete") }}</td>
        </tr>
        {% endfor %}
        <tr>
            <td></td><td>Total</td><td>{{ total }}</td><td></td></tr>

        </tbody>
    </table>
</div>

