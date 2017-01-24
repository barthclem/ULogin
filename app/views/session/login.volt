{{ content() }}

<div align="center" class="well">

    {{form ( 'class' : 'form-search' )}}

    <div align="left">
        <h2>
            Login Form
        </h2>
    </div>

    <div align="center" class="remember">
    {{ form.render('username') }}
    {{ form.render('password') }}
    {{ form.render('go') }}
    </div>
    </form>

    <div class="forgot">
        {{ link_to("session/signup", "Forgot my password") }}
    </div>
</div>