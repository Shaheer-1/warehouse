<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cell $cell
 */
// use PhpParser\Node\Stmt\Foreach_;
// use QrCode\QrCode;
// $this->loadHelper('QrCode');
?>
<div class="row">
    <div class="column column-80">
        <div class="cells view content">
            <h3><?= h($cell->cell_code) ?></h3>
            <table>
                <tr>
                <?php
                    $url = $this->Url->build($this->getRequest()->getPath(), ['fullBase' => true]).'/v/'.$cell->id;
                    
                    // Define options
                    $options = [
                        'size' => 200,
                        'margin' => 10,
                        'level' => 'H',
                        'color' => [0, 0, 0], // Black color
                        'background' => [255, 255, 255] // White background
                    ];
                ?>
                    <?=  $this->QrCode->image($url,$options) 
                    ?>
                </tr>
            </table>
        </div>
    </div>
</div>