function para(o) { document.querySelector(`#anime${o}`).style.display = "none" }

function volta(o) { document.querySelector(`#anime${o}`).style.display = "block" }
$(function() {
        $("#form1").bind("submit", function(o) {
            o.preventDefault();
            let t = $("form")[0],
                e = new FormData(t);
            $.ajax({
                type: "POST",
                url: "http://localhost/APIS/projeto-bvs-mvc/tipoComercio/enviarTipoComercio",
                data: e,
                processData: !1,
                contentType: !1,
                success: function(o) {
                    $(".retorno").html(o),
                        console.log(o), $("form")[0].reset()
                }
            })
        })
    }),
    $(function() {
        $("#formulario").on("submit", function(o) {
            o.preventDefault();
            let t = $("#formulario")[0],
                e = new FormData(t);
            $.ajax({
                type: "POST",
                url: "http://localhost/APIS/projeto-bvs-mvc/addComercio/enviarDadosComercio",
                data: e,
                processData: !1,
                contentType: !1,
                success: function(o) {
                    $(".resultado").html(o),
                        console.log(o), $("#formulario")[0].reset()
                }
            })
        })
    });
$(function() {
    $("#formHome").on("submit", function(o) {
        o.preventDefault();
        var dado = $("#formHome").serialize();
        console.log(dado);
        $.ajax({
            type: "POST",
            url: "http://localhost/APIS/projeto-bvs-mvc/home/dadosComerciosRecebidos",
            data: dado,
            success: function(o) {
                $(".resultado").html(o);

                $("#formHome")[0].reset()
            }
        })
    })
});
$(function() { $("#whatsapp").mask("55(00)00000-0000") });