<?php
<script>

/*
Preload images script
By JavaScript Kit (http://javascriptkit.com)
Over 400+ free scripts here!
*/

var myimages=new Array()
function preloadimages(){
for (i=0;i<preloadimages.arguments.length;i++){
myimages[i]=new Image()
myimages[i].src=preloadimages.arguments[i]
}
}


//Enter path of images to be preloaded inside parenthesis. Extend list as desired.
preloadimages("https://your-site.com/image-path/image-name.jpg")

</script>
/*<link rel="preload" as="image" href="https://your-site.com/image-path/image-name.jpg">