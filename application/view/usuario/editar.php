<h2>Editar <?= $this->controller->headTitle; ?></h2>
<?php $dados = $this->data['dados'] ?>
<?php loadMessagem($this->mensagem); ?>
<form method="POST" enctype="multipart/form-data" class="form-horizontal registerForm">
    <div class="row">
        <div class="col col-lg-3">
            <div class="form-group col-lg-12">
                <label>Nome</label>
                <input class="form-control input-input-lg" type="hidden" name="id" required="required" value="<?= $dados['id'] ?>">
                <input class="form-control input-input-lg" type="text" name="nome" required="required" value="<?= $dados['nome'] ?>">
            </div>
        </div>

        <div class="col col-lg-6">
            <div class="form-group col-lg-12">
                <label>Email</label>
                <input class="form-control input-input-lg" type="email" name="email" required="required" value="<?= $dados['email'] ?>">
            </div>
        </div>

        <div class="col col-lg-3">
            <div class="form-group col-lg-12">
                <label>Senha</label>
                <input class="form-control input-input-lg" type="password" name="senha" value="">
            </div>
        </div>

        <div class="col col-lg-6">
            <div class="form-group">
                <div class="col-sm-5">
                    <div class="radio">
                        <label>
                            <input type="radio" name="ativo" value="1" checked="checked" /> Ativo
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="ativo" value="0" /> Inativo
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