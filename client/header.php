<!-- here is header from bootstraps -->
<!--  -->
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background:#ededed">
  <div class="container">
    <a href="./" class="navbar-brand">
      <img src="./public/disscuss.png" alt="img" style="height:40px;">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="./">Home</a>
        </li>
        <?php if (isset($_SESSION['user']['username'])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="./server/requests.php?logout=true">logout(<?php echo ucfirst( $_SESSION['user']['username']) ?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="?ask=true">Ask A Question</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="?u-id=<?php echo $_SESSION['user']['user_id'] ?>">My Question</a>
          </li>
        <?php } ?>

        <?php if (!isset($_SESSION['user']['username'])) { ?>

          <li class="nav-item">
            <a class="nav-link" href="?login=true">login</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="?signup=true">Signup</a>
          </li>

        <?php } ?>

        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Category</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="?latest=true">Latest Question</a>
        </li>
      </ul>

    </div>
    <form action="" class="d-flex">
      <input type="search" name="search" class="form-control me-2" placeholder="Search Questions">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>