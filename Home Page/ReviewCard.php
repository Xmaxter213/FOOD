<?php

function reviewCard($username, $rating, $content, $date){
    $element1 ="
    
    <div class=\"reviews row\" style =\"display:none;\">
        	    <div class=\"col-md-2\">
        	        <img src=\"https://image.ibb.co/jw55Ex/def_face.jpg\" class=\"img img-rounded img-fluid\"/>
        	        <p class=\"text-secondary text-center\">$date</p>
        	    </div>
        	    <div class=\"col-md-10\">
        	        <p>
        	            <a class=\"float-left\" href=\"https://maniruzzaman-akash.blogspot.com/p/contact.html\"><strong>$username</strong></a>";

	$element2 = "
	
					</p>
				<div class=\"clearfix\"></div>
					<p>$content</p>
					<p>
						<a class=\"float-right btn btn-outline-primary ml-2\"> <i class=\"fa fa-reply\"></i> Reply</a>
						<a class=\"float-right btn text-white btn-danger\"> <i class=\"fa fa-heart\"></i> Like</a>
					</p>
				</div>
	</div>";

	//display
    echo $element1;

	$counter = 0;
	while($counter < $rating)
	{
		echo "<span class=\"float-right\"><i class=\"text-warning fa fa-star\"></i></span>";
		$counter++;
	}
	echo $element2;

}
