<main>
  <form class="form" method="post" action="<?=BASE_URL;?>/user/postUpdate">
    <?php Flasher::flash(); ?>
    <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 text-center font-weight-normal"> Edit Profile</h1>
    <div class="form-group">
      <label for="nama_lengkap">Nama lengkap</label>
      <input type="text" value="<?= $data['user']['nama_lengkap'] ?>" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama lengkap" required>
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" value="<?= $data['user']['username'] ?>" name="username" class="form-control" id="username" placeholder="Username" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" value="<?= $data['user']['email'] ?>" name="email" class="form-control" id="email" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label for="no_hp">No HP / WhatsApp</label>
      <input type="text" value="<?= $data['user']['no_hp'] ?>" name="no_hp" class="form-control" id="no_hp" placeholder="No Hp / WhatsApp" required>
    </div>
    <input type="hidden" name="user_id" value="<?= $data['user']['id']?>">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Update Profile</button>
  </form>
</main>

