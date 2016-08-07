	<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?= base_url()?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?= $_SESSION['NamaPetugas'] ?></span>
									<div class="text-size-mini text-muted">
										<i class="icon-office text-size-small"></i> &nbsp;<?= $_SESSION['NamaPuskesmas'] ?>
									</div>

								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Menu LBPL -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Kesling Rumah</span></a>
									<ul>
										<li><a href="<?= base_url('kesrumah/inspeksirumah')?>">Register Inspeksi Kesling Rumah</a></li>
										<li><a href="<?= base_url('kesrumah')?>">Daftar Laporan Inspeksi Kesling Rumah</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-droplet2"></i> <span>Kesling Sarana Air Minum</span></a>
									<ul>
										<li><a href="<?= base_url('kessam/inspeksisam')?>">Register Inspeksi Kesling Sarana Air Minum & Air Bersih</a></li>
										<li><a href="<?= base_url('kessam')?>">Daftar Laporan Inspeksi Kesling Sarana Air Minum & Air Bersih</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-store"></i> <span>Kesling Tempat Umum (TTU)</span></a>
									<ul>
										<li><a href="<?= base_url('kesttu/register')?>">Register Inspeksi Kesling Tempat Tempat Umum</a></li>
										<li><a href="<?= base_url('kesttu')?>">Daftar Laporan Inspeksi Kesling Tempat Tempat Umum</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-store2"></i> <span>Kesling Tempat Pengelolaan Makanan (TPM)</span></a>
									<ul>
										<li><a href="<?= base_url('kestpm/register')?>">Register Inspeksi Kesling Tempat Pengelolaan Makanan</a></li>
										<li><a href="<?= base_url('kestpm')?>">Daftar Laporan Inspeksi Kesling Tempat Pengelolaan Makanan</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-collaboration"></i> <span>Bina Desa Sanitasi (STBM)</span></a>
									<ul>
										<li><a href="<?= base_url('stbm/register')?>">Register Bina Desa Sanitasi Total Berbasis Masyarakat </a></li>
										<li><a href="<?= base_url('stbm')?>">Daftar Register Bina Desa Sanitasi Total Berbasis Masyarakat</a></li>
									</ul>
								</li>
								
								<!-- /main -->

								<!-- Menu Master -->
								<li class="navigation-header"><span>Master Data</span> <i class="icon-menu" title="Forms"></i></li>
								<li><a href="<?= base_url('puskesmas')?>"><i class="icon-office"></i> <span>Data Puskesmas</span></a></li>
								<li><a href="<?= base_url('kecamatan')?>"><i class="icon-city"></i> <span>Data Kecamatan</span></a></li>
								<li><a href="<?= base_url('kelurahan')?>"><i class="icon-library2"></i> <span>Data Kelurahan / Desa</span></a></li>
								<li><a href="<?= base_url('parameter')?>"><i class="icon-eyedropper3"></i> <span>Data Parameter Inspeksi</span></a></li>
								<li><a href="#"><i class="icon-stack4"></i> <span>Data Penilaian SAM</span></a>
									<ul>
										<li><a href="<?= base_url('kualitasair')?>">Data Kualitas Air </a></li>
										<li><a href="<?= base_url('penilaianresiko')?>">Data Penilaian Resiko</a></li>
									</ul>
								</li>
								<li><a href="<?= base_url('kategorittu')?>"><i class="icon-archive"></i> <span>Data Kategori TTU</span></a></li>
								<li><a href="<?= base_url('kategoritpm')?>"><i class="icon-books"></i> <span>Data Kategori TPM</span></a></li>
								<li><a href="<?= base_url('petugas')?>"><i class="icon-users"></i> <span>Data Petugas</span></a></li>
								
								<!-- /Menu Master -->

								<!-- Appearance -->
								
								<!-- /page kits -->

							</ul>
						</div>
					</div>
					