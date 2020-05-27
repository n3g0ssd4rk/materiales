<?php
    include 'includes/simple_html_dom.php';
?>
<div class="col-12">
    <div class="row justify-content-around text-center">
        <?php 
            $html = file_get_html('https://materialesandersen.com.ar/corralon/obra-gruesa/articulos-bolsas/');
            $arreglo = $ainter = array();
            $a = -1;
            if($html && is_object($html) && isset($html->nodes)) {
                foreach ($html->find('ul.products a img,  .desc h4, .desc .price') as $e) {
                    if (!$e->src && $e->plaintext == ''):
                        break;
                    elseif (!$e->src):
                        $ainter[] = $e->plaintext;
                    else:
                        $ainter[] = $e->src;
                    endif;
                }
                foreach ($ainter as $as){
                    if (strpos($as, 'https') !== false) {
                        $arreglo[++$a]['img'] = $as;
                    }elseif (strpos($as, '.') !== false) {
                        $arreglo[$a]['precio'] = $as;
                    }else{
                        $arreglo[$a]['desc'] = $as;
                    }
                }
            } 
        ?>
        <?php foreach ($arreglo as $a): ?>
<div class='col-3 border m-1'>
    <div class=row>
        <div class='col-6'>
            <img src="<?= $a['img'] ?>" class=img-fluid>
        </div>
        <div class=col-6>
            <p><?php if(isset($a['desc']))?> <?php if(isset($a['precio'])): ?></p><p> Precio: <?php echo $a['precio']; endif;?></p>
        </div>
    </div>
</div>
<?php endforeach; ?>
    </div>
</div>
