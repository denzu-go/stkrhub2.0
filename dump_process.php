<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: sans-serif;
  text-decoration: none;
  list-style: none;
}

.header {
  position: sticky;
  top: 0;
  width: 100%;
  box-shadow: 0 4px 20px hsla(207, 24%, 35%, 0.1);
  background-color: #151418;
  z-index: 1;
}

nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 30px;
}

.logo a {
  font-size: 24px;
  font-weight: bold;
  color: #fff;
}

.logo a span {
  color: #8739fa;
}

.menu {
  display: flex;
  justify-content: center;
  align-items: center;
}

.menu a {
  display: block;
  padding: 7px 15px;
  font-size: 17px;
  font-weight: 500;
  transition: 0.2s all ease-in-out;
  color: #fff;
}

.menu:hover a {
  opacity: 0.4;
}

.menu a:hover {
  opacity: 1;
  color: #fff;
}

.menu-icon {
  display: none;
}

#menu-toggle {
  display: none;
}

#menu-toggle:checked ~ .menu {
  transform: scale(1, 1);
}

@media only screen and (max-width: 950px) {
  .menu {
    flex-direction: column;
    background-color: #151418;
    align-items: start;
    position: absolute;
    top: 70px;
    left: 0;
    width: 100%;
    z-index: 1;
    transform: scale(1, 0);
    transform-origin: top;
    transition: transform 0.3s ease-in-out;
    box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
  }

  .menu a {
    margin-left: 12px;
  }

  .menu li {
    margin-bottom: 10px;
  }

  .menu-icon {
    display: block;
    color: #fff;
    font-size: 28px;
    cursor: pointer;
  }
}

    </style>
</head>
<body>
<header class="header">
  <nav>
    <div class="logo">
      <a href="index.html">Humayun.<span>K</span></a>
    </div>
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-icon">&#9776;</label>
    <ul class="menu">
      <li><a href="#">Home</a></li>
      <li><a href="#">Skills</a></li>
      <li><a href="#">Projects</a></li>
      <li><a href="#">Connect</a></li>
    </ul>
  </nav>
</header>
</body>
</html>