<script>
window.onscroll = function() {
var doc = document.documentElement;
var top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
if (top <= 200) {
jQuery(".category-filtering.category-filter-row.show-for-medium").css({
"position": "static"
}
} else {
jQuery(".category-filtering.category-filter-row.show-for-medium").css({
"height": "44px",
"border-radius": "8px",
"padding": ".34em",
"z-index": "200",
"margin": "0 auto",
"width": "90px",
"position": "fixed",
"top": "70px",
"left": "0",
"right": "0",
"color": "white",
"background": "#0677ff",
"-webkit-transition": "opacity .5s linear 0.2s",
"-moz-transition": "opacity .5s linear 0.2s",
"transition": "opacity .5s linear 0.2s",
"opacity": ".85"
}
}
}
</script>