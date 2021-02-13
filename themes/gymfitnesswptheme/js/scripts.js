var nav = responsiveNav(".main-menu", { // Selector
    
    label: "", // String: Label for the navigation toggle
   
});

jQuery(document).ready(function(){
  jQuery('.testimonials-list').bxSlider({
    controls: false,
    mode: 'fade'
  });

  const headerScroll = document.querySelector('.navigation-bar');
  const rect = headerScroll.getBoundingClientRect();
  const topDistance = Math.abs(rect.top);

  fixedMenu(topDistance);

});

window.onscroll = () => {
  const scroll = window.scrollY;
  fixedMenu(scroll);
}

function fixedMenu(scroll) {
  const headerScroll = document.querySelector('.navigation-bar');


  if(scroll > 300) {
   
    headerScroll.classList.add('fixed-top');
  } else {
    
    headerScroll.classList.remove('fixed-top');
  }

}