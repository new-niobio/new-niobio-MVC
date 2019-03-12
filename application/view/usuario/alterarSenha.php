<h2>Alterar senha</h2>
<?php loadMessagem($this->mensagem) ?>
<form method="POST" enctype="multipart/form-data" class="form-inline">
    <div class="form-group">
        <table>
            <tr>
                <td width="100px">Nova senha</td>
                <td width="300px">
                    <input type="hidden" name="id" value="<?= $_SESSION[APP_NAME]['usuario']['id'] ?>">
                    <input class="form-control input-input-lg" type="password" name="senha" required="required" id="senha">
                </td>
            </tr>
            <tr class="has-error">
                <td width="100px">Repetir Nova senha</td>
                <td>
                    <input class="form-control input-input-lg" type="password" name="senha2" required="required" id="senha2">
                </td>
            </tr>

            <tr>
                <td colspan="2" alig="center"><center><input id="bntSalvar" type="submit" value="Salvar" class="btn btn-default" disabled="disabled"> </center></td>
            </tr>
        </table>
    </div>
</form>
<script>
    $(document).ready(function () {
        $('#senha2').on('keyup', function () {
            var _input = $(this);
            if (_input.val() == $('#senha').val()) {
                _input.closest('tr').removeClass('has-error');
                _input.closest('tr').addClass('has-success');
                $('#bntSalvar').prop('disabled', false)
            } else {
                $('#bntSalvar').prop('disabled', true);
                _input.closest('tr').addClass('has-error');
            }
        });
    });
</script>