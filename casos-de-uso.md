# Casos de Uso

## Lista de casos de uso

 Cadastro de usuários
 Cadastro de produtos
 Gerenciamento de usuários cadastrados
 Login
 Consulta de produtos
 Gerenciamento de produtos

## Atores

  Usuário;
  Administrador
  
## Diagrama de Casos de Uso

### CDU 01 

Inclusão de usuários

**Fluxo Principal**

1. O Sistema apresenta um formulário com os campos do usuário a ser registrado
2. O administrador insere e-mail, senha e nome de usuário
3. O administrador clica em “Registrar-se”
4. O sistema valida os dados e cadastra o usuário no sistema

**Fluxo alternativo A**

1. O Sistema apresenta um formulário com os campos do usuário a ser registrado
2. O administrador insere e-mail, senha e nome de usuário;
3. O administrador clica em “Registrar-se”;
4. O sistema informa que um usuário registrado com esse e-mail
já existe e retorna ao fluxo principal;

**Fluxo alternativo B**

1. O Sistema apresenta um formulário com os campos do usuário a ser registrado;
2. O administrador insere e-mail, senha e nome de usuário;
3. O usuário clica em “Registrar-se”;
4. O sistema informa que um usuário registrado com esse nome de usuário já existe e retorna ao fluxo principal;

**Fluxo alternativo C**

1. O Sistema apresenta um formulário com os campos do usuário a ser registrado;
2. O usuário insere e-mail, senha e nome de usuário;
3. O usuário clica em “Registrar-se”;
4. O sistema informa que a senha é invalida pois tem um número de carácteres menor que 6 e retorna ao fluxo principal;

### CDU 02

Inclusão de produtos

**Fluxo Principal**

1. Em uma aba de administrador, o sistema de apresentar um formulário de cadastro de produtos;
2. O administrador deve inserir o código, o nome, o preço e a descrição do produto;
3. Oadministrador deveclicar emumbotão“Confirmar”;
4. O sistema deve avaliar os dados e cadastrar um novo produto no catálogo principal;

**Fluxo alternativo A**

1. Em uma aba de administrador, o sistema deve apresentar um formulário de cadastro de produtos;
2. O administrador deve inserir o código, o nome, o preço e a descrição do produto;
3. O administrador deveclicar em umbotão “Confirmar”;
4. O sistema informa que já existe um produto registrado com esse código e retorna ao fluxo principal;

**Fluxo alternativo B**

1. Em uma aba de administrador, o sistema deve apresentar um formulário de cadastro de produtos;
2. O administrador deve inserir o código, o nome e a descrição do produto;
3. Oadministradordeveclicar emumbotão“Confirmar”;
4. O sistema informa que já existe um produto registrado com esse nome e retorna ao fluxo principal;

**Fluxo alternativo C**

1. Em uma aba de administrador, o sistema deve apresentar um formulário de cadastro de produtos;
2. O administrador deve inserir o código, o nome e a descrição do produto;
3. Oadministradordeveclicar emumbotão“Confirmar”;
4. O sistema informa que o preço registrado não é válido e retorna ao fluxo principal;

### CDU 03

Exclusão de usuários 

**Fluxo Principal**

1. O administrador deve ter acesso á uma aba que liste todos os usuários cadastrados;
2. O administrador seleciona o usuário que deseja alterar;
3. Uma opção de “Apagar” devese disponibilizar;
4. Ao clicar na opção o usuário deve ser deletado e perderá o acesso ao sistema;

**Fluxo alternativo A**

1. O administrador deve ter acesso á uma aba que liste todos os usuários cadastrados;
2. O administrador seleciona o usuário que deseja deletar;
3. Uma opção de “Apagar” devese disponibilizar;
4. Ao clicar na opção o sistema informa que o usuário não foi encontrado no banco de dados;

### CDU 04

Exclusão de produtos

**Fluxo Principal**

1. O administrador deve ter acesso á uma aba que liste todos os produtos cadastrados;
2. O administrador seleciona o usuário que deseja deletar;
3. Uma opção de “Apagar” devese disponibilizar;
4. Ao clicar na opção o produto deve ser deletado do sistema;

**Fluxo alternativo A**

