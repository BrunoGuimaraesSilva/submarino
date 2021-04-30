<?php
if (!isset($_SESSION['submarino']['id'])) exit;

$tabela = "vendas";

$data = $status = $cliente_id = $usuario_id = NULL;

//Status A - Aguardando Pagamento;
//Status C - Cancelado;
//Status P - Pago;
//Status D - Devolvido;
//Status T - Troca;
//Status E - Extraviado;

if (!empty($id)) {

    //sql para recuperar os dados daquele id
    $sql = "select * from venda_ where id = :id limit 1";
    //pdo - preparar
    $consulta = $pdo->prepare($sql);
    //passar um parametro - id
    $consulta->bindParam(':id', $id);
    //executar o sql
    $consulta->execute();

    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    //recuperar os dados
    $id = $dados->id;
    $status = $dados->status;
    $data = $dados->data;
    $cliente_id = $dados->cliente_id;
    $usuario_id = $dados->usuario_id;
}
?>
<div class="card">
    <div class="card-header">
        <h3 class="float-left">Efetuar Venda</h3>

        <div class="float-right">
            <a href="cadastros/<?= $tabela ?>" class="btn btn-info">
                <i class="fas fa-file"></i> Novo
            </a>
            <a href="listar/<?= $tabela ?>" class="btn btn-info">
                <i class="fas fa-search"></i> Listar
            </a>
        </div>
    </div>
    <div class="card-body">
        <form name="formCadastro" method="post" action="salvar/<?= $tabela ?>" data-parsley-validate="">
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="id">ID:</label>
                    <input type="text" name="id" id="id" class="form-control" readonly value="<?= $id ?>">
                </div>
                <div class="col-12 col-md-2">
                    <label for="data">Data:</label>
                    <input type="date" name="data" id="data" class="form-control" required data-parsley-required-message="Digite a data" inputmode="numeric" value="<?= $data ?>">
                </div>
                <div class="col-12 col-md-4">
                    <label for="status">Status:</label>
                    <select name="status" id="status" required data-parsley-required-message="Selecione um status" class="form-control">
                        <option value="A">Aguardando Pagamento</option>
                        <option value="C">Cancelado</option>
                        <option value="P">Pago</option>
                        <option value="D">Devolvido</option>
                        <option value="T">Troca</option>
                        <option value="E">Extraviado</option>

                    </select>
                </div>
                <div class="col-2">
                    <label for="cliente_id">Cliente:</label>
                    <input type="text" name="cliente_id" id="cliente_id" class="form-control" readonly value="<?= $data ?>">
                </div>
                <div class="col-10">
                    <label for="cliente">Selecione o cliente:</label>
                    <input type="text" name="cliente" id="cliente" class="form-control" data-parsley-required-message="Selecione um cliente" list="clientes">
                    <datalist id="clientes">
                        <?php
                            $sql = "SELECT id, nome, celular FROM cliente order by nome";
                            $consulta = $pdo->prepare($sql);
                            $consulta->execute();
                            while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                                echo "<option value='{$dados->id} - {$dados->nome} - {$dados->celular}'>";
                            }
                        ?>
                    </datalist>
                </div>
            </div>

            <button type="submit" class="btn btn-success float-right">
                <i class="fas fa-check"></i> Salvar / Alterar
            </button>
        </form>
    </div>
</div>
<script type="text/javascript">
    $("#estado").val("<?= $estado ?>");
</script>