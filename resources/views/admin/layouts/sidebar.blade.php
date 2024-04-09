<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="{{route('admin.dashboard')}}" class="brand-link">
					<!-- <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
					<span class="brand-text font-weight-light"><font size ="5"><CENTER><b>  @if (getProfiles()->isNotEmpty())
                        @foreach (getProfiles() as $profile) 
                        {{$profile->textlogo}}  
                         @endforeach
                            @endif
</b></CENTER></font>
						</span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user (optional) -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
							<li class="nav-item">
								<a href="{{route('admin.dashboard')}}" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>Dashboard</p>
								</a>																
							</li>
							<li class="nav-item">
								<a href="{{route('profiles.index')}}" class="nav-link">
									<i class="nav-icon fas fa-user-alt"></i>
									<p>Profile</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('blogs.index')}}" class="nav-link">
									<i class="nav-icon fas fa-blog"></i>
									<p>Blog</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('services.index')}}" class="nav-link">
									<i class="nav-icon fas fa-laptop-code"></i>
									<p>Service</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('educations.index')}}" class="nav-link">
									<i class="nav-icon fas fa-graduation-cap"></i>
									<p>Education</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('experiences.index')}}" class="nav-link">
									<i class="nav-icon fas fa-briefcase"></i>
									<p>Experience</p>
								</a>
							</li>
						
						

						



							<li class="nav-item">
								<a href="{{route('skills.index')}}" class="nav-link">
									<i class="nav-icon fas fa-envelope-open"></i>
									<p>Skill</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('portfolios.index')}}" class="nav-link">
									<i class="nav-icon fas fa-briefcase"></i>
									<p>Portfolio</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('members.index')}}" class="nav-link">
									<i class="nav-icon fas fa-user-friends"></i>
									<p>Team Members</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="{{route('testimonials.index')}}" class="nav-link">
									<!-- <svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
									  </svg> -->
									  <i class="nav-icon fas fa-quote-left"></i>
									<p>Testimonials</p>
								</a>
							</li>
							<!-- <li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-certificate"></i>
									<p>Certificate</p>
								</a>
							</li> -->
							<li class="nav-item">
								<a href="{{route('contacts.index')}}" class="nav-link">
									<i class="nav-icon fa fa-address-book"></i>
									<p>Contacts</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('socials.index')}}" class="nav-link">
									<i class="nav-icon fas fa-share-alt"></i>
									<p>Social Media Icon</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="{{route('users.index')}}" class="nav-link">
									<i class="nav-icon  fas fa-users"></i>
									<p>Users</p>
								</a>
							</li>
							<!-- <li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon  far fa-file-alt"></i>
									<p>Pages</p>
								</a>
							</li>							  -->
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
         	</aside>