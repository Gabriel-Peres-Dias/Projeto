

        /* Objetivo: Desenvolver um programa que faça o teste de execução de duas opções;
        Utilizando o método confirm, vereficar o botão selecionado pelo usuário e apresentar a opção selecionada. */

        function mostrarPopUp(){
        /*definição de variáveis */
        var js_resp;

        /* Após o botão selecionado, o js_resp receberá um valor lógico true ou false, capturado pelo método confirm */

        js_resp = window.confirm('Deseja realmente sair da conta?');

        /* Decisão Condicional Composta if/else comparado ao valor lógico true*/

        if (js_resp == true) {
            
            window.location.href = "../home/logout.php";

        } else {
           
            window.location.href = "../home/home_administrador.php";
        }
        


        /* Saída de Dados */
    }
