# LEO Learning - Meus Cursos

Sistema web moderno para gerenciamento de cursos online com interface responsiva e experiência otimizada desenvolvido em PHP.

## 📋 Sobre o Projeto

O "LEO Learning" é uma plataforma completa de gerenciamento de cursos que combina design moderno, funcionalidades interativas e uma experiência de usuário intuitiva. O projeto apresenta uma landing page responsiva com slider de apresentação, sistema de busca, modal de boas-vindas e cards organizados de cursos.

## ✨ Funcionalidades Implementadas

### 🎨 Interface e Design
- **Design Responsivo** - Layout adaptável para desktop, tablet e mobile
- **Logo SVG Personalizada** - Identidade visual do LEO Learning
- **Header Responsivo** - Logo, busca e perfil organizados para cada dispositivo
- **Footer Moderno** - Informações de contato e redes sociais
- **Ícones Bootstrap** - Biblioteca completa de ícones

### 🎯 Funcionalidades Interativas
- **Modal de Boas-vindas** - Apresentação automática na primeira visita
- **Hero Slider** - Carrossel automático com 3 slides de apresentação
- **Sistema de Busca** - Campo de pesquisa funcional (placeholder para implementação)
- **Cards de Curso** - Layout moderno com badges e botões de ação
- **Navegação Suave** - Scroll suave entre seções da página

### � Responsividade
- **Layout Mobile-First** - Otimizado para dispositivos móveis
- **Header Adaptativo** - Reorganização inteligente em telas menores
- **Grid Responsivo** - Cards se adaptam ao tamanho da tela
- **Footer Centralizado** - Layout otimizado para mobile

### 🔧 Funcionalidades Técnicas
- **Sistema de Notificações** - Feedback visual para ações do usuário
- **LocalStorage** - Persistência de dados do modal de primeira visita
- **Modo Debug** - Ferramentas de desenvolvimento integradas
- **Configuração por Ambiente** - Sistema robusto de variáveis de ambiente

## 🚀 Como Executar o Projeto

### Pré-requisitos
- Docker e Docker Compose instalados
- Git para clonar o repositório

### Passos para Instalação

1. **Clone o repositório**
```bash
git clone <seu-repositorio>
cd desafio_revvo
```

2. **Configure as permissões** (importante!)
```bash
./setup-permissions.sh
```

3. **Execute o projeto com Docker Compose**
```bash
docker compose up --build
```

4. **Acesse a aplicação**
- Site principal: http://localhost:8080
- phpMyAdmin: http://localhost:8081

### ⚠️ Importante - Permissões de Upload

Se você estiver configurando o projeto pela primeira vez ou em uma nova máquina, execute o script de permissões para garantir que o upload de imagens funcione corretamente:

```bash
chmod +x setup-permissions.sh
./setup-permissions.sh
```

Este script configura as permissões necessárias para o diretório `assets/images/courses/` onde as imagens dos cursos são armazenadas.

### Frontend
- **HTML5** - Estrutura semântica moderna
- **CSS3** - Flexbox, Grid, Media Queries, Animações
- **JavaScript ES6+** - Interatividade e funcionalidades dinâmicas
- **Bootstrap Icons** - Biblioteca de ícones via CDN

### Backend
- **PHP 8.2** - Linguagem principal do backend
- **Apache** - Servidor web

### Database
- **MySQL 8.0** - Banco de dados relacional

### DevOps e Infraestrutura
- **Docker** - Containerização da aplicação
- **Docker Compose** - Orquestração de serviços
- **phpMyAdmin** - Interface de administração do banco

## 📁 Estrutura do Projeto

```
desafio_revvo/
├── index.php                 # Página principal (landing page)
├── config/
│   └── config.php           # Configurações do sistema
├── assets/
│   ├── css/
│   │   └── style.css        # Estilos principais (responsivo)
│   ├── js/
│   │   └── script.js        # Scripts JavaScript
│   └── images/
│       ├── logo.svg         # Logo do LEO Learning
│       └── profile.webp     # Imagem de perfil
├── database/
│   └── init.sql            # Script de inicialização do banco
├── docker-compose.yml       # Configuração dos containers
├── Dockerfile              # Imagem personalizada do PHP
├── .env                    # Variáveis de ambiente (local)
├── .env.example           # Template das variáveis
└── README.md              # Documentação do projeto
```

## � Funcionalidades Detalhadas

### Modal de Boas-vindas
- Aparece automaticamente na primeira visita
- Persistência via LocalStorage
- Design responsivo com call-to-action
- Botão de reset para desenvolvimento/debug

### Hero Slider
- **3 slides automáticos** com transição suave (5 segundos)
- **Navegação manual** com setas e indicadores
- **Botões de ação** que direcionam para a seção de cursos
- **Conteúdo dinâmico**: "Transforme sua Carreira", "Organize seus Estudos", "Aprenda no seu Ritmo"

