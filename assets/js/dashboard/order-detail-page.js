

(function($) {
    /* "use strict" */
	
 var dzChartlist = function(){
	
	var screenWidth = $(window).width();	
	
	var pieChart2 = function(){
		 var options = {
          series: [34, 12, 41],
          chart: {
          type: 'donut',
		  height:250
        },
		dataLabels:{
			enabled: false
		},
		stroke: {
          width: 0,
        },
		colors:['#624FD1', '#72C1E2', '#FFA41D'],
		legend: {
              position: 'bottom',
			  show:false
            },
        responsive: [{
          breakpoint: 768,
          options: {
           chart: {
			  height:200
			},
			
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#pieChart2"), options);
        chart.render();
    
	}
	
	
	
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
				pieChart2();
				
			},
			
			resize:function(){
			}
		}
	
	}();

	
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 2000); 
		
	});

     

})(jQuery);