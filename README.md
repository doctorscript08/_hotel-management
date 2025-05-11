# 🏨 Sistema de Gestão Hoteleira

Projecto escolar de um sistema completo para gestão de hotéis, desenvolvido com foco em simular a rotina real de um estabelecimento hoteleiro. O sistema permite que clientes, funcionários e administradores acessem funcionalidades específicas, como reservas, controle de quartos, serviços extras e simulação de pagamentos.

## 🔧 Tecnologias Utilizadas
- HTML5
- CSS3
- JavaScript
- PHP
- MySQL

## 👨‍💻 Desenvolvedores
Desenvolvido por:
- Kelson de Sousa, responsável pelo **back-end**
- Sérgio Sapalalo, responsável pelo **front-end**

## 🧩 Funcionalidades

### 👤 Clientes
- Cadastro e login
- Reservas de quartos
- Pagamentos
- Edição e exclusão de reservas

### 👥 Funcionários
- Login com permissões específicas
- Criação de reservas (inclusive para clientes não cadastrados)
- Edição e exclusão de reservas
- Gerenciamento de quartos e serviços extras
- Controle de pagamentos

### 👑 Administradores
- Acesso a todas as funcionalidades dos funcionários
- Gerenciamento de preços dos quartos e serviços extras
- Adição, edição e exclusão de funcionários

### 💳 Simulação de Pagamentos
O sistema calcula automaticamente os valores das reservas com base em:
- Duração da estadia
- Tipo de quarto
- Serviços adicionais

## 🔐 Controle de Acesso
Usuários são separados por níveis de acesso:
- Cliente
- Funcionário
- Administrador

## 📁 Estrutura do Projeto
- `/frontend`: arquivos HTML, CSS e JS
- `/backend`: scripts PHP e lógica do sistema
- `/sql`: script de criação do banco de dados (MySQL)

## 🚀 Como Rodar o Projeto
1. Clone este repositório
2. Importe o banco de dados usando o arquivo `.sql`
3. Configure o servidor local (XAMPP, WAMP, etc.)
4. Acesse o sistema pelo navegador: `http://localhost/_hotel-management`