### Sistema de Cursos
- **5 cursos pré-definidos**: PHP, Design UI/UX, Marketing Digital, JavaScript, React.js
- **Badges de destaque** para cursos novos
- **Card de adição** para novos cursos
- **Botões "VER CURSO"** com notificação de funcionalidade em desenvolvimento

### Header Responsivo
- **Desktop**: Logo à esquerda, busca e perfil à direita
- **Mobile**: Logo, busca e perfil em linha única
- **Busca funcional** com placeholder para implementação futura
- **Perfil interativo** com informações do usuário

### Footer Completo
- **Logo e descrição** da empresa
- **Informações de contato**: telefone e email
- **Redes sociais**: Twitter, YouTube, Pinterest com ícones
- **Layout responsivo** com reorganização para mobile

## 🌍 Variáveis de Ambiente

O projeto utiliza um sistema robusto de configuração via arquivo `.env`:

```env
# Banco de Dados
DB_HOST=db
DB_NAME=meus_cursos
DB_USER=user
DB_PASS=user123

# Configurações da Aplicação
APP_ENV=development
APP_DEBUG=true
SITE_NAME=LEO Learning
SITE_URL=http://localhost:8080

# MySQL Root (Docker)
MYSQL_ROOT_PASSWORD=root123
MYSQL_DATABASE=meus_cursos
MYSQL_USER=user
MYSQL_PASSWORD=user123
```

### Principais Configurações:

- `DB_*` - Configurações do banco de dados
- `APP_ENV` - Ambiente (development/production)
- `APP_DEBUG` - Habilitar funcionalidades de debug
- `SITE_NAME` - Nome da aplicação exibido no sistema
- `SITE_URL` - URL base da aplicação

## ⚙️ Instalação e Configuração

### Pré-requisitos
- **Docker** (versão 20.0 ou superior)
- **Docker Compose** (versão 2.0 ou superior)
- **Git** para clonar o repositório

### 🐳 Instalação com Docker (Recomendado)

1. **Clone o repositório:**
```bash
git clone https://github.com/Matheussandi/desafio_revvo.git
cd desafio_revvo
```

2. **Configure as variáveis de ambiente:**
```bash
cp .env.example .env
# Edite o arquivo .env se necessário (as configurações padrão funcionam)
```

3. **Construir e iniciar os containers:**
```bash
docker compose up -d --build
```

4. **Acessar a aplicação:**
- **🌐 Aplicação Principal:** http://localhost:8080
- **🗄️ phpMyAdmin:** http://localhost:8081
  - **Usuário:** `root`
  - **Senha:** `root123`

### 🎯 Verificação da Instalação

Após executar os comandos acima, você deverá ver:
- ✅ Landing page do LEO Learning funcionando
- ✅ Modal de boas-vindas na primeira visita
- ✅ Slider automático funcionando
- ✅ Header responsivo
- ✅ Busca e botões interativos
- ✅ phpMyAdmin acessível

### 🔧 Comandos Úteis do Docker

**Ver status dos containers:**
```bash
docker compose ps
```

**Parar os containers:**
```bash
docker compose down
```

**Ver logs em tempo real:**
```bash
docker compose logs -f
```

**Reiniciar um serviço específico:**
```bash
docker compose restart web
```

**Acessar o container web:**
```bash
docker compose exec web bash
```

**Rebuild completo (após mudanças no Dockerfile):**
```bash
docker compose down
docker compose up -d --build
```

### 🗄️ Banco de Dados

O projeto utiliza **MySQL 8.0** com configuração automática via Docker:

**Configurações de Conexão:**
- **Host:** `db` (container) / `localhost:3306` (host)
- **Banco:** `meus_cursos`
- **Usuário principal:** `user` / Senha: `user123`
- **Usuário root:** `root` / Senha: `root123`

**Estrutura do Banco:**
- Tabela `categorias` - Categorias dos cursos
- Tabela `cursos` - Informações dos cursos
- Relacionamentos e dados de exemplo pré-carregados

**Acessos:**
- **Via phpMyAdmin:** http://localhost:8081
- **Via linha de comando:**
```bash
docker compose exec db mysql -u root -p
# Senha: root123
```

### 🛠️ Instalação Manual (Alternativa)

Caso prefira não usar Docker:

**Requisitos:**
- PHP 8.0 ou superior
- Apache/Nginx
- MySQL 5.7 ou superior
- Composer (opcional)

**Passos:**
1. Clone o repositório
2. Configure o servidor web apontando para o diretório do projeto
3. Importe o arquivo `database/init.sql` no MySQL
4. Ajuste as configurações em `config/config.php`
5. Configure as permissões de arquivo adequadas

## 🎨 Personalização e Desenvolvimento

### Cores e Tema
O projeto utiliza uma paleta de cores moderna definida no CSS:
- **Primária:** #333 (textos)
- **Secundária:** #6c757d (textos secundários)
- **Acentos:** #007bff (links e botões)
- **Background:** #f8f9fa (fundo da página)

