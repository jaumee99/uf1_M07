<?php
$paraulas = array("DINAR", "PERRO", "MOVIL", "LLAPIS");
$paraulaAleatoria = $paraulas[array_rand($paraulas)];
$lletresEnviadas = $_GET['lletres'];

if (!empty($lletresEnviadas)) {
  $lletresEnviadas = strtoupper($lletresEnviadas); // transform mayusculas

  $lletresPalabraAleatoria = str_split($paraulaAleatoria); 

  $resultado = array();

  for ($i = 0; $i < strlen($paraulaAleatoria); $i++) {
    $lletraEnviada = $lletresEnviadas[$i];

    if ($lletraEnviada === $lletresPalabraAleatoria[$i]) {
      $resultado[] = 'lloc';
    } elseif (in_array($lletraEnviada, $lletresPalabraAleatoria)) {
      $resultado[] = 'si';
    } else {
      $resultado[] = 'no';
    }
  }

  $resultadoURL = implode(',', $resultado);
  $url = 'index.html?paraula=' . urlencode($paraulaAleatoria) . '&lletres=' . urlencode($lletresEnviadas) . '&resultado=' . urlencode($resultadoURL);

  header('Location: ' . $url);
} else {
//   header('Location: index.html');
}
?>
