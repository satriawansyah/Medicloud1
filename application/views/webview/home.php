
<?php
if(isAuthorizedPasien()){
	?>
	<div class="page-content footer-clear">

		<!-- Page Title-->
		<div class="pt-3">
			<div class="page-title d-flex">
				<div class="align-self-center me-auto">
					<p class="color-white opacity-80 header-date"></p>
				</div>

			</div>
		</div>

		<svg id="header-deco" viewBox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
			<path id="header-deco-1" d="M 0,600 C 0,600 0,120 0,120 C 92.36363636363635,133.79904306220095 184.7272727272727,147.59808612440193 287,148 C 389.2727272727273,148.40191387559807 501.4545454545455,135.40669856459328 592,129 C 682.5454545454545,122.5933014354067 751.4545454545455,122.77511961722489 848,115 C 944.5454545454545,107.22488038277511 1068.7272727272727,91.49282296650718 1172,91 C 1275.2727272727273,90.50717703349282 1357.6363636363635,105.25358851674642 1440,120 C 1440,120 1440,600 1440,600 Z"></path>
			<path id="header-deco-2" d="M 0,600 C 0,600 0,240 0,240 C 98.97607655502392,258.2105263157895 197.95215311004785,276.4210526315789 278,282 C 358.04784688995215,287.5789473684211 419.16746411483257,280.5263157894737 524,265 C 628.8325358851674,249.4736842105263 777.377990430622,225.47368421052633 888,211 C 998.622009569378,196.52631578947367 1071.3205741626793,191.57894736842107 1157,198 C 1242.6794258373207,204.42105263157893 1341.3397129186603,222.21052631578948 1440,240 C 1440,240 1440,600 1440,600 Z"></path>
			<path id="header-deco-3" d="M 0,600 C 0,600 0,360 0,360 C 65.43540669856458,339.55023923444975 130.87081339712915,319.1004784688995 245,321 C 359.12918660287085,322.8995215311005 521.9521531100479,347.1483253588517 616,352 C 710.0478468899521,356.8516746411483 735.3205741626795,342.3062200956938 822,333 C 908.6794258373205,323.6937799043062 1056.7655502392345,319.62679425837325 1170,325 C 1283.2344497607655,330.37320574162675 1361.6172248803828,345.1866028708134 1440,360 C 1440,360 1440,600 1440,600 Z"></path>
			<path id="header-deco-4" d="M 0,600 C 0,600 0,480 0,480 C 70.90909090909093,494.91866028708137 141.81818181818187,509.8373205741627 239,499 C 336.18181818181813,488.1626794258373 459.6363636363636,451.5693779904306 567,446 C 674.3636363636364,440.4306220095694 765.6363636363636,465.88516746411483 862,465 C 958.3636363636364,464.11483253588517 1059.8181818181818,436.8899521531101 1157,435 C 1254.1818181818182,433.1100478468899 1347.090909090909,456.555023923445 1440,480 C 1440,480 1440,600 1440,600 Z"></path>
		</svg>

		<!-- Main Card Slider-->
		<div class="splide single-slider slider-no-dots slider-no-arrows slider-visible" id="single-slider-1" style="margin-bottom: 150px;">
			<div class="splide__track">
				<div class="splide__list">
					<div class="splide__slide">
						<div class="card card-style m-0 bg-5 shadow-card shadow-card-m" style="height:200px">							
						</div>
					</div>
					<div class="splide__slide">
						<div class="card card-style m-0 bg-9 shadow-card shadow-card-m" style="height:200px">
							<div class="card-top p-3">
								<a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-card-more" class="icon icon-xxs bg-white color-black float-end"><i class="bi bi-three-dots font-18"></i></a>
							</div>
						</div>
					</div>
					<div class="splide__slide">
						<div class="card card-style m-0 bg-7 shadow-card shadow-card-m" style="height:200px">
							<div class="card-top p-3">
								<a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-card-more" class="icon icon-xxs bg-white color-black float-end"><i class="bi bi-three-dots font-18"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Account Activity Title-->
		<div class="content my-0 mt-n2 px-1">
			<div class="d-flex">
				<div class="align-self-center">
					<h3 class="font-16 mb-2">Jadwal Pemeriksaan :</h3>
				</div>
			</div>
		</div>

		<!--Account Activity Notification-->
		<div class="card card-style gradient-green shadow-bg shadow-bg-s">
			<!-- <div class="content"> -->
				<!-- <a href="page-activity.html" class="d-flex">
					<div class="align-self-center">
						<h1 class="mb-0 font-40"><i class="bi bi-check-circle color-white pe-3"></i></h1>
					</div>
					<div class="align-self-center">
						<h5 class="color-white font-700 mb-0 mt-0 pt-1">
							Disini tampilkan waktu kedatangan pemeriksaan (di admin bsa ubah jam kedatangan)
						</h5>
					</div>
					<div class="align-self-center ms-auto">
						<i class="bi bi-arrow-right-short color-white d-block pt-1 font-20 opacity-50"></i>
					</div>
				</a> -->
				<?php
					foreach($jadwal_pemeriksaan as $dt){
						// $status=($dt->status=="") ? "PROSES": $dt->status;
						// $icon=($status=="SELESAI") ? 'gradient-green bi-check-lg' : 'gradient-red bi-clock';
						// $link=($status=="SELESAI") ? base_url('webview/lab/pemeriksaan/print/?viewid='.$dt->id.'&tn='.strtolower($dt->no_test)).'&pdf=true' : '#';
						?>
						<div class="list-group list-custom list-group-m list-group-flush rounded-xs">
							<strong class="text-center font-16"><?=$dt->jenis_pemeriksaan;?></strong>
							<div href="#" class="list-group-item p-2">
								<div class="col-8">
									<b class="color-blue-light">Nama : <?=$dt->nama_pasien;?></b><br>
									<b class="color-blue-dark">NIK : <?=$dt->nik;?></b>
								</div>
								<div class="col-4 text-end">
									<b class=""><?=date("d M Y",strtotime($dt->tgl_periksa));?></b><br>
									<!-- <i class="bi bi-file-earmark-pdf color-red-dark font-10"></i>	 -->
									<b class=""> Pukul. <?=$dt->jam_periksa;?></b>
								</div>
							</div>
						</div>
						<?php
							} // end foreach pemeriksaan
				?>
			<!-- </div> -->
		</div>

		<!-- Send Money Slider-->
		<!-- <div class="splide quad-slider slider-no-dots slider-no-arrows slider-visible text-center" id="double-slider-2">
			<div class="splide__track">
				<div class="splide__list">
					<div class="splide__slide">
						<a href="#" data-card-height="60" data-bs-toggle="offcanvas" data-bs-target="#menu-friends-transfer" class="card border-0  bg-1 shadow-card shadow-card-m rounded-m"></a>
						<h6 class="pt-2">Johnatan</h6>
					</div>
					<div class="splide__slide">
						<a href="#" data-card-height="60" data-bs-toggle="offcanvas" data-bs-target="#menu-friends-transfer" class="card border-0  bg-6 shadow-card shadow-card-m rounded-m"></a>
						<h6 class="pt-2">Alexandra</h6>
					</div>
					<div class="splide__slide">
						<a href="#" data-card-height="60" data-bs-toggle="offcanvas" data-bs-target="#menu-friends-transfer" class="card border-0 bg-3 shadow-card shadow-card-m rounded-m"></a>
						<h6 class="pt-2">Juanita</h6>
					</div>
					<div class="splide__slide">
						<a href="#" data-card-height="60" data-bs-toggle="offcanvas" data-bs-target="#menu-friends-transfer" class="card border-0 bg-9 shadow-card shadow-card-m rounded-m"></a>
						<h6 class="pt-2">Danielle</h6>
					</div>
				</div>
			</div>
		</div> -->

		<?php
	}else{
		?>
		<div class="mb-3">
			<a class="btn btn-xxs btn-primary" href="<?=base_url('webview/auth');?>">Login</a>
			<span style="float: right">Belum punya akun? 
				<a class="" href="<?=base_url('webview/auth/register');?>">Register</a>
			</span>
		</div>
		<?php
	}
	?>
<!-- <h6 class="font-700 opacity-50">Classic, Basic Style</h6>
<div class="accordion border-0 accordion-s" id="accordion-group-6">
		<div class="accordion-item">
				<button class="accordion-button collapsed px-0" type="button" data-bs-toggle="collapse" data-bs-target="#accordion6-1">
						<span class="font-600 font-13">Accordion Item Text</span>
						<i class="bi bi-plus font-20"></i>
				</button>
				<div id="accordion6-1" class="accordion-collapse collapse" data-bs-parent="#accordion-group-6">
						<p class="pb-3 opacity-60">
								This is the accordion body. It can support most content you want without restrictions. You can use
								images, videos lists or whatever you want.
						</p>
				</div>
		</div>
	</div> -->
