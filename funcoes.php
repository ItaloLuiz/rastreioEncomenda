<?php


function rastrearObjetoCorreios($obj)
{

  if ($obj) {

    $post = array('Objetos' => $obj);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www2.correios.com.br/sistemas/rastreamento/resultado_semcontent.cfm");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    $output = curl_exec($ch);
    curl_close($ch);


    $out = explode("table class=\"listEvent sro\">", $output);

    if (isset($out[1])) {

      $output = explode("<table class=\"listEvent sro\">", $output);
      $output = explode("</table>", $output[1]);
      $output = str_replace("</div>", "", $output[0]);
      $output = str_replace("</tr>", "", $output);
      $output = str_replace("<strong>", "", $output);
      $output = str_replace("</strong>", "", $output);
      $output = str_replace("<tbody>", "", $output);
      $output = str_replace("</tbody>", "", $output);
      $output = str_replace("<label style=\"text-transform:capitalize;\">", "", $output);
      $output = str_replace("</label>", "", $output);
      $output = str_replace("&nbsp;", "", $output);
      $output = str_replace("<td class=\"sroDtEvent\" valign=\"top\">", "", $output);
      $output = explode("<tr>", $output);


      $novo_array = array();

      foreach ($output as $texto) {

        $info   = explode("<td class=\"sroLbEvent\">", $texto);
        $dados  = explode("<br />", $info[0]);

        $dia   = trim($dados[0]);
        $hora  = trim(@$dados[1]);
        $local = trim(@$dados[2]);

        $dados = explode("<br />", @$info[1]);
        $acao  = trim($dados[0]);

        $exAction   = explode($acao . "<br />", @$info[1]);
        $acrionMsg  = strip_tags(trim(preg_replace('/\s\s+/', ' ', $exAction[0])));

        if ("" != $dia) {

          $exploDate = explode('/', $dia);
          $dia1 = $exploDate[2] . '-' . $exploDate[1] . '-' . $exploDate[0];
          $dia2 = date('Y-m-d');

          $diferenca = strtotime($dia2) - strtotime($dia1);
          $dias = floor($diferenca / (60 * 60 * 24));
          $change = utf8_encode("há {$dias} dias");
          $novo_array[] = array("date" => $dia, "hour" => $hora, "location" => $local, "action" => utf8_encode($acao), "message" => utf8_encode($acrionMsg), "change" => utf8_decode($change));
        }
      }


      return $novo_array;
    } else {
      return 'Objeto não encontrado';
    }
  } else {
    return 'Parametro vazio';
  }
}


function gerarHtmldoRastreio(array $array)
{
  foreach ($array as $objeto) {
    $rastrear = rastrearObjetoCorreios($objeto);
    $dados[] = $rastrear;
  }

  $msg = "<div id='tabela'> \n";
  foreach ($dados as $detalhes) {
    foreach ($detalhes as $detalhe) {
      $date = $detalhe['date'];
      $hour = $detalhe['hour'];
      $location = strip_tags($detalhe['location']);
      $action   = strip_tags($detalhe['action']);
      $message  = strip_tags($detalhe['message']);
      $change   = strip_tags($detalhe['change']);

      $msg .= "<div class='tr'>\n";

      $msg .= "<div class='td esquerda'> \n";
      $msg .= "<div class='separa'>";
      $msg .= $date;
      $msg .= "</div> \n";

      $msg .= "<div class='separa'>";
      $msg .= $hour;
      $msg .= "</div> \n";

      $msg .= "<div class='separa '>";
      $msg .= $location;
      $msg .= "</div> \n";

      $msg .= "</div> \n";

      $msg .= "<div class='td direira'> \n";

      $msg .= "<div class='separa2'>";
      $msg .= $action;
      $msg .= "</div> \n";

      $msg .= "<div class='separa2'>";
      $msg .= $message;
      $msg .= "</div> \n";

      $msg .= "<div class='separa2'>";
      $msg .= $change;
      $msg .= "</div> \n";

      $msg .= "</div> \n";
      $msg .= "</div> \n";
    }
  }
  $msg .= "</div> \n";
  return $msg;
}
