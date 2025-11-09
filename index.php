<?php
$time = date('H:i'); 
$hoje = date('d/m/Y');
$titulos = ["Guia de Destinos", "Inspiração de Viagem", "Dicas Úteis"];
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Guia de Destinos de Viagem</title>

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Roboto+Slab:wght@300;400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="site-header">
    <div class="container">
      <h1><?php echo $titulos[0]; ?></h1>
      <nav>
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="destinos.php">Destinos</a>
        <a class="nav-link" href="dicas.php">Dicas</a>
      </nav>
    </div>
  </header>

  <main class="container">
    <section class="hero">
      <figure>
        <img src="https://bestbuysimtravel.com/wp-content/uploads/2023/07/tour_pela_europa.jpg" alt="Paisagem de viagem com montanhas e lago" class="responsive-img">
        <figcaption>Explore lugares incríveis</figcaption>
      </figure>
    </section>

    <section class="intro">
      <h2><?php echo $titulos[1]; ?></h2>
      <p>Bem-vindo ao Guia de Destinos — encontre inspiração para sua próxima viagem.</p>

      <form method="get" action="destinos.php" class="form-inline" aria-label="Filtrar destinos por continente">
        <label for="continent">Filtrar por continente:</label>
        <select id="continent" name="continent">
          <option value="">Todos</option>
          <option value="Europa">Europa</option>
          <option value="América do Sul">América do Sul</option>
          <option value="Ásia">Ásia</option>
          <option value="África">África</option>
          <option value="América do Norte">América do Norte</option>
        </select>
        <button type="submit">Filtrar</button>
      </form>

      <p>Quer ver recomendações rápidas? <a href="destinos.php#top-destinos">Veja nossos destinos em destaque</a>.</p>
    </section>

    <section class="lists">
      <div class="list-box">
        <h3>Top 5 destinos (lista ordenada)</h3>
        <ol>
          <li>Paris — França</li>
          <li>Kyoto — Japão</li>
          <li>Rio de Janeiro — Brasil</li>
          <li>Cape Town — África do Sul</li>
          <li>Queenstown — Nova Zelândia</li>
        </ol>
      </div>

      <div class="list-box">
        <h3>Coisas para levar (lista não ordenada)</h3>
        <ul>
          <li>Documentos e cópias</li>
          <li>Carregador portátil</li>
          <li>Medicamentos básicos</li>
          <li>Roupas adequadas ao clima</li>
        </ul>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© <?php echo date('Y'); ?> Guia de Destinos — Atualizado: <?php echo date('d/m/Y'); ?>.</p>
    </div>
  </footer>
</body>
</html>
