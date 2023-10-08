<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script>
    ScrollReveal({
      reset: true
    });
  </script>
</head>

<body>



  <h1 class="headline">
    Widget Inc.
  </h1>
  <p class="tagline">
    The perfect widgets.
    <span class="punchline">Forever.</span>
  </p>


  <script>
    ScrollReveal().reveal('.headline');
    ScrollReveal().reveal('.tagline', {
      delay: 500
    });
    ScrollReveal().reveal('.punchline', {
      delay: 2000
    });
  </script>
</body>

</html>