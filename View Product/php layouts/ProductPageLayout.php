<?php



function productPageLayout($productImg, $productImg2, $productImg3, $productImg4){
    $element ="
    
    



<div class = \"container\">
    <div class = \"imgContainer\">
        <img id=\"mainImage\" src=\"photos/$productImg\" width = \"400\" height = \"400\" alt = \"Product\"/> 
        <table id=\"thumbnails\">
            <tr>
            <td><img src=\"photos/$productImg\" width = \"100\" height = \"100\" title=\"Item 1\" onclick=\"showImage('photos/$productImg')\" /></td>
            <td><img src=\"photos/$productImg2\" width = \"100\" height = \"100\" title=\"Item 2\" onclick=\"showImage('photos/$productImg2')\" /></td>
            <td><img src=\"photos/$productImg3\" width = \"100\" height = \"100\" title=\"Item 3\" onclick=\"showImage('photos/$productImg3')\" /></td>
            <td><img src=\"photos/$productImg4\" width = \"100\" height = \"100\" title=\"Item 4\" onclick=\"showImage('photos/$productImg4')\" /></td>
            </tr>
        </table>
    </div>

</div>


    
    ";
    echo $element;
}
?>