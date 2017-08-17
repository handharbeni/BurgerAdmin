      <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <!-- <img src="/build/images/img.jpg" alt="">John Doe -->
                    Lainnya
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <?php if($this->session->userdata('adminKey')): ?>
                    <li><a href="/profile"> Profil</a></li>
                    <?php endif; ?>
                    <li>
                      <a href="/settings">
                        <!-- <span class="badge bg-red pull-right">50%</span> -->
                        <span>Pengaturan</span>
                      </a>
                    </li>
                    <li><a href="/logout"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->