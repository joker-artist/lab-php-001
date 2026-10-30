<?php
declare(strict_types = 1);

/**
 * Calcola il prezzo finale applicando lo sconto percentuale.
 *
 * @param float $prezzoOriginale
 *            Il prezzo di listino senza sconto
 * @param int $percentualeSconto
 *            La percentuale di sconto da applicare (0-100)
 * @return float Il prezzo scontato arrotondato a 2 decimali
 */
function calcolaPrezzoScontato(float $prezzoOriginale, int $percentualeSconto): float
{
    $importoSconto = $prezzoOriginale * ($percentualeSconto / 100);
    $prezzoFinale = $prezzoOriginale - $importoSconto;

    return round($prezzoFinale, 2);
}

function generaReportListino(array $prodotti): string
{
    $html = "<table border='1'>\n";
    $html .= " <tr>";
    $html .= "<th>Nome Prodotto</th>";
    $html .= "<th>Prezzo Originario</th>";
    $html .= "<th>Sconto</th>";
    $html .= "<th>Prezzo Finale</th>";
    $html .= "</tr>\n";

    foreach ($prodotti as $prodotto) {
        $prezzoScontato = calcolaPrezzoScontato($prodotto['prezzo'], $prodotto['sconto_percentuale']);

        $html .= " <tr>";
        $html .= "<td>{$prodotto['nome']}</td>";
        $html .= "<td>€ {$prodotto['prezzo']}</td>";
        $html .= "<td>{$prodotto['sconto_percentuale']}%</td>";
        $html .= "<td><b>€ {$prezzoScontato}</b></td>";
        $html .= "</tr>\n";
    }

    $html .= "</table>\n";
    return $html;
}

$prodotti = [
    [
        "id" => 1,
        "nome" => "Hosting VPS Pro",
        "prezzo" => 49.99,
        "sconto_percentuale" => 20
    ],
    [
        "id" => 2,
        "nome" => "Licenza IDE Premium",
        "prezzo" => 129.00,
        "sconto_percentuale" => 15
    ],
    [
        "id" => 3,
        "nome" => "Corso PHP Avanzato",
        "prezzo" => 89.90,
        "sconto_percentuale" => 10
    ],
    [
        "id" => 4,
        "nome" => "Plugin Sicurezza Web",
        "prezzo" => 34.50,
        "sconto_percentuale" => 25
    ]
];

$reportFinale = generaReportListino($prodotti);
echo $reportFinale;


