<div class="container">
    <h1>Lost Data</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, ducimus!</p>

    <?php var_dump($data['profile']) ?>

    <p><Strong>Contoh Barcode Batang.</Strong></p>
    <?php
    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    echo $generator->getBarcode('123456789Code', $generator::TYPE_CODE_128_B);
    echo '123456789Code';
    echo '<br><br>';
    echo $generator->getBarcode('123456789', $generator::TYPE_CODABAR);
    echo '123456789';
    echo '<br><br>';
    echo $generator->getBarcode('123456789', $generator::TYPE_CODE_11);
    echo '123456789';
    ?>
</div>