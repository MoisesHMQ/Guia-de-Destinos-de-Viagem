<?php
// dicas.php - formulário POST para salvar dicas em um arquivo JSON simples
$arquivo = __DIR__ . '/tips.json';
$hoje = date('d/m/Y');
$time = date('H:i');
$titulos = ["Dicas de Viagem", "Compartilhe uma dica"];

// cria arquivo se não existir
if (!file_exists($arquivo)) {
    file_put_contents($arquivo, json_encode([]));
}

// ler dicas existentes
$tips_json = file_get_contents($arquivo);
$tips = json_decode($tips_json, true);
if (!is_array($tips)) $tips = [];

// processamento de POST
$submitted = false;
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : 'Anônimo';
    $dica = isset($_POST['dica']) ? trim($_POST['dica']) : '';
    // validação simples
    if ($dica === '') {
        $message = 'Escreva uma dica antes de enviar.';
    } else {
        // sanitiza e adiciona
        $entry = [
            'nome' => htmlspecialchars($nome, ENT_QUOTES, 'UTF-8'),
            'dica' => htmlspecialchars($dica, ENT_QUOTES, 'UTF-8'),
            'data' => date('d/m/Y'),
            'hora' => date('H:i')
        ];
        // adiciona no topo
        array_unshift($tips, $entry);
        // salva de volta
        file_put_contents($arquivo, json_encode($tips, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $submitted = true;
        $message = 'Dica salva com sucesso! Obrigado por contribuir.';
    }
}
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
    <section>
      <h2><?php echo $titulos[1]; ?></h2>
      <p>Data: <?php echo $hoje; ?> — Hora: <?php echo $time; ?></p>

      <?php if ($message !== ''): ?>
        <p class="message"><?php echo $message; ?></p>
      <?php endif; ?>

      <!-- Formulário que utiliza POST -->
      <form method="post" action="dicas.php" class="form-box" aria-label="Formulário para enviar dica de viagem">
        <label for="nome">Seu nome (opcional)</label>
        <input id="nome" name="nome" type="text" placeholder="Seu nome">

        <label for="dica">Sua dica de viagem</label>
        <textarea id="dica" name="dica" rows="4" required placeholder="Escreva uma dica útil..."></textarea>

        <button type="submit">Enviar dica</button>
      </form>

      <h3>Últimas dicas enviadas</h3>

      <?php
      // Uso de if...else para verificar se há dicas
      if (count($tips) === 0) {
          echo '<p class="alert">Ainda não há dicas. Seja o primeiro a enviar!</p>';
      } else {
          // uso de foreach para exibir dicas
          echo '<ul class="tips-list">';
          foreach ($tips as $t) {
              echo '<li class="tip">';
              echo '<p class="tip-meta"><strong>' . htmlspecialchars($t['nome']) . '</strong> — ' . htmlspecialchars($t['data']) . ' às ' . htmlspecialchars($t['hora']) . '</p>';
              echo '<p class="tip-text">' . nl2br(htmlspecialchars($t['dica'])) . '</p>';
              echo '</li>';
          }
          echo '</ul>';
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
