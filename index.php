<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <main class="container py-5">
        <h1 class="mb-4"> Cadastro de Carros</h1>

        <!-- FORMULÁRIO -->
        <div class="card mb-4">
            <div class="card-body">
                <h4 id="tituloFormulario"> Novo Carro </h4>

                <form id="formCarro">

                    <!------------- CAMPOS OCULTOS ----------------------------->
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="acao" name="acao" value="cadastrar">
                    <!-- ------------------------------------------------------->

                    <div class="mb-3">
                        <label for="modelo" class="form-label"> Modelo do Carro </label>
                        <input type="text" id="modelo" name="modelo" class="form-control" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="placa" class="form-label"> Placa </label>
                        <input type="text" id="placa" name="placa" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary"> Salvar</button>
                    <button type="button" class="btn btn-secondary" onclick="limparFormCarro()"> Limpar </button>
                </form>
            </div>
        </div>

        <!-- TABELA -->
        <div class="card">
            <div class="card-body">
                <h4>Carros cadastrados</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Modelo</th>
                                <th>Placa</th>
                            </tr>
                        </thead>

                        <tbody id="tabelaCarros">
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </main>
    <script src="carro.js"></script>
</body>

</html>