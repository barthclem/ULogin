<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("user", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit user
    </h1>
</div>

{{ content() }}

{{ form("user/edit", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div align="center" class="well">

    {{form ( 'class' : 'form-search' )}}

    <div align="left">
        <h2>
            Edit Form
        </h2>
    </div>

    <div align="center" class="remember">

        {{form.render('id')}}
        <table class="signup" >


            <tr>
                <td class="right"> {{ form.label('name') }}</td>
                <td>
                     {{  form.render('name') }}
                    {{   form.message('name') }}
                </td>
            </tr>

            <tr>
                <td class="right"> {{ form.label('username') }}</td>
                <td>
                    {{  form.render('username') }}
                    {{   form.message('username') }}
                </td>
            </tr>

            <tr>
                <td class="right"> {{ form.label('email') }}</td>
                <td>
                    {{  form.render('email') }}
                    {{   form.message('email') }}
                </td>
            </tr>

            <tr>
                <td class="right"></td>
                <td>
                    {{  form.render('Save') }}
                </td>
            </tr>

        </table>


    </div>


</div>

</form>
