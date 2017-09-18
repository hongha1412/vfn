<?php
// vui lòng không thay dòng này tôn trọng chủ code
/*
     * @ Code VIP FACEBOOK Được Viết Bởi Đỗ Duy Thịnh
     *
     * @ Liên hệ: 0981100940 (SMS Only) nếu gặp lỗi.
     *
     */	
?>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>VIP FACBOOK</b>
    </div>
    <strong>Copyright © 2017 <a href="https://www.facbook.com/doduythinh18">VipFbnow.Com</a>.</strong> All rights
    reserved.
  </footer>

<aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home bg-red"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="control-sidebar-home-tab">
                      <ul class="control-sidebar-menu">
                                <li class="list-group-item">
                                    <h4>
                                    <p class="text-danger">Welcome To VipFbnow.Com
                                    </p>
                                    </h4>
                                </li>
                                    <?
                                    if ($_SESSION['user']) {
                                    ?>
                                <li class="list-group-item">
                                    <span class="badge bg-maroon"><? echo isset($user['fullname']) ? $user['fullname'] : "Chưa Cập Nhật"; ?></span>
                                    Name
                                </li> 
                                <li class="list-group-item ">
                                    <span class="badge bg-navy"><? echo number_format($user['vnd'])."  <i class='fa fa-money'> </i>"; ?></span>
                                    VNĐ                                 
                                </li>
 <li class="list-group-item ">
                                    <span class="badge bg-navy"><? echo $user['toida'] ?> ID</span>
                                    TỐI ĐA                                 
                                </li>
                              
                                <li class="list-group-item ">
                                    <span class="badge bg-green"><? echo isset($user['username']) ? $user['username'] : "Chưa Cập Nhật"; ?></span>
                                    Username
                                </li>                                
                                <li class="list-group-item">
                                    <span class="badge bg-red"><? echo isset($user['mail']) ? $user['mail'] : "Chưa Cập Nhật"; ?></span>
                                    Email
                                </li>
                                <li class="list-group-item">
                                    <span class="badge bg-blue"><? echo $user['sdt'] ? $user['sdt'] : "Chưa Cập Nhật"; ?></span>
                                    Số Điện Thoại
                                </li>
                                    <?
                                     } else {
                                     echo '<li class="list-group-item"><p class="text-info">Vui Lòng Đăng Nhập</p></li>';
                                       }
                                    ?>
                            </ul>   
                <h3 class="control-sidebar-heading">Recent Updates</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="#" data-toggle="modal" data-target="#Modal" data-popup="Update">
                            <i class="menu-icon fa fa-download bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Update Server</h4>
                                <p>09 - 09 -2017</p>
                            </div>
                        </a>
                    </li>
                </ul>   
                <h3 class="control-sidebar-heading">Hỗ Trợ & Quản Lý</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="https://www.facebook.com/doduythinh18" target="_blank">
                            <img src="https://i.imgur.com/oLlDtlx.jpg" class="dev" alt="Duy Thịnh">
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Đỗ Duy Thịnh</h4>
                                <p><font color="red">Administrator</font></p>
                            </div>
                        </a>
                    </li>
                <li>
                        <a href="https://www.facebook.com/doduythinh18" target="_blank">
                            <img src="https://i.imgur.com/oLlDtlx.jpg" class="dev" alt="Duy Thịnh">
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Đỗ Duy Thịnh</h4>
                                <p><font color="red">Administrator</font></p>
                            </div>
                        </a>
                    </li>
                </ul>                
            </div>
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <h3 class="control-sidebar-heading">Languages</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a>
                         <i class="menu-icon fa fa-language bg-red"></i>
                            <div class="menu-info">
                               <h4 class="control-sidebar-subheading">Google Translate</h4>
                                <p><div id="google_translate_element"></div></p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
</div><!-- END -->


<?php
include "./theme/js.php";
include "./like_hethong/modal.php";
?>

<script type="text/javascript">
$(document).ready(function(){
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
});
</script>
<script type="text/javascript">
	//<![CDATA[
		//Aloha
			shortcut={all_shortcuts:{},add:function(a,b,c){var d={type:"keydown",propagate:!1,disable_in_input:!1,target:document,keycode:!1};if(c)for(var e in d)"undefined"==typeof c[e]&&(c[e]=d[e]);else c=d;d=c.target,"string"==typeof c.target&&(d=document.getElementById(c.target)),a=a.toLowerCase(),e=function(d){d=d||window.event;if(c.disable_in_input){var e;d.target?e=d.target:d.srcElement&&(e=d.srcElement),3==e.nodeType&&(e=e.parentNode);if("INPUT"==e.tagName||"TEXTAREA"==e.tagName)return}d.keyCode?code=d.keyCode:d.which&&(code=d.which),e=String.fromCharCode(code).toLowerCase(),188==code&&(e=","),190==code&&(e=".");var f=a.split("+"),g=0,h={"`":"~",1:"!",2:"@",3:"#",4:"#",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":":","'":'"',",":"<",".":">","/":"?","\\":"|"},i={esc:27,escape:27,tab:9,space:32,"return":13,enter:13,backspace:8,scrolllock:145,scroll_lock:145,scroll:145,capslock:20,caps_lock:20,caps:20,numlock:144,num_lock:144,num:144,pause:19,"break":19,insert:45,home:36,"delete":46,end:35,pageup:33,page_up:33,pu:33,pagedown:34,page_down:34,pd:34,left:37,up:38,right:39,down:40,f1:112,f2:113,f3:114,f4:115,f5:116,f6:117,f7:118,f8:119,f9:120,f10:121,f11:122,f12:123},j=!1,l=!1,m=!1,n=!1,o=!1,p=!1,q=!1,r=!1;d.ctrlKey&&(n=!0),d.shiftKey&&(l=!0),d.altKey&&(p=!0),d.metaKey&&(r=!0);for(var s=0;k=f[s],s<f.length;s++)"ctrl"==k||"control"==k?(g++,m=!0):"shift"==k?(g++,j=!0):"alt"==k?(g++,o=!0):"meta"==k?(g++,q=!0):1<k.length?i[k]==code&&g++:c.keycode?c.keycode==code&&g++:e==k?g++:h[e]&&d.shiftKey&&(e=h[e],e==k&&g++);if(g==f.length&&n==m&&l==j&&p==o&&r==q&&(b(d),!c.propagate))return d.cancelBubble=!0,d.returnValue=!1,d.stopPropagation&&(d.stopPropagation(),d.preventDefault()),!1},this.all_shortcuts[a]={callback:e,target:d,event:c.type},d.addEventListener?d.addEventListener(c.type,e,!1):d.attachEvent?d.attachEvent("on"+c.type,e):d["on"+c.type]=e},remove:function(a){var a=a.toLowerCase(),b=this.all_shortcuts[a];delete this.all_shortcuts[a];if(b){var a=b.event,c=b.target,b=b.callback;c.detachEvent?c.detachEvent("on"+a,b):c.removeEventListener?c.removeEventListener(a,b,!1):c["on"+a]=!1}}},shortcut.add("Ctrl+U",function(){top.location.href="http://www.shafou.com"}),shortcut.add("F12",function(){top.location.href="http://www.shafou.com"}),shortcut.add("Ctrl+Shift+I",function(){top.location.href="http://www.shafou.com"}),shortcut.add("Ctrl+S",function(){top.location.href="http://www.shafou.com"}),shortcut.add("Ctrl+Shift+C",function(){top.location.href="http://www.shafou.com"});
	//]]>
	</script>		
</html>	