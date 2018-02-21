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
      <!--making sure that cookies and files are not cached-->
  <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
  <?php
    header("Cache-Control: no-store, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  ?>
  <script type="text/javascript"> 
    //"use strict"
      var xhttp;
     (function(){
            var c=document.cookie;
            var mytest1=c.split(';');
          // console.log(document.cookie);
            var check=document.cookie;
            var i=mytest1[0].search("=");
            i=i+1;
            if(mytest1[0].charAt(i)=="x")
            {}
            else
            {
              window.location.assign("login.html");
            }
     }());
         function delcookie()
         {
          var c=document.cookie;
          var mytest1=c.split(';');
    //      //alert("before closing:"+mytest1[0]+" "+mytest1[1]);
          var v1=mytest1[0].substr(0,mytest1[0].search("="));
          var v2=mytest1[1].substr(0,mytest1[1].search("="));
      //    //alert(v1+"  "+v2);
          document.cookie = mytest1[0]+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          document.cookie = mytest1[1]+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        //  //alert("close");
          window.location.assign("logout.php?p1="+v1+"&p2="+v2);   
         }
</script>
    <style type="text/css">
      .create_group   
      {
        position: fixed;
        top:80%;
        left:92%;
        z-index:99;
      }
     .search
      {
        display: block;
        margin: 2% auto;
      }
      .create_contact
      {
        position: fixed;
        left: 90%;
        z-index:99;
      }
      .group_section .panel-default
      {
        float: left;
        margin-right: 2%;
        width: 25%;
      }
      .group_section .panel-default a{
        float: right;
        display: inline-block;
      }
      .group_section .result_holder
      {
         padding-top: 5%;
         margin:0px auto;
      }

    </style>
    <script type="text/javascript">
       var app=angular.module("dashboard",[]);
       app.service("send_group_details",function($http){
            this.send_details=function(v){
                //alert("hai");
                //alert(group_id);
                var request = $http({ 
                     method: "post", 
                     url: "group_create.php", 
                     headers:{'content-type':'application/x-www-form-urlencoded'}, 
                     transformRequest: function(obj) {
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
                         
                         gid: v.g_id,
                         gname:v.g_name
                     } 
                 }); 
  
                 // Store the data-dump of the FORM scope. 
                 request.success( 
                     function( data ) { 
  
                         v.message = data; 
                         //alert(JSON.stringify(data));
                         //v.collect=data;
  //                       //alert("Group created successfully");
                         v.onpageload();
                     } 
                 ); 


            }
       });

       app.service("send_contact_details",function($http){
            this.send_details=function(v,group_id){
                //alert(group_id);
                var request = $http({ 
                     method: "post", 
                     url: "contacts_dis.php", 
                     headers:{'content-type':'application/x-www-form-urlencoded'}, 
                     transformRequest: function(obj) {
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
                         
                         gid: group_id
                     } 
                 }); 
  
                 // Store the data-dump of the FORM scope. 
                 request.success( 
                     function( data ) { 
                         // alert("ayyav ga pulka");
                         // alert(group_id);
                         //alert(data+"before");
                         if(data=="0[]")
                         {
                           //alert("my result zero");
                           //v.collect_contact_inf=[{name:"",phno:"",uemail:"",cemail:"",g_id:""}];
                           v.collect_contact_inf="";
                         }
                         else
                         {
                            v.collect_contact_inf= data;  
                         } 
                        //alert(JSON.stringify(data));
                         
                         //alert(JSON.stringify(v.collect_contact_inf)); 
                     } 
                 ); 


            }
       });
       //Delete contacts inside a group
       app.service("delete_contact_details",function($http){
            this.delete_details=function(v,group_id,cemail){
                ////alert("by");
                var request = $http({ 
                     method: "post", 
                     url: "delcontact.php", 
                     headers:{'content-type':'application/x-www-form-urlencoded'}, 
                     transformRequest: function(obj) {
                                                  var str = [];
                                                  for(var p in obj)
                                                  {
                                                        //console.log(p);
                                                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                                                  }                                                      
                                                  ////alert(str.join("&"));
                                                    return str.join("&");
                                            },
                     data: { 
                         
                         gid: group_id,
                         con_email:cemail
                     } 
                 }); 
  
                 // Store the data-dump of the FORM scope. 
                 request.success( 
                     function( data ) { 
  
                         //v.delete_contact_inf= data; 
//                          //alert(data);
                          v.getcontact(group_id);
                     } 
                 ); 
            }
       });
       //Function to delte contacts when all contacts are displayed
              app.service("all_delete_contact_details",function($http){
            this.all_delete_details=function(v,group_id,cemail){
               // //alert("by");
                var request = $http({ 
                     method: "post", 
                     url: "delcontact.php", 
                     headers:{'content-type':'application/x-www-form-urlencoded'}, 
                     transformRequest: function(obj) {
                                                  var str = [];
                                                  for(var p in obj)
                                                  {
                                                        //console.log(p);
                                                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                                                  }                                                      
                                                  ////alert(str.join("&"));
                                                    return str.join("&");
                                            },
                     data: { 
                         
                         gid: group_id,
                         con_email:cemail
                     } 
                 }); 
  
                 // Store the data-dump of the FORM scope. 
                 request.success( 
                     function( data ) { 
                          //  //alert(data);
                         //v.delete_contact_inf= data; 
                         ////alert(data);
                          v.showContacts();
                     } 
                 ); 
            }
       });
       app.service("collect_group_info",function($http){
             this.get_group_info=function(v){

                  $http.get("send_group_info.php")
                    .then(function(response) {
                      //alert(JSON.stringify(response));
                        //v.collect = response.data;
                         if(JSON.stringify(response).charAt(9)=="0")
                         {
                           v.collect="";
                         }
                         else
                         {
                            v.collect= response.data;  
                         }
                        // alert(v.collect);
                        document.getElementById('g_name').value="";
                        document.getElementById('g_id').value="";
                    });
             }
       });
       //For Editing a contact inside a group
            app.service("send_editcontact",function($http){
            this.send_edit_contact_details=function(v,c_name,c_phno,c_email,gid){
                ////alert("by");
                var request = $http({ 
                     method: "post", 
                     url: "editcontact.php", 
                     headers:{'content-type':'application/x-www-form-urlencoded'}, 
                     transformRequest: function(obj) {
                                                  var str = [];
                                                  for(var p in obj)
                                                  {
                                                        //console.log(p);
                                                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                                                  }                                          ////alert(str.join("&"));
                                                    return str.join("&");
                                            },
                     data: { 
                         cname: c_name,
                         c_phno: c_phno,
                         con_email:c_email,
                         g_id: gid
                     } 
                 }); 
                 // Store the data-dump of the FORM scope. 
                 request.success( 
                     function( data ) { 
                         // //alert(data);
                          v.getcontact(gid);
                         } 
                 ); 
            }
       });
         //Editing contact outside the group
            app.service("send_alleditcontact",function($http){
            this.send_all_edit_contact_details=function(v,c_name,c_phno,c_email,gid){
                //alert("by");
                var request = $http({ 
                     method: "post", 
                     url: "editcontact.php", 
                     headers:{'content-type':'application/x-www-form-urlencoded'}, 
                     transformRequest: function(obj) {
                                                  var str = [];
                                                  for(var p in obj)
                                                  {
                                                        //console.log(p);
                                                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                                                  }                                         // alert(str.join("&"));
                                                    return str.join("&");
                                            },
                     data: { 
                         cname: c_name,
                         c_phno: c_phno,
                         con_email:c_email,
                         g_id: gid
                     } 
                 }); 
                 // Store the data-dump of the FORM scope. 
                 request.success( 
                     function( data ) { 
                         // //alert(data);
                          v.showContacts();
                         } 
                 ); 
            }
       });            
            //Adding contact inside a group
            app.service("send_addcontact",function($http){
            this.send_add_contact_details=function(v,c_name,c_phno,c_email,gid){
                //alert("by");
                //alert(gid);
                var request = $http({ 
                     method: "post", 
                     url: "addcontact.php", 
                     headers:{'content-type':'application/x-www-form-urlencoded'}, 
                     transformRequest: function(obj) {
                                                  var str = [];
                                                  for(var p in obj)
                                                  {
                                                        //console.log(p);
                                                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                                                  }                                                 //alert(str.join("&"));
                                                    return str.join("&");
                                            },
                     data: { 
                         cname: c_name,
                         c_phno: c_phno,
                         con_email:c_email,
                         g_id: gid
                     } 
                 }); 
  
                 // Store the data-dump of the FORM scope. 
                 request.success( 
                     function( data ) { 
                        //  //alert(data);
                          v.getcontact(gid);
                         } 
                 ); 
            }
       });
       //Deleting a group id
          app.service("user_grpdelete",function($http){
            this.group_user_delete_details=function(v,grp_id){
                var request = $http({ 
                     method: "post", 
                     url: "deletegroup.php", 
                     headers:{'content-type':'application/x-www-form-urlencoded'}, 
                     transformRequest: function(obj) {
                                                  var str = [];
                                                  for(var p in obj)
                                                  {
                                                        //console.log(p);
                                                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                                                  }                                                 //alert(str.join("&"));
                                                    return str.join("&");
                                            },
                     data: { 
                         g_id: grp_id
                     } 
                 }); 
  
                 // Store the data-dump of the FORM scope. 
                 request.success( 
                     function( data ) { 
                          //alert(data);
                          v.onpageload();
                         } 
                 ); 
            }
       });
            //display all contacts in a user
            app.service("show_contacts",function($http){
             this.show_all_contacts=function(v){

                  $http.get("all_contacts.php")
                    .then(function(response) {
                     //alert(JSON.stringify(response));
                         //v.all_collect_contact_inf = response.data;
                         if(JSON.stringify(response).charAt(9)=="0")
                         {
                           v.all_collect_contact_inf="";
                         }
                         else
                         {
                            v.all_collect_contact_inf= response.data;  
                         }
                        // alert(response);
                        document.getElementById('g_name').value="";
                        document.getElementById('g_id').value="";
                    });
             }
       });

       app.controller("manager",function($scope,send_group_details,collect_group_info,send_contact_details,delete_contact_details,send_editcontact,send_addcontact,show_contacts,all_delete_contact_details,send_alleditcontact,user_grpdelete){
            $scope.g_name="";
            $scope.g_id="";
            $scope.collect="";
            $scope.group_module=false;
            $scope.contact_module=true;
            $scope.collect_contact_inf="";
            $scope.delete_contact_inf="";
            $scope.all_collect_contact_inf="";
            //contact details
            $scope.c_name="";
            $scope.c_phno="";
            $scope.c_email="";
            $scope.c_gid="";
            $scope.temp_group_id="";
            $scope.t_grp_id="";
            $scope.grp_name="";
            $scope.send=function(){
               //alert("hai");
               send_group_details.send_details($scope);
               //console.log($scope.collect);
            }
            $scope.onpageload=function(){
              ////alert("i am loaded");
              $scope.group_module=false;
              $scope.contact_module=true;
              $scope.all_contact_module=true;                
              collect_group_info.get_group_info($scope);
            }
            $scope.getcontact=function(group_id){
                $scope.group_module=true;
                $scope.contact_module=false;
                $scope.all_contact_module=true;
                $scope.temp_group_id=group_id;
                //alert(group_id);                
                send_contact_details.send_details($scope,group_id);
            }
            $scope.user_grp_delete=function(grp_id){
              user_grpdelete.group_user_delete_details($scope,grp_id);
            }
            $scope.showContacts=function(){
                $scope.group_module=true;
                $scope.contact_module=true;
                $scope.all_contact_module=false;
              show_contacts.show_all_contacts($scope);
            }
            $scope.delete_contact=function(group_id,cemail,owner_email){
              //alert("hai");
              delete_contact_details.delete_details($scope,group_id,cemail,owner_email);
            }
/*            $scope.all_edit_contact=function(allcnmae,allcphno,allowner_email,all_email,all_gid)
            {
              send_alleditcontact.send_all_edit_contact_details($scope,allcnmae,allcphno,all_email,all_gid);
            }

            $scope.user_grp_edit=function(grp_id,grp_name) {
              $scope.t_grp_id=grp_id;
              $scope.grp_name=grp_name;
                $('#modal_group_edit').modal('show');
               //user_grpedit.group_user_edit_details($scope,grp_id); 
            }*/
            $scope.edit_contact=function(cname,cphno,owneremail,cemail,gid){
                $scope.c_name=cname;
                $scope.c_phno=cphno;
                $scope.c_email=cemail;
                $scope.c_gid=gid;
                $('#modal_edit').modal('show');
            }

            $scope.send_edit_contact=function(){
              //alert("hai");
               send_editcontact.send_edit_contact_details($scope,$scope.c_name,$scope.c_phno,$scope.c_email,$scope.c_gid);
            }
            $scope.send_add_contact=function(){
              //alert("hhai");
              send_addcontact.send_add_contact_details($scope,$scope.c_name,$scope.c_phno,$scope.c_email,$scope.temp_group_id);
            }
            $scope.all_delete_contact=function(group_id,cemail,owner_email){
              ////alert("hai");
              all_delete_contact_details.all_delete_details($scope,group_id,cemail,owner_email);
            }
       });
       function reset()
       {
          document.getElementById('g_name').value="";
          document.getElementById('g_id').value="";
       }
    </script>
</head>
<body ng-app="dashboard" ng-controller="manager" ng-init="onpageload()">
   
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Inmar</a>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#" ng-click="onpageload()">Groups</a></li>
        <li><a href="#" id="showContacts" ng-click="showContacts()">Contacts</a></li>      
      </ul>
      <ul class="nav navbar-nav navbar-right">
            <li ><a href="#"><label>Welcome:<span class="glyphicon glyphicon-user"></span>
         <span>
          <script type="text/javascript">
            var c=document.cookie;
            var mytest1=c.split(';');
            var j=mytest1[1].search("=");
            var k=mytest1[1].search("%");
            var arr=mytest1[1].slice(j+1,k);
            document.write(arr);
          </script>
         </span>
        </label></a></li>
        <li><a href="#" onclick="delcookie()"><span class="glyphicon glyphicon-log-out"></span> Signout</a></li>
      </ul>
    </div>
      
  </div>
</nav>
<div class="create_group" ng-hide="group_module">
   <a href="#" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><img src="1.png" width="65" height="50"></a>   
</div>
<div class="container-fluid">
       <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="reset()" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Group</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label >Group Name:</label>
              <input type="text" class="form-control" id="g_name" ng-model="g_name" ng-required>
            </div>
            <div class="form-group">
              <label >Group Id:</label>
              <input type="text" class="form-control" id="g_id" ng-model="g_id" ng-required><span></span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="send()">Create</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--model for adding contact -->
<div class="create_contact" ng-hide="contact_module">
   <a href="#" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_add"><img src="1.png" width="40" height="30"></a>   
</div>
<div class="container-fluid">
       <!-- Modal -->
  <div class="modal fade" id="modal_add" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close"  data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Contact</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label >Name:</label>
              <input type="text" class="form-control" ng-model="c_name" ng-required>
            </div>
            <div class="form-group">
              <label >Phone Number:</label>
              <input type="text" class="form-control" ng-model="c_phno" ng-required><span></span>
            </div>
            <div class="form-group">
              <label >Email:</label>
              <input type="text" class="form-control" ng-model="c_email" ng-required><span></span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="send_add_contact()">Add</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!--model for contact editing-->
<div class="container-fluid">
       <!-- Modal -->
  <div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="reset()" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Contact</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label >Name:</label>
              <input type="text" class="form-control"  ng-model="c_name" ng-required>
            </div>
            <div class="form-group">
              <label >Phone Number:</label>
              <input type="text" class="form-control"  ng-model="c_phno" ng-required><span></span>
            </div>
            <div class="form-group">
              <label >Email:</label>
              <input type="text" class="form-control"  ng-disabled="true" ng-model="c_email" ng-required><span></span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="send_edit_contact()"><span class=" glyphicon glyphicon-save"></span>Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal for editing groups-->
<!--
<div class="container-fluid">
       <!-- Modal -/->
  <div class="modal fade" id="modal_group_edit" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-/->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="reset()" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Group</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label >Group Name:</label>
              <input type="text" class="form-control"  ng-model="grp_name" ng-required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="grp_edit_info()"><span class=" glyphicon glyphicon-save"></span>Save</button>
        </div>
      </div>
    </div>
  </div>
</div>
-->
<div class="container-fluid group_section">
    <div class="row">
         <div class="col-sm-12 col-xs-12 result_holder" id="result_holder">
              <div class="search" ng-hide="group_module">
                    <i class="glyphicon glyphicon-search"></i>
                    <input class="fieldcss" placeholder="Search" type="text" name="search_key" ng-model="search_key">
              </div>
              <div class="search" ng-hide="contact_module">
                    <i class="glyphicon glyphicon-search"></i>
                    <input class="fieldcss" type="text" placeholder="Search" name="search_contact_key" ng-model="search_contact_key">
              </div>
              <div class="search" ng-hide="all_contact_module">
                    <i class="glyphicon glyphicon-search"></i>
                    <input class="fieldcss" type="text" placeholder="search" name="search_all_contact_key" ng-model="search_all_contact_key">
              </div>
              <div ng-hide='contact_module'>
                    <table class="table table-striped">
                       <tr>
                          <th>Name</th>
                          <th>Ph.no</th>
                          <th>Email</th>
                          <th><span class="glyphicon glyphicon-trash"></span>Delete</th>
                          <th><span class="glyphicon glyphicon-edit"></span> Edit</th>                       
                       </tr> 
                       <tr ng-repeat="x in collect_contact_inf|filter:search_contact_key">
                            <td>{{x.name}}</td>
                            <td>{{x.phno}}</td>
                            <td>{{x.cemail}}</td>
                            <td><a href="#" ng-click="delete_contact(x.g_id,x.cemail,x.uemail)"><span class="glyphicon glyphicon-trash"></span> delete</a></td>
                            <td><a href="#" ng-click="edit_contact(x.name,x.phno,x.uemail,x.cemail,x.g_id)"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                       </tr>
                   </table>
              </div>
              <div ng-repeat="x in collect|filter:search_key" name="group_module"  ng-hide='group_module'>
                    <div class="panel panel-default" >
                      <div class="panel-heading">{{x.group_name}}<a class="btn" ng-click="user_grp_delete(x.group_id)"><span class="glyphicon glyphicon-trash"></span></a><!--&nbsp;&nbsp;
                      <a class="btn" ng-click="user_grp_edit(x.group_id)"><span class="glyphicon glyphicon-edit"></span></a>--></div>
                      <div class="panel-body"><a href="#" ng-click="getcontact(x.group_id)">view</a></div>
                    </div>
              </div>
              <div ng-hide='all_contact_module'>
                    <table class="table table-striped">
                      <!-- <tr>
                          <th>Name</th>
                          <th>Ph.no</th>
                          <th>Email</th>
                          <th>Group Id</th>
                          <th><span class="glyphicon glyphicon-trash"></span>Delete</th>
                          <th><span class="glyphicon glyphicon-edit"></span> Edit</th>                       
                       </tr>--> 
                       <tr ng-repeat="x in all_collect_contact_inf|filter:search_all_contact_key">
                            <td>{{x.name}}</td>
                            <td>{{x.phno}}</td>
                            <td>{{x.cemail}}</td>
                            <td>{{x.g_id}}</td>
                            <td><a href="#" ng-click="all_delete_contact(x.g_id,x.cemail,x.uemail)"><span class="glyphicon glyphicon-trash"></span>delete</a></td>
                            <td><a href="#" ng-click="all_edit_contact(x.name,x.phno,x.uemail,x.cemail,x.g_id)"><span class="glyphicon glyphicon-edit"></span>Edit</a></td>
                       </tr>
                   </table>
              </div>
         </div>
    </div>
</div>
</body>
</html>