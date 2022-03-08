

(function($) {
    /* "use strict" */
	
 var dzChartlist = function(){
	
	let draw = Chart.controllers.line.__super__.draw; //draw shadow
	var screenWidth = $(window).width();
	
	var donutChart1 = function(){
		$("span.donut1").peity("donut", {
			width: "90",
			height: "90"
		});
		if ( $(window).width() <= 1400 ) {
				$("span.donut1").peity("donut", {width: '75', height: '75'});
			} else {
				$("span.donut1").peity("donut", {width: '90', height: '90'});
			}
		$(window).resize(function(){
			if ( $(window).width() <= 1400 ) {
				$("span.donut1").peity("donut", {width: '75', height: '75'});
			} else {
				$("span.donut1").peity("donut", {width: '90', height: '90'});
			}
		})
		
	}
	
	var chartTimeline1 = function(){
		
		var optionsTimeline = {
			chart: {
				type: "bar",
				height: 270,
				stacked: true,
				toolbar: {
					show: false
				},
				sparkline: {
					//enabled: true
				},
				offsetX: -10,
			},
			series: [
				 {
					name: "New Clients",
					data: [300, 450, 200, 600, 400, 350, 410, 470, 480, 700, 500, 400, 400, 600, 250, 250, 500, 450, 300, 400, 200]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "20%",
					borderRadius: 5,
					
					colors: {
						backgroundBarOpacity: 1,
						backgroundBarRadius: 5,
					},

				},
				distributed: true
			},
			
			colors:['var(--primary)'],
			grid: {
				show: true,
				strokeDashArray: 3,
				borderColor: '#9B9B9B',
			
			
			},
			legend: {
				show: false
			},
			fill: {
			  opacity: 1
			},
			dataLabels: {
				enabled: false,
				colors: ['#000'],
				dropShadow: {
				  enabled: true,
				  top: 1,
				  left: 1,
				  blur: 1,
				  opacity: 1
			  }
			},
			stroke:{
				 show: true,	
				 curve: 'smooth',
				 lineCap: 'rounded',
			},
			xaxis: {
			 categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
			  labels: {
			   style: {
				  colors: '#3E4954',
				  fontSize: '13px',
				  fontFamily: 'poppins',
				  fontWeight: 100,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
				show: false,
			  },
			  axisBorder: {
				  show: false,
				},
			axisTicks:{
				  show: false,
			},
				
			},
			yaxis: {
			labels: {
			   style: {
				  colors: '#3E4954',
				  fontSize: '14px',
				   fontFamily: 'Poppins',
				  fontWeight: 100,
				  
				},
				 formatter: function (y) {
						  return y.toFixed(0) + "";
						}
			  },
			},
			tooltip: {
				x: {
					show: true
				}
			},
			 responsive: [{
				breakpoint: 575,
				options: {
					chart: {
						height: 250,
					},
					series: [
						 {
							name: "New Clients",
							data: [300, 250, 600, 600, 400, 450, 310, 470, 480]
						}
					],
					xaxis: {
					categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
					}
				}
			 }]
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline1"), optionsTimeline);
		 chartTimelineRender.render();
	}
	var revenueChart = function(){
	  var options = {
		  series: [
			{
				name: 'Net Profit',
				data: [20, 30, 20, 30, 20, 30, 20,30],
				//radius: 12,	
			}, 				
		],
			chart: {
			type: 'area',
			height: 230,
			toolbar: {
				show: false,
			},
			
		},
		plotOptions: {
		  bar: {
			horizontal: false,
			columnWidth: '55%',
			endingShape: 'rounded'
		  },
		},
		colors:['var(--primary)'],
		dataLabels: {
		  enabled: false,
		},
		markers: {
			shape: "circle",
		},

		legend: {
			show: false,
		},
		stroke: {
		  show: true,
		  width: 4,
		  curve:'smooth',
		  colors:['var(--primary)'],
		},
		
		grid: {
			borderColor: '#eee',
			xaxis: {
				lines: {
					show: true
				}
			},   
			yaxis: {
				lines: {
					show: false
				}
			},  
		},
		xaxis: {
			
		  categories: ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00'],
		  labels: {
			style: {
				colors: '#7E7F80',
				fontSize: '13px',
				fontFamily: 'Poppins',
				fontWeight: 100,
				cssClass: 'apexcharts-xaxis-label',
			},
		  },
		  crosshairs: {
		  show: false,
		  }
		},
		yaxis: {
		show:true,	
		labels: {
			offsetX: -15,
		   style: {
			  colors: '#7E7F80',
			  fontSize: '14px',
			   fontFamily: 'Poppins',
			  fontWeight: 100,
			  
			},
			 formatter: function (y) {
					  return y.toFixed(0) + "";
					}
		  },
		},
		fill: {
			type:"solid",
		  opacity: 1,
		  colors:'var(--primary)'
		},
		tooltip: {
		  y: {
			formatter: function (val) {
			  return "$ " + val + " thousands"
			}
		  }
		}
		};

		var chartBar1 = new ApexCharts(document.querySelector("#revenueChart"), options);
		chartBar1.render();
	 
		 
	}
	var chartTimeline2 = function(){
		
		var optionsTimeline = {
			chart: {
				type: "bar",
				height: 270,
				stacked: true,
				toolbar: {
					show: false
				},
				sparkline: {
					//enabled: true
				},
				offsetX: -10,
			},
			series: [
				 {
					name: "New Clients",
					data: [300, 450, 200, 600, 400, 350, 410, 470, 480, 700, 500, 400, 400, 600, 250, 250, 500, 450, 300, 400, 200]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "20%",
					borderRadius: 5,
					
					colors: {
						backgroundBarOpacity: 1,
						backgroundBarRadius: 5,
					},

				},
				distributed: true
			},
			
			colors:['var(--primary)'],
			grid: {
				show: true,
				strokeDashArray: 3,
				borderColor: '#9B9B9B',
			
			
			},
			legend: {
				show: false
			},
			fill: {
			  opacity: 1
			},
			dataLabels: {
				enabled: false,
				colors: ['#000'],
				dropShadow: {
				  enabled: true,
				  top: 1,
				  left: 1,
				  blur: 1,
				  opacity: 1
			  }
			},
			stroke:{
				 show: true,	
				 curve: 'smooth',
				 lineCap: 'rounded',
			},
			xaxis: {
			 categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
			  labels: {
			   style: {
				  colors: '#3E4954',
				  fontSize: '13px',
				  fontFamily: 'poppins',
				  fontWeight: 100,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
				show: false,
			  },
			  axisBorder: {
				  show: false,
				},
			axisTicks:{
				  show: false,
			},
				
			},
			yaxis: {
			labels: {
			   style: {
				  colors: '#3E4954',
				  fontSize: '14px',
				   fontFamily: 'Poppins',
				  fontWeight: 100,
				  
				},
				 formatter: function (y) {
						  return y.toFixed(0) + "";
						}
			  },
			},
			tooltip: {
				x: {
					show: true
				}
			},
			 responsive: [{
				breakpoint: 575,
				options: {
					chart: {
						height: 250,
					},
					series: [
						 {
							name: "New Clients",
							data: [300, 250, 600, 600, 400, 450, 310, 470, 480]
						}
					],
					xaxis: {
					categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
					}
				}
			 }]
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline2"), optionsTimeline);
		 chartTimelineRender.render();
	}
	var chartTimeline3 = function(){
		
		var optionsTimeline = {
			chart: {
				type: "bar",
				height: 270,
				stacked: true,
				toolbar: {
					show: false
				},
				sparkline: {
					//enabled: true
				},
				offsetX: -10,
			},
			series: [
				 {
					name: "New Clients",
					data: [300, 450, 200, 600, 400, 350, 410, 470, 480, 700, 500, 400, 400, 600, 250, 250, 500, 450, 300, 400, 200]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "20%",
					borderRadius: 5,
					
					colors: {
						backgroundBarOpacity: 1,
						backgroundBarRadius: 5,
					},

				},
				distributed: true
			},
			
			colors:['var(--primary)'],
			grid: {
				show: true,
				strokeDashArray: 3,
				borderColor: '#9B9B9B',
			
			
			},
			legend: {
				show: false
			},
			fill: {
			  opacity: 1
			},
			dataLabels: {
				enabled: false,
				colors: ['#000'],
				dropShadow: {
				  enabled: true,
				  top: 1,
				  left: 1,
				  blur: 1,
				  opacity: 1
			  }
			},
			stroke:{
				 show: true,	
				 curve: 'smooth',
				 lineCap: 'rounded',
			},
			xaxis: {
			 categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28'],
			  labels: {
			   style: {
				  colors: '#3E4954',
				  fontSize: '13px',
				  fontFamily: 'poppins',
				  fontWeight: 100,
				  cssClass: 'apexcharts-xaxis-label',
				},
			  },
			  crosshairs: {
				show: false,
			  },
			  axisBorder: {
				  show: false,
				},
			axisTicks:{
				  show: false,
			},
				
			},
			yaxis: {
			labels: {
			   style: {
				  colors: '#3E4954',
				  fontSize: '14px',
				   fontFamily: 'Poppins',
				  fontWeight: 100,
				  
				},
				 formatter: function (y) {
						  return y.toFixed(0) + "";
						}
			  },
			},
			tooltip: {
				x: {
					show: true
				}
			},
			 responsive: [{
				breakpoint: 575,
				options: {
					chart: {
						height: 250,
					},
					series: [
						 {
							name: "New Clients",
							data: [300, 250, 600, 600, 400, 450, 310, 470, 480]
						}
					],
					xaxis: {
					categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
					}
				}
			 }]
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline3"), optionsTimeline);
		 chartTimelineRender.render();
	}
	
	
 
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
				donutChart1();	
				revenueChart();
				chartTimeline1();
				chartTimeline2();
				chartTimeline3();
				
			},
			
			resize:function(){
			}
		}
	
	}();

	
		
	jQuery(window).on('load',function(){
		setTimeout(function(){
			dzChartlist.load();
		}, 1000); 
		
	});

     

})(jQuery);