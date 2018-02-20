<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="angular.js"></script>
	<script type="text/javascript">
		"use strict"
			var app=angular.module("app_con",[]);
			app.service("get_contacts",function($http){
				this.display_contacts=function(v)
				{
					//alert("hai");
					/*alert(v.g_name);
					v.det();*/
					var request=$http({
						method: "post",
						url: "contacts_dis.php",
						headers:{'content-type':'application/x-www-form-urlencoded'},
						transformRequest:function(obj){
							var str = [];
                                                  for(var p in obj)
                                                  {
                                                        //console.log(p);
                                                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                                                  }                                                      
                                                  //alert(str.join("&"));
                                                    return str.join("&");
                                                },
                     data: { 
                         
                         gid: '1111',
                         owner_email:'ram@inmar.com'
                     } 
					});
  
                 // Store the data-dump of the FORM scope. 
                 request.success( 
                     function( data ) { 
  
                         //v.message = data; 
                      //   alert(JSON.stringify(data));
                         v.collect=data;
                      //   alert(data);
                        // alert("Group created successfully");
                     } 
                 ); 

				}
			});
			app.service("delete_contact",function($http){
				this.deletecon=function(v,b,c,d)
				{
				//	alert("hai");
					/*alert(v.g_name);
					v.det();*/
					var request=$http({
						method: "post",
						url: "delcontact.php",
						headers:{'content-type':'application/x-www-form-urlencoded'},
						transformRequest:function(obj){
												  var str = [];
                                                  for(var p in obj)
                                                  {
                                                        //console.log(p);
                                                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                                                  }                                                      
                                                //  alert(str.join("&"));
                                                    return str.join("&");
                                                },
                     data: { 
                         
                         g_id: b,
                         cemail: d,
                         owner_email:c
                     } 
					});
  
                 // Store the data-dump of the FORM scope. 
                 request.success( 
                     function( data ) { 
  
                         //v.message = data; 
                     //    alert(JSON.stringify(data));
                         v.collect=data;
                       //  alert(data);
                         v.onpageload();
                        // alert("Group created successfully");
                     } 
                 ); 

				}
			});
				app.service("edit_contact",function($http){
				this.editcon=function(v,b,c,d)
				{
					//alert("hai");
					/*alert(v.g_name);
					v.det();*/
					var request=$http({
						method: "post",
						url: "editcontact.php",
						headers:{'content-type':'application/x-www-form-urlencoded'},
						transformRequest:function(obj){
												  var str = [];
                                                  for(var p in obj)
                                                  {
                                                        //console.log(p);
                                                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                                                  }                                                      
                                                //  alert(str.join("&"));
                                                    return str.join("&");
                                                },
                     data: { 
                         
                         g_id: b,
                         cemail: d,
                         owner_email: c
                     } 
					});
  
                 // Store the data-dump of the FORM scope. 
                 request.success( 
                     function( data ) { 
  
                         //v.message = data; 
                       //  alert(JSON.stringify(data));
                         v.collect=data;
                        // alert("Group created successfully");
                     } 
                 ); 

				}
			});
			app.controller("app_con_dis",function($scope,$location,get_contacts,delete_contact,edit_contact) {
				/*$scope.values={g_id:'',g_name:'',owner_email:''};
				var qs=$location.search();
				$scope.g_name=$location.search().g_name;
				//$scope.owner_email=$location.search()['owner_email'];
				$scope.det=function(){
				 for (var x in $scope.values) {
         		   if (x in qs) {
                		$scope.values[x] = qs[x];
            		}
        		}
        		alert(qs[0]);
        		}*/
				$scope.onpageload=function(){
					get_contacts.display_contacts($scope);
				}
				$scope.deletecontact=function(g_id,uemail,cemail){
					delete_contact.deletecon($scope,g_id,uemail,cemail);
				};
				$scope.editcontact=function(g_id,uemail,cemail){
					edit_contact.editcon($scope,g_id,uemail,cemail);
				};
			});	

	</script>
</head>
<body ng-app="app_con" ng-controller="app_con_dis" ng-init="onpageload()">
   
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a id="showContacts">Contacts</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" id="showGroups">Groups
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Group1</a></li>
            <li><a href="#">Group2</a></li>
            <li><a href="#">Group3</a></li>
          </ul>
        </li>
        <li>
        	<a class="dropdown-toggle" data-toggle="dropdown" id="sortby">SortBy
        	 <span class="caret"></span>
        	</a>
        	<ul class="dropdown-menu">
        		<li><a href="#">Name</a></li>
        		<li><a href="#">email</a></li>
        	</ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
      </ul>
    </div>

  </div>
</nav>
<div class="container-fluid group_section">
    <div class="row">
         <div class="col-sm-12 col-xs-12">
              <div ng-repeat="x in collect">
                    <div class="panel panel-default" >
                      <div class="panel-heading">{{x.name}}</div>
                      <div class="panel-body">{{x.phno}}</div>
                      <div class="panel-body">{{x.cemail}}</div>
                      <div class="panel-body"><a href="#" ng-click="editcontact(x.g_id,x.uemail,x.cemail)">edit</a></div>
                      <div class="panel-body"><a href="#" ng-click="deletecontact(x.g_id,x.uemail,x.cemail)">delete</a></div>
                    </div>
              </div>
         </div>
    </div>
</div>
</body>
</html>