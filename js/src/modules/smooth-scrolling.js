/*global
  $:true
*/

// smooth scroll intnernal links
function smooth_scroll() {
	$('a[href^="#"]').click(function() {
		$('html,body').animate({ scrollTop: $(this.hash).offset().top}, 350);
		//return false;
		//e.preventDefault();
	});
}

smooth_scroll();