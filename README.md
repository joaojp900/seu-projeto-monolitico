 

````markdown
# 🧱 Projeto Monolítico Laravel + Vue.js

Este é um projeto fullstack monolítico desenvolvido com **Laravel (backend)** e **Vue.js (frontend)**, estruturado para funcionar em um único repositório e ambiente. A stack foi organizada utilizando o Inertia.js, o que permite a integração entre Vue e Laravel sem necessidade de API REST tradicional.

---

## 🛠️ Tecnologias Utilizadas

- PHP ^8.1
- Laravel ^10.x
- Composer
- Node.js ^18.x
- Vue.js 3
- Vite
- Inertia.js
- TailwindCSS
- MySQL ou PostgreSQL (pode ser adaptado para SQLite)

---

## ⚙️ Requisitos para rodar o projeto

Antes de começar, certifique-se de ter os seguintes softwares instalados:

| Requisito     | Versão Recomendada |
|---------------|--------------------|
| PHP           | >= 8.1             |
| Composer      | 2.x                |
| Node.js       | >= 18              |
| NPM ou Yarn   | >= 8               |
| MySQL/Postgre | Qualquer versão recente |
| Git           | Qualquer versão    |

---

## 🚀 Como rodar o projeto

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
````

### 2. Instale as dependências do Laravel

```bash
composer install
```

### 3. Instale as dependências do frontend (Vue.js)

```bash
npm install
```

### 4. Configure o arquivo `.env`

Crie uma cópia do arquivo `.env.example`:

```bash
cp .env.example .env
```

### 5. Gere a chave da aplicação ⚠️ **ESSENCIAL**

Laravel precisa de uma chave para criptografar sessões e dados sensíveis. Gere a chave com:

```bash
php artisan key:generate
```

> Se você pular essa etapa, o sistema apresentará erro ao iniciar: `No application encryption key has been specified.`

---

### 6. Configure o banco de dados

No arquivo `.env`, configure o acesso ao seu banco de dados:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### 7. Rode as migrations

```bash
php artisan migrate
```

> Isso vai criar as tabelas no banco de dados.

---

### 8. Suba o front-end (Vite)

Para rodar o Vue com recarregamento automático:

```bash
npm run dev
```

Ou para compilar a versão de produção:

```bash
npm run build
```

---

### 9. Suba o servidor local Laravel

```bash
php artisan serve
```

> Acesse em: [http://localhost:8000](http://localhost:8000)

---

## 📁 Estrutura do Projeto

```
├── app/                  # Backend (Laravel)
├── resources/js/         # Frontend (Vue.js)
├── resources/views/      # Blade templates (usado com Inertia)
├── routes/web.php        # Rotas Laravel
├── public/               # Arquivos públicos
├── .env                  # Configurações do ambiente
└── vite.config.js        # Configuração do Vite
```

---

## 📦 Comandos úteis

| Ação                     | Comando                    |
| ------------------------ | -------------------------- |
| Rodar servidor Laravel   | `php artisan serve`        |
| Rodar Vite (dev)         | `npm run dev`              |
| Compilar front para prod | `npm run build`            |
| Rodar migrations         | `php artisan migrate`      |
| Criar chave do app       | `php artisan key:generate` |

---

## 🧪 Testes (Opcional)

> Se houver testes, você pode rodar com:

```bash
php artisan test
```

---

## 🧃 Dicas

* Para ambiente local, recomenda-se usar o [Laravel Herd](https://herd.laravel.com/) (macOS) ou [Laragon](https://laragon.org/) (Windows).
* Para controle de versão, use Git com `.gitignore` configurado.
* Laravel Breeze ou Jetstream podem ser utilizados para autenticação pronta.

---

## 🤝 Contribuições

Contribuições são bem-vindas! Basta fazer um fork e abrir um pull request.

---

## 📝 Licença

Este projeto está sob a licença MIT. Consulte o arquivo `LICENSE.md` para mais detalhes.

---

```
 
 
