<!DOCTYPE html>
<html lang="vi">
@include('clients.layouts.partials.head')
<body>
    {{-- fb connect --}}
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0" nonce="bK8uBIUx"></script>

    <!-- <div id="topbar"></div> -->
  <div class="WrapperBG">
    <div id="wrapper" >
      <div id="wrapperIn">
        @include('clients.layouts.partials.header')
        <div class="Main">
          <div class="MainContent ck-content" id="boxContent">
            @include('clients.layouts.partials.searchbox')
            <div id="static">
              <div class="StaticOuter">
                <div class="StaticInner">
                      <!-- Begin block search_timkiem - MTk0ODR8MjJ8c2VhcmNofDU1OXx0aW4tdHVjfHRpbWtpZW18UEhQ -->
                  @include('clients.layouts.partials.breadcrumb')

                      <!-- Begin module news - bmV3c3w1NTl8dGluLXR1Yw -->
                  <div class="StaticMain">
                    @yield('content')
                  </div>
                  <input value="bmV3c3w1NTl8dGluLXR1Yw" id="moduleOuputId" type="hidden" />
                            <!-- End module news -->
                </div>
              </div>
            </div>
          </div>
                  <!--end mainContent--> 
        </div>
      </div>
                  <!-- Begin block Main_Footer_MainFooter - MTkyfE1haW5fRm9vdGVyfDU1OXx0aW4tdHVjfE1haW5Gb290ZXJ8SFRNTA -->
      @include('clients.layouts.partials.footer')
                <!-- End block Main_Footer_MainFooter --> 
    </div>
  </div>

    

<!-- End block Main_Sidebar_MainSidebar -->
<script type="text/javascript">	
	var SITE_URL = "192.168.1.200";
	var IMG_URL = "http://img.zing.vn/volamthuphi";
	var activemenu_nav = "";
	var	activesidenav = "";
