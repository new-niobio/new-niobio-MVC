<h2>Cadastrar <?= $this->controller->headTitle; ?></h2>
<?php $dados = $this->data['dados'] ?>
<?php loadMessagem($this->mensagem); ?>
<form method="POST" enctype="multipart/form-data" class="form-horizontal registerForm">
    <div class="row">
        <div class="col col-lg-3">
            <div class="form-group col-lg-12">
                <label>Text</label>
                <input class="form-control input-input-lg" type="hidden" name="id" required="required" value="<?= $dados['id'] ?>">
                <input class="form-control input-input-lg" type="text" name="text" required="required" value="<?= $dados['text'] ?>">
            </div>
        </div>
        <div class="col col-lg-3">
            <div class="form-group col-lg-12">
                <label>CPF</label>
                <input class="form-control input-input-lg cpf" type="text" name="cpf" required="required" value="<?= $dados['cpf'] ?>">
            </div>
        </div>
        <div class="col col-lg-6">
            <div class="form-group col-lg-12">
                <label>Email</label>
                <input class="form-control input-input-lg" type="email" name="email" required="required" value="<?= $dados['email'] ?>">
            </div>
        </div>
        <div class="col col-lg-2">
            <div class="form-group col-lg-12">
                <label>Date Full</label>
                <input class="form-control input-input-lg date-full" type="text" name="date_full" required="required" value="<?= $dados['date_full'] ?>">
            </div>
        </div>
        <div class="col col-lg-2">
            <div class="form-group col-lg-12">
                <label>Date Small</label>
                <input class="form-control input-input-lg date-small" type="text" name="date_small" required="required" value="<?= $dados['date_small'] ?>">
            </div>
        </div>
        <div class="col col-lg-2">
            <div class="form-group col-lg-12">
                <label>Value int</label>
                <input class="form-control input-input-lg inteiro" type="text" name="value_int" required="required" value="<?= $dados['value_int'] ?>">
            </div>
        </div>
        <div class="col col-lg-2">
            <div class="form-group col-lg-12">
                <label>Value decimal</label>
                <input class="form-control input-input-lg money" type="text" name="value_decimal" required="required" value="<?= $dados['value_decimal'] ?>">
            </div>
        </div>
        <div class="col col-lg-3">
            <div class="form-group col-lg-12">
                <label>Select</label>
                <select class="form-control" required="required" name="value_select" >
                    <option value="">Selecione</option>
                    <?= gerarOptionSelect($this->controller->objDAO->getItens(), $dados['value_select']) ?>
                </select>
            </div>
        </div>
        <div class="col col-lg-12">
            <div class="form-group col-lg-8">
                <label for="upload">Upload</label>
                <input class="file arquivo" type="file" data-min-file-count="1" name="upload" /> 
            </div>
        </div>

        <div class="col col-lg-6">
            <div class="form-group">
                <div class="col-sm-5">
                    <div class="radio">
                        <label>
                            <input type="radio" name="ativo" value="1" <?php echo ($dados['ativo'] == 1) ? 'checked' : '' ?> /> Ativo
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="ativo" value="0" <?php echo ($dados['ativo'] == 0) ? 'checked' : '' ?>/> Inativo
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-12 center-block">
                <input type="submit" value="Salvar" class="btn btn-default center-block" >
            </div>
        </div>
    </div>
    <div id="teste">
    </div>
</form>