1. O administrador deve ter acesso á uma aba que liste todos os produtos cadastrados;
2. O administrador seleciona o produto que deseja deletar;
3. Uma opção de “Apagar” devese disponibilizar;
4. Ao clicar na opção o sistema informa que o produto não foi encontrado no banco de dados;

### CDU 05

Alteração de produtos

**Fluxo Principal**

1. O administrador deve ter acesso a uma aba com todos os produtos cadastrados;
2. Ao clicar em um produto ele deve ser redirecionado a uma página de alteração de dados do produto;
3. O administrador altera os campos de nome, descrição, preço e código do produto, e clica em um botão de confirmação;
4. O sistema valida os dados e altera as informações do produto;

**Fluxo alternativo A**

1. O administrador deve ter acesso a uma aba com todos os produtos cadastrados;
2. Ao clicar em um produto ele deve ser redirecionado a uma página de alteração de dados do produto;
3. O administrador altera os campos de nome,descrição, preço e código do produto, e clica em um botão de confirmação;
4. O sistema informa que já há um produto cadastrado com o código digitado e retorna ao fluxo principal;

**Fluxo alternativo B**

1. O administrador deve ter acesso a uma aba com todos os produtos cadastrados;
2. Ao clicar em um produto ele deve ser redirecionado a uma página de alteração de dados do produto;
3. O administrador altera os campos de nome, descrição, preço e código do produto, e clica em um botão de confirmação;
4. O sistema informa que já há um produto cadastrado com o nome digitado e retorna ao fluxo principal;

**Fluxo alternativo C**

1. O administrador deve ter acesso a uma aba com todos os produtos cadastrados;
2. Ao clicar em um produto ele deve ser redirecionado a uma página de alteração de dados do produto;
3. O administrador altera os campos de nome, descrição, preço e código do produto, e clica em um botão de confirmação;
4. O sistema informa queo preço digitado não é valido e retorna ao fluxo principal;

### CDU 06

Alteração de usuários

**Fluxo Principal**

1. O administrador deve ter acesso a uma aba com todos os usuários cadastrados;
2. Ao clicar em um usuário ele deve ser redirecionado a uma página de alteração de dados do usuário;
3. O administrador altera os campos de e-mail, senha e nome de usuário e clica em um botão de confirmação;
4. O sistema valida os dados e altera as informações do produto;

**Fluxo alternativo A**

1. O administrador deve ter acesso a uma aba com todos os usuários cadastrados;
2. Ao clicar em um usuário, ele deve ser redirecionado a uma página de alteração de dados do usuário;
3. O administrador altera os campos de e-mail, senha e nome de usuário e clica em um botão de confirmação;
4. O sistema informa que já há um usuário cadastrado com o nome de usuário digitado e retorna ao fluxo principal;

**Fluxo alternativo B**

1. O administrador deve ter acesso a uma aba com todos os usuários cadastrados;
2. Ao clicar em um usuário, ele deve ser redirecionado a uma página de alteração de dados do usuário;
3. O administrador altera os campos de e-mail, senha e nome de usuário e clica em um botão de confirmação;
4. O sistema informa que já há um usuário cadastrado com o email digitado e retorna ao fluxo principal;

**Fluxo alternativo C**

1. O administrador deve ter acesso a uma aba com todos os usuários cadastrados;
2. Ao clicar em um usuário, ele deve ser redirecionado a uma página de alteração de dados do usuário;
3. O administrador altera os campos de e-mail, senha e nome de usuário e clica em um botão de confirmação;
4. O sistema informa que já a senha digitada possuí um tamanho menor que 6 carácteres e retorna ao fluxo principal;

### CDU 07

Consulta de produtos

**Fluxo Principal**

1. Aos usuários e administradores deve ser apresentada uma tela contendo todos os produtos cadastrados no sistema;
2. Ao clicar em um produto, o usuário deve ser redirecionado para uma página mostrando as informações do produto;
3. Ao clicar em um botão “Comprar”, o usuário deve ser redirecionado para uma página de pagamento;

### CDU 08

Consulta de usuários

**Fluxo Principal**

1. Aos administradores deve ser apresentada uma tela contendo todos os usuários cadastrados no sistema;
2. Ao clicar em um usuário, o administrador deve ser redirecionado para uma página mostrando as informações do usuário;
