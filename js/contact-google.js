    function postContactToGoogle() {
        var name = $('#name').val();
        var cidcim = $('#cidcim').val();
        var data = $('#aniv').val();
        var camisa = $('#camisa').val();
        var email = $('#email').val();
        var phone = $('#phone').val();

        var cName = document.forms["register-form"]["name"].value;
        var cEmail = document.forms["register-form"]["email"].value;
        var cCidcim = document.forms["register-form"]["cidcim"].value;
        var cAniv = document.forms["register-form"]["aniv"].value;
        var cCamisa = document.forms["register-form"]["camisa"].value;
        var cPhone = document.forms["register-form"]["phone"].value;

        if(cName == null || cName == "" ||
            cEmail == null || cEmail == "" ||
            cAniv == null || cAniv == "" ||
            cPhone == null || cPhone == "" ||
            cCamisa == null || cCamisa == "" ||
            cPhone == null || cPhone == "" )
        {
        }

        else{
            $.ajax({
                url: "https://docs.google.com/forms/d/1KeZHkI1R-eo-0aaklQF6IqTy5kFKSpY0Ge1vnVlsfg4/viewform",
                data: { "entry.1343055236": name,
                "entry.2103040423": email, "entry.1706736926":
                phone, "entry.395925770": aniv, "entry.2080419623": camisa, "entry.451077626": cidcim},
                type: "POST",
                dataType: "xml",
                statusCode: {
                    0: function () {
                        alert("Cadastro realizado com sucesso! Para concluir seu cadastro,"
                            + "solicitamos que envie um e-mail para ceodpi@demolaypi.org.br com o " 
                            + "anexo de seu comprovante de pagamento de inscrição."
                            + "\nAbaixo, segue a conta para depósito: "
                            + "\n\n----------\nBanco do Brasil\nAgência: 4031-2\nConta Corrente: 12.792-2\nVariação: 51\nRENANDRO DE CARVALHO REIS\n-----------");
                        window.location.replace("index.html")
                    },
                    200: function () {
                        alert("Erro!");
                        window.location.replace("index.html")
                    }
                }
            });
        }
    }