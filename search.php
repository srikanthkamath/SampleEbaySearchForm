<?php

if(isset($_POST['itemNumber'])) {

    $itemNumber = $_POST['itemNumber'];
    $ebayProductUrl = 'https://www.ebay.com/itm/'.$itemNumber;

    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTMLFile($ebayProductUrl);

    $itemDOM = $dom->getElementById('itemTitle');
    $productName = trim(str_replace("Details about", "", $itemDOM->textContent));

    $mainImageDOM = $dom->getElementById('mainImgHldr');
    $mainImage = '';

    if($mainImageDOM){
        $imageData = $mainImageDOM->getElementsByTagName('img');
        if(!empty($imageData)) {
            foreach($imageData as $imageContent) {
                if(strpos($imageContent->getAttribute('src'), 'gif') == false) {
                    $mainImage = urldecode($imageContent->getAttribute('src'));
                }
            }
        }
    }

    $thumbImageArray = array();
    $thumbnailDOM = $dom->getElementById('vi_main_img_fs_slider');
    if($thumbnailDOM){
        $thumbNailImages = $thumbnailDOM->getElementsByTagName('img');
        if(!empty($thumbNailImages)) {
            foreach($thumbNailImages as $thumbNailData) {
                $thumbImageArray[] = urldecode($thumbNailData->getAttribute('src'));
            }
        }
        
    }
}
?>

<html>

<head>
    <title>Agreefy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="contentContainer">
        <h2>Search Ebay Product Results (Item number : <?php echo empty($itemNumber) ? 'empty' : $itemNumber; ?> )</h2>
        <?php if (isset($productName) && !empty($productName)) { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Public URL</th>
                    <th>Title</th>
                    <th>Main Image</th>
                    <th>Thumbnail Images</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $ebayProductUrl; ?></td>
                    <td><?php echo $productName; ?></td>
                    <td>
                        <img src="<?php echo $mainImage; ?>"> <?php echo $mainImage; ?> </img>
                    </td>
                    <td>
                        <?php if(!empty($thumbImageArray)) { 
                                foreach($thumbImageArray as $image) { ?>

                        <img src="<?php echo $image; ?>"> <?php echo $image; ?> </img>

                        <?php } } else { ?>
                            <p>No Thumbnail Images for this product</p>
                        <?php } ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php 
    } else { ?>
        <p> No such item number (<?php echo empty($itemNumber) ? 'empty' : $itemNumber; ?>) found. Please check another one</p>
        <?php } ?>
    </div>

</body>
</html>