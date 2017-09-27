<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i
                    class="fa fa-home bg-red"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
</ul>
<div class="tab-content" id="control-sidebar-content">
    <div class="tab-pane active" id="control-sidebar-home-tab">
        <ul class="control-sidebar-menu" data-bind="with: userInfo">
            <li class="list-group-item">
                <h4>
                    <p class="text-danger">Welcome To VipFbnow.Com
                    </p>
                </h4>
            </li>
            @if (!\Illuminate\Support\Facades\Auth::check())
                <li class="list-group-item"><p class="text-info">Vui Lòng Đăng Nhập</p></li>
            @else
                <li class="list-group-item">
                    <span class="badge bg-maroon" data-bind="text: fullname"></span>
                    Name
                </li>
                <li class="list-group-item ">
                    <span class="badge bg-navy"><span data-bind="text: vnd"></span><i class='fa fa-money'></i></span>
                    VNĐ
                </li>
                <li class="list-group-item ">
                    <span class="badge bg-navy"><span data-bind="text: toida"></span>ID</span>
                    TỐI ĐA
                </li>
                <li class="list-group-item ">
                    <span class="badge bg-green" data-bind="text: username"></span>
                    Username
                </li>
                <li class="list-group-item">
                    <span class="badge bg-red" data-bind="text: mail"></span>
                    Email
                </li>
                <li class="list-group-item">
                    <span class="badge bg-blue" data-bind="text: sdt"></span>
                    Số Điện Thoại
                </li>
            @endif
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
                        <div id="google_translate_element"></div>
                        <script type="text/javascript">
                            function googleTranslateElementInit() {
                                new google.translate.TranslateElement({
                                    pageLanguage: 'vi',
                                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                                    multilanguagePage: true
                                }, 'google_translate_element');
                            }
                        </script>
                        <script type="text/javascript"
                                src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                        <p>
                        <div id="google_translate_element"></div>
                        </p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>