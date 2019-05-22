<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view("templates/head") ?>
</head>

<body class="login">
  <div class="login_wrapper">
    <div class="animate form login_form">
      <section class="login_content x_content">
        <form method="POST" class="form-horizontal form-label-left">
          <h1>Login</h1>
          <div class="form-group">
            <input name="username" type="text" class="form-control" placeholder="Username" required="" />
          </div>
          <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="Password" required="" />
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-default" value="Log in" style="width:100%">
          </div>
          <div class="clearfix"></div>
        </form>
        <?= $this->session->flashdata('message') ?>
      </section>
    </div>


    <?php $this->load->view('templates/script') ?>
</body>

</html>