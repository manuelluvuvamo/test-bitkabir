# TestBitkabir

## Tecnologias Utilizadas e Justificativa

- **PHP**: Usado para scripts do lado do servidor e para lidar com a lógica de backend.
- **Laravel**: Um framework PHP que simplifica tarefas comuns como roteamento, autenticação e cache.
- **MySQL**: Um sistema de gerenciamento de banco de dados relacional usado para armazenar dados de usuários.
- **JavaScript**: Usado para scripts do lado do cliente para melhorar a interação do usuário.
- **HTML/CSS**: Usado para criar e estilizar as páginas da web.

## Guia Passo a Passo para Rodar o Projeto

### Passo 1: Instalar PHP e Composer
- PHP é a linguagem de programação usada para este projeto.
- Composer é uma ferramenta para gerenciar dependências no PHP.

1. Vá para o [site do PHP](https://www.php.net/downloads) e baixe a versão mais recente.
2. Siga as instruções para instalar o PHP no seu computador.
3. Vá para o [site do Composer](https://getcomposer.org/download/) e baixe o Composer.
4. Siga as instruções para instalar o Composer no seu computador.

### Passo 2: Clonar o Repositório do Projeto
- Isso significa que você fará uma cópia do projeto no seu computador.

1. Abra seu terminal ou prompt de comando.
2. Digite `git clone <repository-url>` e pressione Enter.
3. Substitua `<repository-url>` pela URL do repositório do projeto.

### Passo 3: Instalar Dependências do Projeto
- Dependências são como ferramentas que o projeto precisa para funcionar.

1. Navegue até a pasta do projeto no seu terminal ou prompt de comando.
2. Digite `composer install` e pressione Enter.
3. Isso instalará todas as dependências do PHP.
4. Digite `npm install` e pressione Enter.
5. Isso instalará todas as dependências do JavaScript.

### Passo 4: Configurar o Banco de Dados
- O banco de dados é onde todos os dados são armazenados.

1. Certifique-se de que você tem o MySQL instalado no seu computador.
2. Crie um novo banco de dados para o projeto.
3. Copie o arquivo `.env.example` para um novo arquivo chamado `.env`.
4. Abra o arquivo `.env` e atualize as configurações do banco de dados para corresponder à sua configuração do MySQL.
5. Digite `php artisan migrate` no seu terminal e pressione Enter.
6. Isso criará todas as tabelas necessárias no seu banco de dados.

### Passo 5: Rodar o Projeto
- Agora você pode iniciar o projeto e vê-lo em ação.

1. Digite `php artisan serve` no seu terminal e pressione Enter.
2. Abra seu navegador e vá para `http://localhost:8000`.
3. Você deve ver o projeto rodando!

Parabéns! Você configurou e rodou o projeto com sucesso.
