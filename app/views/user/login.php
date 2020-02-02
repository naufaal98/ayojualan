<main>
  <form class="form text-center" style="max-width: 330px" method="POST" action="<?= BASE_URL ?>/user/postLogin">
    <?php Flasher::flash(); ?>
    <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal"> Log in</h1>

    <label for="username" class="sr-only">Username</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
    
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
    <p class="mt-5 mb-3 text-muted">Belum punya akun? <a href="<?= BASE_URL ?>/user/signup">Daftar disini</a></p>
  </form>
</main>