### Responsividade
- **Breakpoint principal:** 768px (tablet/mobile)
- **Breakpoint secundário:** 480px (mobile pequeno)
- **Abordagem:** Mobile-first design

### Extensibilidade
O código foi estruturado para fácil extensão:
- **CSS modular** com comentários organizacionais
- **JavaScript com funções reutilizáveis**
- **PHP com configuração centralizadas**
- **Sistema de notificações** pronto para novas funcionalidades

## 📱 Compatibilidade

### Navegadores Suportados
- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+

### Dispositivos Testados
- ✅ Desktop (1920x1080, 1366x768)
- ✅ Tablet (768x1024)
- ✅ Mobile (375x667, 414x896)

## � Funcionalidades em Desenvolvimento

### Próximas Implementações
- [ ] **Sistema de Login/Cadastro** - Autenticação de usuários
- [ ] **Dashboard do Usuário** - Painel personalizado
- [ ] **Progresso de Cursos** - Acompanhamento de estudos
- [ ] **Sistema de Avaliação** - Notas e comentários
- [ ] **Categorias Dinâmicas** - Gestão via admin
- [ ] **Upload de Mídia** - Imagens e vídeos dos cursos
- [ ] **API REST** - Endpoints para mobile/integração

### Melhorias Planejadas
- [ ] **Performance** - Otimização de carregamento
- [ ] **SEO** - Meta tags e structured data
- [ ] **PWA** - Progressive Web App features
- [ ] **Internacionalização** - Suporte a múltiplos idiomas
- [ ] **Testes Automatizados** - Unit e integration tests

## 🚨 Troubleshooting

### Problemas Comuns

**🔴 Porta já em uso (8080, 8081, 3306):**
```bash
# Verificar processos usando as portas
sudo lsof -i :8080
sudo lsof -i :8081
sudo lsof -i :3306

# Alterar portas no docker-compose.yml se necessário
```

**🔴 Containers não iniciam:**
```bash
# Verificar logs detalhados
docker compose logs

# Rebuild completo
docker compose down -v
docker compose up -d --build
```

**🔴 Problemas de permissão:**
```bash
# Ajustar permissões (Linux/Mac)
sudo chown -R $USER:$USER .
chmod -R 755 assets/
```

**🔴 Banco de dados não conecta:**
```bash
# Verificar se o container do banco está rodando
docker compose ps

# Verificar logs do MySQL
docker compose logs db

# Resetar banco (CUIDADO: apaga dados)
docker compose down -v
docker compose up -d
```

**🔴 CSS/JS não carrega:**
- Verificar se os arquivos existem em `assets/css/` e `assets/js/`
- Limpar cache do navegador (Ctrl+F5)
- Verificar permissões dos arquivos

## 📊 Estrutura de Arquivos Detalhada

```
desafio_revvo/
├── 🐳 docker-compose.yml      # Orquestração Docker
├── 🐳 Dockerfile             # Imagem PHP personalizada
├── ⚙️ .env                   # Configurações locais
├── ⚙️ .env.example          # Template de configuração
├── 🏠 index.php             # Landing page principal
├── 📁 config/
│   └── config.php           # Configurações PHP
├── 📁 assets/
│   ├── 🎨 css/
│   │   └── style.css        # Estilos responsivos (959 linhas)
│   ├── ⚡ js/
│   │   └── script.js        # Funcionalidades interativas (340+ linhas)
│   └── 🖼️ images/
│       ├── logo.svg         # Logo LEO Learning
│       └── profile.webp     # Avatar do usuário
├── 🗄️ database/
│   └── init.sql            # Script inicial do banco
├── 📚 README.md            # Esta documentação
└── 🔒 .gitignore           # Arquivos ignorados pelo Git
```

## 🎯 Como Contribuir

### Fluxo de Desenvolvimento
1. **Fork** o repositório
2. **Clone** seu fork localmente
3. **Crie** uma branch para sua feature: `git checkout -b feature/nova-funcionalidade`
4. **Desenvolva** e **teste** suas alterações
5. **Commit** suas mudanças: `git commit -m "Adiciona nova funcionalidade"`
6. **Push** para sua branch: `git push origin feature/nova-funcionalidade`
7. **Abra** um Pull Request

### Padrões de Código
- **PHP:** PSR-12 coding standards
- **CSS:** Organização por seções com comentários
- **JavaScript:** ES6+ features, funções documentadas
- **Commits:** Mensagens descritivas em português

### Testando Alterações
```bash
# Rebuild após mudanças
docker compose down
docker compose up -d --build

# Verificar logs
docker compose logs -f web
```

## 📄 Licença e Créditos

### Licença
Este projeto está sob a **Licença MIT**. Veja o arquivo `LICENSE` para mais detalhes.

### Tecnologias
- **Bootstrap Icons** - Biblioteca de ícones
- **Docker** - Containerização
- **PHP** - Backend development
- **MySQL** - Database management

### Autor
**Matheus Sandi** - [GitHub](https://github.com/Matheussandi)