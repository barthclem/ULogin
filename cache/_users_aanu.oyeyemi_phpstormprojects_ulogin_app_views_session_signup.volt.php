  <?= $this->getContent() ?>

  <div align="center" class="well">

      <?= $this->tag->form(['class' => 'form-search']) ?>

      <div align="left">
          <h2>
              Login Form
          </h2>
      </div>

      <div align="center" class="remember">


      <table class="signup">

          <tr>
              <td align="right"><?= $form->label('name') ?></td>
              <td>
                  <?= $form->render('name') ?>
                  <?= $form->messages('name') ?>
              </td>
          </tr>

          <tr>
              <td align="right"><?= $form->label('username') ?></td>
              <td>
                  <?= $form->render('username') ?>
                  <?= $form->messages('username') ?>
              </td>
          </tr>

          <tr>
              <td align="right"><?= $form->label('email') ?></td>
              <td>
                  <?= $form->render('email') ?>
                  <?= $form->messages('email') ?>
              </td>
          </tr>

          <tr>
              <td align="right"><?= $form->label('password') ?></td>
              <td>
                  <?= $form->render('password') ?>
                  <?= $form->messages('password') ?>
              </td>
          </tr>

          <tr>
              <td align="right"><?= $form->label('confirmPassword') ?></td>
              <td>
                  <?= $form->render('confirmPassword') ?>
                  <?= $form->messages('confirmPassword') ?>
              </td>
          </tr>
          <tr>
              <td align="right">
                  <?= $form->render('Submit') ?>
              </td>
          </tr>
      </table>
      </form>

      </div>

</div>