</script>
<!-- htmld2p:JS -->
<script type="text/javascript" src="{{asset('clients/asset/js/zingvn/mainsite1.js')}}"></script>
<script type="text/javascript" src="{{asset('clients/asset/js/zingvn/navigation.js')}}"></script> 
<script type="text/javascript" src="{{asset('clients/asset/js/zingvn/navigation_left.js')}}"></script> 
<script type="text/javascript" src="{{asset('clients/asset/js/zingvn/call_navigation.js')}}"></script>
<script type="text/javascript" src="{{asset('clients/asset/js/zingvn/common-sub.js')}}"></script>  
<script type="text/javascript" src="{{asset('clients/asset/js/zingvn/trang-bi.js')}}"></script> 
<script type="text/javascript" src="{{asset('clients/asset/js/zingvn/rebuilt-common.js')}}"></script>
<!-- htmld2p:END. JS --> 
<script>
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
<script language="javascript">
    function isset(variable) {
        return typeof(variable) != "undefined" && variable !== null;
    }
    function isEmpty(data) {
        return (!data || 0 === data.length);
    }
    
    var currentSuggest = -1;
    var readyStatus = 1;
    
    function processRequest() {
        // create static variable
        if ( typeof processRequest.data == 'undefined' ) {
            processRequest.data = [];
        }
        if ( typeof processRequest.keyword == 'undefined' ) {
            processRequest.keyword = '';
        } 
        if ( typeof processRequest.cate == 'undefined' ) {
            processRequest.cateCode = '';
        }
        
        // Get keyword
        var keyword = jQuery.trim(jQuery('#Keyword').val());
        // Get cate code
        var cateCode = '';
        
        if (keyword == '' || keyword == null) {
            // fadeOut search
            $("#search-suggest").fadeOut(500);
        } else if(processRequest.keyword == keyword) {
            // fadeIn search
            $("#search-suggest").fadeIn(100);
        } else {
            // Get first code
            var firstIndex = keyword.toLowerCase().charCodeAt(0);
            // Get the ajax data
            if(! isset(processRequest.data[firstIndex]) 
            || processRequest.data[firstIndex].length == 0) {
                // Get first character
                var firstCharacter = keyword.toLowerCase().charAt(0);
                $.ajax({
                    type: "POST",
                    url: SITE_URL + '/tin-tuc/danh-sach.' + firstCharacter + '.html',
                    dataType: "json",
                    data: 'block={"MTk0ODR8MjJ8c2VhcmNofDU1OXx0aW4tdHVjfHRpbWtpZW18UEhQ":{}}&token=d8dfba18ec10c6bba909f899806fb569',
                    success: function(msg){
                        // be order by result_count
                        processRequest.data[firstIndex] = msg.MTk0ODR8MjJ8c2VhcmNofDU1OXx0aW4tdHVjfHRpbWtpZW18UEhQ['content'];
                    }
                });
            }
            
            // Prepare the content
            var content = [];
            // Create pattern
            var pattern = new RegExp(keyword.toLowerCase(), "i");
            if(isset(processRequest.data[firstIndex]) && processRequest.data[firstIndex].length > 0) {
                $(processRequest.data[firstIndex]).each(function(index) {
                    // Get the string
                    var item = processRequest.data[firstIndex][index];
                    // preg_match with keyword
                    if(item.keyword.match(pattern)) {
                        if(content.length < 10) {
                            content.push(item);
                        } else {
                            var minItem = content.shift();
                            if(minItem.count > item.count) {
                                content.unshift(minItem);
                            } else {
                                content.push(item);
                            }
                        }
                    }
                });
            }
            
            // Prepare for display
            var output = '';
            jQuery(content).each(function(index){
                output += '<li id="suggest-item-' + index + '" class="Suggest-Item" '
                + 'onclick="return findData(\'' + content[index].keyword + '\');"' 
                + ' rel="' + content[index].keyword + '">'
                + '<p class="SearchTitle">'
                + content[index].keyword.replace(pattern, '<b>' + keyword + '</b>')
                + '</p></li>';
            });
            jQuery('ul.Suggest-List').html(output);
            // change status
            currentSuggest = -1;
            readyStatus = 1;
            if(output != '') {
                // fadeIn the suggest
                $("#search-suggest").show();
            }
        }
    }
    
    function findData(keyword) {
        jQuery('#Keyword').val(keyword);
        $("#search-suggest").fadeOut(100);
        $("#frmNewsSearch").submit();
        return false;
    }
    
    var maxItem = 10;
    function checkKey(e){
        maxItem = jQuery('.Suggest-Item').length;
        switch (e.keyCode) {
            // key down
            case 40:
                readyStatus = 0;
                currentSuggest ++;
                if ( currentSuggest == maxItem ) {
                    $('.Suggest-Item').removeClass('selected');
                    currentSuggest = -1;
                    break;
                }
                var currentItem = jQuery( '#suggest-item-' +  currentSuggest);
                $('.Suggest-Item').removeClass('selected');
                currentItem.addClass('selected');
                jQuery('#Keyword').val(currentItem.attr('rel'));
                break;
                
            // key right
            case 37:
                readyStatus = 0;
                // jQuery( '#ready_status' ).val( -1 );
                break;
                
            // key up
            case 38:
                readyStatus = 0;
                currentSuggest --;
                if(currentSuggest < 0) {
                    $('.Suggest-Item').removeClass('selected');
                    currentSuggest = -1;
                } else {
                    var currentItem = jQuery( '#suggest-item-' +  currentSuggest);
                    $('.Suggest-Item').removeClass('selected');
                    currentItem.addClass('selected');
                    jQuery('#Keyword').val(currentItem.attr('rel'));
                }
                break;
                
            // key left
            case 37:
                readyStatus = 0;
                //jQuery( '#ready_status' ).val( -1 );
                break;
            // enter key
            case 13:
                readyStatus = 0;
                $("#search-suggest").fadeOut(100);
                $("#frmNewsSearch").submit();
                break;
                
            default:
                readyStatus = 1;
                break;
        }    
    }

    jQuery(document).ready(function(){
        jQuery('#Keyword').keyup(function(){
            if(readyStatus) {
                processRequest();
            }
        });
        if(jQuery('#idCateCode')) {
            jQuery('#idCateCode').change(function(){
                if(readyStatus) {
                    processRequest();
                }
            });
        }
        
        var defaultKeyword = jQuery('#Keyword').val();
        jQuery('#Keyword').click(function(){
            if(jQuery('#Keyword').val() == defaultKeyword) {
                jQuery('#Keyword').val('');
            }
        }).blur(function(){
             if(jQuery('#Keyword').val() == '') {
                jQuery('#Keyword').val(defaultKeyword);
            }
        });
        
        if(jQuery('#Keyword').val() == '') {
            //jQuery('#static').height(300);
        }
        
        jQuery('body').click(function(){
            $("#search-suggest").fadeOut(500);
        });
        
    });
