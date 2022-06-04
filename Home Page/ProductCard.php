<?php

function productCard($productName, $productQty, $portfolioModalNum, $productImg, $productBg){
    $element ="
    
    <div class=\"portfolio-item mt-5\">
                            <a class=\"portfolio-link\" data-bs-toggle=\"modal\" href=\"#$portfolioModalNum\">
                                <div class=\"portfolio-hover\">
                                    <div class=\"portfolio-hover-content\"><i class=\"fas fa-plus fa-3x\"></i></div>
                                </div>
                                <img class=\"img-fluid\" src= \"$productImg\" alt=\"...\" />
                            </a>
                            <div class=\"portfolio-caption\">
                                <div class=\"portfolio-caption-heading\">$productName</div>
                                <div class=\"portfolio-caption-subheading text-muted\">Quantity: $productQty</div>
                            </div>
    </div>

    <!-- Portfolio item 1 modal popup-->
                        <div class=\"portfolio-modal modal fade\" id=\"$portfolioModalNum\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\" >
                            <div class=\"modal-dialog\" >
                                <div class=\"modal-content\"  style=\"background-color: #D4F1F4;\">
                                    <div class=\"close-modal\" data-bs-dismiss=\"modal\"><img src=\"assets/img/close-icon.svg\" alt=\"Close modal\" /></div>
                                    <div style=\"background-image: url('$productBg'); background-repeat:no-repeat;background-size: cover; \">
                                    <div class=\"container\">
                                        <div class=\"row justify-content-center\">
                                            <div class=\"col-lg-8\">
                                                <div class=\"modal-body\"  >
                                                    <!-- Project details-->
                                                    <h2 class=\"text-uppercase\">$productName</h2>
                                                    <p class=\"item-intro text-muted\">Lorem ipsum dolor sit amet consectetur.</p>
                                                    <img class=\"img-fluid d-block mx-auto\" src=\"$productImg\" alt=\"...\" />
                                                    
                                                    <a href = \"../View Product/Apple/view product.php\"><button class=\"btn btn-primary btn-xl text-uppercase\"  type=\"button\">
                                                    <i class=\"fa fa-shopping-cart fa-1x\" aria-hidden=\"true\"></i>
                                                        Go to Page
                                                        </button></a>
                                                    <button class=\"btn btn-primary btn-xl text-uppercase\" data-bs-dismiss=\"modal\" type=\"button\">
                                                        <i class=\"fas fa-xmark me-1\"></i>
                                                        Close Page
                                                    </button>
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
    ";
    echo $element;
}
