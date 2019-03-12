<h2>Listar <?= $this->controller->headTitle; ?></h2>
<h3><a href="<?= ADMIN_SRC . $this->controller->folder ?>/novo">Adicionar</a></h3><br/>
<?php loadMessagem($this->mensagem) ?>
<table id="table-result" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <td width="15%">Ação</td>
            <td>ID</td><!-- hidden and order by desc -->
            <td>Nome</td>
            <td>Email</td>
            <td>Status</td>

        </tr>
    </thead>
    <tbody>

        <?php foreach ($this->data['lista'] as $value): ?>
            <tr>
                <td>
                    <a href="<?= ADMIN_SRC . $this->controller->folder ?>/editar/<?= $value['hash_id'] ?>">Editar</a> 
                    <?php if ($value['hash_id'] != $_SESSION[APP_NAME]['usuario']['hash_id']) : ?>
                       / <a class="excluir" href="<?= ADMIN_SRC . $this->controller->folder ?>/excluir/<?= $value['hash_id'] ?>">Excluir</a>
                    <?php endif; ?>
                </td>
                <td><?= $value['id'] ?></td><!-- hidden -->
                <td><?= $value['nome'] ?></td>
                <td><?= $value['email'] ?></td>
                <td><?= $value['ativo_desc'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('.excluir').on('click', function (e) {
            e.preventDefault();
            var _this = $(this);
            if (confirm("Deseja excluir?")) {
                $.ajax({
                    type: "POST",
                    async: true,
                    url: _this.attr('href'),
                    dataType: 'json',
                    success: function () {
                        _this.closest('tr').remove();
                        $('#table-result').ajax().reload();
                    },
                    error: function (error) {
                        alert(error.responseText);
                    }
                });
            }
        });
    });
</script>