</script><input type="hidden" id="activeMenuNav" value="menu2_0_0" />
<input type="hidden" id="activeSideNav" value="menu0_0_0" />
<input type="hidden" id="currentSection" value="tin-tuc" />
<script type="text/javascript">
//var History = window.History; 
(function(window,undefined){
	// Establish Variables
	var	History = window.History;

})(window);
/* load ajax list tab news */
	var currTabName = 'tat-ca';
	var tabContent = {};
	function loadTab(tabName, urlInput){
		currTabName = tabName;		
		jQuery("#boxTab > ul > li.Active").removeClass("Active");
		jQuery("#list_news_tab_"+currTabName).addClass("Active");
		if( !tabContent[tabName] ){		
			$.ajax({
			    type: "POST",
			    url: urlInput,
			    dataType: "json",
			    data: "module=bmV3c3w1NTl8dGluLXR1Yw&moduleParams={}&token=d8dfba18ec10c6bba909f899806fb569",
			    success: function(msg){				
			    	tabContent[tabName] = msg.bmV3c3w1NTl8dGluLXR1Yw;
			    	$("#search_result").html(tabContent[tabName]);
					trackLink("#search_result");
			    }
			});
		}else{
			$("#search_result").html(tabContent[tabName]);
			trackLink("#search_result");
		}
	}

	$.onload = function(){
		var temp = $("#search_result").html();
		var tabContent = {'':temp};
		
		
	}
/* laod ajax list news*/
	function loadPage(page){
		$.ajax({
		    type: "POST",
		    //url: SITE_URL+'/tin-tuc/danh-sach.tat-ca.'+page+'.html',
			 url: SITE_URL+'/'+page,
		    dataType: "json",
		    data: "module=bmV3c3w1NTl8dGluLXR1Yw&moduleParams={}&token=d8dfba18ec10c6bba909f899806fb569",
		    success: function(msg){
		    	$("#search_result").html(msg.bmV3c3w1NTl8dGluLXR1Yw);
				trackLink("#search_result");
				
				if ( History.enabled ) {
					var tmp=""; 
					if ( window.location.href.indexOf('?') > -1)
					{
						tmp = window.location.href.split("?");	
						tmp = 	tmp[1];
					}	
					var url;
					if (tmp != "")
						url = SITE_URL +'/'+page +"?"+ tmp;
					else	
						url = SITE_URL+'/'+page ;
							
					History.pushState(null, "",url);
				}
					
		    }
		});
	}

function loadPage2(page){
	$.ajax({
		type: "POST",
		url: page,
		dataType: "json",
		data: "module=bmV3c3w1NTl8dGluLXR1Yw&moduleParams={}&token=d8dfba18ec10c6bba909f899806fb569",
		success: function(msg){
		$("#search_result").html(msg.bmV3c3w1NTl8dGluLXR1Yw);
		if ( History.enabled ) {		
			History.pushState(null,"",page );
		}
	    }
	});
}

</script>
<!-- Begin block Cookie-Popup-Center_Cookies - MTgwfENvb2tpZS1Qb3B1cC1DZW50ZXJ8NTU5fHRpbi10dWN8Q29va2llc3xIVE1M --><input type="hidden" id="cookiesTime" value="0"  />
<input type="hidden" id="cookiesTimeBottom" value="30" />
<input type="hidden" id="cookiesTimeSecond" value="30" />
<input type="hidden" id="typePopup" value="1" />
<!-- End block Cookie-Popup-Center_Cookies -->
<!-- Begin block banner_banner-adv-bottom - MTk1MTN8MTgyfGJhbm5lcnw1NTl8dGluLXR1Y3xiYW5uZXItYWR2LWJvdHRvbXxQSFA -->    <div id="bannerPopupBottom" class="fixedBanner"></div>
<!-- End block banner_banner-adv-bottom -->

</body>
</html>
