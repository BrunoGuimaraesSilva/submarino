<?php

	/* **********************************
	* Função para mostrar a mensagem de erro
	* $titulo - titulo da janela
	* $mensagem - mensagem da janela
	* $icone - icone da janela (error, success, question)
	************************************* */

	function mensagem($titulo, $mensagem, $icone) {

		?>
        <script>
            //mostrar a telinha animada - alert
            Swal.fire(
              '<?=$titulo?>',
              '<?=$mensagem?>',
              '<?=$icone?>'
            ).then((result) => {
                //retornar para a tela anterior
                history.back();
            })
        </script>
        <?php

        exit;

	}

	/* *********************************
	* Função para formatar valores
	* $valor - valor em pt
	*********************************** */

	function formatarValor( $valor ) {

		//10.900,00 -> 10900.00
		$valor = str_replace(".", "", $valor);
		return str_replace(",", ".", $valor);

	}

	/*************************************
	* Função para formatar valor brasileiro
	* $valor - valor em usa
	************************************ */

	function formatarValorBR( $valor ) {
		return number_format($valor, 2, ",", ".");
		//$valor - casas decimais - separador de decimais - separador de milhares
	}