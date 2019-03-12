$(document).ready(function () {
    $('input').attr('autocomplete', 'off');

    $('body').on('focus', '.money', function () {
        $('.money').maskMoney({thousands: '.', decimal: ',', allowZero: true});
    });

    $('body').on('focus', '.inteiro', function () {
        $('.inteiro').maskMoney({thousands: '.', decimal: ',', allowZero: true, precision: 0});
    });

    $('body').on('focus', '.date-full', function () {
        $('.date-full').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayHighlight: true,
            language: 'pt-BR'
        });
    });

    $('body').on('focus', '.date-small', function () {
        $('.date-small').datepicker({
            format: "mm/yyyy",
            viewMode: "months",
            minViewMode: "months",
            autoclose: true,
            language: 'pt-BR'
        });
    });

    $('body').on('focus', '.cpf', function () {
        $('.cpf').mask('000.000.000-00', {reverse: true});
    });

    $('#table-result').DataTable({
        paging: false,
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
        columnDefs: [
            {
                "targets": [1],
                "visible": false,
                "searchable": false
            }
        ]
    }).order([
        [1, 'desc'] // id sempre oculta
    ]).draw();

    $('input[type="submit"]').on('click', function () {
        $("input, select").each(function () {
            var input = $(this);
            if (input.is(':valid')) {
                input.parent().removeClass('has-error');
            } else {
                input.parent().addClass('has-error');
                $('.file-error-message').show();
            }
            input.bind('keyup change', function () {
                if ($(this).is(':valid')) {
                    input.parent().removeClass('has-error');
                }
            });
        });
        $('.arquivo').fileinput('upload');
    });


});

function replaceAll(str, de, para) {
    var pos = str.indexOf(de);
    while (pos > -1) {
        str = str.replace(de, para);
        pos = str.indexOf(de);
    }
    return (str.replace(',', '.'));
}

function number_format(number, decimals, dec_point, thousands_sep) {
// http://kevin.vanzonneveld.net
// + original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
// + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
// + bugfix by: Michael White (http://crestidg.com)
// + bugfix by: Benjamin Lupton
// + bugfix by: Allan Jensen (http://www.winternet.no)
// + revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
// * example 1: number_format(1234.5678, 2, '.', '');
// * returns 1: 1234.57

    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}