````markdown
# 🧱 Projeto Fullstack Monolítico: Laravel + Vue.js + Inertia.js

Este é um projeto fullstack monolítico que integra Laravel (backend) com Vue.js 3(frontend)  

---

## 🛠️ Stack Tecnológica

- **Backend**: PHP ^8.1, Laravel ^10.x, Composer
- **Frontend**: Vue.js 3, Vite, TailwindCSS, Inertia.js
- **Banco de Dados**: MySQL / PostgreSQL / SQLite (ajustável)
- **Ambiente**: Node.js ^18.x+, NPM ou Yarn

---

## ⚙️ Pré-requisitos

Certifique-se de ter os seguintes softwares instalados:

| Ferramenta    | Versão Recomendável  |
|---------------|----------------------|
| PHP           | >= 8.1               |
| Composer      | 2.x                  |
| Node.js       | >= 18                |
| NPM / Yarn    | >= 8                 |
| MySQL/Postgre | Versão recente       |
| Git           | Qualquer             |

---

## 🚀 Setup Local

### 1. Clone o repositório

```bash
git clone https://github.com/joaojp900/seu-projeto-monolitico
cd seu-projeto-monolitico
````

### 2. Instale dependências do Laravel

```bash
composer install
```

### 3. Instale dependências do Vue.js

```bash
npm install
```

### 4. Configure o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

⚠️ **Importante**: sem a chave da aplicação, o sistema não funcionará corretamente.

### 5. Configure o banco de dados

Edite o `.env` conforme seu ambiente:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### 6. Execute as migrations

```bash
php artisan migrate
```

### 7. Inicie o front-end (Vite)

```bash
npm run dev
# ou
npm run build  # Para produção
```

### 8. Inicie o servidor Laravel

```bash
php artisan serve
```

Acesse via [http://localhost:8000](http://localhost:8000)

---

## 📁 Estrutura de Diretórios

```
├── app/                  # Backend (Laravel)
├── resources/
│   ├── js/               # Frontend (Vue.js)
│   └── views/            # Blade templates (Inertia)
├── routes/web.php        # Rotas Web
├── public/               # Arquivos públicos
├── .env                  # Variáveis de ambiente
└── vite.config.js        # Configuração do Vite
```

---

## 📦 Comandos Úteis

| Tarefa                 | Comando                    |
| ---------------------- | -------------------------- |
| Iniciar Laravel        | `php artisan serve`        |
| Iniciar Vite (dev)     | `npm run dev`              |
| Compilar front (prod)  | `npm run build`            |
| Executar migrations    | `php artisan migrate`      |
| Gerar chave do app     | `php artisan key:generate` |
| Rodar testes (PHPUnit) | `php artisan test`         |

---

## 🧃 Dicas de Ambiente

* Para macOS, use [Laravel Herd](https://herd.laravel.com/)
* Para Windows, use [Laragon](https://laragon.org/)
* Para autenticação pronta, considere utilizar **Laravel Breeze** ou **Jetstream**

---
---

## 📄 Licença

Distribuído sob a licença **MIT**. Veja `LICENSE.md` para mais informações.

---
