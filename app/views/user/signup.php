<main>
  <form class="form" method="post" action="<?=BASE_URL;?>/user/postSignup">
    <?php Flasher::flash(); ?>
    <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 text-center font-weight-normal"> Sign up</h1>
    <div class="form-group">
      <label for="nama_lengkap">Nama lengkap</label>
      <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama lengkap" required>
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label for="no_hp">No HP / WhatsApp</label>
      <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No Hp / WhatsApp" required>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
  </form>
</main>

