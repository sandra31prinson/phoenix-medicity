<link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert/sweetalert.css'); ?>">
<!--************************************* banner *************************************-->



<section class="banner">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <?php 
                $this->db->order_by("order_id", "asc");
                $this->db->where('status', "1");
                $banner = $this->db->get('home_banner')->result();
                $isActive = true; // Variable to mark the first image as active
                if (!empty($banner)) {
                    foreach ($banner as $row) {
                        $activeClass = $isActive ? 'active' : ''; // Add 'active' class to the first item
            ?>
                      <div class="carousel-item <?php echo $activeClass; ?>" data-tag-id="<?php echo $row->id; ?>"  style="width: 1360px!important;
    height: 566px !important; ">

                            <img src="<?php echo base_url(); ?>upload/home_banner/<?php echo $row->image; ?>"   id="sobiya" class="d-block w-100" alt="...">

                            <!-- Added canvas element here -->
                            <!-- <canvas id="sobiya"  class="img-fluid"></canvas> -->

                            <!-- <h3><?php echo $row->id ; ?></h3> --> 
                       
                        </div>
            <?php
                        $isActive = false; // After the first image, no other image should have the 'active' class
                    }
                }
            ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>


    <!-- sj cmnt  -->
    <!-- <section class="banner">
        <div class="amazingslider-wrapper" id="amazingslider-wrapper-1">
        <div class="amazingslider" >


                <canvas id="sobiya" class="img-fluid"></canvas>
            
                </div>
       

        </div>
    </section>   -->



