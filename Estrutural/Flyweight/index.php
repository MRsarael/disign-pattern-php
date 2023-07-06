<?php

/*
    - Resumo exemplo:

    Um banco de dados de animais de uma clínica veterinária somente para gatos.
    Cada registro no banco de dados é representado por um objeto Cat. Seus dados consistem em duas partes:
    Dados únicos (extrínsecos), como nome, idade e informações do proprietário de um animal de estimação.
    Dados compartilhados (intrínsecos), como nome da raça, cor, textura etc.
    A primeira parte é armazenada diretamente dentro da classe Cat, que atua como um contexto.
    A segunda parte, no entanto, é armazenada separadamente e pode ser compartilhada por vários gatos.
    Esses dados compartilháveis residem na classe CatVariation. Todos os gatos com recursos semelhantes estão vinculados
    à mesma classe CatVariation, em vez de armazenar os dados duplicados em cada um de seus objetos.
*/

use App\Database\CatDataBase;

require_once 'autoload.php';

$db = new CatDataBase();

echo "Cliente: Vejamos oque temos em \"cats.csv\".\n";

// Para ver o efeito real do padrão, você deve ter um grande banco de dados
$handle = fopen(__DIR__ . "/Public/cats.csv", "r");
$row = 0;
$columns = [];

// Lendo as linhas do arquivo CSV
while (($data = fgetcsv($handle)) !== false) {
    $data = explode(';', $data[0]);
    
    if ($row == 0) {
        for ($c = 0; $c < count($data); $c++) {
            $columnIndex = $c;
            $columnKey = strtolower($data[$c]);
            $columns[$columnKey] = $columnIndex;
        }

        $row++;
        continue;
    }

    // Caolunas do arquivo CSV (informações dos gatos)
    $db->addCat(
        $data[$columns['name']],
        $data[$columns['age']],
        $data[$columns['owner']],
        $data[$columns['breed']],
        $data[$columns['image']],
        $data[$columns['color']],
        $data[$columns['texture']],
        $data[$columns['fur']],
        $data[$columns['size']],
    );
    
    $row++;
}

// Fechando arquivo
fclose($handle);

echo "\nClient: Consultando um gato pelo nome \"Siri\".\n";
$cat = $db->findCat(['name' => "Siri"]);
if ($cat) $cat->render();

echo "\nClient: Consultando um gato pelo nome \"Bob\".\n";
$cat = $db->findCat(['name' => "Bob"]);
if ($cat) $cat->render();



