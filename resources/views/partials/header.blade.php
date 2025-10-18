	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> 01 XXXXXXXX</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
				</ul>

			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#" class="logo">
								<img src="./img/logo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<div class="col-md-6">
    <div class="header-search">
	<form method="GET" action="{{ route('search') }}" style="display: flex; gap: 0px; align-items: center;">
	<select name="category" class="input-select">
    <option value="0" {{ request('category') == 0 ? 'selected' : '' }}>Toutes les catégories</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>

    
    <input name="query" class="input" placeholder="Recherche" value="{{ request('query') }}">
    
    <button type="submit" class="search-btn">Rechercher</button>
</form>

    </div>
</div>

					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">

							<!-- Menu Toogle -->
							<div class="menu-toggle">
								<a href="#">
									<i class="fa fa-bars"></i>
									<span>Menu</span>
								</a>
							</div>
							<!-- /Menu Toogle -->
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
    	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="/">Home</a></li>
     <!-- Dropdown Catégories -->
	 <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Catégories <span class="caret"></span>
    </a>
	<ul class="dropdown-menu">
    @foreach($categories as $category)
        <li>
            <a href="{{ route('machines.catalogue', ['category' => $category->id]) }}">
                {{ $category->name }}
            </a>
        </li>
    @endforeach
</ul>

</li>
				
				<li><a href="{{ route('machines.catalogue') }}">Machines</a></li>
					<li><a href="/faq">FAQ</a></li>
					<li><a href="/contact">Contact</a></li>

				</ul>

				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->