# Meus Cursos

Sistema web para gerenci#### Como executar

1. **Clone o repositório e navegue até o diretório:**
```bash
git clone <url-do-repositorio>
cd desafio_revvo
```

2. **Configure as variáveis de ambiente:**
```bash
cp .env.example .env
```
Edite o arquivo `.env` conforme necessário. **Importante:** O Docker Compose usa automaticamente as variáveis definidas no `.env`.

3. **Construir e iniciar os containers:**
```bash
docker-compose up -d --build
```
Cursos desenvolvido em PHP.

## 📋 Sobre o Projeto

O "Meus Cursos" é um sistema web simples e eficiente para gerenciar cursos, permitindo organizar e acompanhar o progresso de estudos de forma intuitiva.

## 🚀 Tecnologias Utilizadas

- **PHP** - Linguagem principal do backend
- **HTML5** - Estrutura das páginas
- **CSS3** - Estilização e responsividade
- **JavaScript** - Interatividade do frontend
- **MySQL** - Banco de dados (futuro)

## 📁 Estrutura do Projeto

```
desafio_revvo/
├── index.php              # Página principal
├── config/
│   └── config.php         # Configurações do sistema
├── assets/
│   ├── css/
│   │   └── style.css      # Estilos principais
│   └── js/
│       └── script.js      # Scripts JavaScript
└── README.md              # Documentação
```

## 🌍 Variáveis de Ambiente

O projeto utiliza variáveis de ambiente para configuração. Copie o arquivo `.env.example` para `.env` e ajuste conforme necessário:

```bash
cp .env.example .env
```

### Principais variáveis:

- `DB_HOST` - Host do banco de dados
- `DB_NAME` - Nome do banco de dados
- `DB_USER` - Usuário do banco
- `DB_PASS` - Senha do banco
- `APP_ENV` - Ambiente (development/production)
- `APP_DEBUG` - Habilitar/desabilitar debug
- `SITE_NAME` - Nome da aplicação
- `SITE_URL` - URL base da aplicação

## ⚙️ Configuração

### Opção 1: Usando Docker (Recomendado)

#### Pré-requisitos
- Docker instalado
- Docker Compose instalado

#### Como executar

1. **Clone o repositório e navegue até o diretório:**
```bash
git clone <url-do-repositorio>
cd desafio_revvo
```

2. **Construir e iniciar os containers:**
```bash
docker compose up -d --build
```

3. **Acessar a aplicação:**
- **Aplicação Web:** http://localhost:8080
- **phpMyAdmin:** http://localhost:8081
  - Usuário: `root`
  - Senha: `root123`

#### Comandos úteis do Docker

**Parar os containers:**
```bash
docker compose down
```

**Ver logs dos containers:**
```bash
docker compose logs -f
```

**Reiniciar apenas um serviço:**
```bash
docker compose restart web
```

**Executar comandos dentro do container web:**
```bash
docker compose exec web bash
```

**Ver containers em execução:**
```bash
docker compose ps
```

#### Banco de Dados (Docker)

O Docker Compose agora usa as variáveis do arquivo `.env`:
- **Host:** db (dentro dos containers) / localhost:3306 (do host)
- **Banco:** Valor da variável `DB_NAME`
- **Usuário:** Valor da variável `DB_USER`
- **Senha:** Valor da variável `DB_PASS`
- **Usuário adicional:** user / user123

**Importante:** As configurações do MySQL (senha root, nome do banco) são automaticamente definidas pelas variáveis do `.env`.

O banco já vem pré-configurado com:
- Tabela `categorias` (Programação, Design, Marketing, etc.)
- Tabela `cursos` com relacionamento e dados de exemplo

#### Troubleshooting Docker

**Porta já em uso:**
Se as portas 8080, 8081 ou 3306 estiverem em uso, você pode alterá-las no `docker compose.yml`.

**Problemas de permissão:**
```bash
sudo chown -R $USER:$USER .
```

**Limpar volumes (ATENÇÃO: apaga dados do banco):**
```bash
docker compose down -v
```

### Opção 2: Configuração Manual

1. Clone o repositório
2. Configure o servidor web (Apache/Nginx)
3. Ajuste as configurações em `config/config.php`
4. Configure o banco de dados MySQL
5. Execute o script `database/init.sql`

## 🔧 Requisitos

### Com Docker:
- Docker
- Docker Compose

### Sem Docker:
- PHP 7.4 ou superior
- Servidor web (Apache/Nginx)
- MySQL 5.7 ou superior

## 📝 Funcionalidades Planejadas

- [ ] Cadastro de cursos
- [ ] Gerenciamento de categorias
- [ ] Acompanhamento de progresso
- [ ] Sistema de usuários
- [ ] Dashboard administrativo

## 🤝 Contribuição

Este é um projeto em desenvolvimento. Novas funcionalidades serão adicionadas gradualmente.

## 📄 Licença

Este projeto está sob licença MIT.

---

Desenvolvido com ❤️ para organizar seus estudos!
