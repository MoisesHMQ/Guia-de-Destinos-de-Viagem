# Guia de Destinos de Viagem

Projeto simples de página web em PHP (sem banco de dados) — atende aos requisitos mínimos solicitados.

## Estrutura de arquivos
- `index.php` — página inicial com imagem responsiva, lista ordenada e não ordenada, formulário GET para filtro.
- `destinos.php` — lista de destinos; usa GET para filtrar por continente; demonstra `foreach`, `if...else` e `echo`.
- `dicas.php` — formulário POST para envio de dicas; salva dicas em `tips.json`; demonstra `POST`, `date()`, variáveis, `if...else`, `foreach`.
- `tips.json` — criado automaticamente após o primeiro envio (não incluído, será gerado).
- `style.css` — estilos, responsivo, usa 3 cores e 3 fontes (via Google Fonts).

## Requisitos implementados
- Imagem responsiva com `figure`/`figcaption`/`alt`.
- Link clicável e formulário que usa GET e POST.
- Listas ordenada (`<ol>`) e não ordenada (`<ul>`).
- Layout responsivo com media queries.
- Ao menos **3 cores** definidas no CSS.
- Ao menos **3 fontes** (Google Fonts) usadas: Montserrat, Playfair Display e Roboto Slab.
- Uso de `<?php echo ... ?>`, `date('d/m/Y')`, variáveis (`$time`, `$titulos`), `if...else` e `foreach`.
- Armazenamento simples de dicas em arquivo JSON (opcional, sem banco de dados).

## Como usar
1. Coloque todos os arquivos em um servidor PHP (por exemplo, XAMPP, MAMP ou PHP embutido).
2. Acesse `index.php` pelo navegador.
3. Em *Dicas*, envie uma dica; o arquivo `tips.json` será criado automaticamente no mesmo diretório.

## Observações / Possíveis melhorias
- Implementar autenticação, paginação das dicas, ou um banco de dados MySQL (opcional).
- Substituir a imagem remota por imagens locais para uso offline.
- Melhorar validação do formulário e sanitização adicional.

---

Desenvolvido para atender aos requisitos da atividade. Se quiser, eu adapto o design (cores/fonte), adiciono um banco de dados MySQL, ou transformo a listagem de destinos em CRUD completo.