<!--************************************* welcome ************************************-->
<div class="dis-grid-mob">
    <!-- as  code -->
    <section class="welcome">
        <div class="container">
            <div class="row">
              <!-- In the user side HTML -->


              <!-- sj image tagging -->
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-2 order-sm-2 order-2">
                    <canvas id="userCanvas" class="img-fluid"></canvas>
                </div>


     <!-- sj image tagging -->

                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-1 order-sm-1 order-1">
                    <h1>About Us</h1>
                    <div class="dynamic_page mb-4">
                        <ul class="nav nav-tabs" role="tablist">


                         <?php
                          $i=1;

                        
                              if (!empty($aboutus)) 
                        {
                            foreach ($aboutus as $abt) 
                            {

                                ?> 

                         
                            <li class="nav-item">
                                <a class="nav-link trs
                                 <?php 
                                if($i==1)
                                { 
                                    echo "active";
                                }

                            ?>"
                            data-toggle="tab" href="#title<?php echo $i?>"><?php echo $abt->title;?></a>
                            </li>
                        <?php 
                      $i++;
                        } 

                         }  ?>
                             
                        </ul>
                    </div>


                        <div class="tab-content">
                        <?php
                        $j=1;
                        if (!empty($aboutus)) 
                        {
                            foreach ($aboutus as $abt) 
                            {
                            
                        ?>
                            <div id="title<?php echo$j;?>" class="tab-pane <?php if($j==1){ echo "active";}?>"><br>
                                <h3><?php echo $abt->title;?></h3>
                                <?php echo $abt->description;?>
                            </div>
                        <?php 
                            $j++;
                            } 
                        }   
                        ?>    


                        </div>

                        
                    </div>
                </div>
            </div>
        
    </section> 

    <!-- as  code -->





        
    <!--************************************* hm_marquee **********************************-->
        <!--    <section class="hm_marquee">
        <div class="container-fluid">
            <marquee width="100%" direction="left">Stay Safe, Shop Online. Get Inspired with our Featured Products.</marquee>
        </div>
    </section> -->

    <!--************************************* hm_gallery **********************************-->
        <!--<?php  if(!empty($gallery)) { ?>
        <section class="hm_gallery">
            <div class="container pro_container">
                <div class="hm_gallery_bg">
                    <h2>Gallery</h2>
                    <div class="row mx-0">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2 px-2">
                        <div class="embed-responsive embed-responsive-4by3 grid">
                            <iframe class="embed-responsive-item text-center center-block" src="https://www.youtube.com/embed/?rel=0&amp;autoplay=0&amp;controls=1&amp;loop=0&amp;showinfo=0" allowfullscreen=""></iframe>
                        </div>
                        <h1>Vanity</h1>
                    </div>
                    
                     <?php  foreach ($gallery as $key) { ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-2 px-2">
                            <div class="grid trs">
                                <a href="<?php echo base_url(); ?>upload/album/<?php echo $key->image; ?>" data-fancybox="images" data-caption="<?php echo $key->title;?>">
                                    <figure class="effect-jazz">
                                        <img class="img-fluid" src="<?php echo base_url(); ?>upload/album/<?php echo $key->image; ?>" alt="Vanity And Bath">
                                        <figcaption></figcaption>
                                    </figure>
                                </a>
                                <h1><?php echo  ucfirst($key->title); ?></h1>
                            </div>
                        </div>
                     <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php    }   ?>-->
        
    <!--************************************* hm_gallery **********************************-->
    <section class="hm_gallery">
        <div class="container hmgallery_container">
            <div class="row m-0">
                
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp">
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_showertray.jpg" alt="Shower Tray">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp">
                            <a class="hm_arrow" href="<?php echo base_url(); ?>bath-designs/shower-tray.html">
                                <h1 class="hm_arrow_title hm_sm_arrow_title">Shower Tray</h1>
                                <div class="hm_arrow_sub_title hm_sm_arrow_sub_title trs">Shop Now</div>
                                <div class="hm_arrow_left"></div>
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp order-xl-3 order-lg-3 order-md-3 order-sm-3 order-4">
                            <a class="hm_arrow" href="<?php echo base_url(); ?>bath-designs/seats.html">
                                <h1 class="hm_arrow_title hm_sm_arrow_title">Seats</h1>
                                <div class="hm_arrow_sub_title hm_sm_arrow_sub_title trs">Shop Now</div>
                                <div class="hm_arrow_right"></div>
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp order-xl-4 order-lg-4 order-md-4 order-sm-4 order-3">
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_seats.jpg" alt="Seats">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row hm_gallery_mp">
                        <a class="position-relative" href="
                        <?php echo base_url(); ?>bath-design/vanity.html">
                            <h1 class="hm_arrow_title hm_lg1_arrow_title">
                                Vanity
                                <div class="hm_arrow_sub_title hm_lg1_arrow_sub_title trs">Shop Now</div>
                            </h1>
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_vanity.jpg" alt="Vanity">
                        </a>
                    </div>
                </div>
                
                

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp">
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_tables.jpg" alt="Tables">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp">
                            <a class="hm_arrow" href="<?php echo base_url(); ?>tables.html">
                                <h1 class="hm_arrow_title hm_sm_arrow_title">Tables</h1>
                                <div class="hm_arrow_sub_title hm_sm_arrow_sub_title trs">Shop Now</div>
                                <div class="hm_arrow_left"></div>
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp order-xl-3 order-lg-3 order-md-3 order-sm-3 order-4">
                            <a class="hm_arrow" href="<?php echo base_url(); ?>cutting-factory.html">
                                <h1 class="hm_arrow_title hm_sm_arrow_title">cutting factory</h1>
                                <div class="hm_arrow_sub_title hm_sm_arrow_sub_title trs">Shop Now</div>
                                <div class="hm_arrow_right"></div>
                            </a>
                            
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp order-xl-4 order-lg-4 order-md-4 order-sm-4 order-3">
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_slab-lines.jpg" alt="Slab Lines">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row hm_gallery_mp">
                        <a class="position-relative" href="<?php echo base_url(); ?>bath-designs/wall-panel.html">
                            <h1 class="hm_arrow_title hm_lg1_arrow_title">
                                Wall Panel
                                <div class="hm_arrow_sub_title hm_lg1_arrow_sub_title trs">Shop Now</div>
                            </h1>
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_wallpanel.jpg" alt="Wall Panel">
                        </a>
                    </div>
                </div>
                
                
                

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="row hm_gallery_mp">
                        <div class="embed-responsive embed-responsive-1by1 border border-dark border-top-0 border-right-0 border-left-0">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/9sFVxXYV92M?si=b8Uy-DX2EyEMxMCn" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>.
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <!-- <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp">
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_fibre_cement_facade_system.jpg" alt="Fibre Cement Facade System">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp">
                            <a class="hm_arrow" href="<?php echo base_url(); ?>cladding/fibre-cement-facade-system.html">
                                <h1 class="hm_arrow_title hm_sm_arrow_title">Fibre Cement Facade <br>System</h1>
                                <div class="hm_arrow_sub_title hm_sm_arrow_sub_title trs">Shop Now</div>
                                <div class="hm_arrow_left"></div>
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp order-xl-3 order-lg-3 order-md-3 order-sm-3 order-4">
                            <a class="hm_arrow" href="<?php echo base_url(); ?>cladding/terra-cotta-facade-system.html">
                                <h1 class="hm_arrow_title hm_sm_arrow_title">Terra Cotta Facade System</h1>
                                <div class="hm_arrow_sub_title hm_sm_arrow_sub_title trs">Shop Now</div>
                                <div class="hm_arrow_right"></div>
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp order-xl-4 order-lg-4 order-md-4 order-sm-4 order-3">
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_terra_cotta_facade_system.jpg" alt="Terra Cotta Facade System">
                        </div>
                    </div> -->
                    <div class="row hm_gallery_mp">
                        <a class="position-relative" href="<?php echo base_url(); ?>our-projects.html">
                            <h1 class="hm_arrow_title hm_lg1_arrow_title">
                                Projects
                                <div class="hm_arrow_sub_title hm_lg1_arrow_sub_title trs">View More</div>
                            </h1>
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/our-projects.jpg" alt="Projects">
                        </a>
                    </div>
                </div>

                
                <!--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="row hm_gallery_mp">
                        <a class="position-relative" href="<?php echo base_url(); ?>tables.html">
                            <h1 class="hm_arrow_title hm_lg2_arrow_title">Tables</h1>
                            <div class="hm_arrow_sub_title hm_lg2_arrow_sub_title trs">Shop Now</div>
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_tables.jpg" alt="Tables">
                        </a>
                    </div>
                </div>-->
                <!--<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp">
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_kitchentop.jpg" alt="Kitchen Top">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp">
                            <a class="hm_arrow" href="<?php echo base_url(); ?>kitchen/kitchen-top.html">
                                <h1 class="hm_arrow_title hm_sm_arrow_title">Kitchen Top</h1>
                                <div class="hm_arrow_sub_title hm_sm_arrow_sub_title trs">Shop Now</div>
                                <div class="hm_arrow_left"></div>
                            </a>
                        </div>
                        
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp order-xl-3 order-lg-3 order-md-3 order-sm-3 order-4">
                            <a class="hm_arrow" href="<?php echo base_url(); ?>kitchen/counter-top.html">
                                <h1 class="hm_arrow_title hm_sm_arrow_title">Counter Top</h1>
                                <div class="hm_arrow_sub_title hm_sm_arrow_sub_title trs">Shop Now</div>
                                <div class="hm_arrow_right"></div>
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp order-xl-4 order-lg-4 order-md-4 order-sm-4 order-3">
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_countertop.jpg" alt="Counter Top">
                        </div>
                    </div>
                </div>-->
                <!--<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp">
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_stairs.jpg" alt="Stairs">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp">
                            <a class="hm_arrow" href="<?php echo base_url(); ?>porcelain-design/stairs.html">
                                <h1 class="hm_arrow_title hm_sm_arrow_title">Stairs</h1>
                                <div class="hm_arrow_sub_title hm_sm_arrow_sub_title trs">Shop Now</div>
                                <div class="hm_arrow_left"></div>
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp order-xl-4 order-lg-4 order-md-4 order-sm-4 order-3">
                             <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_planterbox.jpg" alt="Planter Box"> 
                        </div> 
                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 hm_gallery_mp order-xl-3 order-lg-3 order-md-3 order-sm-3 order-4">
                            <a class="hm_arrow" href="<?php echo base_url(); ?>">
                                <h1 class="hm_arrow_title hm_sm_arrow_title"></h1>
                                <div class="hm_arrow_sub_title hm_sm_arrow_sub_title trs">Shop Now</div>
                                <div class="hm_arrow_right"></div>
                            </a>
                        </div>
                    </div>
                </div>-->
                
                <!--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="row hm_gallery_mp">
                        <a class="position-relative" href="<?php echo base_url();?>/porcelain-design/mosaic.html">
                            <h1 class="hm_arrow_title hm_lg1_arrow_title">
                                Mosaic
                                <div class="hm_arrow_sub_title hm_lg1_arrow_sub_title trs">Shop Now</div>
                            </h1>
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_mosaic.jpg" alt="Mosaic">
                        </a>
                    </div>
                </div>-->
                
                <!--<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="row hm_gallery_mp">
                        <a class="position-relative" href="<?php echo base_url(); ?>cladding/ceramic-facade-system.html">
                            <h1 class="hm_arrow_title hm_lg1_arrow_title">
                                Ceramic Facade System
                                <div class="hm_arrow_sub_title hm_lg1_arrow_sub_title trs">Shop Now</div>
                            </h1>
                            
                            <img class="img-fluid" src="<?php echo base_url(); ?>public/public/images/hm_ceramic_facade_system.jpg" alt="Ceramic Facade System">
                        </a>
                    </div>
                </div>-->
                
                

                
            </div>
        </div>
    </section>
</div>



    <!-- sj add for image tagging -->



    <script>
function drawUserCanvas() {
    var canvas = document.getElementById('userCanvas');
    var ctx = canvas.getContext('2d');
    var image = new Image();
    var titles = []; // Array to hold title data

    image.onload = function() {
        canvas.width = this.naturalWidth;
        canvas.height = this.naturalHeight;
        ctx.drawImage(image, 0, 0);
        ctx.font = '20px Arial';

        $.ajax({
            url: '<?php echo base_url(); ?>Home/getTextInputs',
            type: 'GET',
            dataType: 'json',
            success: function(textInputs) {
                textInputs.forEach(function(input) {
                    var textWidth = ctx.measureText(input.title).width;
                    var textHeight = parseInt(ctx.font, 10);
                    var padding = 8; // Padding around the text
                   

                    var buttonWidth = textWidth + (padding * 2);
                    var buttonHeight = textHeight + (padding * 2);
                    var buttonX = input.x_position - padding;
                    var buttonY = input.y_position - textHeight - padding;

                    titles.push({
                        text: input.title,
                        x: buttonX,
                        y: buttonY,
                        width: buttonWidth,
                        height: buttonHeight,
                        url: input.url
                    });
                });
            }
        });

    };

    image.src = '<?php echo base_url(); ?>public/public/images/welcome_img.jpg';

    canvas.addEventListener('mousemove', function(event) {
        var rect = canvas.getBoundingClientRect();
        var x = event.clientX - rect.left;
        var y = event.clientY - rect.top;

        // Check if mouse is within canvas bounds
        if (x >= 0 && x <= canvas.width && y >= 0 && y <= canvas.height) {
            canvas.style.cursor = 'pointer';
            displayTitles(ctx, titles); // Show all titles
        } else {
            canvas.style.cursor = 'default';
            clearCanvas(ctx, image); // Clear canvas and show image
        }
    });

    // Add mouseout event listener to clear the canvas and reset cursor
    canvas.addEventListener('mouseout', function() {
        canvas.style.cursor = 'default';
        clearCanvas(ctx, image);
    });

    canvas.addEventListener('click', function(event) {
        var rect = canvas.getBoundingClientRect();
        var scaleX = canvas.width / rect.width;
        var scaleY = canvas.height / rect.height;

        var x = (event.clientX - rect.left) * scaleX;
        var y = (event.clientY - rect.top) * scaleY;

        titles.forEach(function(title) {
            if (x >= title.x && x <= (title.x + title.width) && y >= title.y && y <= (title.y + title.height)) {
                window.open(title.url, '_blank'); // Opens the link in a new tab
            }
        });
    });
}

function displayTitles(ctx, titles) {
    titles.forEach(function(title) {
        // Draw button rectangle
        ctx.fillStyle = 'white';
        ctx.fillRect(title.x, title.y, title.width, title.height);

        // Draw text on the button
        ctx.fillStyle = 'black';
        ctx.fillText(title.text, title.x + 10, title.y + 20);
    });
}

function clearCanvas(ctx, image) {
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
    ctx.drawImage(image, 0, 0);
}
window.onload = function() {
    drawUserCanvas();
    drawsobiya();
};
</script>





<!-- home banner -->

<script>
function drawsobiya() {
    var carouselItems = document.querySelectorAll('.carousel-item');

    carouselItems.forEach(function(item, index) {
        var image = item.querySelector('img');
        if (!image) return;

        var carouselItemId = item.getAttribute('data-tag-id'); // Get the tag_id from data attribute

        var imageContainer = image.parentElement;

        // Fetch and create title divs for each image based on the image ID
        $.ajax({
            url: '<?php echo base_url(); ?>Home/getTextInputs11/' + carouselItemId, // Use carousel item ID in the URL
            type: 'GET',
            dataType: 'json',
            success: function(textInputs) {
                textInputs.forEach(function(input) {
                    var titleDiv = document.createElement('div');
                    titleDiv.style.position = 'absolute';
                    titleDiv.style.left = (input.x_position) + 'px';
                    titleDiv.style.top = (input.y_position) + 'px';
                    titleDiv.style.padding = '1px 3px';
                    titleDiv.style.fontSize = '12px';
                    titleDiv.style.background = 'white'; // Set white background
                    titleDiv.style.color = 'black'; // Set text color to black
                    titleDiv.style.cursor = 'pointer';
                    titleDiv.style.display = 'none'; // Initially hidden
                    titleDiv.innerText = input.title;
                    titleDiv.onclick = function() { window.open(input.url, '_blank'); };
                    imageContainer.appendChild(titleDiv);
                });
            }
        });

   
  
        // Show titles when hovering over the carousel item
        item.addEventListener('mouseenter', function() {
            var titleDivs = item.querySelectorAll('div');
            titleDivs.forEach(function(div) {
                div.style.display = 'block';
            });
        });

        // Hide titles when not hovering over the carousel item
        item.addEventListener('mouseleave', function() {
            var titleDivs = item.querySelectorAll('div');
            titleDivs.forEach(function(div) {
                div.style.display = 'none';
            });
        });
    });
}
 
window.onload = function() {
    drawUserCanvas();
    drawsobiya();
};
</script>



<!-- end -->