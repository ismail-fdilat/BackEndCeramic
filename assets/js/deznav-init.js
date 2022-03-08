
"use strict"

var dezSettingsOptions = {};

function getUrlParams(dParam) 
	{
		var dPageURL = window.location.search.substring(1),
			dURLVariables = dPageURL.split('&'),
			dParameterName,
			i;

		for (i = 0; i < dURLVariables.length; i++) {
			dParameterName = dURLVariables[i].split('=');

			if (dParameterName[0] === dParam) {
				return dParameterName[1] === undefined ? true : decodeURIComponent(dParameterName[1]);
			}
		}
	}

(function($) {
	
	"use strict"
	
	/* var direction =  getUrlParams('dir');
	
	if(direction == 'rtl')
	{
        direction = 'rtl'; 
    }else{
        direction = 'ltr'; 
    } */
	
	dezSettingsOptions = {
			typography: "opensans",
			version: "dark",
			layout: "vertical",
		//	primary: "color_1",
			headerBg: "color_3",
		//	navheaderBg: "color_1",
		//	sidebarBg: "color_1",
			sidebarStyle: "full",
			sidebarPosition: "fixed",
			headerPosition: "fixed",
			containerLayout: "full",
		};

	
	
	
	new dezSettings(dezSettingsOptions); 

	jQuery(window).on('resize',function(){
        dezSettingsOptions.containerLayout = $('#container_layout').val();
        
		new dezSettings(dezSettingsOptions); 
	});
	
})(jQuery);