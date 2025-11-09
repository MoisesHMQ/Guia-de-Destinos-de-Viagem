<?php
$hoje = date('d/m/Y');
$titulos = ["Destinos", "Lista de Destinos"];
$destinos = [
    ["nome" => "Paris", "pais" => "França", "continente" => "Europa", "caracteristicas" => ["Museus", "Cafés", "Arquitetura"]],
    ["nome" => "Kyoto", "pais" => "Japão", "continente" => "Ásia", "caracteristicas" => ["Templos", "Jardins", "Cultura"]],
    ["nome" => "Rio de Janeiro", "pais" => "Brasil", "continente" => "América do Sul", "caracteristicas" => ["Praias", "Festas", "Montanhas"]],
    ["nome" => "Cidade do Cabo", "pais" => "África do Sul", "continente" => "África", "caracteristicas" => ["Vinhos", "Paisagens", "Trilhas"]],
    ["nome" => "Vancouver", "pais" => "Canadá", "continente" => "América do Norte", "caracteristicas" => ["Natureza", "Esportes", "Gastronomia"]],
];


$filtro = isset($_GET['continent']) ? trim($_GET['continent']) : '';

$lista_filtrada = [];
if ($filtro === '') {
    $lista_filtrada = $destinos;
} else {
    foreach ($destinos as $d) {
        if (strcasecmp($d['continente'], $filtro) === 0) {
            $lista_filtrada[] = $d;
        }
    }
}

$count = count($lista_filtrada);
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php echo $titulos[0]; ?></title>
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
    <section id="top-destinos">
      <h2><?php echo $titulos[1]; ?></h2>
      <p>Filtro aplicado: <strong><?php echo ($filtro === '' ? 'Nenhum' : htmlspecialchars($filtro)); ?></strong> — <?php echo $hoje; ?>.</p>

      <?php

      if ($count === 0) {
          echo '<p class="alert">Nenhum destino encontrado para esse filtro. Tente outro continente.</p>';
      } else {

          echo '<ol class="destino-list">';
          foreach ($lista_filtrada as $idx => $dest) {

              echo '<li>';
              echo '<h3>' . htmlspecialchars($dest['nome']) . ' — ' . htmlspecialchars($dest['pais']) . '</h3>';
              echo '<p>Continente: ' . htmlspecialchars($dest['continente']) . '</p>';


              echo '<ul class="carac">';
              foreach ($dest['caracteristicas'] as $c) {
                  echo '<li>' . htmlspecialchars($c) . '</li>';
              }
              echo '</ul>';

              echo '</li>';
          }
          echo '</ol>';
      }
      ?>

      <p><a href="index.php">← Voltar para Home</a></p>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <p>© <?php echo date('Y'); ?> Guia de Destinos — <?php echo date('d/m/Y'); ?>.</p>
    </div>
  </footer>
</body>
</html>
