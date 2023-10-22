<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>unheimlich</title>
</head>
<body>
    <div class="acc">
        <form id="userForm" method="POST">
            <input type="text" name="name" id="name" placeholder="Nome">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="text" name="msg" id="msg" placeholder="Mensagem">
            <button type="submit">insert</button>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="md"></div>
            <table class="table-bordered">
            <h1>UNHEIMLICH</h1>
                <thead>
               
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Mensagem</th>
                   
                </thead>
                <tbody id="table-body">
                </tbody>
            </table>
        </div>
    </div>
    <script>
       const form = document.getElementById('userForm');
form.addEventListener('submit', async event => {
    event.preventDefault();
    const formData = new FormData(form);

    console.log([...formData]); // Verificar o conteúdo do formData

    const data = await fetch('form.php', {
        method: 'POST',
        body: formData
    });

    const response = await data.json();
    console.log(response);

    // Limpar o formulário após o envio
    form.reset();
});

    // Atualizar a tabela com os novos dados
    fetch('gh.php')
        .then(res => res.json())
        .then(response => {
            console.log(response);
            const tableBody = document.getElementById('table-body');
            tableBody.innerHTML = ''; // Limpar o conteúdo atual da tabela

            response.forEach(row => {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `<td>${row.id}</td><td>${row.nome}</td><td>${row.email}</td><td>${row.msg}</td>`;
                tableBody.appendChild(newRow);
            });
        })
        .catch(error => console.log(error));

    </script>
</body>
</html>
<?php 

?>
