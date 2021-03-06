<header >
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-radius: 1rem;">
                    <div class="container-fluid d-flex justify-content-between">
                      <a class="navbar-brand" href="#">SRS</a>
                      <div class="">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                            <ul class="navbar-nav">
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  {{Session::get('user')['nama']}}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <form id="logout-form" class="hidden" action="{{ url('/logout') }}" method="POST">@csrf</form>
                                    <li style="cursor: pointer;"><a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                                </ul>
                              </li>
                            </ul>
                          </div>
                      </div>
                    </div>
                  </nav>
            </div>
        </div>
    </div>
</header>