
# Html2Pdf

Um pequeno exemplo de como converter html para pdf usando PHP

Requer  **PHP 5.4 ou 7.2**

Foi utilizado a lib [Html2Pdf](https://github.com/spipu/html2pdf) Que permite
converter **HTML** válidos em **PDF**  
 

Você precisa  escrever seu **HTML** para **Html2Pdf** 
e não converter diretamente uma página já existente.  
Tags específicas foram implementadas, para adaptar o padrão html a um uso de PDF.



## instalação 
Você só precisa iniciar o seguinte comando na pasta raiz do seu projeto:

```
composer require spipu/html2pdf
```

## Uso

Um exemplo  *HelloWorld*

```php
<?php 
require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
$html2pdf->output();

```

**Html2Pdf**  Usa o autoloader **PSR-4** .


###Parâmetros

```php
<?php 
use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf(
    $orientation = 'P',
    $format = 'A4',
    $lang = 'fr',
    $unicode = true,
    $encoding = 'UTF-8',
    $margins = array(5, 5, 5, 8),
    $pdfa = false
);
```



Variable     | Default value     |Description
-------------|-------------------|--------------
$orientation | P                 | Orientação padrâo da página,  **P** portrait (retrato) ou  **L** landscape (paisagem)
$format      | A4                | Formato padãro **A4**. Lista de todos os valores [here](https://github.com/tecnickcom/TCPDF/blob/master/include/tcpdf_static.php#L2097). You can also give a array with 2 values the width and the height in mm.
$lang        | fr                | Language to use, for some minor translations. The list of the available languages are [here](https://github.com/spipu/html2pdf/tree/master/src/locale)
$unicode     | true              | means that the input HTML string is unicode
$encoding    | UTF-8              | charset encoding of the input HTML string
$margins     | array(5, 5, 5, 8) | Main margins of the page (left, top, right, bottom) in mm



#### Exemplo 

```php
<?php

$html2pdf = new Html2Pdf($orientation = 'P', $format = 'A4',$lang = 'pt_BR',$unicode=true,$encoding = 'ISO8859-1', $margins = array(5, 5, 5, 8) );

```

### Página

Este biblioteca preve algumas tags extras oara facilitar a construção do **PDF**



```php
<?php
require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html = '
<page  backtop="7mm" > 
    <page_header>
         <div style="width: 100%;border: 1px solid #000000">Page Header </div> 
    </page_header> 
    <page_footer > 
        <div style="width: 100%;border: 1px solid #CCCCCC">Page Footer</div>
          
    </page_footer> 
        <div style="width: 100%;height: 97%; border: 1px solid #133f1a">Page Content</div>
</page> 
';


$pdf = new \Spipu\Html2Pdf\Html2Pdf('P','A4','en', false, 'UTF-8', array(10, 10, 10, 10));
$pdf->writeHTML($html);
$pdf->Output();
```


### Saída

##### Renderiza pdf no broweser

```php
$html2pdf->output(); 
```


##### Renderiza pdf no broweser especificando nome.

```php
$html2pdf->output("name.pdf"); 
```

##### Força download
```php
$html2pdf->output('file.pdf', 'D'); 
```


##### Escreve o conteudo do PDF em um arquivo no servidor

```php
$html2pdf->output('/absolute/path/file_xxxx.pdf', 'F');
```



##### Retorna o conteudo do PDF
```php
$pdfContent = $html2pdf->output('file.pdf', 'S');
```


