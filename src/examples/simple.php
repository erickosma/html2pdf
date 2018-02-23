<?php
/**
 * User: erick.giorgio
 * Date: 15/02/18
 * Time: 12:13
 */


require __DIR__.'/../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html ='
<h1>HelloWorld</h1>
This is my first test
<table border="1">
    <thead>
    <tr >
        <th>#</th>
        <th>Col 1</th>
        <th>Col 2</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>teste 1</td>
        <td>teste col 2</td>
    </tr>
    </tbody>
</table>
';
/*
$tr ="";
for ($i=0;$i < 300; $i++){
$tr .= '<tr>
    <td>1</td>
    <td>teste 1</td>
    <td>teste col 2</td>
</tr>';
}

$html =  str_replace("##tr##",$tr,$html);
*/


$html2pdf->writeHTML($html);
$html2pdf->output();

