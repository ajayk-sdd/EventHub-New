 var fbtoken;
 window.fbAsyncInit = function() {
       FB.init({
            appId: '545717548873005', // App ID 585437454897001
//channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
            status: true, // check login status
            cookie: true, // enable cookies to allow the server to access the session
            xfbml: true  // parse XFBML
           
        });
        FB.Event.subscribe('auth.authResponseChange', function(response) {
        });
    };
// Load the SDK asynchronously
    (function(d) {
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement('script');
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
    }(document));
    function testAPI(s,re) {
       //alert(re);
//console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
	    /*var session = FB.getSession();
                fbtoken = session.access_token;*/
		/*response.access = s;
                alert(response);*/
               // console.log(response);exit;
                response.access = s;
            $.post(base_url+'/Users/fb_connect', {"data[User]": response}, function(data) {
                    window.location.href = base_url+re;
            });
        });
    }

    function facebookLogin(red="/Users/index") {
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                var uid = response.authResponse.userID;
                var accessToken = response.authResponse.accessToken;
                
                testAPI(accessToken,red);
            } else if (response.status === 'not_authorized') {
                FB.login(function(response) {
                     var accessToken = '';
                    testAPI(accessToken,red);
                }, {scope: 'email,user_likes,user_events,rsvp_event'});
            } else {
                FB.login(function(response) {
                     var accessToken = '';
                    testAPI(accessToken,red);
                }, {scope: 'email,user_likes,user_events,rsvp_event'});
            }
        });
    }
   function createEvent(name, startTime, endTime, location, description) {
    var eventData = {
       // "access_token": "585437454897001|N5ujAK7LxVGqBaZOa7Px1SyazP8",
        "name" : name,
        "start_time" : startTime,
        "end_time":endTime,
        "location" : location,
        
        "description":description,
        "privacy":"OPEN"
    }
    FB.api("/me/events",'post',eventData,function(response){console.log(response);
        if(response.id){
            alert("We have successfully created a Facebook event with ID: "+response.id);
        }
    });
   }
   
    function postEvent(){
	var name = "My Amazing Event";
	var startTime = "2014-08-30T17:54:00-04:00";
	var endTime = "2014-08-30T17:54:00-04:00";
	var location = "Dhaka";
	var description = "It will be freaking awesome";
	createEvent(name, startTime,endTime, location, description);
    }
    
    
     function facebookEvents() {
       
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                var uid = response.authResponse.userID;
                var accessToken = response.authResponse.accessToken;
                
                facebookEventsList();
            } else if (response.status === 'not_authorized') {
                FB.login(function(response) {
                    facebookEventsList();
                }, {scope: 'email,user_likes,user_events'});
            } else {
                FB.login(function(response) {
                    facebookEventsList();
                }, {scope: 'email,user_likes,user_events'});
            }
        });
        
     
       
    }
    
    function facebookEventsList() {
       
       FB.api(
    "/me/events?fields=cover,description,end_time,id,location,name,owner,start_time,ticket_uri,timezone,updated_time,venue",
    function (response) {
      if (response && !response.error) {
       
         $.post(base_url+'/Users/fb_events', {"data[events]": response}, function(data) {
             $("#event_came").html("Your Facebook Event Fetch Successfuly.");       
            });
        console.log(response);
      }
    }
       );
       
    }
    
    function fbEventAttend(EId) {
       
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                var uid = response.authResponse.userID;
                var accessToken = response.authResponse.accessToken;
                
                fbevntatt(EId);
            } else if (response.status === 'not_authorized') {
                FB.login(function(response) {
                    fbevntatt(EId);
                }, {scope: 'email,user_likes,user_events'});
            } else {
                FB.login(function(response) {
                    fbevntatt(EId);
                }, {scope: 'email,user_likes,user_events'});
            }
        });
        
     
       
    }
    
    function fbevntatt(eId) {
        // alert(eId);
       FB.api(
    "/"+eId+"/attending?fields=picture,name,rsvp_status",
    function (response) {
      if (response && !response.error) {
       response.pageid = eId;
         $.post(base_url+'/Events/viewEvent', {"data[eventattend]": response}, function(data) {
              //alert(data);
              location.reload(); 
            //$("#event_came").html() = response;       
           });
        //console.log(response);
      }
    }
       );
    }
    
    
     function fbAddedAccCheck(uId) {
       
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                var uid = response.authResponse.userID;
                var accessToken = response.authResponse.accessToken;
                
                fbAddedAcc(uId,accessToken);
            } else if (response.status === 'not_authorized') {
                FB.login(function(response) {
                    fbAddedAcc(uId);
                }, {scope: 'email,user_likes,user_events'});
            } else {
                FB.login(function(response) {
                    fbAddedAcc(uId);
                }, {scope: 'email,user_likes,user_events'});
            }
        });
        
     
       
    }
    
     function fbAddedAcc(uId,AccTkn) {
        // alert(uId);
       FB.api(
    "/me",
    function (response) {
      if (response && !response.error) {
       response.userid = uId;
       response.access_token = AccTkn;
         $.post(base_url+'/Users/fbacc_link', {"data[fbadded]": response}, function(data) {
              if(data==1)
             {
              alert("You ALH account successfully linked with your Facebook Account.");
               location.reload(); 
             }
             else
             {
              alert("This Facebook Account is already linked with other Account. Try again with other FB Account.");
             }
             
            //$("#event_came").html() = response;       
           });
        console.log(response);
      }
    }
       );
    }

    