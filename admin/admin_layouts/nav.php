<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <!-- <img src="{{ asset('kcnew/frontend/img/image_iconLogo.png') }}" class="logo-icon" alt="logo icon"> -->
        </div>
        <div>
            <h4 style="color: #00b249" class="logo-text">SIU 07 - News</h4>
        </div>
        <div style="color: #00b249" class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <!-- @if(checkPermission("admin.index")) -->
        <li>
            <a href="/admin/">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Bảng điều khiển</div>
            </a>
        </li>
        <!-- @endif -->

        <!-- @if(checkPermission("admin.posts.index") || checkPermission("admin.posts.create") ) -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                </div>
                <div class="menu-title">Bài viết</div>
            </a>

            <ul>
                <!-- @if(checkPermission("admin.posts.index")) -->
                <li> <a href="/admin/post/listposts.php"><i class="bx bx-right-arrow-alt"></i>Tất cả bài viết</a>
                </li>
                <!-- @endif -->

                <!-- @if(checkPermission("admin.posts.create")) -->
                <li> <a href="/admin/post/createpost.php"><i class="bx bx-right-arrow-alt"></i>Thêm bài viết mới</a>
                </li>
                <!-- @endif -->

            </ul>
        </li>
        <!-- @endif -->

        <!-- @if(checkPermission("admin.categories.index") || checkPermission("admin.categories.create") ) -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-menu'></i>
                </div>
                <div class="menu-title">Danh mục bài viết</div>
            </a>

            <ul>
                <!-- @if(checkPermission("admin.categories.index")) -->
                <li> <a href="/admin/categories/listcategories.php"><i class="bx bx-right-arrow-alt"></i>Tất cả danh mục</a>
                </li>
                <!-- @endif -->

                <!-- @if(checkPermission("admin.categories.create")) -->
                <li> <a href="/admin/categories/createCate.php"><i class="bx bx-right-arrow-alt"></i>Thêm danh mục mới</a>
                </li>
                <!-- @endif -->
            </ul>
        </li>
        <!-- @endif -->

        <!-- @if(checkPermission("admin.tags.index")) -->
        <li>
            <a href="/admin/tag/listtag.php">
                <div class="parent-icon"><i class='bx bx-purchase-tag'></i></div>
                <div class="menu-title">Từ khóa</div>
            </a>
        </li>
        <!-- @endif -->

        <!-- @if(checkPermission("admin.comments.index") || checkPermission("admin.comments.create") ) -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-comment-dots'></i>
                </div>
                <div class="menu-title">Bình luận</div>
            </a>

            <ul>
                <!-- @if(checkPermission("admin.comments.index")) -->
                <li> <a href="/admin/comments/listcomments.php"><i class="bx bx-right-arrow-alt"></i>Tất cả bình luận</a>
                </li>
                <!-- @endif -->

                <!-- @if(checkPermission("admin.comments.create")) -->
                 
                <!-- @endif -->

            </ul>
        </li>
        <!-- @endif -->

        <hr>

        <!-- @if(checkPermission("admin.roles.index") || checkPermission("admin.roles.create") ) -->
        <li>
            <a href="javascript:; " class="has-arrow">
                <div class="parent-icon"><i class='bx bx-key'></i>
                </div>
                <div class="menu-title">Phân Quyền</div>
            </a>

            <ul>
                <!-- @if(checkPermission("admin.roles.index")) -->
                <li> <a href="/admin/role/listroles.php"><i class="bx bx-right-arrow-alt"></i>Tất cả quyền</a>
                </li>
                <!-- @endif -->

                <!-- @if(checkPermission("admin.roles.create")) -->
                <li> <a href="/admin/role/createRole.php"><i class="bx bx-right-arrow-alt"></i>Thêm quyền mới</a>
                </li>
                <!-- @endif -->
            </ul>
        </li>
        <!-- @endif -->

        <!-- @if(checkPermission("admin.users.index") || checkPermission("admin.users.create") ) -->
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Tài khoản</div>
            </a>

            <ul>

                <!-- @if(checkPermission("admin.users.index")) -->
                <li> <a href="/admin/user/listuser.php"><i class="bx bx-right-arrow-alt"></i>Tất cả tài khoản</a>
                </li>
                <!-- @endif -->

                <!-- @if(checkPermission("admin.users.create")) -->
                <li> <a href="/admin/user/createUser.php"><i class="bx bx-right-arrow-alt"></i>Thêm tài khoản mới</a>
                </li>
                <!-- @endif -->

            </ul>
        </li>
        <!-- @endif -->

        <!-- @if(checkPermission("admin.contacts")) -->
        <li>
            <a href="/admin/contact/listcontact.php">
                <div class="parent-icon"><i class='bx bx-mail-send'></i></div>
                <div class="menu-title">Liên hệ</div>
            </a>
        </li>
        <!-- @endif -->

        <!-- @if(checkPermission("admin.setting.edit")) -->
        <li>
            <a href="/admin/about/about.php">
                <div class="parent-icon"><i class='bx bx-info-square'></i></div>
                <div class="menu-title">Cài đặt</div>
            </a>
        </li>
        <!-- @endif -->

        <li>
            <a href="/admin/adv/adv.php">
                <div class="parent-icon"><i class='bx bx-image'></i></div>
                <div class="menu-title">Quảng cáo</div>
            </a>
        </li>

        <hr>

        <li>
            <a href="http://localhost:3000/">
                <div class="parent-icon"><i class='bx bx-pointer'></i></div>
                <div class="menu-title">Trang chủ</div>
            </a>
        </li>


    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->