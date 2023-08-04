<?php ?>
<header class="header-container">
  <a href="http://localhost/laravel_homeworks/public/hw27_04_23/main">
    <div class="logo">
      header / main
    </div>
  </a>
    <div class="menu-active">
      <nav class="navbar">
        <div class="nav-item"><a href="http://localhost/laravel_homeworks/public/hw27_04_23/main/">Home</a></div>
        <div class="nav-item"><a href="http://localhost/laravel_homeworks/public/hw27_04_23/about/">About us</a></div>
        <div class="nav-item"><a href="http://localhost/laravel_homeworks/public/hw27_04_23/products/">Products</a></div>
        <div class="nav-item"><a href="http://localhost/laravel_homeworks/public/hw27_04_23/contacts/">Contacts</a></div>
      </nav>
      <div class="user-options">
        <div class="option"><i class="fa fa-user"></i></div>
        <div class="option"><i class="fa fa-gear"></i></div>
      </div>
    </div>
    <nav class="navbar">
        <div class="nav-item"><a href="main.php">Main</a></div>
        <div class="nav-item"><a href="about.php">About us</a></div>
        <div class="nav-item"><a href="products.php">Products</a></div>
        <div class="nav-item"><a href="contacts.php">Contacts</a></div>
    </nav>
    <div class="user-options">
      <div class="option"><i class="fa fa-user"></i></div>
      <div class="option"><i class="fa fa-gear"></i></div>
    </div>
  </header>
  <hr>
    <h2>не получилось сделать навигацию по ссылкам, т.к в конце добавлялось расширение файла .php
        <br>
    пожалуйста, прописывайте пути вручную
    <br> hw27_04_23/main
    <br> hw27_04_23/about
    <br> hw27_04_23/products
    <br> hw27_04_23/contacts
    </h2>

<style>
  * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.header-container {
  height: 60px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 0 1rem;
}

.logo {
  font-weight: bold;
  font-style: italic;
}

.menu-active {
  display: flex;
  align-items: center;
  justify-content: space-between;
  display: none;
}

.navbar {
  display: flex;
  align-items: center;
  justify-content: center;
}

.nav-item a {
  border-radius: 5px;
  text-decoration: none;
  padding: 1rem;
  transition: 0.25s;
}

.nav-item a:hover {
  background-color: #8df;
}

.user-options {
  display: flex;
  align-items: center;
  justify-content: center;
}

.option {
  padding: 1rem;
}

.option:hover {
  cursor: pointer;
  color: blue;
}

</style>
