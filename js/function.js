$(document).ready(function(){
	document.querySelector(".hamburger").onclick = function () {
		var element = document.querySelector(".leftMenu");
		  element.classList.toggle("openMenu");
    
		var hamburger = document.querySelector(".hamburger");
		  hamburger.classList.toggle("open");
    
		var closeAccordion = document.getElementsByClassName('dropdown');
		  var i = 0;
		  for (i = 0; i < closeAccordion.length; i++) {
		  closeAccordion[i].classList.remove('active');
		}
	}
    
	var dropdown = document.getElementsByClassName('dropdown');
	    var i = 0;
	    for (i = 0; i < dropdown.length; i++) {
		    dropdown[i].onclick = function () {
			    this.classList.toggle('active');
		}
	}
});


var theToggle = document.getElementById('toggle');

// based on Todd Motto functions
// https://toddmotto.com/labs/reusable-js/

// hasClass
function hasClass(elem, className) {
	return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
}
// addClass
function addClass(elem, className) {
    if (!hasClass(elem, className)) {
    	elem.className += ' ' + className;
    }
}
// removeClass
function removeClass(elem, className) {
	var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ') + ' ';
	if (hasClass(elem, className)) {
        while (newClass.indexOf(' ' + className + ' ') >= 0 ) {
            newClass = newClass.replace(' ' + className + ' ', ' ');
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    }
}
// toggleClass
function toggleClass(elem, className) {
	var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, " " ) + ' ';
    if (hasClass(elem, className)) {
        while (newClass.indexOf(" " + className + " ") >= 0 ) {
            newClass = newClass.replace( " " + className + " " , " " );
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    } else {
        elem.className += ' ' + className;
    }
}

theToggle.onclick = function() {
   toggleClass(this, 'on');
   return false;
}



$('.rightsidebar ul li a').click(function(){
    $('html, body').animate({
    scrollTop: $( $(this).attr('href') ).offset().top - 100
    }, 900);
    return false;
	});
