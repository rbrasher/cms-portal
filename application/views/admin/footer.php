</div>
<!-- /#wrapper -->
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<?php if($this->uri->segment(2) == 'dashboard') : ?>
<script src="<?php echo base_url();?>js/plugins/morris/raphael.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/morris/morris.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/morris/morris-data.js"></script>
<?php endif;?>
<?php if($this->uri->segment(2) == 'map') : ?>
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7"></script>
<script src="<?php echo base_url();?>js/maplacejs-0.1.3.min.js"></script>
<!--
'http://maps.google.com/mapfiles/marker.png'
-->
<script type="text/javascript">
$(function() {
    //http://maplacejs.com/
    var LocsA = [
        <?php foreach($locations as $location) : 

            $coords = explode(',', $location->lat_lng);
        ?>
        {
            lat: <?php echo floatval($coords[0]);?>,
            lon: <?php echo floatval($coords[1]);?>,
            title: '<?php echo $location->name;?>',
            html: [
                "<h3><?php echo $location->name;?></h3>",
                "<p>Manager: <?php if($location->manager !== '') {echo $location->manager;} else {echo 'N/A';};?></p>"
            ].join(''),
            icon: "<?php if($location->status == 'Active') { echo base_url() . 'img/green-marker.png';} else {echo base_url() . 'img/red-marker.png';};?>",
            animation: google.maps.Animation.DROP
        },
        <?php endforeach; ?>
    ];

    new Maplace({
        locations: LocsA,
        map_div: '#gmap',
        controls_on_map: true
    }).Load();
});
</script>
<?php endif;?>
</body>
</html>