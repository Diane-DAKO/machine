@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
		<div class="row">
@foreach($machines as $machine)
        
        <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;"> 
            <div class="product-card-chic">
                
                <div class="product-gallery-item">
                    
                    <div class="product-img-aspect-ratio" 
                         style="position: relative; padding-bottom: 75%; overflow: hidden; background: #f8f8f8; border-radius: 8px 8px 0 0;"> 
                        
                        @if($machine->images && $machine->images->count() > 0)
                            <a href="{{ route('machines.show', $machine) }}">
                                <img src="{{ asset('storage/' . $machine->images->first()->image_path) }}" 
                                     alt="{{ $machine->name }}"
                                     class="product-image-fade"
                                     style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease-in-out;">
                            </a>
                        @else
                            <a href="{{ route('machines.show', $machine) }}">
                                <img src="{{ asset('img/product01.png') }}" 
                                     alt="{{ $machine->name }}"
                                     class="product-image-fade placeholder-img"
                                     style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; background-color: #eee;">
                            </a>
                        @endif
                    </div>

                    <div class="product-details-minimal" style="padding: 20px 25px;">
                        
                        <p class="product-category-sub" 
                           style="text-transform: uppercase; font-size: 11px; letter-spacing: 1px; color: #999; margin: 0;">
                            {{ $machine->category->name ?? 'CATÉGORIE INCONNUE' }}
                        </p>
                        
                        <h3 class="product-name-gallery" style="font-size: 18px; font-family: serif; margin: 5px 0 10px 0;">
                            <a href="{{ route('machines.show', $machine) }}" 
                               style="color: #000; text-decoration: none;">
                                {{ $machine->name }}
                            </a>
                        </h3>
                        
                        <div class="add-to-cart" style="margin-top: 20px;">
                            <a href="{{ route('machines.show', $machine) }}" class="chic-card-button">
                                VOIR LES DÉTAILS
                            </a>
                        </div>
                    </div>
                </div>
            </div> </div>
    @endforeach
</div>


			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	
	
		<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<p>Sign Up for the <strong>NEWSLETTER</strong></p>
						<form>
							<input class="input" type="email" placeholder="Enter Your Email">
							<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
						</form>
				
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->
@endsection
