<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/mobilymap.js" type="text/javascript"></script>
<script type="text/javascript">
	
	$(function(){
	
		$('.europe_map').mobilymap({
			position: 'center',
			popupClass: 'bubble',
			markerClass: 'point',
			popup: true,
			cookies: false,
			caption: false,
			setCenter: true,
			navigation: true,
			navSpeed: 1000,
			navBtnClass: 'navBtn',
			outsideButtons: '.map_buttons a',
			onMarkerClick: function(){},
			onPopupClose: function(){},
			onMapLoad: function(){}
		});
		
	});

</script>
    <script type="text/javascript">
        $(document).ready(function(){
            var docked = 0;
            
            $("#dock li ul").height($(window).height());
            
            $("#dock .dock").click(function(){
                $(this).parent().parent().addClass("docked").removeClass("free");
                
                docked += 1;
                var dockH = ($(window).height()) / docked
                var dockT = 0;               
                
                $("#dock li ul.docked").each(function(){
                    $(this).height(dockH).css("top", dockT + "px");
                    dockT += dockH;
                });
                $(this).parent().find(".undock").show();
                $(this).hide();
            });
            
             $("#dock .undock").click(function(){
                $(this).parent().parent().addClass("free").removeClass("docked")
                    .animate({left:"-180px"}, 200).height($(window).height()).css("top", "0px");
                
                docked = docked - 1;
                var dockH = ($(window).height()) / docked
                var dockT = 0;               
                
                $("#dock li ul.docked").each(function(){
                    $(this).height(dockH).css("top", dockT + "px");
                    dockT += dockH;
                });
                $(this).parent().find(".dock").show();
                $(this).hide();
            });

            $("#dock li").hover(function(){
                $(this).find("ul").animate({left:"40px"}, 200);
            }, function(){
                $(this).find("ul.free").animate({left:"-180px"}, 200);
           });
        }); 
    </script>
<style type="text/css">
	.mapNav {
		display:none;
	}
	.europe_map {
		width:920px;
		height:600px;

	}
</style>
					<section class="post">
						<div>
							<h2>Denah Ruang</h2>
								<div class="europe_map">
									<img src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/images/peta.jpg" alt="" width="2000" height="2000" />
									<?php
										echo $dt;
									?>
								</div>
								<ul id="dock">
							        <li id="links">
							            <ul class="map_buttons">
							                <li class="header">
							                	<a href="#" class="dock">+ Dock</a><a href="#" class="undock">- Undock</a></li>
							        		<div id="pane3" class="scroll-pane">
											<?php
												echo $dt_koor;
											?>
							        		</div>
							            </ul>
							        </li>
							    </ul>
						</div>
						<div class="cl">&nbsp;</div>
					</section>