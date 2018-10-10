<style>
.hide-bullets {
    list-style:none;
    margin-left: -40px;
    margin-top:20px;
}
</style>
<div class="container">
    <div id="main_area">
        <!-- Slider -->
        <div class="row">
            <div class="col-xs-12" id="slider">
                <!-- Top part of the slider -->
                <div class="row">
                    <div class="col-sm-8" id="carousel-bounding-box">
                        <div class="carousel slide" id="myCarousel">
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                <div class="item active" data-slide-number="0">
                                    <img src="https://www.diabetes.co.uk/in-depth/wp-content/uploads/2017/10/brooke-lark-229136-770x300.jpg"/>
                                </div>
                                @for($i=0;$i<5;$i++)
                                <div class="item" data-slide-number="0">
                                    <img src="https://www.diabetes.co.uk/in-depth/wp-content/uploads/2017/10/brooke-lark-229136-770x300.jpg"/>
                                </div>
                                @endfor
                            </div>
                            <!-- Carousel nav -->
                            <a class="left carousel-control" data-slide="prev" href="#myCarousel" role="button">
                                <span class="glyphicon glyphicon-chevron-left">
                                </span>
                            </a>
                            <a class="right carousel-control" data-slide="next" href="#myCarousel" role="button">
                                <span class="glyphicon glyphicon-chevron-right">
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4" id="carousel-text">
                    </div>
                    <div id="slide-content" style="display: none;">
                        @for($i=0;$i<5;$i++)
                        <div id="slide-content-0">
                            <h2>
                                Nhà hàng X
                            </h2>
                            <p>
                                Lorem Ipsum Dolor
                            </p>
                            <p class="sub-text">
                                October 24 2014 -
                                <a href="#">
                                    Read more
                                </a>
                            </p>
                        </div>
                        @endfor
                       
                    </div>
                </div>
            </div>
        </div>
        <!--/Slider-->
        <div class="row hidden-xs" id="slider-thumbs">
            <!-- Bottom switcher of slider -->
            <ul class="hide-bullets">
                @for($i=0;$i<6;$i++)
                <li class="col-sm-2">
                    <a class="thumbnail" id="carousel-selector-0">
                        <img src="https://www.diabetes.co.uk/in-depth/wp-content/uploads/2017/10/brooke-lark-229136-770x300.jpg" style="width: 170px;height: 100px"/>
                    </a>
                </li>
                @endfor
            </ul>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {

        $('#myCarousel').carousel({
            interval: 3000
        });

        $('#carousel-text').html($('#slide-content-0').html());

        $('[id^=carousel-selector-]').click( function(){
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });
        $('#myCarousel').on('slid.bs.carousel', function (e) {
             var id = $('.item.active').data('slide-number');
             $('#carousel-text').html($('#slide-content-'+id).html());
          });
    });
 </script>