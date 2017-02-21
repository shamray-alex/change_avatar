<div id="myCarouselTemplate" class="carousel slide" data-ride="carousel">
    <div class="row">
        <div class="col-xs-offset-2 col-xs-8">
            <div class="carousel-inner" role="listbox">
                <?php
                $active = ' active';
                foreach ($headlines as $key => $headline) {
                    ?>
                    <div class="item<?= $active ?>">
                        <div class="carousel-content">
                            <div>
                                <h3><?= $headline ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php
                    $active = '';
                }
                ?>
            </div>
        </div>
    </div>

    <a class="left carousel-control" href="#myCarouselTemplate" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarouselTemplate" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: false
        });

        $("#headline").html('');
        $(".carousel").appendTo("#headline");
    });
</script>