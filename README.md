# Desafio Gerenciador de Filmes

## Descrição

Este projeto é um gerenciador de filmes desenvolvido em PHP. Ele permite que os usuários adicionem, visualizem e avaliem filmes de uma lista.

## Funcionalidades Implementadas

- **Adicionar Filme**: Permite adicionar um novo filme à lista com título, descrição, categoria e ano de lançamento.
- **Visualizar Filmes**: Exibe a lista de filmes adicionados.
- **Avaliar Filme**: Permite avaliar um filme da lista com uma nota de 1 a 5 estrelas e um comentário.

## Estrutura do Projeto

- `index.template.php`: Página principal do gerenciador de filmes.
- `login.view.php`: Página principal de login.
- `explore.component.php`: Página para visualizar filmes existentes.
- `movie-create.view.php`: Página para adicionar novos filmes.
- `myMovies.component.php`: Página para ver os meus filmes adicionados.
- `movie.controller.php`: Arquivo que contém a lógica para manipulação dos filmes.
- `login.controller.php`: Arquivo que contém a lógica para o login na página.

## Como Executar

1. Clone o repositório para o seu ambiente local.
2. Certifique-se de ter o PHP instalado.
3. Navegue até o diretório do projeto.
4. Inicie o servidor PHP com o comando:

```bash
php -S localhost:8000 -t public/
```

5. Acesse o gerenciador de filmes através do navegador em `http://localhost:8000`.

## Tecnologias Utilizadas

- PHP
- JavaScript
- HTML
- Tailwind CSS

## Licença

Este projeto está licenciado sob a [MIT License](https://opensource.org/license/mit).