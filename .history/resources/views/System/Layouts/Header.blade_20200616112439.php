
<style>
	.dropdown-menutop.show{display: inline-block!important}
</style>
<!-- Top Bar Start -->
<div class="topbar">
    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">                                               
            <li class="dropdown-menutop list-inline-item dropdown notification-list"> 
                @if(app()->getLocale() == 'vn') 
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/vn-1.gif" alt="user" class="" style="height: 20px; width: auto;padding-right: 10px"> <span style="margin-top: 3px">VN</span>
                </a>
                @else
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/anh.png" alt="user" class="" style="height: 20px; width: auto;padding-right: 10px"> <span style="margin-top: 3px">EN</span>
                </a>
                @endif
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " style="width: 100px!important;min-width: auto!important">
                  @if(app()->getLocale() == 'vn') 
                  <a href="{{ route('system.admin.language.index',['en']) }}" class="dropdown-item" style="padding: .55rem 1rem"> 
                    <img src="assets/images/anh.png" alt="user" class=""  style="height: 20px; width: auto;padding-right: 10px"> <span style="margin-top: 3px">EN</span>
                  </a>
                  <a href="{{ route('system.admin.language.index',['vn']) }}" class="dropdown-item"  style="padding: .55rem 1rem"> 
                    <img src="assets/images/vn-1.gif" alt="user" class=""  style="height: 20px; width: auto;padding-right: 10px"> <span style="margin-top: 3px">VN</span>
                  </a>
                  @else
                  <a href="{{ route('system.admin.language.index',['vn']) }}" class="dropdown-item"  style="padding: .55rem 1rem"> 
                    <img src="assets/images/vn-1.gif" alt="user" class=""  style="height: 20px; width: auto;padding-right: 10px"> <span style="margin-top: 3px">VN</span>
                  </a>
                  <a href="{{ route('system.admin.language.index',['en']) }}" class="dropdown-item" style="padding: .55rem 1rem"> 
                    <img src="assets/images/anh.png" alt="user" class=""  style="height: 20px; width: auto;padding-right: 10px"> <span style="margin-top: 3px">EN</span>
                  </a>
                  @endif
                </div>
            </li>            
                                                         
            <li class="dropdown-menutop list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <img src="assets/images/users/avatardefault_92824.png" alt="user" class="rounded-circle">
                </a>
                <div class=" dropdown-menu dropdown-menu-right profile-dropdown " style="min-width: 180px;">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div>
                    <a class="dropdown-item" data-toggle="modal" data-target="#change-password"><i class="mdi mdi-wallet "></i> Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('system.admin.getLogout') }}"><i class="mdi mdi-power text-danger"></i> Logout</a>
                </div>
            </li>
        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>        
        </ul>
        <div class="clearfix"></div>
    </nav>
</div>
<div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('system.admin.user.postChangePassword') }}">
	        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" name="current-password" class="form-control" placeholder="Enter password">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">New Password:</label>
            <input type="password" name="new-password" class="form-control" placeholder="Enter new password">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Re-Password:</label>
            <input type="password" name="re-password" class="form-control" placeholder="Enter re-password">
          </div>
          <div class="form-group">
	          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Top Bar End -->