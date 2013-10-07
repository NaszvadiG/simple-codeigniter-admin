<link class="include" rel="stylesheet" type="text/css" href="<?php echo GRAPH_PATH?>jquery.jqplot.css" />

<script class="include" type="text/javascript" src="<?php echo GRAPH_PATH?>jquery.jqplot.js"></script>
<script class="include" type="text/javascript" src="<?php echo GRAPH_PATH?>plugins/jqplot.barRenderer.js"></script>
<script class="include" type="text/javascript" src="<?php echo GRAPH_PATH?>plugins/jqplot.highlighter.js"></script>
<script class="include" type="text/javascript" src="<?php echo GRAPH_PATH?>plugins/jqplot.cursor.js"></script> 
<script class="include" type="text/javascript" src="<?php echo GRAPH_PATH?>plugins/jqplot.pointLabels.js"></script>

<link class="include" rel="stylesheet" type="text/css" href="<?php echo GRAPH_PATH?>css/jquery.jqplot.css" />
<script class="code" type="text/javascript">
$(document).ready(function () {
	var s1 = [[2002, 500], [2003, 600], [2004, 700], [2005, 800], [2006, 900], 
	[2007, 1000], [2008, 1100], [2009, 1330], [2010, 1610], [2011, 1730]];

	plot1 = $.jqplot("chart1", [s1], {
		// Turns on animatino for all series in this plot.
		animate: true,
		// Will animate plot on calls to plot1.replot({resetAxes:true})
		animateReplot: true,
		cursor: {
			show: false,
			zoom: false,
			looseZoom: false,
			showTooltip: false
		},
		series:[
			{
				pointLabels: {
					show: true
				},
				renderer: $.jqplot.BarRenderer,
				showHighlight: false,
				yaxis: 'yaxis',
				rendererOptions: {
					// Speed up the animation a little bit.
					// This is a number of milliseconds.  
					// Default for bar series is 3000.  
					animation: {
						speed: 2500
					},
					barWidth: 15,
					barPadding: -15,
					barMargin: 0,
					highlightMouseOver: false
				}
			}, 
			{
				rendererOptions: {
					// speed up the animation a little bit.
					// This is a number of milliseconds.
					// Default for a line series is 2500.
					animation: {
						speed: 2000
					}
				}
			}
		],
		axesDefaults: {
			pad: 0
		},
		axes: {
			// These options will set up the x axis like a category axis.
			xaxis: {
				tickInterval: 1,
				drawMajorGridlines: false,
				drawMinorGridlines: true,
				drawMajorTickMarks: false,
				rendererOptions: {
				tickInset: 0.5,
				minorTicks: 1
			}
			},
			yaxis: {
				rendererOptions: {
					forceTickAt0: true
				}
			}
		},
		highlighter: {
			show: true, 
			showLabel: true, 
			tooltipAxes: 'y',
			sizeAdjust: 7.5 , tooltipLocation : 'ne'
		}
	});
  
});
</script>


<div id="content-table-inner">
    <div id="chart1" style="width:700px; height:300px"></div>
  <div class="clear"></div>
</div>