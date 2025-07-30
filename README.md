# Meus Cursos

Plataforma web para gerenciamento de cursos online com PHP, MySQL e Docker.

## 🚀 Execução Rápida

```bash
git clone <URL_DO_REPOSITORIO>
cd desafio_revvo
chmod +x setup-permissions.sh
./setup-permissions.sh
docker compose up --build
```

**Acesso:**
- Site: http://localhost:8080
- phpMyAdmin: http://localhost:8081

## 📋 Pré-requisitos

- Docker e Docker Compose
- Git

## 🛠️ Tecnologias

- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap Icons
- **Backend:** PHP 8.2, Apache
- **Banco:** MySQL 8.0
- **DevOps:** Docker, phpMyAdmin

## 📁 Estrutura

```
desafio_revvo/
├── index.php              # Página principal
├── course.php             # Página do curso
├── api/courses.php        # API REST
├── config/                # Configurações
├── assets/                # CSS, JS, imagens
├── database/init.sql      # Script do banco
└── docker-compose.yml     # Docker
```

## ⚙️ Configuração (.env)

```env
# Docker (padrão)
DB_HOST=db
DB_NAME=leo_learning
DB_USER=user
DB_PASS=user123
SITE_NAME=LEO Learning
```

## 🔧 Comandos Úteis

```bash
# Ver status
docker compose ps

# Parar
docker compose down

# Logs
docker compose logs -f

# Reconstruir
docker compose down && docker compose up --build
```

## 🆘 Problemas Comuns

**Porta ocupada:**
```bash
sudo lsof -i :8080
kill -9 PID
```

**Permissões:**
```bash
sudo chown -R $USER:$USER .
chmod -R 777 assets/images/courses/
```

**Container não inicia:**
```bash
docker compose logs
docker compose down -v
docker compose up --build
```

## 🚀 Execução Sem Docker (Alternativa)

<details>
<summary>Clique para expandir instruções locais</summary>

### Pré-requisitos
- PHP 8.2+, MySQL 8.0+, Apache/Nginx

### Passos
1. Clone e configure:
```bash
git clone <URL_DO_REPOSITORIO>
cd desafio_revvo
cp .env.example .env
```

2. Configure `.env` para local:
```env
DB_HOST=localhost
DB_USER=root
DB_PASS=sua_senha
```

3. Configure banco:
```bash
mysql -u root -p < database/init.sql
```

4. Inicie servidor:
```bash
php -S localhost:8080
```

</details>

## 📋 Funcionalidades

- ✅ Design responsivo
- ✅ Modal de boas-vindas
- ✅ Carrossel automático
- ✅ CRUD de cursos
- ✅ Upload de imagens
- ✅ API REST

## 🔗 API Endpoints

```http
GET    /api/courses.php     # Listar cursos
GET    /api/courses.php?id=1 # Buscar por ID
POST   /api/courses.php     # Criar curso
PUT    /api/courses.php?id=1 # Atualizar curso
DELETE /api/courses.php?id=1 # Deletar curso
```