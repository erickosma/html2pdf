<?php
/**
 * User: erick.giorgio
 * Date: 23/02/18
 * Time: 10:41
 */


require __DIR__.'/../../vendor/autoload.php';


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