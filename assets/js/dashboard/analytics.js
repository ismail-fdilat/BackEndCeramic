

(function($) {
    /* "use strict" */
	
 var dzChartlist = function(){
	
	var screenWidth = $(window).width();
	
	
	var BarCharts = function(){
		 var options = {
          series: [{
          name: 'Beverages   <span class="value">569</span>',
          data: [30, 20, 30, 20, 20]
        }, {
          name: 'Food  <span class="value"> 1,567</span>',
          data: [40, 25, 40, 30, 25]
        }],
          chart: {
          type: 'bar',
          height: 360,
		  toolbar: {
					show: false
				},
        },
		grid: {	
			show: false
		},
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded',
			startingShape: "rounded",
			borderRadius: 7,
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 0,
          colors: ['transparent'],
		  lineCap: 'smooth',
        },
        xaxis: {
          categories: ['Week 01', 'Week 02', 'Week 03', 'Week 04', 'Week 05'],
		   labels: {
			show: true,
			style:{
				fontSize:"14px",
				fontWeight:500,
				colors:"#787878",
			}
		   },
			 axisBorder:{
				   show: false,	
			 },
			 axisTicks: {
				show: false,
			},
        },
        yaxis: {
			show: true	,
			labels: {
			show: true,
			style:{
				fontSize:"14px",
				fontWeight:500,
				colors:"#787878",
			}
		   },
        },
		legend:{
			position: 'top',
			horizontalAlign: 'left', 
			fontWeight: 300,
			fontSize:'16px',
			fontFamily:'poppins',
			colors:['#202020'],
			
			 markers:{
				  radius: 12,
			 },
		},
        fill: {
          opacity: 1
        },
		colors: ['#624FD1', 'var(--primary)'],
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#BarCharts"), options);
        chart.render();
	}
	
	var donutChart1 = function(){
		$("span.donut1").peity("donut", {
			width: "90",
			height: "90"
		});
		$(window).resize(function(){
			if ( $(window).width() <= 1600 ) {
				$("span.donut").peity("donut", {width: '50', height: '50'});
			} else {
				$("span.donut").peity("donut", {width: '90', height: '90'});
			}
		})
	}
	var currentChart1 = function(){
		 var options = {
		  series: [85, 60, 67],
		  chart: {
		  height: 350,
		  type: 'radialBar',
		},
		plotOptions: {
		  radialBar: {
				startAngle:-160,
			   endAngle: 160,
				dataLabels: {
			  name: {
				fontSize: '22px',
			  },
			  value: {
				fontSize: '16px',
			  },
			}
		  },
		},
		stroke:{
			 lineCap: 'round',
		},
		labels: ['Income', 'Income', 'Imcome'],
		 colors:['#FD683E', '#FFAF65','#FFE5A0'],
		 
		 
		 responsive: [{
			breakpoint: 1601,
			options: {
				chart: {
				  height: 250,
				  type: 'radialBar',
				},
				
			}
		 }]
		 
		};
		

		var chart = new ApexCharts(document.querySelector("#currentChart1"), options);
		chart.render();
	}
	var chartTimeline = function(){
		
		var optionsTimeline = {
			chart: {
				type: "bar",
				height: 300,
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
					data: [60, 20, 60, 90, 50, 10, 20]
				}
			],
			
			plotOptions: {
				bar: {
					columnWidth: "28%",
					endingShape: "rounded",
					startingShape: "rounded",
					borderRadius: 2,
					
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
				 lineCap: 'butt',
			},
			xaxis: {
			 categories: ['04', '05', '06', '07', '8', '9', '10'],
			  labels: {
			   style: {
				  colors: '#808080',
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
				  colors: '#808080',
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
				breakpoint: 375,
				options: {
					xaxis: {
					categories: ['06', '07', '08', '09', '10', '11'],
					},
					chart: {
						height: 250,
					},
					series: [
						 {
							name: "New Clients",
							data: [300, 250, 600, 600, 400, 450],
						}
					],
					
				}
			 },
			 {
				breakpoint: 575,
				options: {
					chart: {
						height: 250,
					},
					series: [
						 {
							name: "New Clients",
							data: [300, 250, 600, 600, 400, 450, 310, 470, 480],
						}
					],
					xaxis: {
					categories: ['06', '07', '08', '09', '10', '11', '12', '13', '14'],
					}
				}
			 }
			 
			 ]
		};
		var chartTimelineRender =  new ApexCharts(document.querySelector("#chartTimeline"), optionsTimeline);
		 chartTimelineRender.render();
	}
	var NewCustomers = function(){
		var options = {
		  series: [
			{
				name: 'Net Profit',
				data: [100,200, 100, 300, 200, 400],
				/* radius: 30,	 */
			}, 				
		],
			chart: {
			type: 'line',
			height: 20,
			width: 50,
			toolbar: {
				show: false,
			},
			zoom: {
				enabled: false
			},
			sparkline: {
				enabled: true
			}
			
		},
		
		colors:['#0E8A74'],
		dataLabels: {
		  enabled: false,
		},

		legend: {
			show: false,
		},
		stroke: {
		  show: true,
		  width: 6,
		  curve:'smooth',
		  colors:['#F43D3D'],
		},
		
		grid: {
			show:false,
			borderColor: '#eee',
			padding: {
				top: 0,
				right: 0,
				bottom: 0,
				left: 0

			}
		},
		states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
		xaxis: {
			categories: ['Jan', 'feb', 'Mar', 'Apr', 'May'],
			axisBorder: {
				show: false,
			},
			axisTicks: {
				show: false
			},
			labels: {
				show: false,
				style: {
					fontSize: '12px',
				}
			},
			crosshairs: {
				show: false,
				position: 'front',
				stroke: {
					width: 1,
					dashArray: 3
				}
			},
			tooltip: {
				enabled: true,
				formatter: undefined,
				offsetY: 0,
				style: {
					fontSize: '12px',
				}
			}
		},
		yaxis: {
			show: false,
		},
		fill: {
		  opacity: 1,
		  colors:'#FB3E7A'
		},
		tooltip: {
			style: {
				fontSize: '12px',
			},
			y: {
				formatter: function(val) {
					return "$" + val + " thousands"
				}
			}
		}
		};

		var chartBar1 = new ApexCharts(document.querySelector("#NewCustomers"), options);
		chartBar1.render();
	 
	}
	var NewCustomers1 = function(){
		var options = {
		  series: [
			{
				name: 'Net Profit',
				data: [100,200, 100, 300, 200, 400],
				/* radius: 30,	 */
			}, 				
		],
			chart: {
			type: 'line',
			height: 20,
			width: 50,
			toolbar: {
				show: false,
			},
			zoom: {
				enabled: false
			},
			sparkline: {
				enabled: true
			}
			
		},
		
		colors:['#0E8A74'],
		dataLabels: {
		  enabled: false,
		},

		legend: {
			show: false,
		},
		stroke: {
		  show: true,
		  width: 6,
		  curve:'smooth',
		  colors:['#F43D3D'],
		},
		
		grid: {
			show:false,
			borderColor: '#eee',
			padding: {
				top: 0,
				right: 0,
				bottom: 0,
				left: 0

			}
		},
		states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
		xaxis: {
			categories: ['Jan', 'feb', 'Mar', 'Apr', 'May'],
			axisBorder: {
				show: false,
			},
			axisTicks: {
				show: false
			},
			labels: {
				show: false,
				style: {
					fontSize: '12px',
				}
			},
			crosshairs: {
				show: false,
				position: 'front',
				stroke: {
					width: 1,
					dashArray: 3
				}
			},
			tooltip: {
				enabled: true,
				formatter: undefined,
				offsetY: 0,
				style: {
					fontSize: '12px',
				}
			}
		},
		yaxis: {
			show: false,
		},
		fill: {
		  opacity: 1,
		  colors:'#FB3E7A'
		},
		tooltip: {
			style: {
				fontSize: '12px',
			},
			y: {
				formatter: function(val) {
					return "$" + val + " thousands"
				}
			}
		}
		};

		var chartBar1 = new ApexCharts(document.querySelector("#NewCustomers1"), options);
		chartBar1.render();
	 
	}
	var NewCustomers2 = function(){
		var options = {
		  series: [
			{
				name: 'Net Profit',
				data: [100,200, 100, 300, 200, 400],
				/* radius: 30,	 */
			}, 				
		],
			chart: {
			type: 'line',
			height: 20,
			width: 50,
			toolbar: {
				show: false,
			},
			zoom: {
				enabled: false
			},
			sparkline: {
				enabled: true
			}
			
		},
		
		colors:['#0E8A74'],
		dataLabels: {
		  enabled: false,
		},

		legend: {
			show: false,
		},
		stroke: {
		  show: true,
		  width: 6,
		  curve:'smooth',
		  colors:['#F43D3D'],
		},
		
		grid: {
			show:false,
			borderColor: '#eee',
			padding: {
				top: 0,
				right: 0,
				bottom: 0,
				left: 0

			}
		},
		states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
		xaxis: {
			categories: ['Jan', 'feb', 'Mar', 'Apr', 'May'],
			axisBorder: {
				show: false,
			},
			axisTicks: {
				show: false
			},
			labels: {
				show: false,
				style: {
					fontSize: '12px',
				}
			},
			crosshairs: {
				show: false,
				position: 'front',
				stroke: {
					width: 1,
					dashArray: 3
				}
			},
			tooltip: {
				enabled: true,
				formatter: undefined,
				offsetY: 0,
				style: {
					fontSize: '12px',
				}
			}
		},
		yaxis: {
			show: false,
		},
		fill: {
		  opacity: 1,
		  colors:'#FB3E7A'
		},
		tooltip: {
			style: {
				fontSize: '12px',
			},
			y: {
				formatter: function(val) {
					return "$" + val + " thousands"
				}
			}
		}
		};

		var chartBar1 = new ApexCharts(document.querySelector("#NewCustomers2"), options);
		chartBar1.render();
	 
	}
	
	
	
	
	
 
	/* Function ============ */
		return {
			init:function(){
			},
			
			
			load:function(){
				BarCharts();
				donutChart1();
				currentChart1();
				chartTimeline();
				NewCustomers();
				NewCustomers1();
				NewCustomers2();
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