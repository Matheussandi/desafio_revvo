# Meus Cursos

Plataforma web para gerenciamento de cursos online.

## Funcionalidades

- [x] Design responsivo (mobile, tablet, desktop)
- [x] Modal de boas-vindas
- [x] Slider de apresentação automático
- [x] Cards de cursos organizados
- [x] CRUD de cursos

## Tecnologias

**Frontend:**
- HTML5, CSS3, JavaScript ES6+
- Bootstrap Icons

**Backend:**
- PHP 8.2
- Apache

**Database:**
- MySQL 8.0

**DevOps:**
- Docker & Docker Compose
- phpMyAdmin

## Como Executar

### Pré-requisitos
- Docker e Docker Compose
- Git

### Instalação

1. **Clone o repositório:**
```bash
git clone <URL_DO_REPOSITORIO>
cd <NOME_DO_PROJETO>
```

2. **Configure as permissões:**
```bash
chmod +x setup-permissions.sh
./setup-permissions.sh
```

3. **Execute com Docker:**
```bash
docker compose up --build
```

4. **Acesse a aplicação:**
- Site: http://localhost:8080
- phpMyAdmin: http://localhost:8081

## Estrutura do Projeto

```
projeto/
├── index.php              # Página principal
├── course.php             # Página de curso
├── config/                # Configurações
├── api/                   # API endpoints
├── assets/                # CSS, JS e imagens
├── database/              # Scripts SQL
├── docker-compose.yml     # Docker
└── Dockerfile            # Imagem PHP
```

## Configuração

O projeto usa variáveis de ambiente no arquivo `.env`:

```env
# Banco de Dados
DB_HOST=db
DB_NAME=meus_cursos
DB_USER=user
DB_PASS=user123

# Aplicação
APP_ENV=development
APP_DEBUG=true
SITE_NAME=LEO Learning
```

## Banco de Dados

**Acesso:**
- **Host:** localhost:3306
- **Usuário:** user / Senha: user123
- **Root:** root / Senha: root123

**Via phpMyAdmin:** http://localhost:8081

## Comandos Úteis

```bash
# Ver status dos containers
docker compose ps

# Parar containers
docker compose down

# Ver logs
docker compose logs -f

# Rebuild
docker compose down
docker compose up -d --build
```

## Troubleshooting

**Porta em uso:**
```bash
sudo lsof -i :8080
```

**Problemas de permissão:**
```bash
sudo chown -R $USER:$USER .
chmod -R 755 assets/
```

**Container não inicia:**
```bash
docker compose logs
docker compose down -v
docker compose up -d --build
```