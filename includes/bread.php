<?php
		$link=explode('/',$_SERVER['PHP_SELF']);
		$page=$link[3];
?>
<section>
         <div class="container">
             <div class="col-sm-12">
                 <div class="indicator">
                 <ul>
                     <li><a href="#">Home</a></li>
                     <li><a href="#">/</a></li>
                     <li><a href="#">
                     <?php
						if($page=='academic.php'){echo ' academic';}
						elseif($page=='admission.php'){echo ' admission';}
						elseif($page=='curriculam.php'){echo ' curriculam';}
						elseif($page=='about.php'){echo ' about';}
						elseif($page=='contact.php'){echo ' contact';}
						else{
							echo "page nai";
							};
					 ?>
                     
                     </a></li>
                 </ul>
             </div>
             </div>
         </div>
     </section>